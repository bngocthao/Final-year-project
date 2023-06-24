<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="icon" type="image/x-icon" href={{asset('client/landing-page/assets/favicon.ico')}} />
    <title>Trang chủ</title>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    {{--    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />--}}
    {{--    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />--}}

    <!-- Toastr -->
    {{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>--}}
    {{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>--}}
    {{--    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">--}}

    <!-- Core theme CSS (includes Bootstrap)-->
    <link href={{asset("client/landing-page/css/styles.css")}} rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet" crossorigin="anonymous">

</head>
<body id="page-top">
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light navbar-shrink fixed-top" id="mainNav" style="background-color:#5777BA !important;">
    <div class="container">
        <a class="navbar-brand " href="#" style="color: white !important; font-family: 'Times New Roman' ;!important">ĐIỂM I</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars ms-1"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                @can('isStudent')
                    <li class="nav-item"><a class="nav-link " style="color: white !important;  font-family: 'Times New Roman';" href="{{route('form.create')}}">Tạo đơn mới</a></li>
                @endcan
                {{--                trang chủ sẽ là form list--}}
                {{--                <li class="nav-item"><a class="nav-link" href="#portfolio">Form list</a></li>--}}
                <li class="nav-item"> <a class="nav-link" style="color: white !important;  'Times New Roman'" href="{{route('user.getLogout')}}">Đăng xuất</a></li>

                {{--                <li class="nav-item dropdown">--}}
                {{--                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">--}}
                {{--                        {{$user->name}}--}}
                {{--                    </a>--}}
                {{--                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">--}}
                {{--                        <li><a class="dropdown-item" href="#">Action</a></li>--}}
                {{--                        <li><a class="dropdown-item" href="#">Another action</a></li>--}}
                {{--                        <li><hr class="dropdown-divider"></li>--}}
                {{--                        <li><a class="dropdown-item" href="#">Something else here</a></li>--}}
                {{--                    </ul>--}}
                {{--                </li>--}}
            </ul>
        </div>
    </div>
</nav>

<br><br><br><br>
<!-- Masthead-->
<div class="container">
    {{--    {{\Illuminate\Support\Facades\Auth::user()->name}} - {{\Illuminate\Support\Facades\Auth::user()->role_id}}--}}
    {{--    {{\Illuminate\Support\Facades\Auth::user()->id}}--}}
    @if(Session::has('message'))
        <script>
            $(function(){
                toastr.info("{{ Session::get('message') }}");
            })
        </script>
    @endif
    <table id="example" class="table table-striped" style="width:100%; ">
        <thead>
        <tr>
            <th style="width:10px; !important; text-align: center;!important">#</th>
            <th style="text-align: center;">Môn học</th>
            <th style="text-align: center">Giảng viên</th>
            <th style="text-align: center">Kết quả đơn</th>
            <th style="text-align: center">Điểm</th>
            <th style="text-align: center">Học kỳ</th>
            <th style="text-align: center">Năm học</th>
            @cannot('isStudent')
                <th style="text-align: center">Công cụ</th>
            @endcannot
        </tr>
        </thead>
        <tbody>
        @foreach($app as $u)
            <tr>
                <td style="width:10px;">{{ $u->id}}</td>
                <td style="text-align: center">{{ strip_tags($u->subject->name) ?? "Trống" }}</td>
                <td style="text-align: center">{{ $u->teach->name}}</td>
{{--                <td style="text-align: center">{!! $u->result ?? "Chưa có kết quả" !!}</td>--}}
                <td style="text-align: center">@if($u->result == '') Chưa có kết quả @elseif($u->result == '1') Chấp nhận @else Không chấp nhận @endif</td>
                <td style="text-align: center">@if($u->headmaster_acceptance == '1' && $u->mark != null) {{$u->mark}} @else Trống @endif</td>
                <td style="text-align: center">{{$u->semesters->name}}</td>
                <td style="text-align: center">{{$u->years->name}}</td>
                @cannot('isStudent')
                    <td class="tabledit-toolbar-column" style="text-align: center;">
                        <a href="{{route('form.show', $u->id)}}" style="color: black">
                            <button class="btn btn-success btn"><i class="fa-solid fa-eye fa-beat"></i></button></a>
                        <a href="{{route('form.edit', $u->id)}}">
                            <form action="{{ route('form.edit',  $u->id)}}" class="tabledit-edit-button btn btn primary waves-effect waves-light">
                                @csrf
                                @method('GET')
                                <button class="btn btn-primary btn" type="submit" id="del-confirm">
                                    <i class="fa-solid fa-pencil"></i>
                                </button>
                            </form></a>
                    </td>
                @endcannot
            </tr>
        @endforeach
        @can('isMan&Pro')
            @foreach($app1 as $u)
                <tr>
                    <td style="width:10px;">{{ $u->id}}</td>
                    <td style="text-align: center">{{ $u->subject->name ?? "None" }}</td>
                    <td style="text-align: center">{{ $u->teach->name}}</td>
                    <td style="text-align: center">{!! $u->result ?? "None" !!}</td>
                    <td style="text-align: center">{{$u->semesters->name}}</td>
                    <td style="text-align: center">{{$u->years->name}}</td>
                    <td class="tabledit-toolbar-column" style="text-align: center;">
                        <a href="{{route('form.show', $u->id)}}" style="color: black; text-decoration: none;">
                            <button class="btn btn-success btn"><i class="fa-solid fa-eye fa-beat"></i></button>
                        </a>
                        <a href="{{route('form.edit', $u->id)}}">
                            <form action="{{ route('form.edit',  $u->id)}}" class="tabledit-edit-button btn btn primary waves-effect waves-light">
                                @csrf
                                @method('GET')
                                <button class="btn btn-primary btn" type="submit" id="del-confirm">
                                    <i class="fa-solid fa-pencil"></i>
                                </button>
                            </form>
                        </a>
                    </td>
                </tr>
            @endforeach
        @endcan
        </tbody>
        {{--    <tfoot>--}}
        {{--    <tr>--}}
        {{--        <th>Name</th>--}}
        {{--        <th>Position</th>--}}
        {{--        <th>Office</th>--}}
        {{--        <th>Age</th>--}}
        {{--        <th>Start date</th>--}}
        {{--        <th>Salary</th>--}}
        {{--    </tr>--}}
        {{--    </tfoot>--}}
    </table>
</div>


{{--toastr--}}
{{--<script>--}}
{{--    @if(Session::has('message'))--}}
{{--        toastr.options =--}}
{{--        {--}}
{{--            "closeButton" : true,--}}
{{--            "progressBar" : true--}}
{{--        }--}}
{{--    toastr.success("{{ session('message') }}");--}}
{{--    @endif--}}

{{--        @if(Session::has('error'))--}}
{{--        toastr.options =--}}
{{--        {--}}
{{--            "closeButton" : true,--}}
{{--            "progressBar" : true--}}
{{--        }--}}
{{--    toastr.error("{{ session('error') }}");--}}
{{--    @endif--}}

{{--        @if(Session::has('info'))--}}
{{--        toastr.options =--}}
{{--        {--}}
{{--            "closeButton" : true,--}}
{{--            "progressBar" : true--}}
{{--        }--}}
{{--    toastr.info("{{ session('info') }}");--}}
{{--    @endif--}}

{{--        @if(Session::has('warning'))--}}
{{--        toastr.options =--}}
{{--        {--}}
{{--            "closeButton" : true,--}}
{{--            "progressBar" : true--}}
{{--        }--}}
{{--    toastr.warning("{{ session('warning') }}");--}}
{{--    @endif--}}
{{--</script>--}}

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
{{--<script src="{{asset('client/login/js/jquery.min.js')}}"></script>--}}
{{--<script src="{{asset('client/login/js/popper.js')}}"></script>--}}
{{--<script src="{{asset('client/login/js/bootstrap.min.js')}}"></script>--}}
{{-- toastr js --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>

<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });
</script>
</body>
</html>
