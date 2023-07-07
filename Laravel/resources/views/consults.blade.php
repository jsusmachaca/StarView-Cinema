<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultas - StarView</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/consultas.css') }}">
    <link rel="shotcut icon" type="image/x-icon" href="{{ asset('img/star.ico') }}">
</head>
<body class="bdy">
@include('layouts.header')
<div class="container">
    <h1>Contáctanos</h1>
    <p>Atención de Consultas o Reclamos</p>
    <p>Para asegurar la calidad y optimización de nuestro servicio, por favor llena todos los campos que solicitamos. ¡Gracias!</p>

    <form action="{{ route('consults_confirmation') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="apellidos">Apellidos</label>
            <input type="text" id="apellidos" name="apellidos" class="form-control" required>
        </div>
        <div class="form-group">
            <label>¿Eres Socio StarView?</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" id="socio_si" name="socio" value="Sí" required>
                <label class="form-check-label" for="socio_si">Sí</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" id="socio_no" name="socio" value="No" required>
                <label class="form-check-label" for="socio_no">No</label>
            </div>
        </div>
        <div class="form-group">
            <label for="dni">DNI</label>
            <input type="text" id="dni" name="dni" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="telefono">Teléfono de contacto</label>
            <input type="tel" id="telefono" name="telefono" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="correo">Correo electrónico</label>
            <input type="email" id="correo" name="correo" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="motivo">Motivo Mensaje</label>
            <textarea id="motivo" name="motivo" class="form-control" required></textarea>
            <div class="character-count">Caracteres restantes: <span id="counter">5000</span></div>
        </div>
        <div class="form-group">
            <label for="adjuntos">Archivos adjuntos</label>
            <input type="file" id="adjuntos" name="adjuntos[]" class="form-control-file" multiple>
        </div>
        <div class="form-group">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="terminos" name="terminos" required>
                <label class="form-check-label" for="terminos">Acepto los Términos y Condiciones, Política de Privacidad y Tratamiento necesario de datos</label>
            </div>
        </div>
        <div class="form-group">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="tratamiento_adicional" name="tratamiento_adicional">
                <label class="form-check-label" for="tratamiento_adicional">He leído y acepto las finalidades de tratamiento adicionales.</label>
            </div>
        </div>
        <div class="form-group">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="tratamiento_opcional" name="tratamiento_opcional">
                <label class="form-check-label" for="tratamiento_opcional">Acepto el tratamiento opcional de datos.</label>
            </div>
        </div>
        <div class="form-group">
    <button type="submit" class="btn btn-primary">Enviar consulta</button>
</div>

@if (session('success'))
    <div class="alert alert-success mt-3">
        {{ session('success') }}
    </div>
@endif

        
    </form>
</div>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>
