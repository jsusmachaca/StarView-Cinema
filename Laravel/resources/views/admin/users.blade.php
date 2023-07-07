<!DOCTYPE html>
<html lang="en">
     <head>
          <meta charset="UTF-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
          <link rel="stylesheet" href="{{ asset('css/registers.css') }}">  
          <link rel="shotcut icon" type="image/x-icon" href="{{ asset('img/star.ico') }}">
          <title>Registro de Usuarios</title>
     </head>
<body>
     <div class="container-fluid">
          <div class="row justify-content-center mt-5">
               <div class="col-lg-8 col-xl-6">
                    <div class="table-responsive">
                         <table class="table table-striped table-bordered table-dark">
                              <thead>
                                   <tr>
                                        <th>Nombre</th>
                                        <th>Email</th>
                                        <th>Contraseña</th>
                                        <th>Administrador</th>
                                        <th>Acciones</th>
                                   </tr>
                              </thead>
                              <tbody >
                                   @foreach ($user as $fila)
                                        <tr id="{{ $fila->name }}" onclick="FormularioUser('{{ $fila->name }}')" class="table-light"> 
                                             <td>{{ $fila->name }}</td>
                                             <td>{{ $fila->email }}</td>
                                             <td>{{ $fila->password }}</td>
                                             <td>{{ $fila->is_admin }}</td>
                                             <td>
                                                  <form method="POST" action="{{ route('user.delete', ['nombres' => $fila->name]) }}">
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
                              <option value="{{ route('emp.register') }}">Empleados</option>
                              <option value="{{ route('movies.register') }}">Peliculas</option>
                              <option value="{{ route('user.register') }}" selected>Usuario</option>
                              <option value="{{ route('reser.register') }}">Reservaciones</option>
                         </select>
                    </div>
               </div>
               <div class="col-lg-8 col-xl-6 mt-5 mt-xl-0">
                    <form method="POST" action="{{ route('user.rupdate') }}">
                         @csrf
                         <div class="mb-3">
                              <input type="text" name="name" autofocus required class="form-control" placeholder="Nombre">
                         </div>
                         <div class="mb-3">
                              <input type="text" name="email" autofocus required class="form-control" placeholder="Email">
                         </div>
                         <div class="mb-3">
                              <input type="text" name="password" autofocus required class="form-control" placeholder="Contraseña">
                         </div>
                         <div class="mb-3">
                              <input type="text" name="is_admin" autofocus required class="form-control" placeholder="Administrador">
                         </div>

                         <input type="submit" value="Registrar/Modificar" name="action" class="btn btn-primary small-button">
                    </form>
               </div>
          </div>
     </div>
     <script src="{{ asset('js/completated.js') }}"></script>
</body>
</html>
