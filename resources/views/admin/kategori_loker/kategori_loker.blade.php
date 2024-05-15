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
                    <div class="card-body">
                        <h4 class="card-title">Kategori Pekerjaan</h4>
                        <div class="table-responsive">
                            <table class="table">
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
                                            <tr>
                                                <td>
                                                    {{ $kl->kategori }}
                                                </td>
                                                <td> {{ $kl->keterangan }} </td>
                                                <td class="text-center">
                                                    <div class="btn-group btn-group-sm" role="group">
                                                        <button type="button" class="btn btn-success"><i
                                                                class="mdi mdi-tooltip-edit"></i></button>
                                                        <button type="button" class="btn btn-danger"><i
                                                                class="mdi mdi-delete"></i></button>
                                                    </div>
                                                </td>
                                            </tr>
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
@endpush
