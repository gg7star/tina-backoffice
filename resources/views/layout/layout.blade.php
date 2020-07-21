<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Back Office of Tina</title>
  <link rel="shortcut icon" href="{{ secure_asset('favicon.png') }}">
  <link rel="stylesheet" href="{{ secure_asset('css/navbar.css') }}">
  <link rel="stylesheet" href="{{ secure_asset('css/custom.css') }}">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://www.gstatic.com/firebasejs/4.9.1/firebase.js"></script>
  <link rel="stylesheet" href="{{ secure_asset('css/landing.css') }}">
  <link rel="stylesheet" href="{{ secure_asset('css/qa.css') }}">
</head>
@yield('style')
<body>
@include('partials.navbar')
@yield('content')
</body>
</html>
@yield('script')