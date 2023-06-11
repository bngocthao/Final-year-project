@extends('layouts.app')
@section('content')

    <title>Tạo năm học</title>

    <!-- Content Wrapper. Contains page content -->


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
            width: 100%;
            border: 3px;
            padding: 10px;
        }
    </style>


    <div class="col-sm-12">
        <!-- Basic Form Inputs card start -->
        <div class="card">
            <div class="card-header">
                <div class="card-header-right">
                    <i class="icofont icofont-spinner-alt-5"></i>
                </div>
            </div>
            <h4 class="sub-title">NEW YEAR</h4>
            <div class=" box box-info">
                <div class="box-body">
                    <form action="{{route('years.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Name(<span style="color: red;">*</span>)</label>
                            <div class="col-sm-10">
                                <input required type="text" class="form-control" name="name" >
                            </div>
                        </div>

                        <div class="form-group pull-right">
                            <button type="submit" class="btn btn-success float-right btn-round">Create</button>
                            <button type="button" class="btn btn-info float-right btn-round" value="Go back!" onclick="location.href='/admin/years'">Return</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
