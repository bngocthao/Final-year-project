@extends('layouts.app')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Majors
        <small></small>
      </h1>
      <ol class="breadcrumb">
        {{-- <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li> --}}
      </ol>
    </section>

    <div class="col-xs-12">
        <div class="box" style="height:1040px"">
          <div class="box-header">
            <h3 class="box-title">
                <a href="{{route('majors.create')}}" style="margin-left: 20px" class="btn btn-primary waves-effect waves-light form-control pull-right" style="float: none;margin: 5px;">New major</a></h3>
            <br>
            <div class="box-tools">
              <div class="input-group input-group-sm hidden-xs" style="width: 150px;"">
                

                <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                <div class="input-group-btn">
                  <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                </div>
              </div>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
              <tr>
                <th>#</th>
                <th>Major Code</th>
                <th>Name</th>
                <th>Unit</th>
                <th class="tabledit-toolbar-column" style="text-align: center;">Tools</th>
            </tr>
            @foreach($majors as $u)
              <tr>
                <td>{{ $u->id}}</td>
                <td>{{ $u->major_code}}</td>
                <td>{{ $u->name}}</td>
                <td>{{ $u->units->name}}</td>
                <td class="tabledit-toolbar-column" style="text-align: center;">
                  <a href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                  </svg></a> &nbsp &nbsp
                  <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                  </svg></a>
                </td>
              </tr>
            @endforeach
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
    
</div>

  <!-- Edit With Button card end -->
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
@endsection