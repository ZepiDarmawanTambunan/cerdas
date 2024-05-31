@extends('layouts.app_adminkit')

@section('content')
<h1 class="h3 mb-3"><strong>Pasien</strong></h1>
<div class="row">
    <div class="col-12 col-md-12 col-xxl-6 d-flex order-3 order-xxl-2">
        <div class="card flex-fill w-100">
            <div class="card-header">
                <h5 class="card-title mb-0">Data pasien</h5>
            </div>
            <div class="card-body px-4">
                <table class="table table-hover my-0">
                    <thead>
                        <tr>
                            <th>NORM</th>
                            <th>Nama</th>
                            <th>Tanggal Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pasien as $p)
                        <tr>
                            <td>{{ $p->NORM }}</td>
                            <td>{{ $p->NAMA }}</td>
                            <td>{{ $p->TANGGAL_LAHIR }}</td>
                            <td>{{ $p->JENIS_KELAMIN == 1 ? 'Laki-laki' : 'Perempuan' }}</td>
                            <td>{{ $p->ALAMAT }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div style="height: 100px; overflow-y: hidden;" class="mt-3">
                    {{ $pasien->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
