@extends('auth.master')
@section('content_auth')
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 col-lg-5">
                    <div class="login-wrap p-4 p-md-5">
                        <div class="d-flex">
                            <div class="w-100">
                                <h3 class="mb-4">Pendaftaran</h3>
                            </div>
                        </div>
                        <form action="{{ route('proses_daftar') }}" class="login-form" method="post">
                            @csrf
                            <div class="form-group">
                                <div class="icon d-flex align-items-center justify-content-center"><span
                                        class="fa fa-user"></span></div>
                                <input type="text" class="form-control rounded-left" name="nama" placeholder="Nama"
                                    required>
                            </div>
                            <div class="form-group">
                                <div class="icon d-flex align-items-center justify-content-center"><span
                                        class="fa fa-phone"></span></div>
                                <input type="text" class="form-control rounded-left" name="nomor_telepon"
                                    placeholder="Nomor Telepon" required>
                            </div>
                            <div class="form-group">
                                <div class="icon d-flex align-items-center justify-content-center"><span
                                        class="fa fa-user"></span></div>
                                <input type="text" class="form-control rounded-left" name="nama_pengguna"
                                    placeholder="Nama Pengguna" required>
                            </div>
                            <div class="form-group">
                                <div class="icon d-flex align-items-center justify-content-center"><span
                                        class="fa fa-lock"></span></div>
                                <input type="password" class="form-control rounded-left" name="kata_sandi"
                                    placeholder="Kata Sandi" required>
                            </div>
                            <div class="form-group d-flex align-items-center">
                                <div class="w-100 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary rounded submit">Daftar</button>
                                </div>
                            </div>
                            <div class="form-group mt-4">
                                <div class="w-100 text-center">
                                    <p class="mb-1">Sudah punya akun ? <a href="{{ route('login') }}">Masuk</a></p>
                                    {{-- <p><a href="#">Forgot Password</a></p> --}}
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
