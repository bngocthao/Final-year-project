  <div class="wrapper">
    <header class="main-header">
    <!-- Logo -->
    <a href="{{route('home')}}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>P</b>A</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>POSTPONE</b>APP</span>
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
              {{-- Chỗ này là tên người dùng nè --}}
              {{-- <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image"> --}}
              <span class="hidden-xs">{{$user->name ?? 'None'}}</span>
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
                <a class="dropdown-item" href="#">Profile</a>
                <a class="dropdown-item" href="#">Sign out</a>
              </li>
            </ul>
              {{-- <li>
                <div class="row">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="row">
                  <a href="#" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li> --}}
          <!-- Control Sidebar Toggle Button -->
          {{-- <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li> --}}
        </ul>

      </div>
    </nav>
    </header>

