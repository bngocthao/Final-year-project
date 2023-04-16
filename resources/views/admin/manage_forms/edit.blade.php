@extends('layouts.app')
@section('content')

    <title>Application Edit</title>

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
            <h4 class="sub-title">UPDATE APPLICATION</h4>
            <div class=" box box-info">
                <div class="box-body">
                    <form action="{{route('postponse_apps.update', $apply, $apply->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        {{-- <input hidden name="ma_nguoi_dung" > --}}
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Student name</label>
                            <div class="col-sm-10">
                                <input required name="name" type="text" class="form-control" style="font-weight: bold" value="{{$apply->name}}">
                            </div>
                        </div>

{{--                        <div class="form-group row">--}}
{{--                            <label class="col-sm-2 col-form-label">Student</label>--}}
{{--                            <div class="col-sm-10">--}}
{{--                                <textarea required type="text" class="form-control" name="user_id" value="{{$apply->users->name}}">{{$apply->users->name}}</textarea>--}}
{{--                            </div>--}}
{{--                        </div>--}}

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Subject</label>
                            <div class="col-sm-10">
                                <select name="subject_id" class="form-control">
                                    {{-- <option value="9999">Trống</option> --}}
                                    @foreach ($subjects as $item)
                                        <option value="{{$item->id}}" @if($apply->suject_id == $item->id) selected @endif>{{$item->name?? 'Trống'}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Group</label>
                            <div class="col-sm-10">
                                <input required type="text" class="form-control" name="group" value="{{$apply->group}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Semester</label>
                            <div class="col-sm-10">
                                <select name="subject_id" class="form-control">
                                    {{-- <option value="9999">Trống</option> --}}
                                    @foreach ($subjects as $item)
                                        <option value="{{$item->id}}" @if($apply->suject_id == $item->id) selected @endif>{{$item->name?? 'Trống'}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">year</label>
                            <div class="col-sm-10">
                                <select name="subject_id" class="form-control">
                                    {{-- <option value="9999">Trống</option> --}}
                                    @foreach ($years as $item)
                                        <option value="{{$item->id}}" @if($apply->year_id == $item->id) selected @endif>{{$item->name?? 'Trống'}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Reason</label>
                            <div class="col-sm-10">
                                <textarea required type="text" id="editor" class="form-control" name="reason" >{{$apply->reason}}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Professor</label>
                            <div class="col-sm-10">
                                <textarea required type="text" class="form-control" name="teach_id" value="{{$apply->users->name}}">{{$apply->users->name}}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Professor approve</label>
                            <div class="col-sm-10">
                                <select name="teach_status" class="form-control">
                                     <option value="">Not decided</option>
                                     <option value="1" @if($apply->teach_status == '1') selected @endif>Agree</option>
                                    <option value="2" @if($apply->teach_status == '2') selected @endif>Reject</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Professor opinion</label>
                            <div class="col-sm-10">
                                <textarea required id="editor2" type="text" class="form-control" name="teach_description" value="{{$apply->teach_description}}">{{$apply->teach_description}}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Major manager approve</label>
                            <div class="col-sm-10">
                                <select name="unit_2_status" class="form-control">
                                    <option value="">Not decided</option>
                                    <option value="1" @if($apply->unit_2_status == '1') selected @endif>Agree</option>
                                    <option value="2" @if($apply->unit_2_status == '2') selected @endif>Reject</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Major manager opinion</label>
                            <div class="col-sm-10">
                                <textarea required type="text" class="form-control" name="unit_2_description" value="{{$apply->unit_2_description}}">{{$apply->unit_2_description}}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Training department approve</label>
                            <div class="col-sm-10">
                                <select name="unit_1_status" class="form-control">
                                    <option value="">Not decided</option>
                                    <option value="1" @if($apply->unit_1_status == '1') selected @endif>Agree</option>
                                    <option value="2" @if($apply->unit_1_status == '2') selected @endif>Reject</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Training department opinion</label>
                            <div class="col-sm-10">
                                <textarea required type="text" id="editor3" class="form-control" name="unit_1_description" value="{{$apply->unit_1_description}}">{{$apply->unit_1_description}}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Result</label>
                            <div class="col-sm-10">
                                <select name="result" class="form-control">
                                    <option value="">Not decided</option>
                                    <option value="1" @if($apply->result == '1') selected @endif>Agree</option>
                                    <option value="2" @if($apply->result == '2') selected @endif>Reject</option>
                                </select>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Proof</label>
                            <div class="col-sm-10">
                                <input type="text" hidden="" id="file_link" value="{{asset($apply->proof)}}">

                                <input class="input--style-5" type="file" id="proof" name="proof" value="{{asset($apply->proof)}}" />
                                </div>
                        </div>

                        <input name="major_id" value="major_id" type="hidden">

                        <div class="form-group pull-right">
                            <button type="submit" class="btn btn-success float-right btn-round">Update</button>
                            <button type="button" class="btn btn-info float-right btn-round" value="Go back!" onclick="location.href='/admin/majors'">Return</button>
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

        // console.log(myFile);

        // console.log(myFile);

        // Now let's create a DataTransfer to get a FileList
        const dataTransfer = new DataTransfer();
        dataTransfer.items.add(myFile);
        fileInput.files = dataTransfer.files;

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
    </script>
@endsection
