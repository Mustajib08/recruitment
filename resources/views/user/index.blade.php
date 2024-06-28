@extends('user.main.master')
@section('content_user')
    <div class="row">
        <!-- Left content -->
        <div class="col-xl-3 col-lg-3 col-md-4">
            <div class="row">
                <div class="col-12">
                    <div class="small-section-tittle2 mb-45">
                        <div class="ion"> <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="20px" height="12px">
                                <path fill-rule="evenodd" fill="rgb(27, 207, 107)"
                                    d="M7.778,12.000 L12.222,12.000 L12.222,10.000 L7.778,10.000 L7.778,12.000 ZM-0.000,-0.000 L-0.000,2.000 L20.000,2.000 L20.000,-0.000 L-0.000,-0.000 ZM3.333,7.000 L16.667,7.000 L16.667,5.000 L3.333,5.000 L3.333,7.000 Z" />
                            </svg>
                        </div>
                        <h4>Filter Lowongan</h4>
                    </div>
                </div>
            </div>
            <!-- Job Category Listing start -->
            <div class="job-category-listing mb-50">
                <!-- single one -->
                <div class="single-listing pb-10">
                    <div class="small-section-tittle2">
                        <h4>Kategori Pekerjaan</h4>
                    </div>
                    <form action="">
                        <!-- Select job items start -->
                        <div class="select-job-items2">
                            <select name="kategori" id="optionKategori">
                                <option value="">Kategori</option>
                                @foreach ($kategori_lokers as $kategori_loker)
                                    <option value="{{ $kategori_loker->id }}">
                                        {{ $kategori_loker->kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn w-100 py-4 rounded mt-3">Cari</button>
                    </form>
                </div>
            </div>
            <!-- Job Category Listing End -->
        </div>
        <!-- Right content -->
        <div class="col-xl-9 col-lg-9 col-md-8">
            <!-- Featured_job_start -->
            <section class="featured-job-area">
                <div class="container">
                    <!-- Count of Job list Start -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="count-job mb-35">
                                <span>{{ $lokers->count() }} Lowongan Tersedia</span>
                                <!-- Select job items start -->
                                {{-- <div class="select-job-items">
                                    <span>Sort by</span>
                                    <select name="select">
                                        <option value="">None</option>
                                        <option value="">Full Time</option>
                                        <option value="">Part Time</option>
                                    </select>
                                </div> --}}
                                <!--  Select job items End-->
                            </div>
                        </div>
                    </div>
                    <!-- Count of Job list End -->

                    <!-- single-job-content -->
                    @foreach ($lokers as $loker)
                        <div class="single-job-items mb-30">
                            <div class="job-items">
                                <div class="company-img">
                                    <a href="#"><img src="{{ asset('assets_home') }}/img/icon/job-list1.png"
                                            alt=""></a>
                                </div>
                                <div class="job-tittle job-tittle2">
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
                            <div class="items-link items-link2 f-right">
                                <a href="{{ route('detail_loker_user', $loker->id) }}">Detail</a>
                                <span>{{ $loker->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{ $lokers->links() }}

                <!--Pagination Start  -->
                {{-- <div class="pagination-area pb-115 text-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="single-wrap d-flex justify-content-end ">
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination justify-content-start">
                                            <li class="page-item active"><a class="page-link" href="#">01</a></li>
                                            <li class="page-item"><a class="page-link" href="#">02</a></li>
                                            <li class="page-item"><a class="page-link" href="#">03</a></li>
                                            <li class="page-item"><a class="page-link" href="#"><span
                                                        class="ti-angle-right"></span></a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <!--Pagination End  -->
            </section>
            <!-- Featured_job_end -->
        </div>
    </div>
@endsection
