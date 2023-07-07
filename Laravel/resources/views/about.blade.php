<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nosotros - StarView Cine</title>
  <link rel="stylesheet" href="{{ asset('css/nosotros.css') }}">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/star.ico') }}">
  <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
</head>
<body class="bdy">
@include('layouts.header')
<main>
<div class="centered-container">
  <div class="container container-border">
      <div class="row">
        <div class="col-md-6">
          <h2>Sobre StarView Cinema</h2>
          <p>
            StarView Cinema es tu destino para disfrutar de las últimas películas en la pantalla grande. Nuestro cine ofrece una amplia selección de películas de diferentes géneros para que todos encuentren algo que les guste.
          </p>
          <p>
            Nos enorgullece brindar una experiencia de cine excepcional a nuestros clientes. Desde la calidad de imagen y sonido hasta el ambiente acogedor de nuestras salas, nos esforzamos por garantizar que cada visita a StarView Cine sea inolvidable.
          </p>
          <p>
            También nos preocupamos por nuestra comunidad y apoyamos eventos y festivales de cine locales. Creemos en el poder del cine para inspirar, entretener y conectar a las personas, y estamos comprometidos a promover el arte cinematográfico en todas sus formas.
          </p>
        </div>
        <div class="col-md-6">
          <img src="{{ asset('img/logo.png') }}" alt="Logo de StarView Cine" class="img-fluid">
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <h2>Nuestro Equipo</h2>
          <p>
            En StarView Cinema, contamos con un equipo apasionado y dedicado de profesionales del cine. Nuestro personal está comprometido en brindar la mejor experiencia cinematográfica a nuestros visitantes, desde el momento en que llegan hasta que se van.
          </p>
          <p>
            Nuestros proyeccionistas se aseguran de que la calidad de imagen y sonido sea impecable en cada función, y nuestro personal de servicio al cliente está listo para atender cualquier pregunta o solicitud que puedas tener.
          </p>
          <p>
            Además, trabajamos en estrecha colaboración con distribuidores de películas y organizadores de eventos para traerte una programación diversa y emocionante. Estamos comprometidos en ofrecerte una experiencia cinematográfica única y memorable en cada visita.
          </p>
        </div>
      </div>
  </div>
</div>
</main>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
