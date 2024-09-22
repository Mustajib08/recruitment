<div class="header-area header-transparrent">
    <div class="headder-top header-sticky">
        <div class="container">
            <div class="row align-items-center pt-10">
                <div class="col-lg-3 col-md-2">
                    <!-- Logo -->
                    <div class="logo">
                        {{-- <a href="{{ url('/') }}"><img src="{{ asset('assets_home') }}/img/logo/logo.png"
                                alt=""></a> --}}
                        <a href="{{ url('/') }}"><img src="{{ asset('images/logo.png') }}" class="w-75 ml-50"
                                alt=""></a>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9">
                    <div class="menu-wrapper">
                        <div class="main-menu">
                            <nav class="d-none d-lg-block">
                                <ul id="navigation">
                                    <li><a href="{{ url('/') }}">Beranda</a></li>
                                    <li><a href="{{ route('cari_loker') }}">Cari Lowongan </a></li>
                                    <li>
                                        <div class="dropdown show">
                                            <div class="" style="cursor: pointer;" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-bell" viewBox="0 0 16 16">
                                                <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2M8 1.918l-.797.161A4 4 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4 4 0 0 0-3.203-3.92zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5 5 0 0 1 13 6c0 .88.32 4.2 1.22 6"/>
                                            </svg>
                                            @if (auth()->user() && count(auth()->user()->notifications) > 0)
                                            <div class="bg-primary text-white" style="border-radius: 100%; width:13px;height:13px; font-size:xx-small; position:absolute; top:0; right:-8px; text-align:center">{{count(auth()->user()->notifications)}}</div>
                                            @endif
                                            </div>

                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="height: 300px; width: 350px; overflow: auto;">
                                            @if (auth()->user()) 
                                                @foreach (auth()->user()->notifications as $notification)
                                                    <div class="dropdown-item" style="font-size: 12px; margin: 0; padding: 5px; word-wrap: break-word;">
                                                        <b>{{ \Carbon\Carbon::parse($notification->created_at)->format('d M Y H:i') }}</b><br>
                                                        @if (str_contains($notification->description, 'accepted'))
                                                            Selamat Anda Di Terima Untuk Posisi {{ $notification->loker_name }}, Admin <br>
                                                            Akan Segera Menghubungi Anda Melalui Whatsapp/Email.
                                                        @else
                                                            Untuk Saat Ini Anda Belum Sesuai Untuk Posisi {{ $notification->loker_name }}.<br>
                                                        @endif
                                                        <hr style="margin: 5px 0;">
                                                    </div>
                                                @endforeach
                                            @endif
                                            </div>




                                        </div>
                                    </li>
                                </ul>
                            </nav>
                        </div>

                        <div class="ml-auto header-btn d-none f-right d-lg-block">
                            @auth
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button type="submit" class="p-3 px-5 rounded btn head-btn2"><i
                                            class="fas fa-sign-out-alt"></i>
                                        Keluar</button>
                                </form>
                            @else
                                <a href="{{ route('register') }}" class="btn head-btn1">Daftar</a>
                                <a href="{{ route('login') }}" class="btn head-btn2">Masuk</a>
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
