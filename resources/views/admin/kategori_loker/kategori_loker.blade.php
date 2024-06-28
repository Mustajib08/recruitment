@extends('admin.layouts.main')
@section('content_admin')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                    <i class="mdi mdi-home"></i>
                </span> Kategori Loker
            </h3>
        </div>
        <button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
            class="btn btn-primary btn-sm mt-0 mb-3"><i class="mdi mdi-database-plus"></i> Tambah
            Kategori</button>
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-header bg-gradient-secondary pt-3">
                        <h4 class="card-title">Kategori Pekerjaan</h4>
                    </div>
                    <div class="card-body px-0">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr class="text-center">
                                        <th> Kategori </th>
                                        <th> Keterangan </th>
                                        <th> Aksi </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($kategori_loker->count() > 0)
                                        @foreach ($kategori_loker as $kl)
                                            <tr class="text-center">
                                                <td>
                                                    {{ $kl->kategori }}
                                                </td>
                                                <td> {{ $kl->keterangan }} </td>
                                                <td class="text-center">
                                                    <div class="btn-group btn-group-sm" role="group">
                                                        <button type="button" class="btn btn-success tombolEdit"
                                                            id="tombolEdit" data-idkategori="{{ $kl->id }}"
                                                            data-kategori="{{ $kl->kategori }}"
                                                            data-keterangan="{{ $kl->keterangan }}" data-bs-toggle="modal"
                                                            data-bs-target="#modalEdit"><i
                                                                class="mdi mdi-tooltip-edit"></i></button>

                                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                            data-bs-target="#modalDelete{{ $kl->id }}"><i
                                                                class="mdi mdi-delete"></i></button>
                                                    </div>
                                                </td>
                                            </tr>

                                            {{-- modal delete --}}
                                            <div class="modal fade" id="modalDelete{{ $kl->id }}"
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
                                                                action="{{ route('proses_delete_kategori') }}">
                                                                @csrf
                                                                @method('DELETE')
                                                                Apakah Anda Yakin Ingin Menghapus Kategori ?
                                                                <input type="hidden" name="delete_kategori"
                                                                    value="{{ $kl->id }}">
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
                                            <td colspan="3" class="text-center">
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
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Kategori</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="forms-sample" method="post" action="{{ route('proses_tambah_kategori_loker') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="kategori" class="col-sm-3 col-form-label">Kategori</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="kategori" name="kategori"
                                    placeholder="Nama Kategori">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="keterangan" class="col-sm-3 col-form-label">Keterangan</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="keterangan" id="keterangan" rows="5" placeholder="Keterangan Kategori"></textarea>
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
                        Perbarui Kategori
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="forms-sample" method="post" action="{{ route('proses_update_kategori') }}">
                        @csrf
                        <input type="hidden" name="id_kategori" id="valueKategoriID">
                        <div class="form-group row">
                            <label for="kategori" class="col-sm-3 col-form-label">Kategori</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="editKategori" name="kategori"
                                    placeholder="Nama Kategori">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="keterangan" class="col-sm-3 col-form-label">Keterangan</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="keterangan" id="editKeterangan" rows="5"
                                    placeholder="Keterangan Kategori"></textarea>
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
                $('#valueKategoriID').val($(this).attr('data-idkategori'));
                $("#editKategori").val($(this).attr('data-kategori'));
                $("#editKeterangan").val($(this).attr('data-keterangan'));
            })
        })
    </script>
@endpush
