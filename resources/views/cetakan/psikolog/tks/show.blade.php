@extends('layouts.app_adminkit_blank')

@push('styles')
    <style>
        /* ALL */
        *{
            margin: 0px;
            padding: 0px;
            color: #000000;
        }

        body{
            margin: 0px;
            padding: 0px;
        }

        body {
            width: 9in; /* Lebar kertas sedikit diperbesar */
            height: 12.99in; /* Tinggi kertas sedikit diperbesar */
            margin: 0 auto; /* Untuk mengatur body berada di tengah halaman */
            background-color: #ffffff; /* Warna latar belakang */
        }
        /* ALL */

        /* GROUPER1 */
        .grouper-1 {
            font-family: 'Times New Roman', Times, serif;
            line-height: 0.3;
            display: flex;
            padding-bottom: 10px;
            border-bottom: 3px solid rgb(57, 144, 178);
        }

        .grouper-1 .logo-pemprov{
            position: relative;
            left: 0px;
            height: 114px;
        }

        .grouper-1 .title-address{
            padding-left: 80px;
        }

        .grouper-1 .title{
            padding-top: 10px;
            font-size: 16px;
        }

        .grouper-1 .contact{
            display: flex;
            justify-content: space-between;
        }

        .grouper-1 .contact .left div:first-child{
            height: 18px;
        }

        .grouper-1 .contact .left{
            display: flex;
            flex-direction: column;
            align-items: flex-end;
        }

        /* GROUPER1 */

        /* GENERAL */
        .text-rahasia {
            color: #000000;
            font-size: 16px;
            font-weight: bold;
            font-style: italic;
            position: relative;
            bottom: 129px;
            left: 700px;
            width: fit-content;
        }

        .text-laporan{
            text-align: center;
            font-weight: bold;
            color: #000000;
            font-size: 16px;
        }
        /* GENERAL */

        /* GROUPER 2 */
        .grouper-2 .table>:not(caption)>*>*{
            padding: .20rem;
        }
        /* GROUPER 2 */

        /* TABLE */
        .wrapper-kesimpulan{
            padding-top: 20px;
            display: flex;
            justify-content: space-around;
        }

        .wrapper-kesimpulan .wrapper-box{
            display: flex;
        }

        .wrapper-kesimpulan .box{
            width: 10px;
            padding: 10px;
            border: 1px solid black;
        }

        .wrapper-kesimpulan .wrapper-box div{
            padding-left: 10px;
        }
        /* TABLE */

        /* GROUPER 5 */
        .grouper-5 div{
            text-align: end;
        }

        .grouper-5 .tte{
            padding: 10px 0px;
        }
        /* GROUPER 5 */

        @media print {
            .text-rahasia {
                left: 750px;
            }

            .grouper-1 .title-address{
                padding-left: 100px;
            }
        }

        .table>:not(caption)>*>*{
            padding: .45rem;
        }
    </style>
@endpush

