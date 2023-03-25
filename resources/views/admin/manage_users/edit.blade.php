@extends('layouts.app')
@section('content')

    <title>User Edit</title>

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
            <h4 class="sub-title">UPDATE USER</h4>
            <div class=" box box-info">
                <div class="box-body">
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action="{{route('users.update', $e_user)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="box-body">

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="exampleInputEmail1">User code</label>
                                <div class="col-sm-10">
                                    <input required name="user_code" type="text" class="form-control" value="{{$e_user->user_code}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input required type="text"  class="form-control" name="name" value="{{$e_user->name}}" >
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-label">Major</label>
                                <div class="col-sm-10">
                                    <select name="major_id" class="form-control">
                                        @foreach ($majors as $item)
                                            <option value="{{$item->id}}" @if($e_user->major_id == $item->id) selected @endif>{!!$item->name?? 'Trống' !!}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Role</label>
                                <div class="col-sm-10">
                                    <select name="role_id" class="form-control">
                                        @foreach ($roles as $item)
                                            <option value="{{$item->id}}" @if($e_user->role_id == $item->id) selected @endif>{!!$item->name?? 'Trống' !!}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="exampleInputEmail1">Email address</label>
                                <div class="col-sm-10">
                                    <input required type="email" name="email" class="form-control" id="exampleInputEmail1" value="{{$e_user->email}}">
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
                            <button type="submit" class="btn btn-success float-right btn-round">Update</button>
                            <button type="button" class="btn btn-info float-right btn-round" value="Go back!" onclick="location.href='/admin/users'">Return</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

