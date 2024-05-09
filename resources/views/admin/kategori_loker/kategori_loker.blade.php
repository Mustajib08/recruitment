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
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Kategori Pekerjaan</h4>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th> Kategori </th>
                                        <th> Keterangan </th>
                                        <th> Aksi </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <img src="{{ asset('asset_admin') }}/images/faces/face1.jpg" class="me-2"
                                                alt="image"> David Grey
                                        </td>
                                        <td> Fund is not recieved </td>
                                        <td>
                                            <div class="btn-group btn-group-sm" role="group">
                                                <button type="button" class="btn btn-success"><i
                                                        class="mdi mdi-tooltip-edit"></i></button>
                                                <button type="button" class="btn btn-danger"><i
                                                        class="mdi mdi-delete"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
