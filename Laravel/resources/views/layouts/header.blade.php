<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
     <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
     <link rel="stylesheet" href="{{ asset ('css/header.css') }}">

</head>
<body id="bd">
     <div class="supbar">
          <div class="logo">
               <a href="#"><img src="{{ asset ('img/logo.png') }}" alt=""></a>
          </div>

          <ul class="bar nav nav-pills">
               <li class="items-bar nav-item"><a class="nav-link" href="{{ route('movies.index') }}">
                    Películas</a>
               </li>
               <li class="items-bar nav-item"><a class="nav-link" href="{{ route('about') }}">Nosotros</a></li>
               <li class="items-bar nav-item"><a class="nav-link" href="{{ route('consults') }}">Consultas y Reclamos</a></li>
               @guest
                    @if (Route::has('login'))
                         <li class="items-bar nav-item">
                              <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                         </li>
                    @endif

                    @if (Route::has('register'))
                         <li class="items-bar nav-item">
                              <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                         </li>
                    @endif
                    @else
                         <li class="items-bar nav-item">
                              <a class="nav-link" href="{{ route('reservations') }}">{{ Auth::user()->name }}</a>
                         </li>
                         <li class="items-bar nav-item">
                              <a class="nav-link" href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                   {{ __('Logout') }}
                              </a>
                              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                   @csrf
                              </form>
                         </li>
               @endguest
          </ul>
     </div>

     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
