<!doctype html>
<html lang="en">
<head>
{{--    Home này là landing page đó--}}
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="icon" type="image/x-icon" href={{asset('client/landing-page/assets/favicon.ico')}} />
    <title>Index</title>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href={{asset("client/landing-page/css/styles.css")}} rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet" crossorigin="anonymous">
</head>

<body id="page-top">
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
{{--        <a class="navbar-brand" href="#page-top"><img src="assets/img/navbar-logo.svg" alt="..." /></a>--}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars ms-1"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
{{--                <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>--}}
{{--                <li class="nav-item"><a class="nav-link" href="#portfolio">Portfolio</a></li>--}}
{{--                <li class="nav-item"><a class="nav-link" href="#about">About</a></li>--}}
                <li class="nav-item"><a class="nav-link" style="color: snow; font-family: 'Roboto Slab';" href="{{route('user.getLogin')}}">Login</a></li>
{{--                <li class="nav-item"><a class="btn btn-primary btn-xl text-uppercase" href="#services">Login</a></li>--}}
            </ul>
        </div>
    </div>
</nav>
<!-- Masthead-->
<header class="masthead ">
    <div class="container">
        <div class="masthead-subheading" style="color: black">Welcome To Our Website!</div>
        <div class="masthead-heading text-uppercase" style="color: black"><strong style="font-family: 'Roboto Slab'; color: snow;">This Is</strong> A Postpone Application</div>
        <a class="btn btn-outline-dark btn-xl text-uppercase" style="color: snow; font-family: 'Roboto Slab'"  href="{{route('user.getLogin')}}">CREATE NEW FORM</a>
    </div>
</header>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>
