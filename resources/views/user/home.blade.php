@extends('user.main.master')
@section('content_home')
    <!-- Support Company Start-->
    <div class="support-company-area fix">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-5 col-lg-5">
                    <div class="right-caption">
                        <!-- Section Tittle -->
                        <div class="section-tittle section-tittle2">
                            <span>PROFIL PERUSAHAAN</span>
                        </div>
                        <div class="support-caption">
                            <p class="pera-top">Didirikan pada tahun 2016, PT. DUNIA PRATAMA SEJAHTERA atau lebih di
                                kenal dengan Pusat Pneumatic adalah Importir dan Stockist Pneumatic,
                                Valves, Fittings & Pipes terkemuka di Indonesia. Menjadi distributor/agen
                                resmi produk RIH (Right Pneumatic) Pneumatic, PT. DUNIA PRATAMA
                                SEJAHTERA berkomitmen untuk menawarkan produk dengan kualitas
                                terbaik dengan layanan terbaik di industrinya. </p>
                            <a href="{{ route('cari_loker') }}" class="btn post-btn">Cari Lowongan</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7">
                    <div class="support-location-img">
                        <img src="{{ asset('images/hero-image.jpeg') }}" alt="">
                        <div class="support-img-cap p-4 text-center">
                            <p>Since</p>
                            <span>2016</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Support Company End-->

    <!-- How  Apply Process Start-->
    <div class="apply-process-area apply-bg mt-150 pt-70 pb-150"
        data-background="{{ asset('assets_home') }}/img/gallery/how-applybg.png">
        <div class="container">
            <!-- Section Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle white-text text-center">
                        <h3 class="mb-50 text-white"> PROSES MENDAFTAR </h3>
                    </div>
                </div>
            </div>
            <!-- Apply Process Caption -->
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single-process text-center mb-30">
                        <div class="process-ion">
                            <span class="flaticon-search"></span>
                        </div>
                        <div class="process-cap">
                            <h5>1. Masuk</h5>
                            <p>
                                Sebelum masuk anda harus mendaftar lalu silahkan masuk
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-process text-center mb-30">
                        <div class="process-ion">
                            <span class="flaticon-curriculum-vitae"></span>
                        </div>
                        <div class="process-cap">
                            <h5>2. Daftar Pekerjaan</h5>
                            <p>Setelah masuk anda cari pekerjaan di Fitur Cari Lowongan.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-process text-center mb-30">
                        <div class="process-ion">
                            <span class="flaticon-tour"></span>
                        </div>
                        <div class="process-cap">
                            <h5>3. Tunggu Panggilan</h5>
                            <p>Lalu silahkan mendaftar sesuai kriteria anda, lalu tunggu panggilan dari HRD.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- How  Apply Process End-->
@endsection
