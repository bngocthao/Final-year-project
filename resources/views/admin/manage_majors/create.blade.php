@extends('layouts.app')
@section('content')

<title>Major Create</title>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    {{-- <h1>
        Dashboard
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol> --}}
    </section>

    <style>
        .image-cropper {
            width: 200px;
            height: 200px;
            position: relative;
            overflow: hidden;
            border-radius: 50%;
        }
        .card {
            margin: auto;
            width: 70%;
            border: 3px;
            padding: 10px;
            }
    </style>
    
  <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        {{-- <h1>
            Dashboard
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol> --}}
    </section>

    <div class="col-sm-12">
        <!-- Basic Form Inputs card start -->
        <div class="card">
            <div class="card-header">
                <div class="card-header-right">
                    <i class="icofont icofont-spinner-alt-5"></i>
                </div>
            </div>

            <div class="card-block">
                <h4 class="sub-title">NEW MAJOR</h4>
                <form action="{{route('majors.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    {{-- <input hidden name="ma_nguoi_dung" > --}}
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Major id</label>
                        <div class="col-sm-10">
                            <input required name="id" type="text" class="form-control" style="font-weight: bold" value="7{{$ma_nganh}}">
                        </div>
                    </div>
                        
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input required type="text" class="form-control" name="name">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Belong to unit</label>
                        <div class="col-sm-10">
                        <select name="unit_id" class="form-control">
                                    {{-- <option value="9999">Trống</option> --}}
                                @foreach ($units as $item)
                                    <option value="{{$item->id}}">{{$item->name?? 'Trống'}}</option>             
                                @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-info float-right btn-round">Update</button>
                        <button type="button" class="btn btn-info float-right btn-round" value="Go back!" onclick="history.back()">Return</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

{{-- <script>
    $('#submit').click(function() {
    var data = $('#myForm').serializeArray();
    for(i in data){
        console.log(data[i]);
    }  
});
</script> --}}

@endsection