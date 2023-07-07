<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
     <link rel="stylesheet" href="{{ asset('css/registers.css') }}">
     <link rel="shotcut icon" type="image/x-icon" href="{{ asset('img/star.ico') }}">
     <title>Administración del Catálogo</title>
</head>
<body>
     <div class="container-fluid">
          <div class="row justify-content-center mt-5">
               <div class="col-lg-8 col-xl-6">
                    <div class="table-responsive">
                         <table class="table table-striped table-bordered table-dark">
                              <thead>
                                   <tr>
                                        <th>Título</th>
                                        <th>Información</th>
                                        <th>Duración</th>
                                        <th>Precio</th>
                                        <th>Taquilla</th>
                                        <th>Banner</th>
                                        <th>Acciones</th>
                                   </tr>
                              </thead>
                              <tbody>
                                   @foreach($movies as $fila)
                                   <tr id="{{ $fila->titulo }}" onclick="Formulario('{{ $fila->titulo}}')" class="table-light">
                                        <td>{{ $fila->titulo }}</td>
                                        <td>{{ $fila->info }}</td>
                                        <td>{{ $fila->duracion }}</td>
                                        <td>{{ $fila->precio }}</td>
                                        <td>{{ $fila->taquilla }}</td>
                                        <td><img src="data:image/jpeg;base64,{{ base64_encode($fila->banner) }}" alt="Imagen" width="50x50"></td>
                                        <td>
                                             <form method="POST" action="{{ route('catalogue.delete', ['titulo' => $fila->titulo]) }}">
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
                         <select name="registros" id="" class="form-select" onchange="location = this.value">
                              <option value="{{ route('emp.register') }}">Empleados</option>
                              <option value="{{ route('movies.register') }}" selected>Peliculas</option>
                              <option value="{{ route('user.register') }}">Usuarios</option>
                              <option value="{{ route('reser.register') }}">Reservaciones</option>
                         </select>
                    </div>
               </div>
               <div class="col-lg-8 col-xl-6 mt-5 mt-xl-0">
                    <form method="POST" enctype="multipart/form-data" action="{{ route('catalogue.rupdate') }}">
                         @csrf
                         <div class="mb-3">
                              <input type="text" name="titulo" autofocus required class="form-control" placeholder="Nombre">
                         </div>
                         <div class="mb-3">
                              <input type="text" name="info" maxlength="500" autofocus required class="form-control" placeholder="Información">
                         </div>
                         <div class="mb-3">
                              <input type="text" name="duracion" autofocus required class="form-control" placeholder="Duración">
                         </div>
                         <div class="mb-3">
                              <input type="text" name="precio" autofocus required class="form-control" placeholder="Precio">
                         </div>
                         <div class="mb-3">
                              <input type="text" name="taquilla" autofocus required class="form-control" placeholder="Taquilla">
                         </div>
                         <div class="mb-3">
                              <input type="file" name="banner" class="form-control" placeholder="Banner">
                         </div>
                              
                         <input type="submit" value="Registrar/Modificar" name="action" class="btn btn-primary small-button">
                    </form>
               </div>
          </div>
     </div>

     <script src="{{ asset('js/completated.js') }}"></script>
</body>
</html>
