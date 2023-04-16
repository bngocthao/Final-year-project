<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Postpone App/ update</title>

    <!-- Icons font CSS-->

    <link href="{{asset("client/form/vendor/mdi-font/css/material-design-iconic-font.min.css")}}" rel="stylesheet" media="all">
    <link href="{{asset("client/form/vendor/font-awesome-4.7/css/font-awesome.min.css")}}" rel="stylesheet" media="all">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">

    <!-- Vendor CSS-->
    <link href="{{asset("client/form/vendor/select2/select2.min.css")}}" rel="stylesheet" media="all">
    <link href="{{asset('client/form/vendor/datepicker/daterangepicker.css')}}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{asset("client/form/css/main.css")}}" rel="stylesheet" media="all">
</head>
<body style="font-family: 'Roboto Slab'">
<div class="page-wrapper bg-gra-01 p-t-45 p-b-50">
    <div class="wrapper wrapper--w790">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading" style="color: silver !important;  ">
                    <h2 class="title" >Edit Form</h2>
                </div>
                <div class="card-body">
                    <form action="{{route('form.update', $apply)}}" method="post" enctype="multipart/form-data">
                    @csrf
                        @method('put')
                        <div class="form-row">
                            <input required class="input--style-5" type="text" name="name" value="{{$apply->id}}" disabled="disabled" hidden="hidden">

                            <div class="name">Student name</div>
                            <div class="value">
                                <div class="input-group">
                                    <input required class="input--style-5" type="text" name="name" value="{{$apply->name}}" disabled="disabled">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">
                                Subject</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="subject_id" disabled="disabled">
                                            <option>{{$apply->subject->name}}</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">
                                Group</div>
                            <div class="value">
                                <div class="input-group">
                                    <input required class="input--style-5" type="text" name="group" value="{{$apply->group}}" disabled="disabled">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">
                                Professor</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search select2-selection__arrow">

                                        <select name="teach_id" disabled="disabled">
                                            <option>{{ $apply->teach->name }}</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">
                                Semester</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select required name="semester_id" disabled="disabled">
                                            <option>{{$apply->semesters->name}}</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">
                                Years</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="year_id" disabled="disabled">
                                            <option>{{ $apply->years->name }}</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">
                                Reason</div>
                            <div class="value">
                                <div class="input-group">
        {{--                            <textarea class="input--style-5" id="editor" type="text" name="reason" disabled="disabled">{{$apply->reason}}</textarea>--}}
                                    <input class="input--style-5" type="text" name="reason" disabled="disabled" value="{!! strip_tags($apply->reason) !!}">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Proof</div>
                            <div class="value">
                                <div class="input-group">
                                    <input type="text" hidden="" id="file_link" value="{{asset($apply->proof)}}">

                                    <input class="input--style-5" type="file" id="proof" name="proof" value="{{asset($apply->proof)}}" disabled="disabled" />
                                </div>
                            </div>
                        </div>
                    {{--Sinh viên chỉ được coi kết quả--}}
                        @can('isStudent')
                            <div class="form-row">
                                <div class="name">
                                    Result</div>
                                <div class="value">
                                    <div class="input-group">
                                        <input required class="input--style-5" type="text" name="group" value="{{$apply->result ?? "Waiting"}}" disabled="disabled">
                                    </div>
                                </div>
                            </div>
                        @endcan

                        {{--Giảng viên chấp nhận ? và ý kiến--}}
                        @can('isProfessor')
                            <div class="form-row">
                                <div class="name">Professor approval</div>
                                <div class="value">
                                    <div class="input-group">
                                        <div class="rs-select2 js-select-simple select--no-search">
                                            <select required name="teach_status">
                                                <option disabled="disabled" selected="selected" >Choose option </option>
                                                <option value="1">Approve</option>
                                                <option value="2">Not approve</option>
                                            </select>
                                            <div class="select-dropdown"></div>
                                        </div>
                                    </div>
                                    @error('teach_status')
                                    <div class="alert alert-danger"><nav style="color:red">Professor approval can't be empty</nav></div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="name">Opinion</div>
                                <div class="value">
                                    <div class="input-group">
                                        <textarea class="input--style-5" id="editor" type="text" name="teach_description"></textarea>
                                    </div>
                                </div>
                            </div>
                        @endcan

{{--                        Khi mà 2 role kia accept thì cái phần này mới đc unlock--}}
{{--                        @can('isProfessor')--}}
{{--                            <div class="form-row">--}}
{{--                                <div class="name">--}}
{{--                                    Result</div>--}}
{{--                                <div class="value">--}}
{{--                                    <div class="input-group">--}}
{{--                                        <input required class="input--style-5" type="text" name="group" value="{{$apply->result ?? "Waiting"}}">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        @endcan--}}
                        <div>
                            <a href="javascript:history.back()" class="btn btn--radius-2 btn--blue" role="button" style="color: rebeccapurple; text-decoration: none;">Back</a>

                            <button class="btn btn--radius-2 btn--blue pull-right" style="color: rebeccapurple;font-family: 'Roboto Slab'" type="submit">SUBMIT</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Jquery JS-->
<script src="{{asset('client/form/vendor/jquery/jquery.min.js')}}"></script>
<!-- Vendor JS-->
<script src="{{asset('client/form/vendor/select2/select2.min.js')}}"></script>
<script src="{{asset('client/form/vendor/datepicker/moment.min.js')}}"></script>
<script src="{{asset('client/form/vendor/datepicker/daterangepicker.js')}}"></script>

<!-- Main JS-->
<script src="{{asset("client/form/js/global.js")}}"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .then( editor => {
            console.log( editor );
        } )
        .catch( error => {
            console.error( error );
        } );
</script>
{{--// Hiển thị tên file trong boostrap input--}}
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
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type', 'info') }}";
    switch(type){
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;

        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;

        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;

        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
    @endif
</script>
</body>
</html>
