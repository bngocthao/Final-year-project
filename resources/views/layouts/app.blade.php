<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
{{--admin page, đừng có đụng--}}

    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
    @include('admin.header')
    @include('admin.top_navbar')
    @include('admin.left_navbar')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="content-wrapper">
    <!-- Content Header (Page header), thằng này dùng để đẩy cái content qua bên phải -->
    <section class="content-header">
    </section>
  <div id="app">
    <main class="py-4">

        @include('sweetalert::alert')

    {{-- thẻ content nằm ở left nav-bar --}}
          @yield('content')
          {{-- @include('admin.main_footer') --}}

  </main>
  </div>
  @include('admin.footer')
</body>
</html>
