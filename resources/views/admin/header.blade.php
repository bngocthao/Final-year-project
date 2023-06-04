  <!-- sweetalert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
  @include('sweetalert::alert')
  <!-- Select2 -->
  <link rel="stylesheet" href="{{asset('admin/bower_components/select2/dist/css/select2.min.css')}}">
  <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('admin\bower_components\bootstrap\dist\css\bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('admin/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('admin/bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('admin/dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{asset('admin/dist/css/skins/_all-skins.min.css')}}">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{asset('admin/bower_components/morris.js/morris.css')}}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{asset('admin/bower_components/jvectormap/jquery-jvectormap.css')}}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{asset('admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('admin/bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{asset('admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">

  <!-- toastr -->
{{--  <link rel="stylesheet" type="text/css"--}}
{{--        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">--}}

{{--  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>--}}
{{--  <script>--}}
{{--      @if(Session::has('message'))--}}
{{--          toastr.options =--}}
{{--          {--}}
{{--              "closeButton" : true,--}}
{{--              "progressBar" : true--}}
{{--          }--}}
{{--      toastr.success("{{ session('message') }}");--}}
{{--      @endif--}}

{{--          @if(Session::has('error'))--}}
{{--          toastr.options =--}}
{{--          {--}}
{{--              "closeButton" : true,--}}
{{--              "progressBar" : true--}}
{{--          }--}}
{{--      toastr.error("{{ session('error') }}");--}}
{{--      @endif--}}

{{--          @if(Session::has('info'))--}}
{{--          toastr.options =--}}
{{--          {--}}
{{--              "closeButton" : true,--}}
{{--              "progressBar" : true--}}
{{--          }--}}
{{--      toastr.info("{{ session('info') }}");--}}
{{--      @endif--}}

{{--          @if(Session::has('warning'))--}}
{{--          toastr.options =--}}
{{--          {--}}
{{--              "closeButton" : true,--}}
{{--              "progressBar" : true--}}
{{--          }--}}
{{--      toastr.warning("{{ session('warning') }}");--}}
{{--      @endif--}}
{{--  </script>--}}
