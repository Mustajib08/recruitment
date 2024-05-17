@extends('user.main.master')
@section('content_user')
    <div class="job-post-company pt-20 pb-120">
        <div class="container">
            <div class="row justify-content-between">
                <!-- Left Content -->
                <div class="col-xl-7 col-lg-8">
                    <!-- job single -->
                    <div class="single-job-items mb-50">
                        <div class="job-items">
                            <div class="company-img company-img-details">
                                <a href="#"><img src="{{ asset('assets_home/img/icon/job-list1.png') }}"
                                        alt=""></a>
                            </div>
                            <div class="job-tittle">
                                <a href="#">
                                    <h4>{{ $loker->nama_loker }}</h4>
                                </a>
                                <ul>
                                    <li>{{ $loker->kategori_loker->kategori }}</li>
                                    <li>2 Orang</li>
                                    <li>{{ $loker->salary }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- job single End -->

                    <div class="job-post-details">
                        <div class="post-details1 mb-50">
                            <!-- Small Section Tittle -->
                            <div class="small-section-tittle">
                                <h4>Job Description</h4>
                            </div>
                            <p>{!! $loker->deskripsi_loker !!}</p>
                        </div>
                    </div>

                </div>
                <!-- Right Content -->
                <div class="col-xl-4 col-lg-4">
                    <div class="post-details3  mb-50">
                        <!-- Small Section Tittle -->
                        <div class="small-section-tittle">
                            <h4>Job Overview</h4>
                        </div>
                        <ul>
                            <li>Posted date : <span>{{ $loker->created_at->diffForHumans() }}</span></li>
                            <li>Location : <span>New York</span></li>
                            <li>Vacancy : <span>02 Orang</span></li>
                            <li>Job nature : <span>Full time</span></li>
                            <li>Salary : <span>Rp. {{ $loker->salary }}</span></li>
                            <li>Dibuka : <span>{{ $loker->tanggal_buka }}</span></li>
                            <li>Berakhir : <span>{{ $loker->tanggal_tutup }}</span></li>
                        </ul>
                        <div class="apply-btn2">
                            <a href="#" class="btn">Apply Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
