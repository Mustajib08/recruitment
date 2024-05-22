@extends('user.main.master')
@section('content_user')
    <div class="row pb-100 justify-content-center pt-10">
        <div class="col-lg-7">
            <div class="card">
                <div class="card-header">
                    Upload Berkas Persyaratan
                </div>
                <div class="card-body">
                    <form action="{{ route('upload_berkas') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="loker_id" value="{{ $loker->id }}">
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                        <div class="mt-10">
                            <label for="" class="form-label">Nama Lowongan</label>
                            <input type="text" placeholder="First Name" onfocus="this.placeholder = ''"
                                onblur="this.placeholder = 'First Name'" readonly required class="single-input"
                                value="{{ $loker->nama_loker }}">
                        </div>
                        <div class="mt-10">
                            <label for="" class="form-label">Kategori</label>
                            <input type="text" placeholder="First Name" onfocus="this.placeholder = ''"
                                onblur="this.placeholder = 'First Name'" required class="single-input" readonly
                                value="{{ $loker->kategori_loker->kategori }}">
                        </div>
                        <div class="mt-10">
                            <label for="" class="form-label">Salari</label>
                            <input type="text" placeholder="First Name" onfocus="this.placeholder = ''"
                                onblur="this.placeholder = 'First Name'" required class="single-input" readonly
                                value="Rp. {{ $loker->salary }}">
                        </div>
                        <div class="mt-10">
                            <label for="" class="form-label">Tanggal Dibuka</label>
                            <input type="text" placeholder="First Name" onfocus="this.placeholder = ''"
                                onblur="this.placeholder = 'First Name'" required class="single-input" readonly
                                value="{{ $loker->tanggal_buka }}">
                        </div>
                        <div class="mt-10">
                            <label for="" class="form-label">Tanggal Berakhir</label>
                            <input type="text" placeholder="First Name" onfocus="this.placeholder = ''"
                                onblur="this.placeholder = 'First Name'" required class="single-input" readonly
                                value="{{ $loker->tanggal_tutup }}">
                        </div>
                        <div class="mt-10">
                            <label for="" class="form-label">Tipe Pekerjaan</label>
                            <input type="text" placeholder="First Name" onfocus="this.placeholder = ''"
                                onblur="this.placeholder = 'First Name'" required class="single-input" readonly
                                value="{{ $loker->tipe_bekerja }}">
                        </div>

                        <h6 class="my-3">**Persyaratan Anda</h6>
                        <div class="mt-10">
                            <label for="" class="form-label">Nama Lengkap</label>
                            <input type="text" placeholder="First Name" onfocus="this.placeholder = ''"
                                onblur="this.placeholder = 'First Name'" required class="single-input"
                                value="{{ auth()->user()->nama }}">
                        </div>
                        <div class="mt-10">
                            <label for="" class="form-label">Nomor Telepon</label>
                            <input type="text" placeholder="First Name" onfocus="this.placeholder = ''"
                                onblur="this.placeholder = 'First Name'" required class="single-input"
                                value="{{ auth()->user()->nomor_telepon }}">
                        </div>
                        <div class="mt-10">
                            <label for="" class="form-label">Alamat</label>
                            <textarea class="single-textarea" name="alamat" placeholder="Alamat" onfocus="this.placeholder = ''"
                                onblur="this.placeholder = 'Alamat'" required></textarea>
                        </div>
                        <div class="mt-10">
                            <label for="" class="form-label">Upload CV</label>
                            <input type="file" required class="single-input" name="cv">
                        </div>
                        <button type="submit" name="submit" id="newsletter-submit"
                            class="btn py-3 px-5 rounded mt-4 mb-2 float-right"><i class="fas fa-upload"></i> Upload
                            Berkas</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
