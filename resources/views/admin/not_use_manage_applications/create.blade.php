@extends('layouts.app')
@section('content')

<style>

</style>

{{-- header --}}
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        New Application
        <small></small>
      </h1>
      <ol class="breadcrumb">
        {{-- <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li> --}}
      </ol>
    </section>
    
{{-- form --}}
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

    <!-- general form elements -->
        <div class="box box-primary col-md-12" >
        <div class="box-header with-border">
            {{-- <h3 class="box-title">Quick Example</h3> --}}
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form action="{{ route('postponse_apps.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <input type="text" name="major_id" class="form-control hidden" value="{{$user->major_id}}" >
            <input type="text" name="user_id" class="form-control hidden" value="{{$id}}" >
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">UID</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{$user->user_code}}" disabled>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Full name</label>
                <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" value="{{$user->name}}">
                </div>
            </div>
            {{-- In ra danh sách môn học của ngành mà sinh viên đang học --}}
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Subject</label>
                <div class="col-sm-10">
                    <select name="subject_id" class="form-control" name="subject_id">
                        @foreach ($subjects as $i)
                            <option value="{{$i->id}}">{{$i->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Group</label>
                <div class="col-sm-10">
                    <input type="text" name="group" class="form-control col-sm-12">
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
                    <textarea id="editor" name="reason" rows="15" cols="145">
                        
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
    <!-- /.box -->
    </div>
</body>
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>

<script>
    ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .then( editor => {
                    console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );
    ClassicEditor
    .create( document.querySelector( '#editor1' ) )
    .then( editor => {
            console.log( editor );
    } )
    .catch( error => {
            console.error( error );
    } );
</script>

@endsection