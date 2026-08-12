<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>{{ config('app.name', 'test') }}</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link rel="stylesheet" href="{{url('style/style.css')}}">
  <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
  @vite('resources/css/app.css')
</head>

<body class="bg-gray-300">
  <x-nav-link></x-nav-link>
  <h1 class="text-xl font-bold text-center my-2">{{$heading}}</h1>
  <div>
    {{$slot}}
  </div>
  <x-footer></x-footer>
</body>

</html>