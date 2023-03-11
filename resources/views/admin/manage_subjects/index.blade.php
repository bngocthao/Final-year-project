@extends('layouts.app')
@section('content')

    <title>Subjects List</title>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    {{-- <section class="content-header">
    <h1>
        Dashboard
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol> --}}
    </section>
    {{-- Trang hiển thị danh sách người dùng --}}

    <!-- Edit With Button card start -->
    <div class="card">
    <div class="card-header">
        {{-- <h5>Danh sách người dùng</h5> --}}
        {{-- <span>Click on buttons to perform actions</span> --}}
        <a href="{{route('subjects.create')}}" class="btn btn-primary waves-effect waves-light" style="float: none;margin: 5px;">New Subject</a>


    </div>
    <div class="card-block">
        <div class="table-responsive">
            <table class="table table-striped table-bordered" id="example-2">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Major</th>
                        <th class="tabledit-toolbar-column" style="text-align: center;">Tools</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($majors as $i)
                    <tr>
                        <th scope="row"></th>
                        <th scope="row">{{ $i->id}}</th>
                        <th scope="row">{{ $i->name}}</th>
                        <th scope="row">{{ $i->units->name ?? "Trống"}}</th>
                        {{-- Các button --}}
                        <td style="white-space: nowrap; width: 1%;">
                            <div class="tabledit-toolbar btn-toolbar" style="text-align: left;">
                                <div class="btn-group btn-group-sm" style="float: none;">
                                    {{-- <a href="{{route('admin.major.edit',[$i->id])}}" class="tabledit-edit-button btn btn-primary waves-effect waves-light" style="float: none;margin: 5px;"><span class="icofont icofont-ui-edit"></span></a> --}}
                                    <form action="{{ route('majors.edit', $i->id)}}" class="tabledit-edit-button btn btn primary waves-effect waves-light" style="float: none;margin: 5px;" method="get">
                                        @csrf
                                        @method('GET')
                                        <button class="btn btn-primary btn" type="submit"><span class="icofont icofont-ui-edit"></span></button>
                                    </form>
                                    <form action="{{ route('majors.destroy', $i->id)}}" class="tabledit-edit-button btn btn waves-effect waves-light" style="float: none;margin: 5px;" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn" type="submit" id="submitForm"><span class="icofont icofont-ui-delete"></span></button>
                                    </form>
                                    <button type="button" class="tabledit-save-button btn btn-sm btn-success" style="display: none; float: none;">Save</button>
                                    <button type="button" class="tabledit-confirm-button btn btn-sm btn-danger" style="display: none; float: none;">Confirm</button>
                                    <button type="button" class="tabledit-restore-button btn btn-sm btn-warning" style="display: none; float: none;">Restore</button>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>          
            </table>
        </div>
    </div>
    
</div>

  <!-- Edit With Button card end -->
  @include('admin.footer')
    <!-- Editable-table js -->
    {{-- <script type="text/javascript" src={{asset("admin/files\assets\pages/edit-table\jquery.tabledit.js")}}></script>
    <script type="text/javascript" src={{asset("admin/files\assets\pages/edit-table/editable.js")}}></script> --}}
    
    {{-- sweet alert Thông báo khi xóa bản ghi --}}
    <script>
        
        $('#submitForm').on('click',function(e){
            e.preventDefault();
            var form = $(this).parents('form');
            Swal.fire({
                title: 'Bạn Có Chắc Muốn Xóa Bảng Ghi?',
                text: "Bạn Sẽ Không Thể Khôi Phục Một Khi Đã Xóa!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Có',
                cancelButtonText: 'Không'
            }).then((result) => {
                if (result.value) {
    
                    form.submit();
                }
            });
        });
    </script>
    
    <link href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
</body>
</html>