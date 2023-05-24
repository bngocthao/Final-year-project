{{-- @section('left_navbar') --}}
<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- search form -->
      {{-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
            </button>
          </span>
        </div>
      </form> --}}
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">TRANG QUẢN LÝ</li>
        <li class="treeview">
          <a href="{{route('users.index')}}">
            {{-- <i class="fa fa-dashboard"></i> --}}
            <span>Người dùng và vai trò</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li>
              <a href="{{route('users.index')}}">
                  <span class="pcoded-mtext">Danh sách người dùng</span>
              </a>
                <a href="{{route('roles.index')}}">
                    <span class="pcoded-mtext">Danh sách vai trò</span>
                </a>
          </li>
          </ul>
        </li>
{{--        <li class="treeview">--}}
{{--          <a href="#">--}}
{{--            <span>Form Mangement</span>--}}
{{--            <span class="pull-right-container">--}}
{{--              <i class="fa fa-angle-left pull-right"></i>--}}
{{--            </span>--}}
{{--            --}}{{-- Cái này có thể dùng để hiển thị số lượng đơn xin điểm chưa được xử lý --}}
{{--            --}}{{-- <span class="pull-right-container">--}}
{{--              <span class="label label-primary pull-right">4</span>--}}
{{--            </span> --}}
{{--          </a>--}}
{{--          <ul class="treeview-menu">--}}
{{--            <li><a href="{{route('postponse_apps.index')}}">--}}
{{--              <span class="pcoded-mtext">Form List</span></a>--}}
{{--            </li>--}}
{{--          </ul>--}}
{{--        </li>--}}

        <li class="treeview">
          <a href="#">
            <span>Quản lý đơn vị</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('units.index')}}"><i class="fa fa-circle-o"></i>Danh sách đơn vị</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <span>Chuyên ngành và môn học</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('majors.index')}}"><i class="fa fa-circle-o"></i>Danh sách chuyên ngành</a></li>
            <li><a href="{{route('subjects.index')}}"><i class="fa fa-circle-o"></i>Danh sách môn học</a></li>
          </ul>
        </li>

          <li class="treeview">
              <a href="#">
                  <span>Năm học</span>
                  <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
              </a>
              <ul class="treeview-menu">
                  <li><a href="{{route('years.index')}}"><i class="fa fa-circle-o"></i>Danh sách năm học</a></li>
              </ul>
          </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
{{-- @endsection --}}
