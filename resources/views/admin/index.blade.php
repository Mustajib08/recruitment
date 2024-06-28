@extends('admin.layouts.main')
@section('content_admin')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                    <i class="mdi mdi-home"></i>
                </span> Dashboard
            </h3>
        </div>
        <div class="row">
            <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-danger card-img-holder text-white">
                    <div class="card-body">
                        <img src="{{ asset('asset_admin') }}/images/dashboard/circle.svg" class="card-img-absolute"
                            alt="circle-image" />
                        <h4 class="font-weight-normal mb-3">Total Loker <i
                                class="mdi mdi-chart-line mdi-24px float-right"></i>
                        </h4>
                        <h2 class="mb-5">{{ $total_loker }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-info card-img-holder text-white">
                    <div class="card-body">
                        <img src="{{ asset('asset_admin') }}/images/dashboard/circle.svg" class="card-img-absolute"
                            alt="circle-image" />
                        <h4 class="font-weight-normal mb-3">Total Pelamar <i
                                class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
                        </h4>
                        <h2 class="mb-5">{{ $total_pelamar }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-success card-img-holder text-white">
                    <div class="card-body">
                        <img src="{{ asset('asset_admin') }}/images/dashboard/circle.svg" class="card-img-absolute"
                            alt="circle-image" />
                        <h4 class="font-weight-normal mb-3">Total Akun <i
                                class="mdi mdi-account-multiple-outline mdi-24px float-right"></i>
                        </h4>
                        <h2 class="mb-5">{{ $total_akun }}</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-header pt-3 bg-gradient-secondary">
                        <h4>Data Admin</h4>
                    </div>
                    <div class="card-body px-0">
                        <div class="table-responsive" style="margin-top: -30px">
                            <table class="table table-striped">
                                <thead class="">
                                    <tr class="text-center">
                                        <th class="fw-bold"> Nama </th>
                                        <th class="fw-bold"> Nomor Telepon </th>
                                        <th class="fw-bold"> Username </th>
                                        <th class="fw-bold"> Level </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr class="text-center">
                                            <td>
                                                {{ $user->nama }}
                                            </td>
                                            <td> {{ $user->nomor_telepon }} </td>
                                            <td>
                                                {{ $user->username }}
                                            </td>
                                            <td> {{ $user->level }} </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
