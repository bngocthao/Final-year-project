@extends('layouts.app')
@section('content')

    <title>User Create</title>

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

    <div class="col-sm-50">
        <!-- Basic Form Inputs card start -->
        <div class="card">
            <div class="card-header">
                <div class="card-header-right">
                    <i class="icofont icofont-spinner-alt-5"></i>
                </div>
            </div>
            <h4 class="sub-title">NEW USER</h4>
            <div class=" box box-info">
                <div class="box-body">
                <!-- /.box-header -->
                <!-- form start -->
                    <form action="{{route('users.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="box-body">

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="exampleInputEmail1">User code(<span style="color: red;">*</span>)</label>
                                <div class="col-sm-10">
                                    <input required name="user_code" type="text" class="form-control" placeholder="Enter user code">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Name(<span style="color: red;">*</span>)</label>
                                <div class="col-sm-10">
                                    <input required type="text"  class="form-control" name="name"  placeholder="Enter username">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-label">Major(<span style="color: red;">*</span>)</label>
                                <div class="col-sm-10">
                                    <select name="major_id" class="form-control">
                                        @foreach ($majors as $item)
                                            <option value="{{$item->id}}">{!!$item->name?? 'Trống' !!}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Role(<span style="color: red;">*</span>)</label>
                                <div class="col-sm-10">
                                    <select name="role_id" class="form-control">
                                        @foreach ($roles as $item)
                                            <option value="{{$item->id}}">{!!$item->name?? 'Trống' !!}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="exampleInputEmail1">Email address(<span style="color: red;">*</span>)</label>
                                <div class="col-sm-10">
                                    <input required type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="exampleInputPassword1">Password(<span style="color: red;">*</span>)</label>
                                <div class="col-sm-10">
                                    <input required type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                </div>
                            </div>

{{--                            <div class="form-group">--}}
{{--                                <label for="exampleInputFile">File input</label>--}}
{{--                                <input type="file" id="exampleInputFile">--}}

{{--                                <p class="help-block">Example block-level help text here.</p>--}}
{{--                            </div>--}}
                        </div>
                        <!-- /.box-body -->

                        <div class="form-group pull-right">
                            <button type="submit" class="btn btn-success float-right btn-round">Create</button>
                            <button type="button" class="btn btn-info float-right btn-round" value="Go back!" onclick="location.href='/admin/users'">Return</button>
                        </div>
                    </form>
                </div>
            </div>
    </div>
    </div>
@endsection
