<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
    @include('admin.header')
    @include('admin.top_navbar')
    @include('admin.left_navbar')
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div id="app">
    <main class="py-4">

    {{-- thẻ content nằm ở left nav-bar --}}
          @yield('content')
          {{-- @include('admin.main_footer') --}}

  </main>
  @include('admin.footer')
</body>
</html>
