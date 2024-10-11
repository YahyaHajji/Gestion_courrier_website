<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="App.css">
    <title>@yield("title")</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar navbar-dark bg-primary">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
          <a class="navbar-brand" href="{{route('app.courierD')}}">Bureau d'ordre</a>
          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="{{route('app.courierD')}}">Courier depart</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="{{route('app.courierA')}}">courier Arrivé</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="{{route('app.contact')}}">Contact</a>
            </li>
          </ul>
            <a class="btn btn-outline-danger my-2 my-sm-0 text-light border-primary" href="{{route('app.logout')}}" type="submit">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-power" viewBox="0 0 16 16">
                <path d="M7.5 1v7h1V1h-1z"/>
                <path d="M3 8.812a4.999 4.999 0 0 1 2.578-4.375l-.485-.874A6 6 0 1 0 11 3.616l-.501.865A5 5 0 1 1 3 8.812z"/>
              </svg>
              Quiter
            </a>
        </div>
      </nav>

<div class="m-3">
    @yield("content")
</div>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<!-- Bootstrap JavaScript libraries -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

@yield('cdns')
</body>
</html>