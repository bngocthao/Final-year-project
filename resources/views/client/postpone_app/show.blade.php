<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title Page-->
    <title>Snooze/ Hiển thị</title>

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
        <div class="card card-5">
            <div class="card-heading" style="color: silver !important;  ">
                <h2 class="title" >Tạo đơn</h2>
            </div>
            <div class="card-body">
                <form action="{{route('client.post_form')}}" method="post" enctype="multipart/form-data">

                    <div class="form-row">
                        <div class="name">Họ tên sinh viên</div>
                        <div class="value">
                            <div class="input-group">
                                <input required class="input--style-5" type="text" name="name" value="{{$user->name}}" disabled="disabled">
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
                                            <option>{{$app->subject->name}}</option>
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
                                <input required class="input--style-5" type="text" name="group" value="{{$app->group}}" disabled="disabled">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="name">
                            Học phần</div>
                        <div class="value">
                            <div class="input-group">
                                <input class="input--style-5" type="text" name="group" value="{{$sub[0]['name']}}" disabled="disabled">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="name">
                            Giảng viên</div>
                        <div class="value">
                            <div class="input-group">
                                <div class="rs-select2 js-select-simple select--no-search select2-selection__arrow">
                                    <select name="teach_id" disabled="disabled">
                                            <option>{{ $app->teach->name }}</option>
                                    </select>
                                    <div class="select-dropdown"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="name">
                            Học kì</div>
                        <div class="value">
                            <div class="input-group">
                                <div class="rs-select2 js-select-simple select--no-search">
                                    <select required name="semester_id" disabled="disabled">
                                        <option>{{$app->semesters->name}}</option>
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
                                        <option>{{ $app->years->name }}</option>
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
                                <input required class="input--style-5" type="text" name="reason" value="{{ strip_tags($app->reason) }}" disabled="disabled">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="name">Lý do (bổ sung)</div>
                        <div class="value">
                            <div class="input-group">
                                <input type="text" hidden="" id="file_link" value="{{asset($app->proof)}}">

                                <input class="input--style-5" type="file" id="proof" name="proof" value="{{asset($app->proof)}}" disabled="disabled" />
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="name">Quyết định của giảng viên</div>
                        <div class="value">
                            <div class="input-group">
                                <div class="rs-select2 js-select-simple select--no-search">
                                    <select disabled>
                                        <option @if($app->teach_status == '1') selected @endif value="1">Chấp nhận</option>
                                        <option @if($app->teach_status == '0') selected @endif  value="0">Không chấp nhận</option>
                                    </select>
                                    <div class="select-dropdown"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="name">Ý kiến giảng viên</div>
                        <div class="value">
                            <div class="input-group">
                                <input disabled class="input--style-5" type="text" value="{{ strip_tags($app->teach_description) }}"></input>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="name">
                            Quyết định của trưởng khoa/ hiệu trưởng</div>
                        <div class="value">
                            <div class="input-group">
                                <div class="rs-select2 js-select-simple select--no-search select2-selection__arrow">
                                    <select id="unit_2_status" disabled>
                                        <option @if($app->unit_2_status == '1') selected @endif value="1">Chấp nhận</option>
                                        <option @if($app->unit_2_status == '0') selected @endif  value="0">Không chấp nhận</option>
                                    </select>
                                    <div class="select-dropdown"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="name">
                            Ý kiến của trưởng khoa/ hiệu trưởng</div>
                        <div class="value">
                            <div class="input-group">
                                <input class="input--style-5" type="text" disabled="disabled" value="{!! strip_tags($app->unit_2_description) !!}">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="name">Quyết định phòng đào tạo</div>
                        <div class="value">
                            <div class="input-group">
                                <div class="rs-select2 js-select-simple select--no-search">
                                    <select required id="unit_1_status" name="unit_1_status" disabled>
                                        <option @if($app->unit_1_status == '') selected @endif >Đang chờ</option>
                                        <option @if($app->unit_1_status == '1') selected @endif value="1">Chấp nhận</option>
                                        <option @if($app->unit_1_status == '0') selected @endif  value="0">Không chấp nhận</option>
                                    </select>
                                    <div class="select-dropdown"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="name">Ý kiến của phòng đào tạo</div>
                        <div class="value">
                            <div class="input-group">
                                <input disabled class="input--style-5" type="text" value="{{strip_tags($app->unit_1_description)}}"></input>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="name">
                            Kết quả</div>
                        <div class="value">
                            <div class="input-group">
                                <input required class="input--style-5" type="text" name="group" value="{{$app->result ?? "Đang chờ"}}" disabled="disabled">
                            </div>
                        </div>
                    </div>
                    <div>
                        <a href="javascript:history.back()" class="btn btn--radius-2 btn--blue" role="button" style="color: rebeccapurple; text-decoration: none;">Trở lại</a>
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
    // $('.input--style-5').ckeditorGet().setReadOnly();
    // ClassicEditor
    //     .create( document.querySelector( '#editor' ) )
    //     .then( editor => {
    //         console.log( editor );
    //     } )
    //     .catch( error => {
    //         console.error( error );
    //     } );
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
</html>
<!-- end document-->
