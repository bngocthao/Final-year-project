@include('admin.header')

<body class="hold-transition register-page">
    <div class="register-box">
        {{-- ảnh và tên web --}}
      {{-- <div class="register-logo">
        <a href="../../index2.html"><b>Admin</b>LTE</a>
      </div> --}}
    
      <div class="register-box-body">
        <p class="login-box-msg">Register a new account</p>
    
        <form action="{{route('register')}}" method="post">
            @csrf
          <div class="form-group has-feedback">
            <input name="name" type="text" class="form-control" placeholder="Full name"
            @error('name') is-invalid @enderror" name="name" 
            value="{{ old('name') }}" required>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
          </div>
          {{-- <div class="row mb-3">
            <label  class="col-md-4 col-form-label text-md-end">{{ __('Thuộc ngành') }}</label>

            <div class="col-md-6">
                <select name="ma_nganh" class="form-control">
                    @foreach($nganh as $item)
                        <option value="{{$item->id}}">{{$item->ten_nganh ?? 'Trống'}}</option>
                    @endforeach
                </select>
            </div>
        </div> --}}
          <div class="form-group has-feedback">
            <input name="email" type="email" class="form-control" placeholder="Email"
            @error('email') is-invalid @enderror" email="email" 
            value="{{ old('email') }}" required>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="form-group has-feedback">

            <input name="password" type="password" class="form-control" placeholder="Password"
            @error('password') is-invalid @enderror" password="password" 
            value="{{ old('password') }}" required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>

          <div class="form-group has-feedback">
            <input id="password-confirm" type="password" class="form-control" 
            placeholder="Retype password" name="password_confirmation" required
            onchange="this.setCustomValidity('')" autocomplete="new-password">  
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
            
          </div>
          <div class="row">
            <div class="col-xs-4">
              {{-- <div class="checkbox icheck">
                <label>
                  <input type="checkbox"> I agree to the <a href="#">terms</a>
                </label>
              </div> --}}
            </div>
            <!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
    
        <a href="{{route('login')}}" class="text-center">I already have a membership</a>
      </div>
      <!-- /.form-box -->
    </div>
    <!-- /.register-box -->
@include('admin.footer')