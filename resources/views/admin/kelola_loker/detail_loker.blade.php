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
                        <div class="col-md-4">
                            <img src="https://www.virtualofficeku.co.id/wp-content/uploads/2020/06/cara-membuat-kesan-pertama-yang-baik-dengan-ruang-kantor.jpg"
                                class="img-fluid rounded-start">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <div class="table-responsive-sm">
                                    <table class="table table-sm table-hover">
                                        <tr>
                                            <td class="text-muted">Terakhir Diperbarui</td>
                                            <td class="text-muted">: {{ $loker->created_at->diffForHumans() }}</td>
                                        </tr>
                                        <tr>
                                            <td>Nama Loker</td>
                                            <td>: {{ $loker->nama_loker }}</td>
                                        </tr>
                                        <tr>
                                            <td>Kategori</td>
                                            <td>: {{ $loker->kategori_loker->kategori }}</td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal Dibuka</td>
                                            <td>: {{ $loker->tanggal_buka }}</td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal Berakhir</td>
                                            <td>: {{ $loker->tanggal_tutup }}</td>
                                        </tr>
                                        <tr>
                                            <td>Salari</td>
                                            <td>: Rp. {{ $loker->salary }}</td>
                                        </tr>
                                        <tr>
                                            <td>Tipe Pekerjaan</td>
                                            <td>: {{ $loker->tipe_bekerja }}</td>
                                        </tr>
                                        <tr>
                                            <td>Deskripsi</td>
                                            <td>{!! $loker->deskripsi_loker !!}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        {{-- pertanyaan buat pelamar --}}
        <div class="row" id="cardPertanyaan">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex">
                            <h4 class="mt-1">Pertanyaan Pelamar</h4>
                            <a href="#" class="btn btn-sm btn-primary align-items-center ms-auto"
                                data-bs-toggle="modal" data-bs-target="#modalTambahPertanyaan">Tambah
                                Pertanyaan</a>
                        </div>


                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr class="text-center">
                                        <th width="20"> No. </th>
                                        <th width="750"> Pertanyaan </th>
                                        <th> Aksi </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($pertanyaans->count() > 0)
                                        @foreach ($pertanyaans as $pertanyaan)
                                            <tr>
                                                <td class="text-center">
                                                    {{ $loop->iteration }}.
                                                </td>
                                                <td>
                                                    {{ $pertanyaan->pertanyaan }}
                                                </td>
                                                <td class="text-center">
                                                    <div class="btn-group btn-group-sm" role="group">
                                                        <button type="button" class="btn btn-success tombolEdit"
                                                            data-pertanyaan="{{ $pertanyaan->pertanyaan }}"
                                                            data-idpertanyaan="{{ $pertanyaan->id }}" id="tombolEdit"
                                                            data-bs-toggle="modal" data-bs-target="#modalEdit"><i
                                                                class="mdi mdi-tooltip-edit"></i></button>

                                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                            data-bs-target="#modalDelete{{ $pertanyaan->id }}"><i
                                                                class="mdi mdi-delete"></i></button>
                                                    </div>
                                                </td>
                                            </tr>

                                            {{-- modal delete --}}
                                            <div class="modal fade" id="modalDelete{{ $pertanyaan->id }}"
                                                data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                                aria-labelledby="modalDeleteLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-danger">
                                                            <h4 class="modal-title text-white" id="modalDeleteLabel">
                                                                Konfirmasi <i class="mdi mdi-comment-question-outline"></i>
                                                            </h4>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form class="forms-sample" method="post"
                                                                action="{{ route('proses_delete_pertanyaan') }}">
                                                                @csrf
                                                                @method('DELETE')
                                                                Apakah Anda Yakin Ingin Menghapus Pertanyaan ?
                                                                <input type="hidden" name="delete_pertanyaan"
                                                                    value="{{ $pertanyaan->id }}">
                                                                <input type="hidden" name="id_loker"
                                                                    value="{{ $loker->id }}">
                                                                <button type="submit"
                                                                    class="btn btn-sm btn-danger me-2 mt-4 float-end"><i
                                                                        class="mdi mdi-delete"></i> Hapus</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="10" class="text-center">
                                                <i>data tidak ditemukan</i>
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- end pertanyaan buat pelamar --}}
    </div>
@endsection

@push('modal')
    {{-- tambah pertanyaan --}}
    <div class="modal fade" id="modalTambahPertanyaan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="modalTambahPertanyaanLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTambahPertanyaanLabel">Tambah Pertanyaan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="forms-sample" method="post" action="{{ route('proses_tambah_pertanyaan') }}">
                        @csrf
                        <input type="hidden" name="loker_id" value="{{ $loker->id }}">
                        <div class="form-group row">
                            <label for="pertanyaan" class="col-sm-3 col-form-label">Pertanyaan</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="pertanyaan" id="pertanyaan" rows="5" placeholder="Pertanyaan"></textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-gradient-primary me-2 float-end">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- edit pertanyaan --}}
    <div class="modal fade" id="modalEdit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="modalEditLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditLabel">Tambah Kategori</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="forms-sample" method="post" action="{{ route('proses_update_pertanyaan') }}">
                        @csrf
                        <input type="hidden" name="loker_id" value="{{ $loker->id }}">
                        <input type="hidden" name="pertanyaan_id" id="editPertanyaanID">
                        <div class="form-group row">
                            <label for="pertanyaan" class="col-sm-3 col-form-label">Pertanyaan</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="pertanyaan" id="editPertanyaan" rows="5" placeholder="Pertanyaan"></textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-gradient-primary me-2 float-end">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endpush

@push('script')
    <script>
        $(document).ready(function() {
            $(document).on('click', '.tombolEdit', function() {
                $('#editPertanyaanID').val($(this).attr('data-idpertanyaan'));
                $("#editPertanyaan").val($(this).attr('data-pertanyaan'));
            })
        })
    </script>
@endpush
