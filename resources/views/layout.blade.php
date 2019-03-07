<!DOCTYPE html>
<html lang="en">
<head>

  <title>@yield('title', 'Movie Collection Home Page')</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ URL::asset('css/font-awesome-4.7.0/css/font-awesome.min.css') }}">

  @yield('custom_styles')

</head>
<body>

<div class="container">

    @include('navbar')

    <div class="card" style="margin-top: 20px">
        <div class="card-body">
            @yield('content')
        </div>

    </div>

    @yield('custom_scripts')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
