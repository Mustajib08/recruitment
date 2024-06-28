@extends('admin.layouts.main')
@section('content_admin')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                    <i class="mdi mdi-home"></i>
                </span> Detail Lowongan Kerja
            </h3>
        </div>
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="row g-0">
                        <div class="col-md-4 text-center">
                            <img src="https://cdn-icons-png.freepik.com/512/64/64096.png"
                                class="img-fluid rounded-start py-5 w-75">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <div class="table-responsive-sm">
                                    <table class="table table-sm table-hover">
                                        <tr>
                                            <td class="text-muted">Terakhir Diperbarui</td>
                                            <td class="text-muted">: {{ $pelamar->created_at->diffForHumans() }}</td>
                                        </tr>
                                        <tr>
                                            <td>Nama Loker</td>
                                            <td>: {{ $pelamar->user->nama }}</td>
                                        </tr>
                                        <tr>
                                            <td>Nomor Telepon</td>
                                            <td>: {{ $pelamar->user->nomor_telepon }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Loker yang dilamar</td>
                                            <td>: {{ $pelamar->loker->nama_loker }}</td>
                                        </tr>
                                        <tr>
                                            <td>Kategori Loker</td>
                                            <td>: {{ $pelamar->loker->kategori_loker->kategori }}</td>
                                        </tr>
                                        <tr>
                                            <td>Salari</td>
                                            <td>: Rp. {{ $pelamar->loker->salary }}</td>
                                        </tr>
                                        <tr>
                                            <td>Curiculum Vitae</td>
                                            <td>:

                                                <a target="_blank"
                                                    href="{{ asset('storage/' . $pelamar->cv_user) }}">Buka</a>

                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title ">
                            <h4 class="mt-1">Pertanyaan Pelamar</h4>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr class="text-center">
                                        <th width="20"> No. </th>
                                        <th width="750"> Pertanyaan </th>
                                        <th width="750"> Jawaban </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pertanyaan_jawaban as $pj)
                                        <tr>
                                            <td>{{ $loop->iteration }}.</td>
                                            <td>{{ $pj->pertanyaan }}</td>
                                            <td>

                                                @if (!empty($pj->jawaban['jawaban']) != [])
                                                    {{ $pj->jawaban['jawaban'] }}
                                                @else
                                                    <div class="text-center text-danger"><i>jawaban belum dijawab</i></div>
                                                @endif

                                            </td>
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
