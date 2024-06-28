@extends('admin.layouts.main')
@section('content_admin')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                    <i class="mdi mdi-home"></i>
                </span> Kelola Pengguna
            </h3>
        </div>
        <button type="button" data-bs-toggle="modal" data-bs-target="#modalTambah" class="btn btn-primary btn-sm mt-0 mb-3"><i
                class="mdi mdi-database-plus"></i> Tambah
            Pengguna</button>
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card-header bg-gradient-secondary pt-3">
                    <h4 class="card-title">Pengguna Aplikasi</h4>
                </div>
                <div class="card">
                    <div class="card-body px-0">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr class="text-center">
                                        <th> Nama </th>
                                        <th> Nomor Telepon </th>
                                        <th> Username </th>
                                        <th> Level </th>
                                        <th> # </th>
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
                                            <td class="text-center">

                                                <div class="btn-group btn-group-sm" role="group">
                                                    <button type="button" class="btn btn-success tombolEdit"
                                                        data-bs-toggle="modal" data-bs-target="#modalEdit"
                                                        data-idpengguna="{{ $user->id }}"
                                                        data-namapengguna="{{ $user->nama }}"
                                                        data-telpon="{{ $user->nomor_telepon }}"
                                                        data-username="{{ $user->username }}"
                                                        data-level="{{ $user->level }}"><i
                                                            class="mdi mdi-tooltip-edit"></i></button>

                                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                        data-bs-target="#modalDelete{{ $user->id }}"><i
                                                            class="mdi mdi-delete"></i></button>
                                                </div>
                                                {{-- modal delete --}}
                                                <div class="modal fade" id="modalDelete{{ $user->id }}"
                                                    data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                                    aria-labelledby="modalDeleteLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-danger">
                                                                <h4 class="modal-title text-white" id="modalDeleteLabel">
                                                                    Konfirmasi <i
                                                                        class="mdi mdi-comment-question-outline"></i>
                                                                </h4>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form class="forms-sample" method="post"
                                                                    action="{{ route('proses_delete_pengguna') }}">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    Apakah Anda Yakin Ingin Menghapus Pengguna ?
                                                                    <input type="hidden" name="delete_pengguna"
                                                                        value="{{ $user->id }}">
                                                                    <button type="submit"
                                                                        class="btn btn-sm btn-danger me-2 mt-4 float-end"><i
                                                                            class="mdi mdi-delete"></i> Hapus</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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

@push('modal')
    <div class="modal fade" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="modalTambahLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTambahLabel">Tambah Pengguna</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="forms-sample" method="post" action="{{ route('proses_daftar_admin') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nama" name="nama"
                                    placeholder="Nama Pengguna">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nomor_telepon" class="col-sm-3 col-form-label">Telepon</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon"
                                    placeholder="Nomor Telepon">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nomor_telepon" class="col-sm-3 col-form-label">Telepon</label>
                            <div class="col-sm-9">
                                <select name="level" class="form-control form-control-lg">
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama_pengguna" class="col-sm-3 col-form-label">Username</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nama_pengguna" name="nama_pengguna"
                                    placeholder="Username">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kata_sandi" class="col-sm-3 col-form-label">Password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="kata_sandi" name="kata_sandi"
                                    placeholder="Password">
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
                    <form class="forms-sample" method="post" action="{{ route('proses_update_pengguna') }}">
                        @csrf
                        <input type="hidden" name="id_pengguna" id="idPengguna">
                        <div class="form-group row">
                            <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="namaPengguna" name="nama"
                                    placeholder="Nama Pengguna">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nomor_telepon" class="col-sm-3 col-form-label">Telepon</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="telponPengguna" name="nomor_telepon"
                                    placeholder="Nomor Telepon">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nomor_telepon" class="col-sm-3 col-form-label">Level</label>
                            <div class="col-sm-9">
                                <select name="level" id="levelPengguna" class="form-control form-control-lg">
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama_pengguna" class="col-sm-3 col-form-label">Username</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="usernamePengguna" name="nama_pengguna"
                                    placeholder="Username">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kata_sandi" class="col-sm-3 col-form-label">Password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="kata_sandi" name="kata_sandi"
                                    placeholder="Password Baru">
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
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
    <script>
        $(document).ready(function() {
            $(document).on('click', '.tombolEdit', function() {
                $('#idPengguna').val($(this).attr('data-idpengguna'));
                $('#namaPengguna').val($(this).attr('data-namapengguna'));
                $('#telponPengguna').val($(this).attr('data-telpon'));
                $('#levelPengguna').val($(this).attr('data-level'));
                $('#usernamePengguna').val($(this).attr('data-username'));
            })
        })
    </script>
@endpush
