@extends('layouts.app_adminkit')

@section('content')
<h1 class="h3 mb-3"><strong>Data Kunjungan</strong></h1>

<div class="row">
    <div class="table-responsive">
        <table class="table table-borderless">
            <tr>
                <td class="col-3">Nomor Kunjungan</td>
                <td>: <b>{{$model->NOMOR}}</b></td>
            </tr>
            <tr>
                <td class="col-3">Nama</td>
                <td>: <b>{{$model->pendaftaran->pasien->NAMA}}</b></td>
            </tr>
            <tr>
                <td class="col-3">NORM</td>
                <td>: <b>{{$model->pendaftaran->pasien->NORM}}</b></td>
            </tr>
            <tr>
                <td class="col-3">Ruangan</td>
                <td>: <b>{{$model->ruangan->DESKRIPSI}}</b></td>
            </tr>
            <tr>
                <td class="col-3">DPJP</td>
                <td>: <b>{{$model->dpjp->pegawai->nama_lengkap}}</b></td>
            </tr>
        </table>
    </div>
</div>

<div class="row">
    <div class="col-12 col-md-12 col-xxl-6 d-flex order-3 order-xxl-2">
        <div class="card flex-fill w-100">
            <div class="card-header">
                <h5 class="card-title mb-0"></h5>
            </div>
            <div class="card-body px-4">
                <div class="row">
                    <div class="col-6 mb-3">
                        <a href="{{route('cet.psikolog', ['kunjunganId' => $model->NOMOR])}}" class="btn btn-primary w-100">Cetakan Psikologi</a>
                    </div>
                    <div class="col-6 mb-3">
                        <a href="#" class="btn btn-primary w-100">Cetakan MCU</a>
                    </div>
                    <div class="col-6 mb-3">
                        <a href="#" class="btn btn-primary w-100">Cetakan Laboratorium</a>
                    </div>
                    <div class="col-6 mb-3">
                        <a href="#" class="btn btn-primary w-100">Cetakan Radiologi</a>
                    </div>
                    <div class="col-6 mb-3">
                        <a href="#" class="btn btn-primary w-100">Cetakan Rekam Medis</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
