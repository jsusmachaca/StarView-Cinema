<!DOCTYPE html>
<html lang="en">
     <head>
          <meta charset="UTF-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
          <link rel="stylesheet" href="{{ asset('css/registers.css') }}">  
          <link rel="shotcut icon" type="image/x-icon" href="{{ asset('img/star.ico') }}">
          <title>Registro de Peliculas</title>
     </head>
<body>
     <div class="container-fluid">
          <div class="row justify-content-center mt-5">
               <div class="col-lg-8 col-xl-6">
                    <div class="table-responsive">
                         <table class="table table-striped table-bordered table-dark">
                              <thead>
                                   <tr>
                                        <th>Nombres</th>
                                        <th>Apellidos</th>
                                        <th>ID Empleado</th>
                                        <th>DNI</th>
                                        <th>Sueldo</th>
                                        <th>Horas de Trabajo</th>
                                        <th>Teléfono</th>
                                        <th>Acciones</th>
                                   </tr>
                              </thead>
                              <tbody >
                                   @foreach ($emp as $fila)
                                        <tr id="{{ $fila->id_emp }}" onclick="FormularioEmp('{{ $fila->id_emp }}')" class="table-light"> 
                                             <td>{{ $fila->nombres }}</td>
                                             <td>{{ $fila->apelllidos }}</td>
                                             <td>{{ $fila->id_emp }}</td>
                                             <td>{{ $fila->dni }}</td>
                                             <td>{{ $fila->sueldo }}</td>
                                             <td>{{ $fila->horas_trabajo }}</td>
                                             <td>{{ $fila->telefono }}</td>
                                             <td>
                                                  <form method="POST" action="{{ route('emp.delete', ['nombres' => $fila->nombres]) }}">
                                                       @csrf
                                                       @method('DELETE')
                                                       <button type="submit" class="btn btn-danger">Eliminar</button>
                                                  </form>
                                             </td>
                                        </tr>
                                   @endforeach
                              </tbody>
                         </table>
                    </div>
                    <div class="d-flex justify-content-center mt-3">
                         <select name="registros" id="" onchange="location = this.value" class="form-select">
                              <option value="{{ route('emp.register') }}" selected>Empleados</option>
                              <option value="{{ route('movies.register') }}">Peliculas</option>
                              <option value="{{ route('user.register') }}">Usuarios</option>
                              <option value="{{ route('reser.register') }}">Reservaciones</option>
                         </select>
                    </div>
               </div>
               <div class="col-lg-8 col-xl-6 mt-5 mt-xl-0">
                    <form method="POST" action="{{ route('emp.rupdate') }}">
                         @csrf
                         <div class="mb-3">
                              <input type="text" name="nombres" autofocus required class="form-control" placeholder="Nombre">
                         </div>
                         <div class="mb-3">
                              <input type="text" name="apelllidos" autofocus required class="form-control" placeholder="Apellido">
                         </div>
                         <div class="mb-3">
                              <input type="text" name="id_emp" autofocus required class="form-control" placeholder="ID">
                         </div>
                         <div class="mb-3">
                              <input type="text" name="dni" autofocus required class="form-control" placeholder="DNI">
                         </div>
                         <div class="mb-3">
                              <input type="text" name="sueldo" autofocus required class="form-control" placeholder="Sueldo">
                         </div>
                         <div class="mb-3">
                              <input type="text" name="horas_trabajo" autofocus required class="form-control" placeholder="Horas">
                         </div>
                         <div class="mb-3">
                              <input type="text" name="telefono" autofocus required class="form-control" placeholder="Télefono">
                         </div>
                         
                         <input type="submit" value="Registrar/Modificar" name="action" class="btn btn-primary small-button">
                    </form>
               </div>
          </div>
     </div>
     
     <script src="{{ asset('js/completated.js') }}"></script>
</body>
</html>
