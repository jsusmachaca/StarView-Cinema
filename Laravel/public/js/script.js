paypal.Buttons({
     style: {
          disableMaxWidth: true,
          color : 'blue',
          shape : 'pill',
          label: 'pay',
          height: 40,
          layout: 'vertical',
     },
     createOrder: function(data, actions){
          var cantidad = parseFloat(document.getElementById('cantidad_boleto').value);
          var titulo =  document.getElementById('titulo').value;

          var total = precio * cantidad;
          return actions.order.create({
               purchase_units: [{
                    amount : {
                         value: total
                    },
                    custom_id: titulo,
                    description: 'quantity: ' + cantidad
               }]
          })
     },
     onApprove: function(data, actions){
          actions.order.capture().then(function (details){
               alert('¡Muy buena, usted ha completado su compra!');
               var titulo =  document.getElementById('titulo').value;
               var cantidad = parseFloat(document.getElementById('cantidad_boleto').value);

               fetch('http://localhost:5000/save-data', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    mode: 'cors',
                    body: JSON.stringify({
                         details: details
                    })
               }).then(function(response) {
                    console.log(response);
               });

               fetch(registerPay, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('script[data-csrf-token]').getAttribute('data-csrf-token')
                    },
                    mode: 'cors',
                    body: JSON.stringify({
                        titulo: titulo,
                        cantidad_boletos: cantidad,
                        nombre: document.getElementById('user_name').value
                    })
               }).then(function(response) {
                    console.log(response);
               });
          });
     },

     onCancel: function(data, actions){
          alert('Su pago ha sido cancelado');
          // console.log(data)
          fetch('http://localhost:5000/cancel-data', {
               method: 'POST',
               headers: {
                   'Content-Type': 'application/json'
               },
               mode: 'cors',
               body: JSON.stringify(data)
           }).then(function(response) {
           });
     }
   }).render('#paypal-button-container');
