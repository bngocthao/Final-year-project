@extends('layouts.app')
@section('content')

<title>Cập Nhật Tài Khoản</title>

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
    <div class="col-sm-12">
        <!-- Basic Form Inputs card start -->
        <div class="card">
            <div class="card-header">
                <div class="card-header-right">
                    <i class="icofont icofont-spinner-alt-5"></i>
                </div>
            </div>

            <div class="card-block">
                <h4 class="sub-title">ACCOUNT INFORMATION</h4>
                <form action="{{route('users.update',[$user->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input hidden name="id" value="{{$user->id}}">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Usercode</label>
                        <div class="col-sm-10">
                            <input required name="user_code" type="text" class="form-control" value="{{$user->user_code}}" style="font-weight: bold" disabled>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input required name="email" type="text" class="form-control" value="{{$user->email}}" disabled>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Full Name</label>
                        <div class="col-sm-10">
                            <input required name="name" type="text" class="form-control" value="{{$user->name}}">
                        </div>
                    </div>

                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">
                        <select name="role_id" class="form-control">
                            <option @if($user->role_id == '0') selected @endif value="0">Admin</option>
                            <option @if($user->role_id == '1') selected @endif value="1">Head of training</option>
                            <option @if($user->role_id == '2') selected @endif value="2">Principal</option>
                            <option @if($user->role_id == '3') selected @endif value="3">Chief of department</option>
                            <option @if($user->role_id == '4') selected @endif value="4">President</option>
                            <option @if($user->role_id == '5') selected @endif value="5">Professor</option>
                            <option @if($user->role_id == '6') selected @endif value="6">Student</option>
                        </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Permission</label>
                        <div class="col-sm-10">
                            <select name="major_id" class="form-control">
                                    <option @if($user->permission == '0') selected @endif value="{{$user->permission}}">Admin</option>
                                    <option @if($user->permission == '1') selected @endif value="{{$user->permission}}">Unit 1</option>
                                    <option @if($user->permission == '2') selected @endif value="{{$user->permission}}">Unit 2</option>
                                    <option @if($user->permission == '3') selected @endif value="{{$user->permission}}">Professor</option>
                                    <option @if($user->permission == '4') selected @endif value="{{$user->permission}}">Student</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Major</label>
                        <div class="col-sm-10">
                            <select name="major_id" class="form-control">
                                @foreach($major as $item)
                                    <option @if($item->id == $user->major_id) selected @endif value="{{$item->id}}">{{$item->name ?? 'Empty'}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Đơn vị</label>
                        <div class="col-sm-10">
                            <input required name="don_vi" type="text" class="form-control" value="{{$dv_nd ?? 'Trống'}}" disabled> 
                        </div>
                    </div> --}}

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Unit</label>
                        <div class="col-sm-10">
                        <select name="unit_id" class="form-control">
                            @foreach ($unit as $item)
                                <option  @if($item->id == $user->nganh->ma_don_vi) selected @endif value="{{$item->id}}">{{$item->ten_don_vi ?? 'Trống'}}</option>     
                            @endforeach
                        </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-info float-right btn-round">Update Account</button>
                        <button type="button" class="btn btn-info float-right btn-round" value="Go back!" onclick="history.back()">Back</button>
                    </div>
                </form>
            </div>
        </div>
    </div>





@endsection