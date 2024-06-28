<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Job board HTML-5 Template </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('assets_home') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets_home') }}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('assets_home') }}/css/price_rangs.css">
    <link rel="stylesheet" href="{{ asset('assets_home') }}/css/flaticon.css">
    <link rel="stylesheet" href="{{ asset('assets_home') }}/css/slicknav.css">
    <link rel="stylesheet" href="{{ asset('assets_home') }}/css/animate.min.css">
    <link rel="stylesheet" href="{{ asset('assets_home') }}/css/magnific-popup.css">
    <link rel="stylesheet" href="{{ asset('assets_home') }}/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="{{ asset('assets_home') }}/css/themify-icons.css">
    <link rel="stylesheet" href="{{ asset('assets_home') }}/css/slick.css">
    <link rel="stylesheet" href="{{ asset('assets_home') }}/css/nice-select.css">
    <link rel="stylesheet" href="{{ asset('assets_home') }}/css/style.css">

    <style>
        .nice-select swal2-select {
            display: none !important;
        }
    </style>
</head>

<body>
    @include('sweetalert::alert')
    <!-- Preloader Start -->
    <header>
        <!-- Header Start -->
        @include('user.main.layouts.header')
        <!-- Header End -->
    </header>

    <main>
        <!-- Job List Area Start -->
        <div class="job-listing-area pt-30 pb-20">
            <div class="container">
                @yield('content_user')
            </div>
        </div>
        <!-- Job List Area End -->

        @section('content_home')
        @show
    </main>
    <footer>
        <!-- Footer Start-->
        <div class="footer-area footer-bg pt-70">
            <div class="container">
                <div class="row d-flex justify-content-between">
                    <div class="col-xl-6 col-lg-6 col-md-4 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="single-footer-caption mb-30">
                                <div class="footer-tittle">
                                    <h4>Tentang Kami</h4>
                                    <div class="footer-pera">
                                        <p>PT. Dunia Pratama Sejahtera, didirikan pada tahun 2016, dikenal sebagai Pusat
                                            Pneumatic. Sebagai importir dan distributor resmi produk RIH, perusahaan ini
                                            menyediakan produk pneumatic, valve, fitting, dan pipa dengan komitmen
                                            terhadap kualitas dan layanan terbaik..</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-4 col-sm-5">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Hubungi Kami</h4>
                                <ul>
                                    <li>
                                        <p>Alamat :Jalan Karyawan Blok A 12 RT 008 / RW 012, Wijaya Kusuma, Grogol
                                            Petamburan, Jakarta Barat 11460.</p>
                                    </li>
                                    <li>Telepon : 021-21252631</li>
                                    <li>Email : sales.duniapratama@gmail.com</li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer-bottom area -->
        <div class="footer-bottom-area footer-bg">
            <div class="container">
                <div class="footer-border">
                    <div class="row d-flex justify-content-between align-items-center">
                        <div class="col-xl-10 col-lg-10 ">
                            <div class="footer-copy-right">
                                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                    Copyright &copy;
                                    RecruitmentApp
                                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                </p>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2">
                            <div class="footer-social f-right">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fas fa-globe"></i></a>
                                <a href="#"><i class="fab fa-behance"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End-->
    </footer>

    <!-- JS here -->

    <!-- All JS Custom Plugins Link Here here -->
    <script src="{{ asset('assets_home') }}/js/vendor/modernizr-3.5.0.min.js"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="{{ asset('assets_home') }}/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="{{ asset('assets_home') }}/js/popper.min.js"></script>
    <script src="{{ asset('assets_home') }}/js/bootstrap.min.js"></script>
    <!-- Jquery Mobile Menu -->
    <script src="{{ asset('assets_home') }}/js/jquery.slicknav.min.js"></script>

    <!-- Jquery Slick , Owl-Carousel Range -->
    <script src="{{ asset('assets_home') }}/js/owl.carousel.min.js"></script>
    <script src="{{ asset('assets_home') }}/js/slick.min.js"></script>
    <script src="{{ asset('assets_home') }}/js/price_rangs.js"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="{{ asset('assets_home') }}/js/wow.min.js"></script>
    <script src="{{ asset('assets_home') }}/js/animated.headline.js"></script>
    <script src="{{ asset('assets_home') }}/js/jquery.magnific-popup.js"></script>

    <!-- Scrollup, nice-select, sticky -->
    <script src="{{ asset('assets_home') }}/js/jquery.scrollUp.min.js"></script>
    <script src="{{ asset('assets_home') }}/js/jquery.nice-select.min.js"></script>
    <script src="{{ asset('assets_home') }}/js/jquery.sticky.js"></script>

    <!-- contact js -->
    {{-- <script src="{{ asset('assets_home') }}/js/contact.js"></script>
        <script src="{{ asset('assets_home') }}/js/jquery.form.js"></script>
        <script src="{{ asset('assets_home') }}/js/jquery.validate.min.js"></script>
        <script src="{{ asset('assets_home') }}/js/mail-script.js"></script>
        <script src="{{ asset('assets_home') }}/js/jquery.ajaxchimp.min.js"></script> --}}

    <!-- Jquery Plugins, main Jquery -->
    <script src="{{ asset('assets_home') }}/js/plugins.js"></script>
    <script src="{{ asset('assets_home') }}/js/main.js"></script>


    @stack('script_user')

</body>

</html>
