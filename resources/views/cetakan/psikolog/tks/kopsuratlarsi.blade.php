@extends('layouts.app_adminkit_blank')

@push('styles')
    <style>
        *{
            margin: 0px;
            padding: 0px;
        }

        body{
            margin: 0px;
            padding: 0px;
        }

        body {
            width: 8.27in; /* Sesuaikan dengan lebar kertas F4 */
            height: 13.98in; /* Sesuaikan dengan tinggi kertas F4 */
            margin: 0 auto; /* Untuk mengatur body berada di tengah halaman */
            background-color: #ffffff; /* Warna latar belakang */
        }

        #grouper-1 {
            font-family: 'Times New Roman', Times, serif;
            line-height: 0.2; /* Menambahkan line-height */
            color: #000000;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        #grouper-1 .title{
            font-size: 16px;
        }

        #grouper-1 .address{
            margin-top: 20px;
        }

        .wrapper{
            background-color: transparent;
        }

        .logo-pemprov{
            position: relative;
            left: 0px;
            /* border: 1px solid red; */
            height: 114px;
        }

        .cover-warsi {
            position: relative;
            right: 0px;
            /* border: 1px solid red; */
            display: flex;
            justify-content: center; /* Untuk mengatur posisi horizontal di tengah */
            align-items: center; /* Untuk mengatur posisi vertikal di tengah */
            height: 114px; /* Sesuaikan dengan kebutuhan */
            width: 114px;
            flex-direction: column; /* Mengatur urutan dari atas ke bawah */
        }

        .logo-warsi1,
        .logo-warsi2 {
            max-width: 100%; /* Sesuaikan dengan ukuran maksimum gambar */
            height: auto; /* Biarkan tinggi gambar menyesuaikan dengan lebar maksimum */
        }

        .border-kop {
            width: 100%; /* Agar border mengisi lebar penuh */
        }

        #laporan{
            color: #000000;
            font-size: 16px;
        }

        .grouper-2 td{
            margin: 3px;
            padding: 3px;
        }
    </style>
@endpush

@section('content')
    <div id="grouper-1">
        <img class="logo-pemprov" src="{{asset('adminkit-3.1.0/images/Picture2.png')}}" alt="logo-pemprov">
        <div>
            <div class="title">
                <p class="text-center fw-bold">PEMERINTAH PROVINSI JAMBI</p>
                <p class="text-center fw-bold">RUMAH SAKIT UMUM DAERAH RADEN MATTAHER</p>
                <p class="text-center fw-bold">NOMOR AKREDITASI : LARSI/SERTIFIKAT/062/12/2022</p>
            </div>
            <div class="address">
                <p class="text-center">Jl. Let. Jend. Soeprapto No. 31 Telanaipura - JAMBI 36122</p>
                <p class="text-center">Telp. (0741) 61692 - 61694 - 63394 - 62364 Fax. (0741) 60014</p>
            </div>
        </div>
        <div class="cover-warsi">
            <div class="wrapper">
                <img class="logo-warsi1" src="{{asset('adminkit-3.1.0/images/Picture3.png')}}" alt="logo-warsi1">
            </div>
            <div class="wrapper">
                <img class="logo-warsi2" src="{{asset('adminkit-3.1.0/images/Picture4.png')}}" alt="logo-warsi2">
            </div>
        </div>
    </div>
    <img class="border-kop mt-3" src="{{asset('adminkit-3.1.0/images/Picture1.png')}}" alt="border">

    <div class="text-end mt-3 fw-bolder text-black fst-italic" style="font-family: 'Times New Roman', Times, serif;">
        RAHASIA
    </div>
    <p class="text-center my-4 fw-bold" id="laporan">LAPORAN HASIL PEMERIKSAAN PSIKOLOGI</p>

    <div class="grouper-2">
        <div class="table-responsive">
            <table class="table table-borderless">
                <tr>
                    <td class="col-3">Nomor</td>
                    <td>: <b>{{$model->NOMOR_SURAT}}</b></td>
                </tr>
                <tr>
                    <td class="col-3">Nama</td>
                    <td>: <b>{{$model->kunjungan->pendaftaran->pasien->NAMA}}</b></td>
                </tr>
                <tr>
                    <td class="col-3">Pendidikan</td>
                    <td>: <b>{{$model->PENDIDIKAN}}</b></td>
                </tr>
                <tr>
                    <td class="col-3">Tempat, Tanggal Lahir /Umur</td>
                    <td>: <b>{{$model->kunjungan->pendaftaran->pasien->tempat_tanggal_lahir}}</b></td>
                </tr>
                <tr>
                    <td class="col-3">Tujuan Pemeriksaan</td>
                    <td>: <b>{{$model->TUJUAN_PEMERIKSAAN}}</b></td>
                </tr>
            </table>
        </div>
    </div>

    <b>I. <span style="padding-left: 30px;">PROFIL KOMPETENSI</span></b>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th rowspan="2">No</th>
                <th rowspan="2">Aspek Psikologis</th>
                <th colspan="5">Penilaian</th>
            </tr>
            <tr>
                <th>KS</th>
                <th>K</th>
                <th>C</th>
                <th>B</th>
                <th>BS</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="7">Kapasitas Intelektual berada pada grade II: Diatas Rata-rata (Skala Raven)</td>
            </tr>
            <tr>
                <td>1</td>
                <td>Pengamatan bentuk dan kemampuan membedakan</td>
                <td><input type="radio" name="penilaian1" value="KS"></td>
                <td><input type="radio" name="penilaian1" value="K"></td>
                <td><input type="radio" name="penilaian1" value="C"></td>
                <td><input type="radio" name="penilaian1" value="B"></td>
                <td><input type="radio" name="penilaian1" value="BS"></td>
            </tr>
        </tbody>
    </table>
@endsection
