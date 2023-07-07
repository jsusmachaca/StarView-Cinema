from flask import Flask, request, jsonify
from flask_cors import CORS
from apps.appDB import connection, insertData, viewData
from apps.sendEmail import load, htmlTicket
from apps.linkedList import LinkedList
import json

app = Flask(__name__)
historial_transacciones = LinkedList()

CORS(app)

@app.route('/save-data', methods=['POST'])
def saveData():
     try:
          data = request.get_json()
          print('¡Datos obtenidos!')          
          historial_transacciones.add(data)
          historial_transacciones.print()
          generateTicket()
          
          return jsonify(message='Datos recibidos correctamente')

     except Exception as e:
          print('¡Ha ocurrido un error!: ', str(e))
          return jsonify(message='Ocurrió un error al procesar datos')


def generateTicket():
     try:
          last_transaction = historial_transacciones.tail.data
          _id = last_transaction['details']['id']
          cuenta = last_transaction['details']['payer']['email_address']
          nombre = last_transaction['details']['payer']['name']['given_name']
          apellido = last_transaction['details']['payer']['name']['surname']
          pelicula = last_transaction['details']['purchase_units'][0]['custom_id']
          boletos = str(last_transaction['details']['purchase_units'][0]['description']).split('quantity: ')
          pago = last_transaction['details']['purchase_units'][0]['amount']['value']
          datos = {
               '_id': _id,
               'cuenta': cuenta,
               'nombre': nombre,
               'apellido': apellido,
               'pelicula': pelicula,
               'boletos': boletos[1],
               'pago': pago
          }
          html = htmlTicket(datos)
          load(html, datos['cuenta'])
          con = connection('payments')
          insertData(con, datos)

     except Exception as e:
          print('¡Ha ocurrido un error al generar el boleto automáticamente!: ', str(e))


@app.route('/cancel-data', methods=['POST'])
def cancelData():
     try:
          data = request.get_json()
          print('¡Datos obtenidos!')
          con = connection('cancelations')
          insertData(con, data)

          return jsonify(message='Datos recibidos correctamente')

     except Exception as e:
          print('¡Ha ocurrido un error!: ', str(e))
          return jsonify(message='Ocurrió un error al procesar datos')


if __name__ == '__main__':
     app.run(debug=True)