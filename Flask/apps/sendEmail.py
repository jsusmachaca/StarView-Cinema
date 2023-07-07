from email.message import EmailMessage
import pdfkit
import ssl
import smtplib
import tempfile
import qrcode
import base64



def qrImage(id):
     img = qrcode.make(f'Compra completada con éxito \nID: {id}')
     with tempfile.NamedTemporaryFile(suffix='.png', delete=False) as tmp:
          img.save(tmp.name)
          tmp.seek(0)
          with open(tmp.name, 'rb') as f:
               encode = base64.b64encode(f.read()).decode('utf-8')
          return f"data:image/png;base64,{encode}"

def htmlTicket(datos):
     qr = qrImage(datos['_id'])
     ticket = f"""
     <!DOCTYPE html>
     <html lang="en">
     <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <style>
               body {{
                    font-family: Arial, sans-serif;
                    background-color: #f7f7f7;
                    color: #333;
                    margin: 20px;
               }}
               .ticket {{
                    width: 850px;
                    height: 1250px;
                    margin: 0 auto;
                    background-color: #fff;
                    border-radius: 10px;
                    padding: 20px;
                    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
               }}

               .ticket h1 {{
                    font-size: 50px;
                    margin-bottom: 30px;
               }}
               
               .ticket .qr-code {{
                    text-align: center;
                    margin-bottom: 40px;
               }}

               .ticket .qr-code img {{
                    max-width: 360px;
                    height: auto;
               }}
               .ticket .cine-name {{
                    font-size: 35px;
                    margin-bottom: 30px;
               }}

               .ticket hr {{
                    border: none;
                    height: 3px;
                    background-color: #ccc;
                    margin: 40px 0;
               }}

               .ticket .ticket-details {{
                    margin-bottom: 40px;
               }}
               
               .ticket .ticket-details li {{
                    margin-bottom: 30px;
                    list-style-type: none;
               }}

               .ticket .ticket-details li.buyer-name {{
                    font-weight: bold;
                    font-size: 34px;
               }}
               .ticket .ticket-details li.valid-for {{
                    font-size: 30px;
               }}
               .ticket .ticket-details li.valid-for span.quantity {{
                    font-size: 28px;
               }}
               .ticket .total {{
                    text-align: right;
                    margin-top: 0;
                    font-size: 45px;
                    font-weight: bold;
               }}
     </style>
     </head>
     <body>
     <div class="ticket">
               <h1 class="cine-name">StarView Cinema</h2>
               <h2>Compra: </h2>
               <div class="qr-code">
                    <img src="{qr}">
               </div>
               <h1>{ datos['pelicula'] }</h1>
               <hr>
               <h2>Entradas</h2>
               <ul class="ticket-details">
                    <li class="buyer-name">Comprador: { datos['nombre'] } { datos['apellido'] }</li>
                    <li class="valid-for">Cantidad: <span class="quantity">Valido para { datos['boletos'] } persona(s)</span></li>
               </ul>
               <hr>
               <div class="total">
                    <h3>Total</h3>
                    <h2>${ datos['pago'] }</h2>
               </div>
     </div>
     </body>
     </html>
     """
     return ticket

def load(html, receptor):
     try :
               
          pdf = 'Entrada.pdf' 

          email_emi = 'your_account'
          email_pass = 'your_password'
          email_recep = receptor
          asunto = 'Entrada "Star View"'
          cuerpo = 'Compra realizada con éxito'

          with tempfile.NamedTemporaryFile(suffix='.pdf') as tmp:
               pdfkit.from_string(html, tmp.name, options={'--no-stop-slow-scripts': None})
               tmp.seek(0)


               em = EmailMessage()
               em['From'] = email_emi
               em['To'] = email_recep
               em['Subject'] = asunto
               em.set_content(cuerpo)

               with tmp as file:
                    em.add_attachment(file.read(), maintype='application', subtype='pdf', filename=pdf)

               contexto = ssl.create_default_context()

               with smtplib.SMTP_SSL('smtp.gmail.com', 465, context=contexto) as smtp:
                    smtp.login(email_emi, email_pass)
                    smtp.sendmail(email_emi, email_recep, em.as_string())
          print('Email enviado correctamente')

     except Exception as e:
          print("Ocurrió un error", e)