@extends('layouts.app_adminkit')

@section('content')
<h1 class="h3 mb-3"><strong>Cetakan Psikologi</strong></h1>
<div class="row">
    <div class="col-12 col-md-12 col-xxl-6 d-flex order-3 order-xxl-2">
        <div class="card flex-fill w-100">
            <div class="card-header">
                {{-- <h5 class="card-title mb-0">Real-Time</h5> --}}
            </div>
            <div class="card-body px-4">
                <div class="row">
                    <div class="col-6 mb-3">
                        <a href="{{ route('cet.psikolog.tks', ['kunjunganId' => session('kunjunganId')]) }}" class="btn btn-primary w-100">
                            Cetakan Tes Kesiapan Sekolah
                        </a>
                    </div>
                    <div class="col-6 mb-3">
                        <a href="#" class="btn btn-primary w-100">Cetakan Kesiapan Psikologis Menikah</a>
                    </div>
                    <div class="col-6 mb-3">
                        <a href="#" class="btn btn-primary w-100">Cetakan Persyaratan Masuk Sekolah</a>
                    </div>
                    <div class="col-6 mb-3">
                        <a href="#" class="btn btn-primary w-100">Cetakan Tes Assesment Calon Tidak Tetap Non PNS</a>
                    </div>
                    <div class="col-6 mb-3">
                        <a href="#" class="btn btn-primary w-100">Cetakan Keterangan Anak-anak SLB dll</a>
                    </div>
                    <div class="col-6 mb-3">
                        <a href="#" class="btn btn-primary w-100">Cetakan Tes IQ</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
