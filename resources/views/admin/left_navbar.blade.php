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
        <li class="header">MANAGEMENT SIDE</li>
        <li class="active treeview">
          <a href="{{route('users.index')}}">
            {{-- <i class="fa fa-dashboard"></i> --}}
            <span>User Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li>
              <a href="{{route('users.index')}}">
                  <span class="pcoded-mtext">User List</span>
              </a>
          </li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <span>Form Mangement</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
            {{-- Cái này có thể dùng để hiển thị số lượng đơn xin điểm chưa được xử lý --}}
            {{-- <span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>
            </span> --}}
          </a>
          <ul class="treeview-menu">
            <li><a href="#">
              <span class="pcoded-mtext">Form List</span></a>
            </li>
          </ul>
        </li>
        
        <li class="treeview">
          <a href="#">
            <span>Unit Mangement</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">  
            <li><a href="#"><i class="fa fa-circle-o"></i>Unit List</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i>College List</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i>Department List</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i>Institude List</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <span>Major And Subject</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('majors.index')}}"><i class="fa fa-circle-o"></i>Major List</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i>Subject List</a></li>
          </ul>
        </li>

    </section>
    <!-- /.sidebar -->
  </aside>
{{-- @endsection --}}