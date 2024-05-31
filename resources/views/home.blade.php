@extends('layouts.app_adminkit')

@section('content')
<h1 class="h3 mb-3"><strong>Home</strong></h1>
<div class="row">
    <div class="col-12 col-md-12 col-xxl-6 d-flex order-3 order-xxl-2">
        <div class="card flex-fill w-100">
            <div class="card-header mt-5 d-flex justify-content-evenly">
                <img src="{{asset('adminkit-3.1.0/images/logo.png')}}" alt="logo-cerdas" width="100" height="100">
                <img src="{{asset('adminkit-3.1.0/images/Picture2.png')}}" alt="logo-pemprov" width="100" height="100">
            </div>
            <div class="card-body px-4">
                <div class="text-center fw-bold">Selamat datang di aplikasi CERDAS (Cetakan Dokumen Medis Raden Mattaher)</div>
            </div>
        </div>
    </div>
</div>
@endsection
