@extends('user.main.master')
@section('content_user')
    <div class="row pb-100 justify-content-center pt-10">
        <div class="col-lg-7">
            @if ($jawaban->count() > 0)
                <div class="alert alert-danger" role="alert">
                    Jawaban sudah di jawab semua !
                </div>
            @else
                <div class="card mt-4">
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
                                class="btn py-3 px-5 rounded mt-4 mb-2 float-right"><i class="fas fa-upload"></i>
                                Simpan
                                Jawaban</button>
                        </form>
                    </div>
            @endif
        </div>
    </div>
    </div>
@endsection