@section('content')
    <div class="grouper-1">
        <img class="logo-pemprov" src="{{asset('adminkit-3.1.0/images/Picture2.png')}}" alt="logo-pemprov">
        <div class="title-address">
            <div class="title">
                <p class="text-center">PEMERINTAH PROVINSI JAMBI</p>
                <p class="text-center fw-bold" style="font-size: 18px;">DINAS KESEHATAN</p>
                <p class="text-center fw-bold" style="font-size: 18px;">
                    RUMAH SAKIT DAERAH RADEN MATTAHER JAMBI
                </p>
            </div>
            <div class="address">
                <p class="text-center">Jl. Let. Jend. Soeprapto No. 31 Telanaipura - Jambi 36122</p>
            </div>
            <div class="contact">
                <div class="left">
                    <div>Telp. 61692 - 61694</div>
                    <div>63394 - 62364</div>
                </div>
                <div class="right">
                    <div>Fax. (0741) 60014</div>
                </div>
            </div>
        </div>
    </div>

    <div class="text-rahasia">
        RAHASIA
    </div>
    <p class="text-laporan">LAPORAN HASIL PEMERIKSAAN PSIKOLOGI</p>

    <div class="grouper-2">
        <div class="table-responsive">
            <table class="table table-borderless">
                <tr>
                    <td class="col-4">No. Surat</td>
                    <td>: {{$model->NOMOR_SURAT}}</td>
                </tr>
                <tr>
                    <td class="col-4">Nama</td>
                    <td>
                        : <b>{{$model->kunjungan->pendaftaran->pasien->NAMA}}</b>
                        <b>
                            ({{jenis_kelamin($model->kunjungan->pendaftaran->pasien->JENIS_KELAMIN)}})
                        </b>
                    </td>
                </tr>
                <tr>
                    <td class="col-4">Tempat, Tanggal Lahir /Umur</td>
                    <td>: {{$model->kunjungan->pendaftaran->pasien->tempat_tanggal_lahir}}</td>
                </tr>
                <tr>
                    <td class="col-4">Pendidikan</td>
                    <td>: {{$model->PENDIDIKAN}}</td>
                </tr>
                <tr>
                    <td class="col-4">Tujuan Pemeriksaan</td>
                    <td>: {{$model->TUJUAN_PEMERIKSAAN}}</td>
                </tr>
                <tr>
                    <td class="col-4">Tanggal Pemeriksaan</td>
                    <td>
                        : {{datedFY($model->kunjungan->MASUK)}}
                    </td>
                </tr>
            </table>
        </div>
    </div>

    <b style="padding-left: 30px;">I. <span style="padding-left: 30px;">PSIKOGRAM</span></b>
        <table class="table table-bordered">
            <thead class="thead-dark text-center">
                <tr>
                    <th rowspan="3" style="vertical-align: middle;">No</th>
                    <th rowspan="3" style="vertical-align: middle;">Aspek Psikologis</th>
                    <th colspan="13">Profil Psikologis</th>
                </tr>
                <tr>
                    <th colspan="4">Belum Siap</th>
                    <th style="background-color: #d1d5db;">Ragu</th>
                    <th colspan="8">Siap Untuk Sekolah</th>
                </tr>
                <tr>
                    <th>70</th>
                    <th>75</th>
                    <th>80</th>
                    <th>85</th>
                    <th style="background-color: #d1d5db;">90</th>
                    <th>95</th>
                    <th>100</th>
                    <th>105</th>
                    <th>110</th>
                    <th>115</th>
                    <th>120</th>
                    <th>125</th>
                    <th>130</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td colspan="14">Kapasitas inteligensi berada pada grade III: Diatas Rata-rata (Skala Raven)</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Pengamatan bentuk & kemampuan membedakan</td>
                    <td>{{$model->PENGAMATAN_BENTUK_DAN_KEMAMPUAN_MEMBEDAKAN == 70 ? '✔' : ''}}</td>
                    <td>{{$model->PENGAMATAN_BENTUK_DAN_KEMAMPUAN_MEMBEDAKAN == 75 ? '✔' : ''}}</td>
                    <td>{{$model->PENGAMATAN_BENTUK_DAN_KEMAMPUAN_MEMBEDAKAN == 80 ? '✔' : ''}}</td>
                    <td>{{$model->PENGAMATAN_BENTUK_DAN_KEMAMPUAN_MEMBEDAKAN == 85 ? '✔' : ''}}</td>
                    <td style="background-color: #d1d5db;">{{$model->PENGAMATAN_BENTUK_DAN_KEMAMPUAN_MEMBEDAKAN == 90 ? '✔' : ''}}</td>
                    <td>{{$model->PENGAMATAN_BENTUK_DAN_KEMAMPUAN_MEMBEDAKAN == 95 ? '✔' : ''}}</td>
                    <td>{{$model->PENGAMATAN_BENTUK_DAN_KEMAMPUAN_MEMBEDAKAN == 100 ? '✔' : ''}}</td>
                    <td>{{$model->PENGAMATAN_BENTUK_DAN_KEMAMPUAN_MEMBEDAKAN == 105 ? '✔' : ''}}</td>
                    <td>{{$model->PENGAMATAN_BENTUK_DAN_KEMAMPUAN_MEMBEDAKAN == 110 ? '✔' : ''}}</td>
                    <td>{{$model->PENGAMATAN_BENTUK_DAN_KEMAMPUAN_MEMBEDAKAN == 115 ? '✔' : ''}}</td>
                    <td>{{$model->PENGAMATAN_BENTUK_DAN_KEMAMPUAN_MEMBEDAKAN == 120 ? '✔' : ''}}</td>
                    <td>{{$model->PENGAMATAN_BENTUK_DAN_KEMAMPUAN_MEMBEDAKAN == 125 ? '✔' : ''}}</td>
                    <td>{{$model->PENGAMATAN_BENTUK_DAN_KEMAMPUAN_MEMBEDAKAN == 130 ? '✔' : ''}}</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Motorik halus</td>
                    <td>{{$model->MOTORIK_HALUS == 70 ? '✔' : ''}}</td>
                    <td>{{$model->MOTORIK_HALUS == 75 ? '✔' : ''}}</td>
                    <td>{{$model->MOTORIK_HALUS == 80 ? '✔' : ''}}</td>
                    <td>{{$model->MOTORIK_HALUS == 85 ? '✔' : ''}}</td>
                    <td style="background-color: #d1d5db;">{{$model->MOTORIK_HALUS == 90 ? '✔' : ''}}</td>
                    <td>{{$model->MOTORIK_HALUS == 95 ? '✔' : ''}}</td>
                    <td>{{$model->MOTORIK_HALUS == 100 ? '✔' : ''}}</td>
                    <td>{{$model->MOTORIK_HALUS == 105 ? '✔' : ''}}</td>
                    <td>{{$model->MOTORIK_HALUS == 110 ? '✔' : ''}}</td>
                    <td>{{$model->MOTORIK_HALUS == 115 ? '✔' : ''}}</td>
                    <td>{{$model->MOTORIK_HALUS == 120 ? '✔' : ''}}</td>
                    <td>{{$model->MOTORIK_HALUS == 125 ? '✔' : ''}}</td>
                    <td>{{$model->MOTORIK_HALUS == 130 ? '✔' : ''}}</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Pengertian jumlah dan pertandingan</td>
                    <td>{{$model->PENGERTIAN_JUMLAH_DAN_PERBANDINGAN == 70 ? '✔' : ''}}</td>
                    <td>{{$model->PENGERTIAN_JUMLAH_DAN_PERBANDINGAN == 75 ? '✔' : ''}}</td>
                    <td>{{$model->PENGERTIAN_JUMLAH_DAN_PERBANDINGAN == 80 ? '✔' : ''}}</td>
                    <td>{{$model->PENGERTIAN_JUMLAH_DAN_PERBANDINGAN == 85 ? '✔' : ''}}</td>
                    <td style="background-color: #d1d5db;">{{$model->PENGERTIAN_JUMLAH_DAN_PERBANDINGAN == 90 ? '✔' : ''}}</td>
                    <td>{{$model->PENGERTIAN_JUMLAH_DAN_PERBANDINGAN == 95 ? '✔' : ''}}</td>
                    <td>{{$model->PENGERTIAN_JUMLAH_DAN_PERBANDINGAN == 100 ? '✔' : ''}}</td>
                    <td>{{$model->PENGERTIAN_JUMLAH_DAN_PERBANDINGAN == 105 ? '✔' : ''}}</td>
                    <td>{{$model->PENGERTIAN_JUMLAH_DAN_PERBANDINGAN == 110 ? '✔' : ''}}</td>
                    <td>{{$model->PENGERTIAN_JUMLAH_DAN_PERBANDINGAN == 115 ? '✔' : ''}}</td>
                    <td>{{$model->PENGERTIAN_JUMLAH_DAN_PERBANDINGAN == 120 ? '✔' : ''}}</td>
                    <td>{{$model->PENGERTIAN_JUMLAH_DAN_PERBANDINGAN == 125 ? '✔' : ''}}</td>
                    <td>{{$model->PENGERTIAN_JUMLAH_DAN_PERBANDINGAN == 130 ? '✔' : ''}}</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Pengamatan Tajam</td>
                    <td>{{$model->PENGAMATAN_TAJAM == 70 ? '✔' : ''}}</td>
                    <td>{{$model->PENGAMATAN_TAJAM == 75 ? '✔' : ''}}</td>
                    <td>{{$model->PENGAMATAN_TAJAM == 80 ? '✔' : ''}}</td>
                    <td>{{$model->PENGAMATAN_TAJAM == 85 ? '✔' : ''}}</td>
                    <td style="background-color: #d1d5db;">{{$model->PENGAMATAN_TAJAM == 90 ? '✔' : ''}}</td>
                    <td>{{$model->PENGAMATAN_TAJAM == 95 ? '✔' : ''}}</td>
                    <td>{{$model->PENGAMATAN_TAJAM == 100 ? '✔' : ''}}</td>
                    <td>{{$model->PENGAMATAN_TAJAM == 105 ? '✔' : ''}}</td>
                    <td>{{$model->PENGAMATAN_TAJAM == 110 ? '✔' : ''}}</td>
                    <td>{{$model->PENGAMATAN_TAJAM == 115 ? '✔' : ''}}</td>
                    <td>{{$model->PENGAMATAN_TAJAM == 120 ? '✔' : ''}}</td>
                    <td>{{$model->PENGAMATAN_TAJAM == 125 ? '✔' : ''}}</td>
                    <td>{{$model->PENGAMATAN_TAJAM == 130 ? '✔' : ''}}</td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>Pengamatan Kritis</td>
                    <td>{{$model->PENGAMATAN_KRITIS == 70 ? '✔' : ''}}</td>
                    <td>{{$model->PENGAMATAN_KRITIS == 75 ? '✔' : ''}}</td>
                    <td>{{$model->PENGAMATAN_KRITIS == 80 ? '✔' : ''}}</td>
                    <td>{{$model->PENGAMATAN_KRITIS == 85 ? '✔' : ''}}</td>
                    <td style="background-color: #d1d5db;">{{$model->PENGAMATAN_KRITIS == 90 ? '✔' : ''}}</td>
                    <td>{{$model->PENGAMATAN_KRITIS == 95 ? '✔' : ''}}</td>
                    <td>{{$model->PENGAMATAN_KRITIS == 100 ? '✔' : ''}}</td>
                    <td>{{$model->PENGAMATAN_KRITIS == 105 ? '✔' : ''}}</td>
                    <td>{{$model->PENGAMATAN_KRITIS == 110 ? '✔' : ''}}</td>
                    <td>{{$model->PENGAMATAN_KRITIS == 115 ? '✔' : ''}}</td>
                    <td>{{$model->PENGAMATAN_KRITIS == 120 ? '✔' : ''}}</td>
                    <td>{{$model->PENGAMATAN_KRITIS == 125 ? '✔' : ''}}</td>
                    <td>{{$model->PENGAMATAN_KRITIS == 130 ? '✔' : ''}}</td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>Konsenstrasi</td>
                    <td>{{$model->KONSENTRASI == 70 ? '✔' : ''}}</td>
                    <td>{{$model->KONSENTRASI == 75 ? '✔' : ''}}</td>
                    <td>{{$model->KONSENTRASI == 80 ? '✔' : ''}}</td>
                    <td>{{$model->KONSENTRASI == 85 ? '✔' : ''}}</td>
                    <td style="background-color: #d1d5db;">{{$model->KONSENTRASI == 90 ? '✔' : ''}}</td>
                    <td>{{$model->KONSENTRASI == 95 ? '✔' : ''}}</td>
                    <td>{{$model->KONSENTRASI == 100 ? '✔' : ''}}</td>
                    <td>{{$model->KONSENTRASI == 105 ? '✔' : ''}}</td>
                    <td>{{$model->KONSENTRASI == 110 ? '✔' : ''}}</td>
                    <td>{{$model->KONSENTRASI == 115 ? '✔' : ''}}</td>
                    <td>{{$model->KONSENTRASI == 120 ? '✔' : ''}}</td>
                    <td>{{$model->KONSENTRASI == 125 ? '✔' : ''}}</td>
                    <td>{{$model->KONSENTRASI == 130 ? '✔' : ''}}</td>
                </tr>
                <tr>
                    <td>7</td>
                    <td>Daya Ingat</td>
                    <td>{{$model->DAYA_INGAT == 70 ? '✔' : ''}}</td>
                    <td>{{$model->DAYA_INGAT == 75 ? '✔' : ''}}</td>
                    <td>{{$model->DAYA_INGAT == 80 ? '✔' : ''}}</td>
                    <td>{{$model->DAYA_INGAT == 85 ? '✔' : ''}}</td>
                    <td style="background-color: #d1d5db;">{{$model->DAYA_INGAT == 90 ? '✔' : ''}}</td>
                    <td>{{$model->DAYA_INGAT == 95 ? '✔' : ''}}</td>
                    <td>{{$model->DAYA_INGAT == 100 ? '✔' : ''}}</td>
                    <td>{{$model->DAYA_INGAT == 105 ? '✔' : ''}}</td>
                    <td>{{$model->DAYA_INGAT == 110 ? '✔' : ''}}</td>
                    <td>{{$model->DAYA_INGAT == 115 ? '✔' : ''}}</td>
                    <td>{{$model->DAYA_INGAT == 120 ? '✔' : ''}}</td>
                    <td>{{$model->DAYA_INGAT == 125 ? '✔' : ''}}</td>
                    <td>{{$model->DAYA_INGAT == 130 ? '✔' : ''}}</td>
                </tr>
                <tr>
                    <td>8</td>
                    <td>Pengertian ttg Obyek dan penilaian terhadap situasi</td>
                    <td>{{$model->PENGERTIAN_TENTANG_OBJEK_DAN_PENILAIAN_TERHADAP_SITUASI == 70 ? '✔' : ''}}</td>
                    <td>{{$model->PENGERTIAN_TENTANG_OBJEK_DAN_PENILAIAN_TERHADAP_SITUASI == 75 ? '✔' : ''}}</td>
                    <td>{{$model->PENGERTIAN_TENTANG_OBJEK_DAN_PENILAIAN_TERHADAP_SITUASI == 80 ? '✔' : ''}}</td>
                    <td>{{$model->PENGERTIAN_TENTANG_OBJEK_DAN_PENILAIAN_TERHADAP_SITUASI == 85 ? '✔' : ''}}</td>
                    <td style="background-color: #d1d5db;">{{$model->PENGERTIAN_TENTANG_OBJEK_DAN_PENILAIAN_TERHADAP_SITUASI == 90 ? '✔' : ''}}</td>
                    <td>{{$model->PENGERTIAN_TENTANG_OBJEK_DAN_PENILAIAN_TERHADAP_SITUASI == 95 ? '✔' : ''}}</td>
                    <td>{{$model->PENGERTIAN_TENTANG_OBJEK_DAN_PENILAIAN_TERHADAP_SITUASI == 100 ? '✔' : ''}}</td>
                    <td>{{$model->PENGERTIAN_TENTANG_OBJEK_DAN_PENILAIAN_TERHADAP_SITUASI == 105 ? '✔' : ''}}</td>
                    <td>{{$model->PENGERTIAN_TENTANG_OBJEK_DAN_PENILAIAN_TERHADAP_SITUASI == 110 ? '✔' : ''}}</td>
                    <td>{{$model->PENGERTIAN_TENTANG_OBJEK_DAN_PENILAIAN_TERHADAP_SITUASI == 115 ? '✔' : ''}}</td>
                    <td>{{$model->PENGERTIAN_TENTANG_OBJEK_DAN_PENILAIAN_TERHADAP_SITUASI == 120 ? '✔' : ''}}</td>
                    <td>{{$model->PENGERTIAN_TENTANG_OBJEK_DAN_PENILAIAN_TERHADAP_SITUASI == 125 ? '✔' : ''}}</td>
                    <td>{{$model->PENGERTIAN_TENTANG_OBJEK_DAN_PENILAIAN_TERHADAP_SITUASI == 130 ? '✔' : ''}}</td>
                </tr>
                <tr>
                    <td>9</td>
                    <td>Memahami Cerita</td>
                    <td>{{$model->PEMAHAMAN_CERITA == 70 ? '✔' : ''}}</td>
                    <td>{{$model->PEMAHAMAN_CERITA == 75 ? '✔' : ''}}</td>
                    <td>{{$model->PEMAHAMAN_CERITA == 80 ? '✔' : ''}}</td>
                    <td>{{$model->PEMAHAMAN_CERITA == 85 ? '✔' : ''}}</td>
                    <td style="background-color: #d1d5db;">{{$model->PEMAHAMAN_CERITA == 90 ? '✔' : ''}}</td>
                    <td>{{$model->PEMAHAMAN_CERITA == 95 ? '✔' : ''}}</td>
                    <td>{{$model->PEMAHAMAN_CERITA == 100 ? '✔' : ''}}</td>
                    <td>{{$model->PEMAHAMAN_CERITA == 105 ? '✔' : ''}}</td>
                    <td>{{$model->PEMAHAMAN_CERITA == 110 ? '✔' : ''}}</td>
                    <td>{{$model->PEMAHAMAN_CERITA == 115 ? '✔' : ''}}</td>
                    <td>{{$model->PEMAHAMAN_CERITA == 120 ? '✔' : ''}}</td>
                    <td>{{$model->PEMAHAMAN_CERITA == 125 ? '✔' : ''}}</td>
                    <td>{{$model->PEMAHAMAN_CERITA == 130 ? '✔' : ''}}</td>
                </tr>
                <tr>
                    <td>10</td>
                    <td>Gambar Orang</td>
                    <td>{{$model->MENGGAMBAR_MANUSIA == 70 ? '✔' : ''}}</td>
                    <td>{{$model->MENGGAMBAR_MANUSIA == 75 ? '✔' : ''}}</td>
                    <td>{{$model->MENGGAMBAR_MANUSIA == 80 ? '✔' : ''}}</td>
                    <td>{{$model->MENGGAMBAR_MANUSIA == 85 ? '✔' : ''}}</td>
                    <td style="background-color: #d1d5db;">{{$model->MENGGAMBAR_MANUSIA == 90 ? '✔' : ''}}</td>
                    <td>{{$model->MENGGAMBAR_MANUSIA == 95 ? '✔' : ''}}</td>
                    <td>{{$model->MENGGAMBAR_MANUSIA == 100 ? '✔' : ''}}</td>
                    <td>{{$model->MENGGAMBAR_MANUSIA == 105 ? '✔' : ''}}</td>
                    <td>{{$model->MENGGAMBAR_MANUSIA == 110 ? '✔' : ''}}</td>
                    <td>{{$model->MENGGAMBAR_MANUSIA == 115 ? '✔' : ''}}</td>
                    <td>{{$model->MENGGAMBAR_MANUSIA == 120 ? '✔' : ''}}</td>
                    <td>{{$model->MENGGAMBAR_MANUSIA == 125 ? '✔' : ''}}</td>
                    <td>{{$model->MENGGAMBAR_MANUSIA == 130 ? '✔' : ''}}</td>
                </tr>
                <tr>
                    <td colspan="15">
                        KESIMPULAN
                        <div class="wrapper-kesimpulan">
                            <div class="wrapper-box">
                                <div class="box"></div>
                                <div>Siap</div>
                            </div>
                            <div class="wrapper-box">
                                <div>✔</div>
                                <div>Dipertimbangkan</div>
                            </div>
                            <div class="wrapper-box">
                                <div class="box"></div>
                                <div>Belum Siap</div>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="grouper-3">
            <b style="padding-left: 30px;">
            II. <span style="padding-left: 30px;">HASIL OBSERVASI</span>
        </b>
        <div style="padding-left: 75px;text-align:justify;">
            {!! $model->HASIL_OBSERVASI !!}
        </div>
    </div>

    <div class="grouper-4 mt-4">
        <b style="padding-left: 30px;">
            III. <span style="padding-left: 30px;">KESIMPULAN DAN SARAN / REKOMENDASI</span>
        </b>
        <div style="padding-left: 75px; text-align:justify;">
            {!! $model->KESIMPULAN !!}
        </div>
    </div>

    <div class="grouper-5 mt-5">
        <div>Jambi, {{datedFY($model->TANGGAL_VERIFIKASI)}}</div>
        <div>An. Direktur RSUD Raden Mattaher Provinsi Jambi</div>
        <div>Pemeriksa,</div>
        <div class="tte">
            <img src="data:image/png;base64,{{ $barcode }}" alt="Barcode">
        </div>
        <div>{{$model->kunjungan->dpjp->pegawai->nama_lengkap}}, Psikolog</div>
        <div>NIP : {{$model->kunjungan->dpjp->pegawai->NIP}}</div>
    </div>
@endsection
