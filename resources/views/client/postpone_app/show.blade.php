<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title Page-->
    <title>Postpone App/ Show</title>

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
                <h2 class="title" >Create Form</h2>
            </div>
            <div class="card-body">
                <form action="{{route('client.post_form')}}" method="post" enctype="multipart/form-data">

                    <div class="form-row">
                        <div class="name">Student name</div>
                        <div class="value">
                            <div class="input-group">
                                <input required class="input--style-5" type="text" name="name" value="{{$user->name}}" disabled="disabled">
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
                                            <option>{{$app->subject->name}}</option>
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
                                <input required class="input--style-5" type="text" name="group" value="{{$app->group}}" disabled="disabled">
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
                                            <option>{{ $app->teach->name }}</option>
                                    </select>
                                    <div class="select-dropdown"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="name">
                            Semester(<svg xmlns="http://www.w3.org/2000/svg" color="red" width="8" height="8" fill="currentColor" class="bi bi-asterisk" viewBox="0 0 16 16">
                                <path d="M8 0a1 1 0 0 1 1 1v5.268l4.562-2.634a1 1 0 1 1 1 1.732L10 8l4.562 2.634a1 1 0 1 1-1 1.732L9 9.732V15a1 1 0 1 1-2 0V9.732l-4.562 2.634a1 1 0 1 1-1-1.732L6 8 1.438 5.366a1 1 0 0 1 1-1.732L7 6.268V1a1 1 0 0 1 1-1z"/>
                            </svg>)</div>
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
                            Years(<svg xmlns="http://www.w3.org/2000/svg" color="red" width="8" height="8" fill="currentColor" class="bi bi-asterisk" viewBox="0 0 16 16">
                                <path d="M8 0a1 1 0 0 1 1 1v5.268l4.562-2.634a1 1 0 1 1 1 1.732L10 8l4.562 2.634a1 1 0 1 1-1 1.732L9 9.732V15a1 1 0 1 1-2 0V9.732l-4.562 2.634a1 1 0 1 1-1-1.732L6 8 1.438 5.366a1 1 0 0 1 1-1.732L7 6.268V1a1 1 0 0 1 1-1z"/>
                            </svg>)</div>
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
                            Reason(<svg xmlns="http://www.w3.org/2000/svg" color="red" width="8" height="8" fill="currentColor" class="bi bi-asterisk" viewBox="0 0 16 16">
                                <path d="M8 0a1 1 0 0 1 1 1v5.268l4.562-2.634a1 1 0 1 1 1 1.732L10 8l4.562 2.634a1 1 0 1 1-1 1.732L9 9.732V15a1 1 0 1 1-2 0V9.732l-4.562 2.634a1 1 0 1 1-1-1.732L6 8 1.438 5.366a1 1 0 0 1 1-1.732L7 6.268V1a1 1 0 0 1 1-1z"/>
                            </svg>)</div>
                        <div class="value">
                            <div class="input-group">
                                <textarea class="input--style-5" id="editor" type="text" name="reason" disabled="disabled">{{$app->reason}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="name">Proof</div>
                        <div class="value">
                            <div class="input-group">
                                <input type="text" hidden="" id="file_link" value="{{asset($app->proof)}}">

                                <input class="input--style-5" type="file" id="proof" name="proof" value="{{asset($app->proof)}}" disabled="disabled" />
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="name">
                            Result</div>
                        <div class="value">
                            <div class="input-group">
                                <input required class="input--style-5" type="text" name="group" value="{{$app->result ?? "Waiting"}}" disabled="disabled">
                            </div>
                        </div>
                    </div>
                    <div>
                        <a href="javascript:history.back()" class="btn btn--radius-2 btn--blue" role="button" style="color: rebeccapurple; text-decoration: none;">Back</a>
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
// Hiển thị tên file trong boostrap input
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
