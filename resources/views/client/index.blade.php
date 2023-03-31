<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="icon" type="image/x-icon" href={{asset('client/landing-page/assets/favicon.ico')}} />
    <title>Index</title>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
{{--    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />--}}
{{--    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />--}}
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href={{asset("client/landing-page/css/styles.css")}} rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet" crossorigin="anonymous">
</head>
<body id="page-top">
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark " id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="#page-top" style="color: black !important; font-family: Roboto Slab;">Postpone App</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars ms-1"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                <li class="nav-item"><a class="nav-link " style="color: black !important;  font-family: Roboto Slab" href="{{route('form.create')}}">Create new form</a></li>

                {{--                trang chủ sẽ là form list--}}
                {{--                <li class="nav-item"><a class="nav-link" href="#portfolio">Form list</a></li>--}}
                <li class="nav-item"> <a class="nav-link" style="color: black !important;  font-family: Roboto Slab" href="{{route('user.getLogout')}}">Sign out</a></li>

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

<!-- Masthead-->
<div class="container">
<table id="example" class="table table-striped" style="width:100%">
    <thead>
    <tr>
        <th style="width:10px; !important">#</th>
        <th>Subject</th>
        <th>Professor</th>
        <th>Result</th>
        <th>Point</th>
        <th>Semester</th>
        <th>Year</th>
    </tr>
    </thead>
    <tbody>
    @foreach($app as $u)
        <tr>
            <td style="width:10px;">{{ $u->id}}</td>
            <td>{{ $u->subject->name ?? "None" }}</td>
            <td>{{ $u->teach->name}}</td>
            <td>{!! $u->result ?? "None" !!}</td>
            <td>{{$u->point}}</td>
            <td>{{$u->semesters->name}}</td>
            <td>{{$u->years->name}}</td>
            <td class="tabledit-toolbar-column" style="text-align: center;">
                <a href="{{route('postponse_apps.edit', $u->id)}}">
                    <form action="{{ route('postponse_apps.edit',  $u->id)}}" class="tabledit-edit-button btn btn primary waves-effect waves-light">
                        @csrf
                        @method('GET')
                        <button class="btn btn-primary btn" type="submit" id="del-confirm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                            </svg>
                        </button>
                    </form></a>
                <a href="{{route("postponse_apps.destroy",$u->id)}}"  onclick="return confirm('Are you sure you want to delete?')">
                    <form action="{{route("postponse_apps.destroy",$u->id)}}" method="post" class="tabledit-edit-button btn btn primary waves-effect waves-light float-left">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn" type="submit" onclick="delete_confirm()">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/></svg>
                        </button>
                    </form>
                </a>
            </td>
        </tr>
    @endforeach
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


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script>
    if(typeof jQuery!=='undefined'){
        console.log('jQuery Loaded');
    }
    else{
        console.log('not loaded yet');
    }

</script>
<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });
</script>
</body>
</html>
