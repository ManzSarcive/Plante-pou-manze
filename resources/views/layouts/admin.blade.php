<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Fonts -->
  <!-- css -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/3f369ae910.js" crossorigin="anonymous"></script>

</head>

<body>
  <!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>


    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Admin
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{ route('admin.products.index') }}">Products</a>
        <a class="dropdown-item" href="{{ route('admin.paniers.index') }}">Paniers</a>
        <a class="dropdown-item" href="{{ route('admin.reservations.index') }}">Reservation</a>
        <form method="POST" action="{{ route('logout') }}">
          @csrf

          <a class="dropdown-item" href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
            DECONNEXION
          </a>
        </form>
      </div>
    </li>

    </ul>

    </div>
  </nav> -->

  <nav class="navbar navbar-expand-md navbar-light bg-light">
  <div class="container">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ route('admin.index') }}">Logo</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse d-flex flex-row-reverse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <!-- <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('admin.products.index') }}">Products</a>
          </li> -->
          <li class="nav-item ">
            <a class="nav-link" href="{{ route('admin.paniers.index') }}">Paniers</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.reservations.index') }}">Reservations</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Admin
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li><form method="POST" action="{{ route('logout') }}">
          @csrf

          <a class="dropdown-item" href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
            DECONNEXION
          </a>
        </form></li>
              
            </ul>
          </li>
        </ul>
      </div>
    </div>
    </div>
  </nav>
  <div>
    @if(session()->has('danger'))
    <div class="alert alert-warning" role="alert">
  {{ session()->get('danger') }}
</div>
@endif
@if(session()->has('success'))
  <div class="alert alert-success" role="alert">
  {{ session()->get('success') }}
</div>
@endif
@if(session()->has('warning'))
    <div class="alert alert-warning" role="alert">
  {{ session()->get('warning') }}
</div>
@endif
  </div>

  <main>
    @yield('content')
  </main>
</body>

</html>