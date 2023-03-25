@extends('client.layouts.app')
@section('content')

    <!--====== PRELOADER PART START ======-->

    <div class="preloader">
        <div class="loader">
            <div class="ytp-spinner">
                <div class="ytp-spinner-container">
                    <div class="ytp-spinner-rotator">
                        <div class="ytp-spinner-left">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                        <div class="ytp-spinner-right">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--====== PRELOADER PART ENDS ======-->
    
    <!--====== NAVBAR TWO PART START ======-->

    <section class="navbar-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg">
                       
                        {{-- <a class="navbar-brand" href="#">
                            <img src="{{asset('client/assets/images/logo.svg')}}" alt="Logo">
                        </a> --}}
                        
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTwo" aria-controls="navbarTwo" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarTwo">
                            <ul class="navbar-nav m-auto">
                                <li class="nav-item active"><a class="page-scroll" href="#home">Home</a></li>
                                <li class="nav-item"><a class="page-scroll" href="{{route('login')}}">Login</a></li>
                                {{-- <li class="nav-item"><a class="page-scroll" href="#portfolio">Register</a></li> --}}
                                {{-- <li class="nav-item"><a class="page-scroll" href="#pricing">Pricing</a></li>
                                <li class="nav-item"><a class="page-scroll" href="#about">About</a></li>
                                <li class="nav-item"><a class="page-scroll" href="#team">Team</a></li>
                                <li class="nav-item"><a class="page-scroll" href="#contact">Contact</a></li> --}}
                            </ul>
                        </div>
                        
                        {{-- <div class="navbar-btn d-none d-sm-inline-block">
                            <ul>
                                <li><a class="solid" href="#">Login</a></li>
                            </ul>
                        </div> --}}
                    </nav> <!-- navbar -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== NAVBAR TWO PART ENDS ======-->
        <!--====== SLIDER PART START ======-->

        <section id="home" class="slider_area">
            <div id="carouselThree" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselThree" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselThree" data-slide-to="1"></li>
                    <li data-target="#carouselThree" data-slide-to="2"></li>
                </ol>
    
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="slider-content">
                                        <h1 class="title">ONLINE POSTPONE IS NOW AVAILABLE</h1>
                                        {{-- <p class="text">We blend insights and strategy to create digital products for forward-thinking organisations.</p> --}}
                                        <ul class="slider-btn rounded-buttons">
                                            <li><a class="main-btn rounded-one" href="{{route('login')}}">GET STARTED</a></li>
                                            {{-- <li><a class="main-btn rounded-two" href="#">DOWNLOAD</a></li> --}}
                                        </ul>
                                    </div>
                                </div>
                            </div> <!-- row -->
                        </div> <!-- container -->
                        <div class="slider-image-box d-none d-lg-flex align-items-end">
                            <div class="slider-image">
                                <img src="{{asset('client/assets/images/slider/3.png')}}" alt="Hero">
                            </div> <!-- slider-imgae -->
                        </div> <!-- slider-imgae box -->
                    </div> <!-- carousel-item -->
    
                    <div class="carousel-item">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="slider-content">
                                        <h1 class="title">CREATE A FORM</h1>
                                        {{-- <p class="text">We blend insights and strategy to create digital products for forward-thinking organisations.</p> --}}
                                        <ul class="slider-btn rounded-buttons">
                                            <li><a class="main-btn rounded-one" href="{{route('login')}}">GET STARTED</a></li>
                                            {{-- <li><a class="main-btn rounded-two" href="#">DOWNLOAD</a></li> --}}
                                        </ul>
                                    </div> <!-- slider-content -->
                                </div>
                            </div> <!-- row -->
                        </div> <!-- container -->
                        <div class="slider-image-box d-none d-lg-flex align-items-end">
                            <div class="slider-image">
                                <img src="{{asset('client/assets/images/slider/1.png')}}" alt="Hero">
                            </div> <!-- slider-imgae -->
                        </div> <!-- slider-imgae box -->
                    </div> <!-- carousel-item -->
    
                    <div class="carousel-item">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="slider-content">
                                        <h1 class="title">WE'LL HANLE IT FAST</h1>
                                        {{-- <p class="text">We blend insights and strategy to create digital products for forward-thinking organisations.</p> --}}
                                        <ul class="slider-btn rounded-buttons">
                                            <li><a class="main-btn rounded-one" href="{{route('login')}}">GET STARTED</a></li>
                                            {{-- <li><a class="main-btn rounded-two" href="#">DOWNLOAD</a></li> --}}
                                        </ul>
                                    </div> <!-- slider-content -->
                                </div>
                            </div> <!-- row -->
                        </div> <!-- container -->
                        <div class="slider-image-box d-none d-lg-flex align-items-end">
                            <div class="slider-image">
                                <img src="{{asset('client/assets/images/slider/2.png')}}" alt="Hero">
                            </div> <!-- slider-imgae -->
                        </div> <!-- slider-imgae box -->
                    </div> <!-- carousel-item -->
                </div>
    
                <a class="carousel-control-prev" href="#carouselThree" role="button" data-slide="prev">
                    <i class="lni lni-arrow-left"></i>
                </a>
                <a class="carousel-control-next" href="#carouselThree" role="button" data-slide="next">
                    <i class="lni lni-arrow-right"></i>
                </a>
            </div>
        </section>
    
        <!--====== SLIDER PART ENDS ======-->
        


<script>
    var top = ($('.content-nav').offset() || { "top": NaN }).top;
if (isNaN(top)) {
    alert("something is wrong, no top");
} else {
    alert(top);
}
</script>
@endsection