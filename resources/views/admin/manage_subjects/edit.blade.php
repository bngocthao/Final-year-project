@extends('layouts.app')
@section('content')

    <title>Subject Edit</title>

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
                <h4 class="sub-title">EDIT SUBJECT</h4>
                <div class=" box box-info">
                    <div class="box-body">
                        <form action="{{route('subjects.update', $subject)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            {{-- <input hidden name="ma_nguoi_dung" > --}}
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Subject code</label>
                                <div class="col-sm-10">
                                    <input required name="subject_code" type="text" class="form-control" style="font-weight: bold" value="{{$subject->id}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <textarea id="editor" required type="text" class="form-control" name="name" value="{{$subject->name}}">{{$subject->name}}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Credit</label>
                                <div class="col-sm-10">
                                    <input required name="credit" type="text" class="form-control" style="font-weight: bold" value="{{$subject->credit}}">
                                </div>
                            </div>

                            <div class="form-group pull-right">
                                <button type="submit" class="btn btn-success float-right btn-round">Update</button>
                                <button type="button" class="btn btn-info float-right btn-round" value="Go back!" onclick="location.href='/admin/subjects'">Return</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


@endsection
