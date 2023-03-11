@extends('layouts.app')
@section('content')

{{-- header --}}
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        New Subject
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
        <form action="{{route('subjects.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            {{-- <input type="hidden" class="form-control" name="id" value="{{$id}}" > --}}
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Subject code</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="subject_code" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" required>
                </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Credit</label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" name="credit" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Major</label>
              <div class="col-sm-10">
                @foreach ($majors as $i)
                  <select name="major_id" class="form-control ">
                    <option value="{{$i->id}}">{{$i->name}}</option>
                  </select> 
                @endforeach
              </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-12">
              <button type="submit" class="btn btn-info pull-right">Create</button>
            </div>
        </div>
        </form>
</body>
@endsection