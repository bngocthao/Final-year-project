@include('admin.header')

<title>Log in</title>
{{-- <form method="POST" action="{{ route('login') }}"> --}}
  <!-- Google Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<!-- iCheck -->
{{--<link rel="stylesheet" href="{{asset('../../../plugins/iCheck/square/blue.css')}}">--}}
<body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="#">LOGIN</a>
      </div>
      <!-- /.login-logo -->
      <div class="login-box-body">
        {{-- <p class="login-box-msg">Sign in to start your session</p> --}}

        <form method="POST" action="{{ route('login') }}">
            @csrf
            {{--Customize notification--}}
            @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            @if($errors->any())
                {!! implode('', $errors->all('<div class="name" style="color: red;">:message</div>')) !!} <br>
            @endif
            {{--end of Customize notification--}}
            <div class="form-group has-feedback">
            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email" autofocus>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            @error('email')
            @enderror
          </div>

          <div class="form-group has-feedback">
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required autocomplete="current-password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            @error('password')
        @enderror
          </div>
          <div class="row">
            <div class="col-xs-4">
              </div>
              <div class="col-xs-4">
                <div class="checkbox icheck">
                  <label>
                    <input type="checkbox"> Remember Me
                  </label>
                </div>
              </div>
          </div>
          <div class="row">
            <div class="col-xs-4">
            </div>
            <!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div>

              <!-- /.col -->
          </div>
        </form>

      </div>
      <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->


    <!-- iCheck -->
{{--    <script src="{{asset('../../../plugins/iCheck/icheck.min.js')}}"></script>--}}
{{--    <script>--}}
{{--      $(function () {--}}
{{--        $('input').iCheck({--}}
{{--          checkboxClass: 'icheckbox_square-blue',--}}
{{--          radioClass: 'iradio_square-blue',--}}
{{--          increaseArea: '20%' /* optional */--}}
{{--        });--}}
{{--      });--}}
{{--    </script>--}}
    </body>
<!-- iCheck -->
{{-- <script src="{{asset('../../../plugins/iCheck/icheck.min.js')}}"></script> --}}


{{--@include('admin.footer')--}}
