<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Snooze/ chỉnh sửa</title>

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
</head>
<body style="font-family: 'Roboto Slab'">
<div class="page-wrapper bg-gra-01 p-t-45 p-b-50">
    <div class="wrapper wrapper--w790">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading" style="color: silver !important;">
                    <h2 class="title" >Chỉnh sửa đơn</h2>
                </div>
                <div class="card-body">
                    <form action="{{route('form.update', $apply)}}" method="post" enctype="multipart/form-data">
                    @csrf
                        @method('put')
                        <div class="form-row">
                            <input required class="input--style-5" type="text" name="name" value="{{$apply->id}}" disabled="disabled" hidden="hidden">

                            <div class="name">Họ tên sinh viên</div>
                            <div class="value">
                                <div class="input-group">
                                    <input required class="input--style-5" type="text" name="name" value="{{$apply->users->name}}" disabled="disabled">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">
                                Môn học</div>
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
                                Nhóm</div>
                            <div class="value">
                                <div class="input-group">
                                    <input required class="input--style-5" type="text" name="group" value="{{$apply->group}}" disabled="disabled">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">
                                Giảng viên</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search select2-selection__arrow">
                                        <select name="teach_id" disabled>
                                            <option>{{ $apply->teach->name }}</option>
                                        </select>
                                        <div class="select-dropdown" ></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">
                                Học kỳ</div>
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
                                Năm học</div>
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
                                Lý do</div>
                            <div class="value">
                                <div class="input-group">
        {{--                            <textarea class="input--style-5" id="editor" type="text" name="reason" disabled="disabled">{{$apply->reason}}</textarea>--}}
                                    <input class="input--style-5" type="text" name="reason" disabled="disabled" value="{!! strip_tags($apply->reason) !!}">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">
                                Lý do (bổ sung)</div>
                            <div class="value">
                                <div class="input-group">
                                    <input type="text" hidden="" id="file_link" value="{{asset($apply->proof)}}">

                                    <input class="input--style-5" type="file" id="proof" name="proof" value="{{asset($apply->proof)}}" disabled="disabled" />
                                </div>
                            </div>
                        </div>
                        {{--Giảng viên chấp nhận ? và ý kiến--}}
                        @canany(['isProfessor','isMan&Pro'])
                            <div class="form-row">
                                <div class="name">Quyết định của giảng viên</div>
                                <div class="value">
                                    <div class="input-group">
                                        <div class="rs-select2 js-select-simple select--no-search">
                                            <select required id="teach_status" name="teach_status"
                                                    @if($apply->unit_2_status == '1' || '0') disabled @endif>
                                                <option disabled>Choose option </option>
                                                <option @if($apply->teach_status == '1') selected @endif value="1">Đồng ý</option>
                                                <option @if($apply->teach_status == '0') selected @endif  value="0">Không đồng ý</option>
                                            </select>
                                            <div class="select-dropdown"></div>
                                        </div>
                                    </div>
                                    @error('teach_status')
                                    <div class="alert alert-danger"><nav style="color:red">Quyết định của giảng viên không được trống</nav></div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="name">Ý kiến của giảng viên</div>
                                <div class="value">
                                    <div class="input-group">
                                        <textarea @if($apply->unit_2_status == '1' || '0') disabled @endif class="input--style-5" id="editor" type="text"
                                                  name="teach_description">{{$apply->teach_description}}</textarea>
                                    </div>
                                </div>
                            </div>
                        @endcanany
{{--                        @cannot('isProfessor')--}}
{{--                        <div class="form-row">--}}
{{--                            <div class="name">Quyết định của giảng viên</div>--}}
{{--                            <div class="value">--}}
{{--                                <div class="input-group">--}}
{{--                                    <div class="rs-select2 js-select-simple select--no-search">--}}
{{--                                        <select disabled>--}}
{{--                                            <option @if($apply->teach_status == '1') selected @endif value="1">Đồng ý</option>--}}
{{--                                            <option @if($apply->teach_status == '0') selected @endif  value="0">Không đồng ý</option>--}}
{{--                                        </select>--}}
{{--                                        <div class="select-dropdown"></div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="form-row">--}}
{{--                            <div class="name">Ý kiến giảng viên</div>--}}
{{--                            <div class="value">--}}
{{--                                <div class="input-group">--}}
{{--                                    <input disabled class="input--style-5" type="text" value="{!! strip_tags($apply->teach_description) !!}"></input>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        @endcannot--}}
                        {{--End professor part--}}

                        {{--Unit 2--}}
                        @canany(['isMan&Pro','isProfessor'])
                            <div class="form-row">
                                <div class="name">Quyết định của trưởng khoa/ hiệu trưởng</div>
                                <div class="value">
                                    <div class="input-group">
                                        <div class="rs-select2 js-select-simple select--no-search">
                                            <select required id="unit_2_status" name="unit_2_status"
                                                    @if($apply->unit_1_status == '1') disabled @endif>
                                                <option disabled>Lựa chọn</option>
                                                <option @if($apply->unit_2_status == '1') selected @endif value="1">Đồng ý</option>
                                                <option @if($apply->unit_2_status == '0') selected @endif  value="0">Không đồng ý</option>
                                            </select>
                                            <div class="select-dropdown"></div>
                                        </div>
                                    </div>
                                    @error('unit_2_status')
                                    <div class="alert alert-danger"><nav style="color:red">Quyết định của giảng viên không được rỗng</nav></div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="name">Ý kiến của trưởng khoa/ hiệu trưởng</div>
                                <div class="value">
                                    <div class="input-group">
                                        <textarea @if($apply->unit_1_status == '1') disabled @endif class="input--style-5" id="editor2" type="text" name="unit_2_description">{{$apply->unit_2_description}}</textarea>
                                    </div>
                                </div>
                            </div>
                        @endcanany
                        {{--Student can see unit 2 approval and opinion--}}
{{--                        @cannot('isMan&Pro')--}}
{{--                        <div class="form-row">--}}
{{--                                <div class="name">--}}
{{--                                    Quyết định của trường khoa/ hiệu trưởng</div>--}}
{{--                                <div class="value">--}}
{{--                                    <div class="input-group">--}}
{{--                                        <div class="rs-select2 js-select-simple select--no-search select2-selection__arrow">--}}
{{--                                            <select id="unit_2_status" disabled>--}}
{{--                                                <option>{{ $apply->unit_2_status }}</option>--}}
{{--                                            </select>--}}
{{--                                            <div class="select-dropdown" ></div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                        </div>--}}
{{--                        <div class="form-row">--}}
{{--                            <div class="name">--}}
{{--                                Ý kiến của trưởng khoa/ hiệu trưởng</div>--}}
{{--                            <div class="value">--}}
{{--                                <div class="input-group">--}}
{{--                                    <input class="input--style-5" type="text" disabled="disabled" value="{!! strip_tags($apply->unit_2_description) !!}">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        @endcannot--}}
                        {{--End of unit 2 part--}}

                        {{--Unit 1--}}
                        @can('isHQ')
                            <div class="form-row">
                                <div class="name">Quyết định của phòng đào tạo</div>
                                <div class="value">
                                    <div class="input-group">
                                        <div class="rs-select2 js-select-simple select--no-search">
                                            <select required @if($apply->result == 'i' || 'I') disabled @endif id="unit_1_status" name="unit_1_status">
                                                <option disabled>Tùy chọn</option>
                                                <option @if($apply->unit_1_status == '1') selected @endif value="1">Đồng ý</option>
                                                <option @if($apply->unit_1_status == '0') selected @endif  value="0">Không đồng ý</option>
                                            </select>
                                            <div class="select-dropdown"></div>
                                        </div>
                                    </div>
                                    @error('unit_1_status')
                                    <div class="alert alert-danger"><nav style="color:red">Phòng đào tạo không được để trống</nav></div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="name">Ý kiến của phòng đào tạo</div>
                                <div class="value">
                                    <div class="input-group">
                                        <textarea @if($apply->result == 'i' || 'I') readonly @endif class="input--style-5" id="editor" type="text" name="unit_1_description">{{$apply->unit_1_description}}</textarea>
                                    </div>
                                </div>
                            </div>
                        @endcan
{{--                        @cannot('isHQ')--}}
{{--                            <div class="form-row">--}}
{{--                                <div class="name">Quyết định của phòng đào tạo</div>--}}
{{--                                <div class="value">--}}
{{--                                    <div class="input-group">--}}
{{--                                        <div class="rs-select2 js-select-simple select--no-search">--}}
{{--                                            <select required id="unit_1_status" name="unit_1_status" disabled>--}}
{{--                                                <option @if($apply->unit_1_status == '1') selected @endif value="1">Đồng ý</option>--}}
{{--                                                <option @if($apply->unit_1_status == '0') selected @endif  value="0">Không đồng ý</option>--}}
{{--                                            </select>--}}
{{--                                            <div class="select-dropdown"></div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-row">--}}
{{--                                <div class="name">Ý kiến của phòng đào tạo</div>--}}
{{--                                <div class="value">--}}
{{--                                    <div class="input-group">--}}
{{--                                        <input class="input--style-5" type="text" value="{{strip_tags($apply->unit_1_description)}}" disabled></input>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        @endcannot--}}
                        {{--End of unit 1--}}

                        {{--result: only professor can update result--}}
                        @canany(['isMan&Pro','isProfessor'])
                        <div class="form-row">
                            <div class="name">
                                Kết quả</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="result" value="{{$apply->result}}" >
                                </div>
                            </div>
                        </div>
                        @endcanany
                        @canany(['isManager','isHQ'])
                        <div class="form-row">
                            <div class="name">
                                Kết quả</div>
                            <div class="value">
                                <div class="input-group">
                                    <input disabled class="input--style-5" type="text" value="{{$apply->result ?? "Waiting"}}" >
                                </div>
                            </div>
                        </div>
                        {{--end result--}}
                        @endcanany
                        <div>
                            <a href="javascript:history.go(-1)" class="btn btn--radius-2 btn--blue" role="button" style="color: rebeccapurple; text-decoration: none;">Trở lại</a>

                            <button class="btn btn--radius-2 btn--blue pull-right" style="color: rebeccapurple;font-family: 'Roboto Slab'" type="submit">GỞI</button>
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

<!-- This templates was made by Colorlib (https://colorlib.com) -->
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>

<!-- Toastr-->
<script src="{{ asset('node_modules/toastr/build/toastr.min.js') }}"></script>
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
    ClassicEditor
        .create( document.querySelector( '#editor2' ) )
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
    // create a DataTransfer to get a FileList
    const dataTransfer = new DataTransfer();
    dataTransfer.items.add(myFile);
    fileInput.files = dataTransfer.files;
</script>

{{--toastr--}}
<script>
    @if(Session::has('message'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    toastr.success("{{ session('message') }}");
    @endif

        @if(Session::has('error'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    toastr.error("{{ session('error') }}");
    @endif

        @if(Session::has('info'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    toastr.info("{{ session('info') }}");
    @endif

        @if(Session::has('warning'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    toastr.warning("{{ session('warning') }}");
    @endif
</script>
</body>
</html>
