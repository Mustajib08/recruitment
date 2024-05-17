@extends('admin.layouts.main')
@section('content_admin')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                    <i class="mdi mdi-home"></i>
                </span> Kelola Loker
            </h3>
        </div>
        <button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
            class="btn btn-primary btn-sm mt-0 mb-3"><i class="mdi mdi-database-plus"></i> Tambah
            Loker</button>
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Lowongan Pekerjaan</h4>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr class="text-center">
                                        <th> Nama Loker </th>
                                        <th> Kategori </th>
                                        <th> Tanggal Dibuka </th>
                                        <th> Tanggal Berakhir </th>
                                        <th> Salari </th>
                                        <th> Aksi </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($lokers->count() > 0)
                                        @foreach ($lokers as $loker)
                                            <tr class="text-center">
                                                <td>
                                                    {{ $loker->nama_loker }}
                                                </td>
                                                <td> {{ $loker->kategori_loker->kategori }} </td>
                                                <td>
                                                    {{ $loker->tanggal_buka }}
                                                </td>
                                                <td> {{ $loker->tanggal_tutup }} </td>
                                                <td> {{ $loker->salary }} </td>
                                                <td class="text-center">

                                                    <div class="btn-group btn-group-sm" role="group">
                                                        <a href="{{ route('detail_loker', $loker->id) }}"
                                                            class="btn btn-info"><i class="mdi mdi-eye"></i></a>

                                                        <button type="button" class="btn btn-success tombolEdit"
                                                            data-bs-toggle="modal" data-bs-target="#modalEdit"
                                                            data-idloker="{{ $loker->id }}"
                                                            data-namaloker="{{ $loker->nama_loker }}"
                                                            data-kategori="{{ $loker->kategori_id }}"
                                                            data-tanggalbuka="{{ $loker->tanggal_buka }}"
                                                            data-tanggalberakhir="{{ $loker->tanggal_tutup }}"
                                                            data-salary="{{ $loker->salary }}"
                                                            data-tipe="{{ $loker->tipe_bekerja }}"
                                                            data-deskripsi="{!! $loker->deskripsi_loker !!}"><i
                                                                class="mdi mdi-tooltip-edit"></i></button>

                                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                            data-bs-target="#modalDelete{{ $loker->id }}"><i
                                                                class="mdi mdi-delete"></i></button>
                                                    </div>
                                                </td>
                                            </tr>

                                            {{-- modal delete --}}
                                            <div class="modal fade" id="modalDelete{{ $loker->id }}"
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
                                                                action="{{ route('proses_delete_loker') }}">
                                                                @csrf
                                                                @method('DELETE')

                                                                Apakah Anda Yakin Ingin Menghapus Lowongan Kerja ?

                                                                <input type="hidden" name="delete_loker"
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
                                            <td colspan="15" class="text-center">
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
    </div>
@endsection

@push('modal')
    {{-- modal tambah --}}
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Lowongan Kerja</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="forms-sample" method="post" action="{{ route('proses_tambah_loker') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="nama_loker" class="col-sm-3 col-form-label">Nama Loker</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nama_loker" name="nama_loker"
                                    placeholder="Nama Loker">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kategori" class="col-sm-3 col-form-label">Kategori</label>
                            <div class="col-sm-9">
                                <select class="form-control form-control-lg" id="kategori" name="kategori">
                                    <option value="">- Pilih Kategori -</option>
                                    @foreach ($kategori_loker as $kl)
                                        <option value="{{ $kl->id }}">{{ $kl->kategori }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tanggal_dibuka" class="col-sm-3 col-form-label">Dibuka</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" id="tanggal_dibuka" name="tanggal_dibuka"
                                    placeholder="Tanggal Mulai">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="berakhir" class="col-sm-3 col-form-label">Berakhir</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" id="berakhir" name="berakhir"
                                    placeholder="Tanggal Berakhir">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="salari" class="col-sm-3 col-form-label">Salari</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="salari" name="salari"
                                    placeholder="Salari">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kategori" class="col-sm-3 col-form-label">Tipe</label>
                            <div class="col-sm-9">
                                <select class="form-control form-control-lg" name="tipe" id="kategori">
                                    <option value="">- Pilih Tipe -</option>
                                    <option value="Full Time">Full Time</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="keterangan" class="col-sm-3 col-form-label">Deskripsi</label>
                            <div class="col-sm-9">
                                <input id="x" class="form-control" type="hidden" name="deskripsi">
                                <trix-editor input="x" rows="10"></trix-editor>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-gradient-primary me-2 float-end">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- modal edit --}}
    <div class="modal fade" id="modalEdit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="modalEditLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditLabel">
                        Perbarui Lowongan Kerja
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="forms-sample" method="post" action="{{ route('proses_update_loker') }}">
                        @csrf
                        <input type="hidden" name="id_loker" id="editLokerID">
                        <div class="form-group row">
                            <label for="nama_loker" class="col-sm-3 col-form-label">Nama Loker</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="editNamaLoker" name="nama_loker"
                                    placeholder="Nama Loker">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kategori" class="col-sm-3 col-form-label">Kategori</label>
                            <div class="col-sm-9">
                                <select class="form-control form-control-lg" id="editKategori" name="kategori">
                                    <option value="">- Pilih Kategori -</option>
                                    @foreach ($kategori_loker as $kl)
                                        <option value="{{ $kl->id }}">{{ $kl->kategori }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tanggal_dibuka" class="col-sm-3 col-form-label">Dibuka</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" id="editTanggalDibuka" name="tanggal_dibuka"
                                    placeholder="Tanggal Mulai">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="berakhir" class="col-sm-3 col-form-label">Berakhir</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" id="editTanggalBerakhir" name="berakhir"
                                    placeholder="Tanggal Berakhir">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="salari" class="col-sm-3 col-form-label">Salari</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="editSalary" name="salari"
                                    placeholder="Salari">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kategori" class="col-sm-3 col-form-label">Tipe</label>
                            <div class="col-sm-9">
                                <select class="form-control form-control-lg" name="tipe" id="editTipe">
                                    <option value="">- Pilih Tipe -</option>
                                    <option value="Full Time">Full Time</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="keterangan" class="col-sm-3 col-form-label">Deskripsi</label>
                            <div class="col-sm-9">
                                <input id="editDeskripsi" class="form-control editDeskripsi" type="hidden"
                                    name="deskripsi">
                                <trix-editor input="editDeskripsi" rows="10"></trix-editor>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-gradient-primary me-2 float-end">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endpush

@push('css')
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
    <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }
    </style>
@endpush

@push('script')
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
    <script>
        $('#salari').mask('000.000.000.000.000', {
            reverse: true
        });

        $('#editSalary').mask('000.000.000.000.000', {
            reverse: true
        });

        $(document).ready(function() {
            $(document).on('click', '.tombolEdit', function() {
                $('#editLokerID').val($(this).attr('data-idloker'));
                $('#editNamaLoker').val($(this).attr('data-namaloker'));
                $("#editKategori").val($(this).attr('data-kategori'));
                $("#editTanggalDibuka").val($(this).attr('data-tanggalbuka'));
                $("#editTanggalBerakhir").val($(this).attr('data-tanggalberakhir'));
                $("#editSalary").val($(this).attr('data-salary'));
                $("#editTipe").val($(this).attr('data-tipe'));
                $("#editDeskripsi").val($(this).attr('data-deskripsi'));
            })
        })
    </script>
@endpush
