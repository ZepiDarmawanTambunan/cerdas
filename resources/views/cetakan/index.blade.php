@extends('layouts.app_adminkit')

@section('content')
<h1 class="h3 mb-3"><strong>Data Kunjungan</strong></h1>

<div class="row">
    <div class="col-12 col-md-12 col-xxl-6 d-flex order-3 order-xxl-2">
        <div class="card flex-fill w-100">
            <div class="card-header">
                {{-- <h5 class="card-title mb-0"></h5> --}}
            </div>
            <div class="card-body px-4">
                <form action="{{ route('cet') }}" method="GET">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="query" class="form-label">Cari No. RM</label>
                            <input type="text" class="form-control" id="query" name="query" value="{{ request('query') }}">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-control" id="status" name="status" onchange="this.form.submit()">
                                <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>Sedang Dilayani</option>
                                <option value="2" {{ request('status') == '2' ? 'selected' : '' }}>Selesai</option>
                                <option value="0" {{ request('status') == '0' ? 'selected' : '' }}>Dibatalkan</option>
                            </select>
                        </div>
                        <div class="col-md-2 mb-3 d-flex align-items-end">
                            <button type="submit" class="btn btn-primary w-100">Cari</button>
                        </div>
                    </div>
                </form>
                <div class="table-responsive mt-3">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>NORM</th>
                                <th>NAMA</th>
                                <th>RUANGAN</th>
                                <th>DPJP</th>
                                <th>TGL MASUK</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($models as $kunjungan)
                                <tr>
                                    <td>{{ $kunjungan->pendaftaran->pasien->NORM ?? '-' }}</td>
                                    <td>{{ $kunjungan->pendaftaran->pasien->NAMA ?? '-' }}</td>
                                    <td>{{ $kunjungan->ruangan->DESKRIPSI ?? '-' }}</td>
                                    <td>{{ $kunjungan->dpjp->pegawai->nama_lengkap ?? '-' }}</td>
                                    <td>{{ $kunjungan->MASUK ?? '-' }}</td>
                                    <td>
                                        <a href="{{ route('cet.show', $kunjungan->NOMOR) }}" class="btn btn-sm btn-primary">Detail</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if($models->isEmpty())
                        <div class="alert alert-warning mt-3" role="alert">
                            Tidak ada data kunjungan yang ditemukan.
                        </div>
                    @endif
                    <div class="border-1">
                        {{ $models->onEachSide(1)->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
