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
                            <textarea class="single-textarea" name="alamat" @if (!empty($data_apply->cv_user)) @readonly(true) @endif
                                placeholder="Alamat" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Alamat'" required> 
                                @if (!empty($data_apply->cv_user))
{{ $data_apply->alamat }}
@endif
                            </textarea>
                        </div>
                        <div class="mt-10">
                            <label for="gambar" class="form-label">
                                @if (!empty($data_apply->cv_user))
                                    CV
                                @else
                                    Upload CV
                                @endif
                            </label>
                            @if (!empty($data_apply->cv_user))
                                <img src="{{ asset('storage/' . $data_apply->cv_user) }}" class="img-fluid single-input"
                                    alt="CV">
                            @else
                                <input id="gambar" type="file" required class="single-input" name="image">
                            @endif
                        </div>
                        @if (!empty($data_apply->cv_user))
                        @else
                            <button type="submit" name="submit" id="newsletter-submit"
                                class="btn py-3 px-5 rounded mt-4 mb-2 float-right"><i class="fas fa-upload"></i>
                                Upload
                                Berkas</button>
                        @endif
                    </form>
                    @if (!empty($data_apply->cv_user))
                        <form action="{{ route('batal_upload_cv') }}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="idApplyNow"
                                value="{{ $data_apply->id }}                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             ">
                            <button type="submit" class="btn py-3 px-5 rounded mt-4 mb-2 float-right"><i
                                    class="far fa-window-close"></i>
                                Batal
                                Upload</button>
                        </form>

                        <a href="{{ route('jawab_pertanyaan', $loker->id) }}"
                            class="btn py-3 px-5 rounded mt-4 mb-2 float-right mr-1">
                            Jawab Pertanyaan <i class="fas fa-arrow-circle-right"></i></a>
                    @endif
                </div>

            </div>

            {{-- @if (!empty($data_apply->cv_user))
                <div class="card mt-5">
                    <div class="card-header">
                        Jawab Pertanyaan
                    </div>
                    <div class="card-body">
                        <form action="{{ route('simpan_jawaban') }}" method="post">
                            @csrf
                            @foreach ($pertanyaan as $prtnyaan)
                                <div class="mt-10">
                                    <label for="" class="form-label">{{ $loop->iteration }}.
                                        {{ $prtnyaan->pertanyaan }}</label>
                                    <input type="text" id="pertanyaan_{{ $prtnyaan->id }}"
                                        name="pertanyaan[{{ $prtnyaan->id }}]" placeholder="Jawaban"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Jawaban'" required
                                        class="single-input">
                                </div>
                            @endforeach
                            <button type="submit" name="submit" id="newsletter-submit"
                                class="btn py-3 px-5 rounded mt-4 mb-2 float-right"><i class="fas fa-upload"></i> Simpan
                                Jawaban</button>
                        </form>
                    </div>
                </div>
            @endif --}}
        </div>
    </div>
@endsection
