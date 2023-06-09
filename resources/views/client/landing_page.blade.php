<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Snooze</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{asset('client/landing/assets/img/favicon.png')}}" rel="icon">
    <link href="{{asset('client/landing/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <!--    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">-->

    <!-- Vendor CSS Files -->
    <link href="{{asset('client/landing/assets/vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{asset('client/landing/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('client/landing/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('client/landing/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('client/landing/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{asset('client/landing/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{asset('client/landing/assets/css/style.css')}}" rel="stylesheet">

</head>

<body>
<style>
    .body {
        font-family: SansSerif, Arial, Calibri, Tahoma;
    }
    .card-header {
        border-bottom-color: transparent;
        box-shadow: 0 0 1px 0 rgba(0, 0, 0, 0.5);
        background-color: white;
    }
    .card-body {
        border-top-color: transparent;
        box-shadow: 0 0 1px 0 rgba(0, 0, 0, 0.5);
    }
</style>
<!-- ======= Header ======= -->
<header id="header" class="fixed-top header-transparent">
    <div class="container d-flex align-items-center justify-content-between">

        <div class="logo">
            <h1><a href="#">SNOOZE</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        </div>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="getstarted scrollto" href="{{route('user.getLogin')}}">Đăng nhập/ Đăng ký</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">

    <div class="container">
        <div class="row">
            <div class="col-lg-6 d-lg-flex flex-lg-column justify-content-center align-items-stretch pt-5 pt-lg-0 order-2 order-lg-1" data-aos="fade-up">
                <div>
                    <h1>Chào mừng bạn đến với Snooze</h1>
                    <h2>Snooze là nền tảng trực tuyến, cho phép sinh viên xin hoãn lại kỳ thi một cách nhanh chóng và thuận tiện</h2>
                    <nav id="navbar" class="navbar">
                        <a class="getstarted scrollto" style="font-size: 2vw;" href="{{route('user.getLogin')}}">Bắt đầu gửi đơn</a>
                    </nav>
                </div>
            </div>
            <div class="col-lg-6 d-lg-flex flex-lg-column align-items-stretch order-1 order-lg-2 hero-img" data-aos="fade-up">
                <img src="{{asset('client/landing/assets/img/hero-img.png')}}" class="img-fluid" alt="">
            </div>
        </div>
    </div>

</section><!-- End Hero -->

<main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
{{--        <section class="breadcrumbs">--}}
{{--            <div class="container">--}}

{{--                <div class="d-flex justify-content-between align-items-center">--}}
{{--                    <h2>Inner Page</h2>--}}
{{--                    <ol>--}}
{{--                        <li><a href="index.html">Home</a></li>--}}
{{--                        <li>Inner Page</li>--}}
{{--                    </ol>--}}
{{--                </div>--}}

{{--            </div>--}}
{{--        </section>--}}
    <!-- End Breadcrumbs Section -->

    <!-- ======= App Features Section ======= -->
    <section id="features" class="features">
        <div class="container">

            <div class="section-title card shadow p-3 mb-5 bg-white rounded">
                <h2>Về Snooze</h2>
                <p>
                    Với một giao diện thân thiện người dùng, trang web cung cấp một giải pháp toàn diện để đáp ứng những thay đổi trong kế hoạch của bạn, cho bạn thêm thời gian để giải quyết các vấn đề có thể ảnh hưởng đến việc tham gia kỳ thi.
                </p>
            </div>

            {{--            <div class="container">--}}
            {{--                <div class="card shadow p-3 mb-5 bg-white rounded" >--}}
            {{--                        <h2 class="card-title" style="color: #5777BA;"></h2>--}}
            {{--                        <br>--}}
            {{--                        <p class="card-text"></p>--}}
            {{--                        <p class="card-text"></p>--}}
            {{--                </div>--}}
            {{--            </div>--}}

        </div>
        <div class="container">
            <div class="row">
                <div class="col">
                    <h4 style="color: #5777BA;">B1:</h4>
                    <p>
                        Tạo tài với email, mật khẩu sẽ được gửi đến cho bạn.
                    </p>
                </div>
                <div class="col">
                    <h4 style="color: #5777BA;">B2:</h4>
                    <p>
                        Chọn nhóm, học phần mong muốn được hoãn và giảng viên phụ trách học phần.
                    </p>
                </div>
                <div class="col">
                    <h4 style="color: #5777BA;">B3:</h4>
                    <p>
                        Nêu lý do và thông tin bổ sung (nếu có).
                    </p>
                </div>
            </div>
        </div>
        <br><br>
        <div class="container section-title">
            <h4 style="color: #5777BA;">Liệu bạn có đang cảm thấy quá tải với những bài kiểm tra sắp tới? Hay bạn cần thêm thời gian để học?</h4>
            <p style="color: #5777BA;">Hoãn thi là giải pháp dành cho bạn</p><br>
            <a role="button" href="{{route('user.getLogin')}}" class="btn" style="background-color:#5777BA;color: white;">Gửi đơn</a>

        </div>
    </section>
    <!-- End App Features Section -->

