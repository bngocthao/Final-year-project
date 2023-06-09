  <div class="wrapper">
    <header class="main-header">
    <!-- Logo -->
    <a href="{{route('home')}}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Đ</b>I</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Đ</b>IỂM <b>I</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              {{-- Chỗ này là tên người dùng  --}}
              {{-- <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image"> --}}
              <span class="hidden-xs">{{$user->name ?? 'Trống'}}</span>
            </a>
            <ul class="dropdown-menu">

              <!-- Menu Body -->
              {{-- <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              </li> --}}
              <!-- Menu Footer-->
              <li>
                    <a class="dropdown-item" href="#">{{$user->name ?? 'Trống'}}</a>
                    <form action="{{ route('user.getLogout') }}" method="post">@csrf</form>
                    <a class="dropdown-item" href="{{ route('user.getLogout') }}">Đăng xuất</a>
              </li>
            </ul>
        </ul>

      </div>
    </nav>
    </header>
