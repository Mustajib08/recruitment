<div class="header-area header-transparrent">
    <div class="headder-top header-sticky">
        <div class="container">
            <div class="row align-items-center pt-10">
                <div class="col-lg-3 col-md-2">
                    <!-- Logo -->
                    <div class="logo">
                        <a href="{{ url('/') }}"><img src="{{ asset('assets_home') }}/img/logo/logo.png"
                                alt=""></a>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9">
                    <div class="menu-wrapper">
                        <div class="main-menu">
                            <nav class="d-none d-lg-block">
                                <ul id="navigation">
                                    <li><a href="{{ url('/') }}">Home</a></li>
                                    <li><a href="{{ route('cari_loker') }}">Find a Jobs </a></li>
                                </ul>
                            </nav>
                        </div>

                        <div class="ml-auto header-btn d-none f-right d-lg-block">
                            @auth
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button type="submit" class="p-3 px-5 rounded btn head-btn2"><i
                                            class="fas fa-sign-out-alt"></i>
                                        Logout</button>
                                </form>
                            @else
                                <a href="{{ route('register') }}" class="btn head-btn1">Register</a>
                                <a href="{{ route('login') }}" class="btn head-btn2">Login</a>
                            @endauth

                        </div>
                    </div>
                </div>
                <!-- Mobile Menu -->
                <div class="col-12">
                    <div class="mobile_menu d-block d-lg-none"></div>
                </div>
            </div>
        </div>
    </div>
</div>
