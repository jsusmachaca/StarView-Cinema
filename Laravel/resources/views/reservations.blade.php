<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shotcut icon" type="image/x-icon" href="{{ asset('img/star.ico') }}">
    <link rel="stylesheet" href="{{ asset('css/reservation.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Tus compras - StarView</title>

    <style>

    </style>

</head>
<body class="bdy">
    @include('layouts.header')
    <img src="{{ asset('img/starlogo.png') }}" alt="">
    <div class="title-container">
        <h1 class="custom-heading">Tus Compras</h1>
        <h2>{{ $user->name }}</h2>
    </div>
    <hr>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @foreach ($reservations as $reservation)
                <div class="ticket-box">
                    <h3><span class="material-symbols-outlined">theaters</span> Película: {{ $reservation->pelicula }}</h3>
                    <h4><span class="material-symbols-outlined">receipt_long</span> Cantidad de Boletos: {{ $reservation->cantidad_boletos }}</h4>
                    <h4><span class="material-symbols-outlined">calendar_month</span> Fecha y Hora de la Compra: {{ $reservation->created_at }}</h4>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
