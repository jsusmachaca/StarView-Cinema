<?php
     //Constantes del Proyecto
     $client_id =  'your_client_id';
?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
     <link rel="stylesheet" href="{{ asset('css/shopping.css') }}">
     <link rel="shotcut icon" type="image/x-icon" href="{{ asset('img/star.ico') }}">
     <script src="https://www.paypal.com/sdk/js?client-id=<?php echo $client_id ?>&components=buttons"></script>
     <script src="{{ asset('js/script.js') }}" data-csrf-token="{{ csrf_token() }}"></script>
     <title>Compra de entradas - StarView</title>
</head>
<body class="bdy">
     @include('layouts.header')
     <div class="container">
          <div class="row">
               <div class="col-md-6">
                    @auth
                    <img src="data:image/jpeg;base64,{{ base64_encode($movies->banner) }}" alt="" class="product-img">
                    <div class="product-info">
                         <h2 class="product-title">{{ $movies->titulo }}</h2>
                         <h4 class="product-price">Precio: S/. {{ $movies->precio }}</h4>
                         <h4 class="quantity-label">Cantidad de entradas:</h4>
                         <form action="" method="POST">
                              <input type="hidden" id='titulo' value="{{ $movies->titulo }}" class="hidden-input">
                              <input type="number" id="cantidad_boleto" class="quantity-input" min="1" max="10">
                              <input type="hidden" id="user_name" value="{{ Auth::user()->name }}">
                         </form>
                    </div>
                    @else
                         <p>Debes iniciar sesión para ver esta página</p>
                         <a href="{{ route ('login') }}" class="btn btn-primary">Iniciar sesión</a>
                    @endauth
               </div>
               <div class="col-md-6">
                    <div class="pay">
                         <h3>Selecciona un método de pago:</h3>
                         <div class="paypal-buttons">
                              <div id="paypal-button-container" style="width: 500px;"></div>
                         </div>
                    </div>
                    <script>
                         var precio = {{ number_format(( $movies->precio / 3.5), 2, '.', '') }};
                         var registerPay = '{{ route("register-pay") }}';
                    </script>
               </div>
          </div>
     </div>
</body>
</html>
