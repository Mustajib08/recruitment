@extends('user.main.master')
@section('content_user')
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="card rounded mt-50 py-4 mb-80 shadow-lg">
                <div class="card-body">
                    <h3 class="text-center mb-4">Pendaftaran</h3>
                    <form action="{{ route('proses_daftar') }}" class="my-3" method="post">
                        @csrf
                        <div class="mt-10">
                            <input type="text" name="nama" placeholder="Nama" onfocus="this.placeholder = ''"
                                onblur="this.placeholder = 'Nama'" required class="single-input">
                        </div>
                        <div class="mt-10">
                            <input type="text" name="nomor_telepon" placeholder="Nomor Telepon"
                                onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nomor Telepon'" required
                                class="single-input">
                        </div>
                        <div class="mt-10">
                            <input type="text" name="nama_pengguna" placeholder="Nama Pengguna"
                                onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nama Pengguna'" required
                                class="single-input">
                        </div>
                        <div class="mt-10">
                            <input type="password" name="kata_sandi" placeholder="Kata Sandi"
                                onfocus="this.placeholder = ''" onblur="this.placeholder = 'Kata Sandi'" required
                                class="single-input">
                        </div>
                        <button type="submit" class="btn py-4 rounded w-100 mt-3">Daftar</button>
                    </form>

                    <span>Sudah Punya Akun ? <a href="{{ route('login') }}" class="text-primary">Masuk</a></span>
                </div>
            </div>
        </div>
    </div>
@endsection
