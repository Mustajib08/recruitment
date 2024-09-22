@extends('admin.layouts.main')
@section('content_admin')
    <div class="content-wrapper">
        <!-- Modal Konfirmasi -->
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                    <i class="mdi mdi-home"></i>
                </span> Detail Lowongan Kerja
            </h3>
        </div>

        <!-- modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Apakah Anda Yakin {{ $pelamar->user->nama }} DiTambahkan Sebagai Kandidat Terpilih ?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="forms-sample" method="post" action="{{ route('update_status_pelamar') }}">
                            @csrf
                            <input type="hidden" name="status" value="accepted">
                            <input type="hidden" name="pelamar_id" value="{{$pelamar->id}}">
                            <button type="submit" class="btn btn-gradient-primary me-2 float-end">Terima {{ $pelamar->user->nama }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- reject modal -->
        <div class="modal fade" id="staticBackdropReject" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Apakah Anda Yakin {{ $pelamar->user->nama }} Belum Sesuai ?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="forms-sample" method="post" action="{{ route('update_status_pelamar') }}">
                            @csrf
                            <input type="hidden" name="status" value="rejected">
                            <input type="hidden" name="pelamar_id" value="{{$pelamar->id}}">
                            <button type="submit" class="btn btn-danger me-2 float-end">Tolak {{ $pelamar->user->nama }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end modal -->
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
                                <div style="display: flex; justify-content:end">
                                @if ($pelamar->status == 'accepted' || $pelamar->status == 'pending')
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdropReject" class="btn btn-danger btn-sm mt-0 mb-3" style="margin-right: 10px !important;"><i
                                        class="mdi mdi-close"></i>Belum Sesuai
                                    </button>  
                                @endif
                                @if ($pelamar->status == 'rejected' || $pelamar->status == 'pending')
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn btn-primary btn-sm mt-0 mb-3"><i
                                        class="mdi mdi-plus"></i>Terima
                                    </button>   
                                @endif
                                </div>
                                <div class="table-responsive-sm">
                                    <table class="table table-sm table-hover">
                                        <tr>
                                            <td class="text-muted">Terakhir Diperbarui</td>
                                            <td class="text-muted">: {{ $pelamar->created_at->diffForHumans() }}</td>
                                        </tr>
                                        <tr>
                                            <td>Nama Pelamar</td>
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
                                            <td>Status</td>
                                            @if ($pelamar->status == 'pending')
                                            <td>: <span style="background-color: yellow; padding:5px; border-radius:10px;">{{ $pelamar->status }}</span></td>
                                            @endif
                                            @if ($pelamar->status == 'rejected')
                                            <td>: <span style="background-color: salmon; padding:5px; border-radius:10px;">{{ $pelamar->status }}</span></td>
                                            @endif
                                            @if ($pelamar->status == 'accepted')
                                            <td>: <span style="background-color: greenyellow; padding:5px; border-radius:10px;">{{ $pelamar->status }}</span></td>
                                            @endif

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


@push('script')
    <script>
        $(document).ready(function() {
            $('#form_terima_kandidat').submit(function(event) {
                // Jika ingin validasi custom, tambahkan di sini
                // Misalnya alert untuk konfirmasi manual

                return true; // Pastikan form tetap dikirim
            });
        });

    </script>
@endpush



