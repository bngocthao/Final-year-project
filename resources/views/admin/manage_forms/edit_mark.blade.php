@extends('layouts.app')
@section('content')

    <title>Cập nhật điểm</title>

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

    <div class="col-sm-20">
        <!-- Basic Form Inputs card start -->
        <div class="card">
            <div class="card-header">
                <div class="card-header-right">
                    <i class="icofont icofont-spinner-alt-5"></i>
                </div>
            </div>
            <h4 class="sub-title">CẬP NHẬT ĐIỂM</h4>
            <div class=" box box-info">
                <div class="box-body">
                    <form action="{{route('mark_update', $apply, $apply->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        {{-- <input hidden name="ma_nguoi_dung" > --}}
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Mã số sinh viên</label>
                            <div class="col-sm-10">
                                <input disabled type="text" class="form-control" style="font-weight: bold" value="{{$apply->users->user_code}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Họ tên sinh viên</label>
                            <div class="col-sm-10">
                                <input disabled type="text" class="form-control" style="font-weight: bold" value="{{$apply->users->name}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Mã học phần</label>
                            <div class="col-sm-10">
                                <input disabled type="text" class="form-control" name="group" value="{{$apply->group}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Học phần</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="{{$sub}}" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Điểm</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="mark">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Cán bộ chấm điểm</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="{{$apply->teach->name}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Học kì</label>
                            <div class="col-sm-10">
                                <select disabled name="marked_semester_id" class="form-control">
                                    <option value="{{$marked_sem}}" selected>@if($marked_sem == '3')Hè@else{{$marked_sem}}@endif</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Năm học</label>
                            <div class="col-sm-10">
                                <select name="marked_year_id" class="form-control">
                                    @foreach ($marked_years as $item)
                                        <option value="{{$item->id}}" @if($apply->year_id == $item->id) selected @endif>{{$item->name?? 'Trống'}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Lý do</label>
                            <div class="col-sm-10">
                                <input disabled type="text" class="form-control" name="marked_reason" value="Đã nhập điểm I ở HK: {{$apply->semesters->name}}, NH: {{$apply->years->name}}"></input>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Lãnh đạo đơn vị</label>
                            <div class="col-sm-10">
                                <input disabled type="text" class="form-control" name="marked_reason" value="{{$head_of_unit_name}}"></input>
                            </div>
                        </div>

                        <div class="form-group pull-right">
                            <button type="submit" class="btn btn-success float-right btn-round">Cập nhật</button>
                            {{--                            <button type="button" class="btn btn-info float-right btn-round" value="Go back!" onclick="location.href='/admin/majors'">Return</button>--}}
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Get a reference to our file input
        // const fileInput = document.querySelector('input[type="file"]');
        const fileInput = document.getElementById("proof");
        const link = document.getElementById("file_link").value;

        // Create a new File object
        const myFile = new File(['file_link'],link, {
            type: 'file',
            lastModified: new Date(),

        });

        // Now let's create a DataTransfer to get a FileList
        const dataTransfer = new DataTransfer();
        dataTransfer.items.add(myFile);
        fileInput.files = dataTransfer.files;

    </script>

    <script>
        ClassicEditor
            .create( document.querySelector( '#editor1' ) )
            .then( editor => {
                console.log( editor );
            } )
            .catch( error => {
                console.error( error );
            } );
    </script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor2' ) )
            .then( editor => {
                console.log( editor );
            } )
            .catch( error => {
                console.error( error );
            } );
    </script>
    <style>
        .ck-editor__editable_inline {
            min-height: 200px;
        }
    </style>
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor3' ) )
            .then( editor => {
                console.log( editor );
            } )
            .catch( error => {
                console.error( error );
            } );
    </script>
    <style>
        .ck-editor__editable_inline {
            min-height: 200px;
        }
    </style>
    {{--    <script>--}}
    {{--        function sweetalert2(){--}}
    {{--            Swal({--}}
    {{--                title: 'Success',--}}
    {{--                text: 'Do you want to continue',--}}
    {{--                type: 'success',--}}
    {{--                confirmButtonText: 'Cool'--}}
    {{--            })--}}
    {{--        }--}}
    {{--    </script>--}}

@endsection
