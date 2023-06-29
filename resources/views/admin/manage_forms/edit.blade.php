@extends('layouts.app')
@section('content')

    <title>Cập nhật đơn</title>

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
            <h4 class="sub-title">CẬP NHẬT ĐƠN</h4>
            <div class=" box box-info">
                <div class="box-body">
                    <form action="{{route('postponse_apps.update', $apply, $apply->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                         <input hidden name="id" value="{{$apply->id}}" >
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Họ tên sinh viên</label>
                            <div class="col-sm-10">
                                <input disabled type="text" class="form-control" style="font-weight: bold" value="{{$apply->users->name}}">
                            </div>
                        </div>

{{--                        <div class="form-group row">--}}
{{--                            <label class="col-sm-2 col-form-label">Student</label>--}}
{{--                            <div class="col-sm-10">--}}
{{--                                <textarea required type="text" class="form-control" name="user_id" value="{{$apply->users->name}}">{{$apply->users->name}}</textarea>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Mã học phần</label>
                            <div class="col-sm-10">
                                <input disabled type="text" class="form-control" name="group" value="{{$apply->group}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Học phần</label>
                            <div class="col-sm-10">
                                <select disabled name="subject_id" class="form-control">
                                    {{-- <option value="9999">Trống</option> --}}
                                    @foreach ($subjects as $item)
                                        <option value="{{$item->id}}" @if($apply->suject_id == $item->id) selected @endif>{{strip_tags($item->name)?? 'Trống'}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Học kì</label>
                            <div class="col-sm-10">
                                <input disabled type="text" class="form-control" value="@if($apply->semester_id == 3)Hè@else{{$apply->semester_id}} @endif">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Năm học</label>
                            <div class="col-sm-10">
                                <select disabled name="subject_id" class="form-control">
                                    {{-- <option value="9999">Trống</option> --}}
                                    @foreach ($years as $item)
                                        <option value="{{$item->id}}" @if($apply->year_id == $item->id) selected @endif>{{$item->name?? 'Trống'}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Lý do</label>
                            <div class="col-sm-10">
                                <input disabled type="text" class="form-control" name="reason" value="{{strip_tags($apply->reason)}}"></input>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Tập tin bổ sung</label>
                            <div class="col-sm-10">
                                <a href="{{asset($apply->proof) }}"> @if(asset($apply->proof) == 'http://127.0.0.1:8000/') Trống @else &nbspTập tin bổ sung @endif</a>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Giảng viên</label>
                            <div class="col-sm-10">
                                <input disabled type="text" class="form-control" name="teach_id" value="{{$apply->teach->name}}"></input>
                            </div>
                        </div>

{{--                        @can('isProfessor')--}}
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Quyết định giảng viên</label>
                            <div class="col-sm-10">
                                <select name="teach_status" class="form-control" @cannot('isProfessor') disabled @endcannot>
                                     <option value="" disabled>Đang chờ...</option>
                                     <option value="1" @if($apply->teach_status == '1') selected @endif>Đồng ý</option>
                                    <option value="0" @if($apply->teach_status == '0') selected @endif>Không đồng ý</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Ý kiến giảng viên</label>
                            <div class="col-sm-10" >
                                @can('isProfessor')
                                    <textarea id="editor1" type="text" class="form-control ck-editor__editable_inline" name="teach_description">{{$apply->teach_description}}</textarea>
                                @endcan
                                @cannot('isProfessor')
                                    <input type="text" class="form-control" name="teach_description" value="{{strip_tags($apply->teach_description)}}" disabled>
                                @endcannot
                            </div>
                        </div>
{{--                        @endcan--}}

{{--                        @can('isDean')--}}
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Quyết định của lãnh đạo khoa</label>
                            <div class="col-sm-10">
                                <select name="dean_status" class="form-control" @cannot('isDean') disabled @endcannot>
                                    <option value="" @if($apply->dean_status == '') selected @endif disabled>Đang chờ...</option>
                                    <option value="1" @if($apply->dean_status == '1') selected @endif>Đồng ý</option>
                                    <option value="0" @if($apply->dean_status == '0') selected @endif>Từ chối</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Ý kiến của lãnh đạo khoa</label>
                            <div class="col-sm-10">
                                @can('isDean')
                                    <textarea type="text" id="editor2" class="form-control ck-editor__editable_inline" name="dean_description">{{$apply->dean_description}}</textarea>
                                @endcan
                                @cannot('isDean')
                                    <input value="{{strip_tags($apply->dean_description)}}" type="text" class="form-control " name="dean_description" disabled>
                                @endcannot
                            </div>
                        </div>
{{--                        @endcan--}}

{{--                        @can('isHeadmaster')--}}
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Quyết định của ban giám hiệu</label>
                            <div class="col-sm-10">
                                <select name="headmaster_status" class="form-control" @cannot('isHeadmaster') disabled @endcannot>
                                    <option value="" @if($apply->headmaster_status == '') selected @endif disabled>Đang chờ...</option>
                                    <option value="1" @if($apply->headmaster_status == '1') selected @endif>Đồng ý</option>
                                    <option value="0" @if($apply->headmaster_status == '0') selected @endif>Từ chối</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Ý kiến của ban giám hiệu</label>
                            <div class="col-sm-10">
                                @can('isHeadmaster')
                                    <textarea type="text" id="editor3" class="form-control ck-editor__editable_inline" name="headmaster_description">{{$apply->headmaster_description}}</textarea>
                                @endcan
                                @cannot('isHeadmaster')
                                    <input type="text" class="form-control" name="headmaster_description" value="{{strip_tags($apply->headmaster_description)}}" disabled>
                                @endcannot
                            </div>
                        </div>
{{--                        @endcan--}}

{{--                        @can('isProfessor')--}}
{{--                        <div class="form-group row">--}}
{{--                            <label class="col-sm-2 col-form-label">Kết quả</label>--}}
{{--                            <div class="col-sm-10">--}}
{{--                                <select name="result" class="form-control">--}}
{{--                                @if($apply->dean_status == null || $apply->headmaster_status == null) disabled @endif--}}
{{--                                        @if($apply->teach_status == '0' || $apply->dean_status == '0'--}}
{{--                                            || $apply->headmaster_status == '0') disabled @endif>--}}
{{--                                    <option value="">Đang chờ...</option>--}}
{{--                                    <option value="1" @if($apply->result == '1') selected @elseif($apply->headmaster_status == '1') selected @endif>Đồng ý</option>--}}
{{--                                    <option value="0" @if($apply->result == '0') selected @endif--}}
{{--                                            @if($apply->teach_status == '0' || $apply->dean_status == '0' || $apply->headmaster_status == '0')--}}
{{--                                        selected @endif>Từ chối</option>--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        @endcan--}}

{{--                        <div class="form-group row">--}}
{{--                            <label class="col-sm-2 col-form-label">Proof</label>--}}
{{--                            <div class="col-sm-10">--}}
{{--                                <input type="text" hidden="" id="file_link" value="{{asset($apply->proof)}}">--}}

{{--                                <input class="input--style-5" type="file" id="proof" name="proof" value="{{asset($apply->proof)}}" />--}}
{{--                                </div>--}}
{{--                        </div>--}}

                        <div class="form-group pull-right">
                            <a href="/admin/postponse_apps" type="button" class="btn btn-primary float-right btn-round">Bỏ qua</a>

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
