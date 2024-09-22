@extends('admin.layouts.main')
@section('content_admin')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                    <i class="mdi mdi-home"></i>
                </span> Kelola Pelamar
            </h3>
        </div>
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card-header bg-gradient-secondary pt-3">
                    <h4 class="card-title">Pelamar Kerja</h4>
                </div>
                <div class="card">
                    <div class="card-body px-0">

                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr class="text-center">
                                        <th> Nama Pelamar </th>
                                        <th> Nomor Telepon </th>
                                        <th> Loker yang dilamar </th>
                                        <th> Lamaran Masuk </th>
                                        <th> Status </th>
                                        <th width="50"> # </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($kelola_pelamar->count() > 0)
                                        @foreach ($kelola_pelamar as $kp)
                                            <tr class="text-center">
                                                <td> {{ $kp->user->nama }} </td>
                                                <td> {{ $kp->user->nomor_telepon }} </td>
                                                <td> {{ $kp->loker->nama_loker }} </td>
                                                <td class="text-center"> {{ $kp->created_at }} </td>
                                                @if ($kp->status == 'pending')
                                                <td class="text-center"> <span style="background-color: yellow; padding:5px; border-radius:10px;">{{ $kp->status }}</span> </td>
                                                @endif
                                                @if ($kp->status == 'accepted')
                                                <td class="text-center"> <span style="background-color: greenyellow; padding:5px; border-radius:10px;">{{ $kp->status }}</span> </td>
                                                @endif
                                                @if ($kp->status == 'rejected')
                                                <td class="text-center"> <span style="background-color: salmon; padding:5px; border-radius:10px;">{{ $kp->status }}</span> </td>
                                                @endif
                                                <td class="text-center">

                                                    <div class="btn-group btn-group-sm" role="group">
                                                        <a href="{{ route('detail_pelamar', $kp->id) }}"
                                                            class="btn btn-info"><i class="mdi mdi-eye"></i></a>

                                                        <button type="button" class="btn btn-danger"><i
                                                                class="mdi mdi-lock"></i></button>
                                                    </div>

                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="10" class="text-center">
                                                <i>data tidak ditemukan</i>
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>

                            <div class="float-right mt-3">{{ $kelola_pelamar->links() }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
