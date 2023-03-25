@include('client.header')
<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="{{asset('client/contact-form/css/style.css')}}">

<!-- DataTables -->
<link rel="stylesheet" href="{{asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
{{--top navbar--}}
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
          <span class="hidden-xs">{{$user->name}}</span>
        </a>
        <ul class="dropdown-menu">
          <li>
            <a class="dropdown-item" href="#">Profile</a>
            <a class="dropdown-item" href="#">Sign out</a>
          </li>
    </ul>
      </li>
    </ul>
  </div>
</nav>
{{-- end navbar --}}

<section class="ftco-section" style="padding: 3em !important;">
    <div class="container">
        {{-- <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-5">
                <h2 class="heading-section">Contact Form #01</h2>
            </div>
        </div> --}}
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="wrapper">
                    <div class="row no-gutters">
                        <div class="col-md-7 d-flex align-items-stretch">
                            <div class="contact-wrap w-100 p-md-5 p-4">
                                <h3 class="mb-4">New Form</h3>
                                <div id="form-message-warning" class="mb-4"></div>
                                  <div id="form-message-success" class="mb-4">
                                        Your message was sent, thank you!
                                  </div>
                          {{-- <form method="POST" id="contactForm" name="contactForm"> --}}
                            <form action="{{ route('form.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('POST')

                                <input type="hidden" class="form-control" value="{{$user->id}}" name="user_id">
                                <input type="hidden" class="form-control" value="{{$user->major_id}}" name="major_id">

{{--                                <div class="form-group row">--}}
{{--                                    <label class="col-sm-2 col-form-label">UID</label>--}}
{{--                                    <div class="col-sm-10">--}}
{{--                                        <input type="text" class="form-control" value="{{$user->user_code}}" disabled>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Full name</label>
                                    <div class="col-sm-10">
                                        <input  type="text" class="form-control" value="{{$user->name}}" readonly>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Title</label>
                                    <div class="col-sm-10">
                                        <input required type="text" name="name" class="form-control" >
                                    </div>
                                </div>

                                {{-- In ra danh sách môn học của ngành mà sinh viên đang học --}}
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Subject</label>
                                    <div class="col-sm-10">
                                        <select name="subject_id" class="form-control" name="subject_id">
                                            @foreach ($subject_list as $i)
                                                <option value="{{$i->id}}">{!! $i->name !!}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Group</label>
                                    <div class="col-sm-10">
                                        <input required type="text" name="group" class="form-control col-sm-12">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Semester</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="semester_id">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">Summer</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <!-- Hiển thị khoảng số năm mà sv đang học -->
                                    <label class="col-sm-2 col-form-label">Year</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="year_id">
                                            @foreach ($years as $i)
                                                <option value="{{$i->id}}">{{$i->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Reason</label>
                                    <div class="col-sm-10">
                                        <textarea required id="editor" class="form-control" name="reason" >
                                        </textarea>
                                    </div>
                                </div>
                                {{-- <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Confirmation</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control" name="confirmation_id">
                                    </div>
                                </div> --}}
                                <!-- List ra danh sách tên các giảng viên, sv chọn, sau khi nộp đơn 1 thư sẽ đc tự -->
                                <!-- động gửi tới email của giảng viên -->
                                {{-- Giảng viên là giảng viên của ngành chung vs sinh viên --}}
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Professor</label>
                                    <div class="col-sm-10">
                                        <select name="teach_id" class="form-control ">
                                            @foreach ($teach as $i)
                                             <option value="{{$i->id}}">{{$i->name}} - {{$i->email}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                {{-- Này đem qua bên form chỉnh sửa r mở ra --}}
                                {{-- <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Professor approval</label>
                                    <div class="col-sm-10">
                                        <select name="teach_status" class="form-control ">
                                             <option value="1">Approve</option>
                                             <option value="2">Not approve</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Professor opinion</label>
                                    <div class="col-sm-10">
                                        <textarea id="editor1" name="teach_description" rows="15" cols="145">
                                        </textarea>
                                    </div>
                                </div> --}}
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                      <button type="submit" class="btn btn-info pull-right">Create</button>
                                    </div>
                                </div>
                            </form>
                            </div>
                        </div>

                        {{--right--}}
                        <div class="col-md-5 d-flex align-items-stretch">
                            <div class="info-wrap bg-primary w-100 p-lg-5 p-4">
                                <h3 class="mb-4 mt-md-4">Application List</h3>
{{--                                    @yield('right')--}}
                                    <div class="dbox w-100 d-flex align-items-start">
                                        <div class="icon d-flex align-items-center justify-content-center">
                                            <span class="fa fa-map-marker"></span>
                                        </div>
                                        <div class="text pl-3">
                                        <p><span>Address:</span> 198 West 21th Street, Suite 721 New York NY 10016</p>
                                      </div>
                                  </div>
                                    <div class="dbox w-100 d-flex align-items-center">
                                        <div class="icon d-flex align-items-center justify-content-center">
                                            <span class="fa fa-phone"></span>
                                        </div>
                                        <div class="text pl-3">
                                        <p><span>Phone:</span> <a href="tel://1234567920">+ 1235 2355 98</a></p>
                                      </div>
                                  </div>
                                    <div class="dbox w-100 d-flex align-items-center">
                                        <div class="icon d-flex align-items-center justify-content-center">
                                            <span class="fa fa-paper-plane"></span>
                                        </div>
                                        <div class="text pl-3">
                                        <p><span>Email:</span> <a href="mailto:info@yoursite.com">info@yoursite.com</a></p>
                                      </div>
                                  </div>
                                    <div class="dbox w-100 d-flex align-items-center">
                                        <div class="icon d-flex align-items-center justify-content-center">
                                            <span class="fa fa-globe"></span>
                                        </div>
                                        <div class="text pl-3">
                                        <p><span>Website</span> <a href="#">yoursite.com</a></p>
                                      </div>
                                  </div>
                              </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('client.footer')

<!-- page script -->
<!-- DataTables -->
<script src="{{asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script>
    $(function () {
        $('#example1').DataTable()
        $('#example2').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
        })
    })
</script>
