from pymongo import MongoClient

def connection(collection):
     try:     
          client = MongoClient()
          db = client['cinema']
          collection = db[collection]
          return collection
          
     except Exception as e:
          print('Error al conectar: ', e)

def insertData(collection, data):
     try:
          collection.insert_one(data)
          print('¡Datos insertados correctamente!')

     except Exception as e:
          print('¡Ocurrió un error! ', e)

def viewData(collection, finding):
     try:
          a = collection.find({'details.id': finding},{
               'details.id':1, 
               'details.status':1, 
               'details.payer':1, 
               'details.purchase_units.description':1, 
               'details.purchase_units.custom_id':1, 
               'details.purchase_units.amount.value':1
          });

          for i in a:
               return i

     except Exception as e:
          print('¡Error! ', e)