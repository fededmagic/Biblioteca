<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
    crossorigin="anonymous" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">

  <link href="{{ asset('/css/admin.css') }}" rel="stylesheet" />
  <title>@yield('title', 'Admin')</title>
</head>

<body>
  <div class="row g-0">
    <!-- sidebar -->
    <div class="p-3 col-2 fixed text-white bg-dark">
      <a href="#" class="text-white text-decoration-none">
        <span class="fs-4">Pannello di admin</span>
      </a>
      <hr />
      <ul class="nav flex-column">
        <li>
          <a href="{{route('home.index')}}" class="nav-link text-white">- Ritorna alla home</a>
          <a href="{{route('admin.index')}}" class="nav-link text-white">- Admin - Libri</a>
        </li>
      </ul>
    </div>
    <!-- sidebar -->
    <div class="col-10 content-grey">
      <nav class="p-3 shadow text-end">
        <span class="profile-font">Admin</span>
      </nav>

      <div class="g-0 m-5">
        @yield('content')
      </div>
    </div>
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
