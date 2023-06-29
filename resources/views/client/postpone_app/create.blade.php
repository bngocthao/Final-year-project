<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title Page-->
    <title>Postpone App/ Create</title>

    <!-- Icons font CSS-->

    <link href="{{asset("client/form/vendor/mdi-font/css/material-design-iconic-font.min.css")}}" rel="stylesheet" media="all">
    <link href="{{asset("client/form/vendor/font-awesome-4.7/css/font-awesome.min.css")}}" rel="stylesheet" media="all">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">

    <!-- Vendor CSS-->
    <link href="{{asset("client/form/vendor/select2/select2.min.css")}}" rel="stylesheet" media="all">
    <link href="{{asset('client/form/vendor/datepicker/daterangepicker.css')}}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{asset("client/form/css/main.css")}}" rel="stylesheet" media="all">

    <!-- Toastr -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

</head>

<body style="font-family: 'Times New Roman'">
<style>
    .ck-editor__editable_inline {
        min-height: 200px;
    }
</style>
<div class="page-wrapper">
    <div class="wrapper wrapper--w790">
        <div class="card card-5">
            <div class="card-heading" style="background-color: #5777BA !important;">
                <h2 class="title" >Tạo đơn</h2>
            </div>
            <div class="card-body">
                <form action="{{route('client.post_form')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <input value="{{$user->id}}" hidden="hidden" name="user_id">
                    <input value="{{$user->major_id}}" hidden="hidden" name="major_id">

                    <div class="form-row">
                        <div class="name">
                            Tên sinh viên(<svg xmlns="http://www.w3.org/2000/svg" color="red" width="8" height="8" fill="currentColor" class="bi bi-asterisk" viewBox="0 0 16 16">
                                <path d="M8 0a1 1 0 0 1 1 1v5.268l4.562-2.634a1 1 0 1 1 1 1.732L10 8l4.562 2.634a1 1 0 1 1-1 1.732L9 9.732V15a1 1 0 1 1-2 0V9.732l-4.562 2.634a1 1 0 1 1-1-1.732L6 8 1.438 5.366a1 1 0 0 1 1-1.732L7 6.268V1a1 1 0 0 1 1-1z"/>
                            </svg>)</div>
                        <div class="value">
                            <div class="input-group">
                                <input disabled class="input--style-5" type="text" value="{{$user->name}}">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="name">
                            Học phần(<svg xmlns="http://www.w3.org/2000/svg" color="red" width="8" height="8" fill="currentColor" class="bi bi-asterisk" viewBox="0 0 16 16">
                                <path d="M8 0a1 1 0 0 1 1 1v5.268l4.562-2.634a1 1 0 1 1 1 1.732L10 8l4.562 2.634a1 1 0 1 1-1 1.732L9 9.732V15a1 1 0 1 1-2 0V9.732l-4.562 2.634a1 1 0 1 1-1-1.732L6 8 1.438 5.366a1 1 0 0 1 1-1.732L7 6.268V1a1 1 0 0 1 1-1z"/>
                            </svg>)</div>
                        <div class="value">
                            <div class="input-group">
                                <div class="rs-select2 js-select-simple">
                                    <select required name="subject_id" data-live-search="true">
                                        <option disabled="disabled" selected="selected">Chọn học phần</option>
                                        @foreach($subject_list as $i)
                                            <option data-tokens="{{$i->id}}" value="{{$i->id}}">{{strip_tags($i->name)}}</option>
                                        @endforeach
                                    </select>
                                    <div class="select-dropdown"></div>
                                </div>
                                @error('subject_id')
                                <div class="alert alert-danger"><nav style="color:red">Học phần không được để trống</nav></div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="name">
                            Nhóm(<svg xmlns="http://www.w3.org/2000/svg" color="red" width="8" height="8" fill="currentColor" class="bi bi-asterisk" viewBox="0 0 16 16">
                                <path d="M8 0a1 1 0 0 1 1 1v5.268l4.562-2.634a1 1 0 1 1 1 1.732L10 8l4.562 2.634a1 1 0 1 1-1 1.732L9 9.732V15a1 1 0 1 1-2 0V9.732l-4.562 2.634a1 1 0 1 1-1-1.732L6 8 1.438 5.366a1 1 0 0 1 1-1.732L7 6.268V1a1 1 0 0 1 1-1z"/>
                            </svg>)</div>
                        <div class="value">
                            <div class="input-group">
                                <input required class="input--style-5" type="text" name="group">
                            </div>
                            @error('subject_id')
                            <div class="alert alert-danger"><nav style="color:red">Nhóm không được để trống</nav></div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="name">
                            Giảng viên(<svg xmlns="http://www.w3.org/2000/svg" color="red" width="8" height="8" fill="currentColor" class="bi bi-asterisk" viewBox="0 0 16 16">
                                <path d="M8 0a1 1 0 0 1 1 1v5.268l4.562-2.634a1 1 0 1 1 1 1.732L10 8l4.562 2.634a1 1 0 1 1-1 1.732L9 9.732V15a1 1 0 1 1-2 0V9.732l-4.562 2.634a1 1 0 1 1-1-1.732L6 8 1.438 5.366a1 1 0 0 1 1-1.732L7 6.268V1a1 1 0 0 1 1-1z"/>
                            </svg>)</div>
                        <div class="value">
                            <div class="input-group">
                                <div class="rs-select2 js-select-simple select2-selection__arrow">

                                    <select name="teach_id">
                                        <option disabled="disabled" selected="selected" >Chọn giảng viên</option>
                                        @foreach($teach as $i)
                                        {{--a collection of collection of obj--}}
                                            <option value="{{$i[0]->id}}">{{$i[0]->name}}</option>
                                        @endforeach
                                    </select>
                                    <div class="select-dropdown"></div>
                                </div>
                            </div>
                            @error('teach_id')
                            <div class="alert alert-danger"><nav style="color:red">Tên giảng viên không được để trống</nav></div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="name">
                            Học kỳ(<svg xmlns="http://www.w3.org/2000/svg" color="red" width="8" height="8" fill="currentColor" class="bi bi-asterisk" viewBox="0 0 16 16">
                                <path d="M8 0a1 1 0 0 1 1 1v5.268l4.562-2.634a1 1 0 1 1 1 1.732L10 8l4.562 2.634a1 1 0 1 1-1 1.732L9 9.732V15a1 1 0 1 1-2 0V9.732l-4.562 2.634a1 1 0 1 1-1-1.732L6 8 1.438 5.366a1 1 0 0 1 1-1.732L7 6.268V1a1 1 0 0 1 1-1z"/>
                            </svg>)</div>
                        <div class="value">
                            <div class="input-group">
                                <input hidden class="input--style-5" name="semester_id" type="text" value="{{$sem}}">
                                <div class="rs-select2 js-select-simple select--no-search">
                                    <select required name="semester_id" disabled >
                                        <option @if($sem="1") selected @endif value="1">1</option>
                                        <option @if($sem="2") selected @endif value="2">2</option>
                                        <option @if($sem="3") selected @endif value="3">Hè</option>
                                    </select>
                                    <div class="select-dropdown"></div>
                                </div>
                            </div>
                            @error('semester_id')
                            <div class="alert alert-danger"><nav style="color:red">Học kì không được để trống</nav></div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="name">
                            Năm học(<svg xmlns="http://www.w3.org/2000/svg" color="red" width="8" height="8" fill="currentColor" class="bi bi-asterisk" viewBox="0 0 16 16">
                                <path d="M8 0a1 1 0 0 1 1 1v5.268l4.562-2.634a1 1 0 1 1 1 1.732L10 8l4.562 2.634a1 1 0 1 1-1 1.732L9 9.732V15a1 1 0 1 1-2 0V9.732l-4.562 2.634a1 1 0 1 1-1-1.732L6 8 1.438 5.366a1 1 0 0 1 1-1.732L7 6.268V1a1 1 0 0 1 1-1z"/>
                            </svg>)</div>
                        <div class="value">
                            <div class="input-group">
                                <div class="rs-select2 js-select-simple select--no-search">
                                    <select name="year_id" required>
                                        <option disabled="disabled" selected="selected">Chọn năm học</option>
                                        @foreach($years as $i)
                                            <option value="{{$i->id}}">{{$i->name}}</option>
                                        @endforeach
                                    </select>
                                    <div class="select-dropdown"></div>
                                </div>
                            </div>
                            @error('year_id')
                            <div class="alert alert-danger"><nav style="color:red">Năm học không được để trống</nav></div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="name">
                            Lý do(<svg xmlns="http://www.w3.org/2000/svg" color="red" width="8" height="8" fill="currentColor" class="bi bi-asterisk" viewBox="0 0 16 16">
                                <path d="M8 0a1 1 0 0 1 1 1v5.268l4.562-2.634a1 1 0 1 1 1 1.732L10 8l4.562 2.634a1 1 0 1 1-1 1.732L9 9.732V15a1 1 0 1 1-2 0V9.732l-4.562 2.634a1 1 0 1 1-1-1.732L6 8 1.438 5.366a1 1 0 0 1 1-1.732L7 6.268V1a1 1 0 0 1 1-1z"/>
                            </svg>)</div>
                        <div class="value">
                            <div class="input-group">
                                <textarea class="input--style-5 ck-editor__editable_inline" id="editor" type="text" name="reason"></textarea>
                            </div>
                            @error('reason')
                            <div class="alert alert-danger"><nav style="color:red">Lý do không được để trống</nav></div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="name">Tệp đính kèm</div>
                        <div class="value">
                            <div class="input-group">
                                <input class="input--style-5" type="file" name="proof" id="customFile" />
                            </div>
                        </div>
                    </div>
                    <div>
                        <a href="javascript:history.back()" class="btn btn--radius-2 btn--blue" role="button" style="background-color: #5777BA; text-decoration: none;">Trở lại</a>
                        <button class="btn btn--radius-2 btn--blue pull-right" style="background-color: #5777BA" type="submit">Gửi đơn</button>
                    </div>
                </form>
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
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

</html>
<!-- end document-->
