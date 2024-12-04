<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  <link href="{{ asset('/css/app.css') }}" rel="stylesheet" />
  <title>@yield('title', 'Online Store')</title>
</head>
<body>
  <!-- header -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark py-4">
    <div class="container">
      <a class="navbar-brand" href="{{route("home.index")}}">Biblioteca Blink</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ms-auto">
          <div class="vr bg-white mx-2 d-none d-lg-block"></div>
            @guest
            <a class="nav-link active" href="{{ route('login') }}">Login</a>
            <a class="nav-link active" href="{{ route('register') }}">Registrati</a>
            @else
            <form id="logout" action="{{ route('logout') }}" method="POST">
            <a role="button" class="nav-link active"
            onclick="document.getElementById('logout').submit();">Logout</a>
            @csrf
            </form>
            @endguest 
            @if(Auth::user() && Auth::user()->getRole()=='admin')
            <a class="nav-link active" href="{{ route("home.mybooks") }}">I miei libri</a>
            @endif
            @if(Auth::user()->getRole()=='admin')
            <a class="nav-link active" href="{{ route("admin.index") }}">Admin</a>
            @endif
          <a class="nav-link active" href="https://www.blinkcircolomagico.it/" target="blank">Il circolo</a>
          <a class="nav-link active" href="{{route("home.index")}}">Home</a>
        </div>
      </div>
    </div>
  </nav>

  <header class="masthead bg-warning text-dark text-center py-4">
    <div class="container d-flex align-items-center flex-column">
      <h2>@yield('subtitle', 'Biblioteca Blink')</h2>
    </div>
  </header>
  <!-- header -->

  <div class="container my-4">
    @yield('content')
  </div>

  <!-- footer -->
  <div class="copyright py-4 text-center text-white bg-dark relative-bottom">
    <div class="container">
      <a class="text-reset fw-bold text-decoration-none" target="_blank"
        href="https://www.blinkcircolomagico.it/">
        Blink Circolo Magico
      </a>
        <br>
      <small>
        <b>Realizzato da Federico Dutto</b>
      </small>
    </div>
  </div>
  <!-- footer -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
  </script>
</body>
</html>