{{--    <section class="inner-page section-title">--}}
{{--        <div class="container section-title">--}}
{{--            <h4 style="color: #5777BA;">Liệu bạn có đang cảm thấy quá tải với những bài kiểm tra sắp tới? Hay bạn cần thêm thời gian để học?</h4>--}}
{{--            <p style="color: #5777BA;">Hoãn thi là giải pháp dành cho bạn</p><br>--}}
{{--            <button type="button" class="btn" style="background-color:#5777BA;color: white;">Gửi đơn</button>--}}

{{--        </div>--}}

{{--    </section>--}}

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<footer id="footer">

    <!--    <div class="footer-newsletter">-->
    <!--        <div class="container">-->
    <!--            <div class="row justify-content-center">-->
    <!--                <div class="col-lg-6">-->
    <!--                    <h4>Join Our Newsletter</h4>-->
    <!--                    <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>-->
    <!--                    <form action="" method="post">-->
    <!--                        <input type="email" name="email"><input type="submit" value="Subscribe">-->
    <!--                    </form>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->

{{--    <div class="footer-top">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}

{{--                <div class="col-lg-3 col-md-6 footer-contact">--}}
{{--                    <h3>Appland</h3>--}}
{{--                    <p>--}}
{{--                        A108 Adam Street <br>--}}
{{--                        New York, NY 535022<br>--}}
{{--                        United States <br><br>--}}
{{--                        <strong>Phone:</strong> +1 5589 55488 55<br>--}}
{{--                        <strong>Email:</strong> info@example.com<br>--}}
{{--                    </p>--}}
{{--                </div>--}}

{{--                <div class="col-lg-3 col-md-6 footer-links">--}}
{{--                    <h4>Useful Links</h4>--}}
{{--                    <ul>--}}
{{--                        <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>--}}
{{--                        <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>--}}
{{--                        <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>--}}
{{--                        <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>--}}
{{--                        <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>--}}
{{--                    </ul>--}}
{{--                </div>--}}

{{--                <div class="col-lg-3 col-md-6 footer-links">--}}
{{--                    <h4>Useful Links</h4>--}}
{{--                    <ul>--}}
{{--                        <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>--}}
{{--                        <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>--}}
{{--                        <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>--}}
{{--                        <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>--}}
{{--                        <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>--}}
{{--                    </ul>--}}
{{--                </div>--}}

{{--                <div class="col-lg-3 col-md-6 footer-links">--}}
{{--                    <h4>Useful Links</h4>--}}
{{--                    <ul>--}}
{{--                        <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>--}}
{{--                        <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>--}}
{{--                        <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>--}}
{{--                        <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>--}}
{{--                        <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>--}}
{{--                    </ul>--}}
{{--                </div>--}}

{{--                <!--                <div class="col-lg-3 col-md-6 footer-links">-->--}}
{{--                <!--                    <h4>Our Services</h4>-->--}}
{{--                <!--                    <ul>-->--}}
{{--                <!--                        <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>-->--}}
{{--                <!--                        <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>-->--}}
{{--                <!--                        <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>-->--}}
{{--                <!--                        <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>-->--}}
{{--                <!--                        <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>-->--}}
{{--                <!--                    </ul>-->--}}
{{--                <!--                </div>-->--}}
{{--                <!---->--}}
{{--                <!--                <div class="col-lg-3 col-md-6 footer-links">-->--}}
{{--                <!--                    <h4>Our Social Networks</h4>-->--}}
{{--                <!--                    <p>Cras fermentum odio eu feugiat lide par naso tierra videa magna derita valies</p>-->--}}
{{--                <!--                    <div class="social-links mt-3">-->--}}
{{--                <!--                        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>-->--}}
{{--                <!--                        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>-->--}}
{{--                <!--                        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>-->--}}
{{--                <!--                        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>-->--}}
{{--                <!--                        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>-->--}}
{{--                <!--                    </div>-->--}}
{{--                <!--                </div>-->--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

    <div class="container py-4">
        <div class="copyright" style="color: #5777BA;">
            &copy; Nền tảng hoãn thi trực tuyến Snooze.
        </div>
{{--        <div class="credits">--}}
{{--            <!-- All the links in the footer should remain intact. -->--}}
{{--            <!-- You can delete the links only if you purchased the pro version. -->--}}
{{--            <!-- Licensing information: https://bootstrapmade.com/license/ -->--}}
{{--            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/free-bootstrap-app-landing-page-template/ -->--}}
{{--            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>--}}
{{--        </div>--}}
    </div>
</footer><!-- End Footer -->

{{--btn để trượt lên trên--}}
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="{{asset('client/landing/assets/vendor/aos/aos.js')}}"></script>
<script src="{{asset('client/landing/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('client/landing/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
<script src="{{asset('client/landing/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
<script src="{{asset('client/landing/assets/vendor/php-email-form/validate.js')}}"></script>

<!-- Template Main JS File -->
<script src="{{asset('client/landing/assets/js/main.js')}}"></script>

</body>

</html>
