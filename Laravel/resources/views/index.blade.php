<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
     <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
     <link rel="shotcut icon" type="image/x-icon" href="{{ asset('img/star.ico') }}">
     <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
     <title>Star View Cinema</title>
</head>
<body class="bdy">
     @include('layouts.header')
     <div class="smoke"></div>
     <img class="viewlogo" src="{{ asset('img/starlogo.png') }}" alt="">
     <div class="contenido">
          <h2 class="st">Estrenos</h2>
          <hr class="line">
          <div class="image-container">
               @foreach($movies as $movie)
                    @if ($movie->taquilla == "si")
                         <div class="card">
                              <div class="image-wrapper">
                                   <img class="card-img-top" src="data:image/jpeg;base64,{{ base64_encode($movie->banner) }}" alt="Item" width="300x300"></img>
                                   <div class="image-overlay">
                                        <p class="card-text">{{ $movie->info }}</p>
                                        <div class="button-container">
                                             @if (Auth::check())
                                                  <a href="{{ route('movies.buy', ['titulo' => urlencode($movie->titulo)]) }}" class="a-style">
                                                       <button class="btn btn-primary d-flex align-items-center">
                                                            <span class="material-symbols-outlined">
                                                                 local_activity
                                                            </span>
                                                            <span class="ml-2">Comprar</span>
                                                       </button>
                                                  </a>
                                             @else
                                                  <div class="button-container">
                                                       <a class="a-style" href="{{ route('login') }}">
                                                            <button class="btn btn-primary d-flex align-items-center">
                                                                 <span class="ml-2">Por favor Incie Sesion</span>
                                                            </button>
                                                       </a>
                                                  </div>
                                             @endif
                                        </div>
                                   </div>
                              </div>
                         </div>
                    @endif
               @endforeach
               @if($movies->isEmpty())
                    <p>No hay más películas disponibles</p>
               @endif
          </div>
     </div>

     <div class="contenido">
          <h2 class="h-s">Más Películas</h2>
          <hr class="line-2">
          <div class="image-container">
               @foreach($movies as $movie)
                    @if ($movie->taquilla == "no")
                         <div class="card">
                              <div class="image-wrapper">
                                   <img class="card-img-top" src="data:image/jpeg;base64,{{ base64_encode($movie->banner) }}" alt="Item" width="300x300"></img>
                                   <div class="image-overlay">
                                        <p class="card-text">{{ $movie->info }}</p>
                                        <div class="button-container">
                                             @if (Auth::check())
                                                  <a href="{{ route('movies.buy', ['titulo' => urlencode($movie->titulo)]) }}" class="a-style">
                                                       <button class="btn btn-primary d-flex align-items-center" name="{{ urldecode($movie->titulo) }}">
                                                            <span class="material-symbols-outlined">
                                                                 local_activity
                                                            </span>
                                                            <span class="ml-2">Comprar</span>
                                                       </button>
                                                  </a>
                                             @else
                                             <div class="button-container">
                                             <a class="a-style" href="{{ route('login') }}">
                                                  <button class="btn btn-primary d-flex align-items-center">
                                                       <span class="ml-2">Por favor Incie Sesion</span>
                                                  </button>
                                             </a>
                                             </div>
                                             @endif
                                        </div>
                                   </div>
                              </div>
                         </div>
                    @endif
               @endforeach
               @if($movies->isEmpty())
                    <p>No hay más películas disponibles</p>
               @endif
          </div>
     </div>
</body>
</html>