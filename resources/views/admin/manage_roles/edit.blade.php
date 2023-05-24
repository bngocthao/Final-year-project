@extends('layouts.app')
@section('content')

    <title>Snooze/Chỉnh sửa vai trò</title>

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
            <h4 class="sub-title">CHỈNH SỬA VAI TRÒ</h4>
            <div class=" box box-info">
                <div class="box-body">
                    <form action="{{route('roles.update', $role->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Tên vai trò(<span style="color: red;">*</span>)</label>
                            <div class="col-sm-10">
                                <input required type="text" class="form-control" name="name" value="{{$role->name}}">
                            </div>
                        </div>

                        <div class="form-group pull-right">
                            <button type="submit" class="btn btn-success float-right btn-round">Cập nhật</button>
                            <button type="button" class="btn btn-info float-right btn-round" value="Go back!" onclick="location.href='/admin/roles'">Quay lại</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
