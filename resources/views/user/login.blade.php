@extends('user.main.master')
@section('content_user')
    <div class="row justify-content-center">
        <div class="col-lg-4">
            <div class="card rounded mt-50 py-4 mb-80 shadow-lg">
                <div class="card-body">
                    <h3 class="text-center mb-4">Masuk</h3>
                    <form action="{{ route('proses_login') }}" class="my-3" method="post">
                        @csrf
                        <div class="mt-10">
                            <input type="text" name="username" placeholder="Nama Pengguna" onfocus="this.placeholder = ''"
                                onblur="this.placeholder = 'Nama Pengguna'" required class="single-input">
                        </div>
                        <div class="mt-10">
                            <input type="password" name="password" placeholder="Kata Sandi" onfocus="this.placeholder = ''"
                                onblur="this.placeholder = 'Kata Sandi'" required class="single-input">
                        </div>
                        <button type="submit" class="btn py-4 rounded w-100 mt-3">Masuk</button>
                    </form>

                    <span>Belum Punya Akun ? <a href="{{ route('register') }}" class="text-primary">Daftar
                            Sekarang</a></span>
                </div>
            </div>
        </div>
    </div>
@endsection
