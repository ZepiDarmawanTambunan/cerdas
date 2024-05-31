@extends('layouts.app_adminkit')

@section('content')
<h1 class="h3 mb-3"><strong>Form Tes Kesiapan Sekolah</strong></h1>

<div class="row">
    <div class="col-12 col-md-12 col-xxl-6 d-flex order-3 order-xxl-2">
        <div class="card flex-fill w-100">
            <div class="card-header">
                {{-- <h5 class="card-title mb-0">FORM TES KEMATANGAN SEKOLAH</h5> --}}
            </div>
            <div class="card-body px-4">
                <form action="{{route('cet.psikolog.tks.store')}}" method="POST" >
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <input type="hidden" minlength="19" class="form-control" id="kunjunganId" name="kunjunganId" value="{{ session('kunjunganId') }}" maxlength="19">
                            <div class="mb-3">
                                <label for="pendidikan" class="form-label">Pendidikan</label>
                                <input type="text" class="form-control @error('pendidikan') is-invalid @enderror" id="pendidikan" name="pendidikan" value="{{ $model->PENDIDIKAN ?? old('pendidikan') }}" placeholder="cth. TK">
                                @error('pendidikan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="tujuan_pemeriksaan" class="form-label">Tujuan Pemeriksaan</label>
                                <input type="text" class="form-control @error('tujuan_pemeriksaan') is-invalid @enderror" id="tujuan_pemeriksaan" name="tujuan_pemeriksaan" value="{{ $model->TUJUAN_PEMERIKSAAN ?? old('tujuan_pemeriksaan') }}" placeholder="cth. Tes Kematangan Sekolah">
                                @error('tujuan_pemeriksaan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="pengamatan_bentuk_dan_kemampuan_membedakan" class="form-label">1. Pengamatan bentuk dan kemampuan membedakan (Rentang: 70-130, kelipatan 5)</label>
                                <input type="number" class="form-control @error('pengamatan_bentuk_dan_kemampuan_membedakan') is-invalid @enderror" id="pengamatan_bentuk_dan_kemampuan_membedakan" name="pengamatan_bentuk_dan_kemampuan_membedakan" value="{{ $model->PENGAMATAN_BENTUK_DAN_KEMAMPUAN_MEMBEDAKAN ?? old('pengamatan_bentuk_dan_kemampuan_membedakan') }}" placeholder="Rentang: 70-130, kelipatan 5">
                                @error('pengamatan_bentuk_dan_kemampuan_membedakan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="motorik_halus" class="form-label">2. Motorik halus (Rentang: 70-130, kelipatan 5)</label>
                                <input type="number" class="form-control @error('motorik_halus') is-invalid @enderror" id="motorik_halus" name="motorik_halus" value="{{ $model->MOTORIK_HALUS ?? old('motorik_halus') }}" placeholder="Rentang: 70-130, kelipatan 5">
                                @error('motorik_halus')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="pengertian_jumlah_dan_perbandingan" class="form-label">3. Pengertian jumlah dan perbandingan (Rentang: 70-130, kelipatan 5)</label>
                                <input type="number" class="form-control @error('pengertian_jumlah_dan_perbandingan') is-invalid @enderror" id="pengertian_jumlah_dan_perbandingan" name="pengertian_jumlah_dan_perbandingan" value="{{ $model->PENGERTIAN_JUMLAH_DAN_PERBANDINGAN ?? old('pengertian_jumlah_dan_perbandingan') }}" placeholder="Rentang: 70-130, kelipatan 5">
                                @error('pengertian_jumlah_dan_perbandingan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="pengamatan_tajam" class="form-label">4. Pengamatan Tajam (Rentang: 70-130, kelipatan 5)</label>
                                <input type="number" class="form-control @error('pengamatan_tajam') is-invalid @enderror" id="pengamatan_tajam" name="pengamatan_tajam" value="{{ $model->PENGAMATAN_TAJAM ?? old('pengamatan_tajam') }}" placeholder="Rentang: 70-130, kelipatan 5">
                                @error('pengamatan_tajam')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="pengamatan_kritis" class="form-label">5. Pengamatan kritis (Rentang: 70-130, kelipatan 5)</label>
                                <input type="number" class="form-control @error('pengamatan_kritis') is-invalid @enderror" id="pengamatan_kritis" name="pengamatan_kritis" value="{{ $model->PENGAMATAN_KRITIS ?? old('pengamatan_kritis') }}" placeholder="Rentang: 70-130, kelipatan 5">
                                @error('pengamatan_kritis')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="konsentrasi" class="form-label">6. Konsentrasi (Rentang: 70-130, kelipatan 5)</label>
                                <input type="number" class="form-control @error('konsentrasi') is-invalid @enderror" id="konsentrasi" name="konsentrasi" value="{{ $model->KONSENTRASI ?? old('konsentrasi') }}" placeholder="Rentang: 70-130, kelipatan 5">
                                @error('konsentrasi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="daya_ingat" class="form-label">7. Daya ingat (Rentang: 70-130, kelipatan 5)</label>
                                <input type="number" class="form-control @error('daya_ingat') is-invalid @enderror" id="daya_ingat" name="daya_ingat" value="{{ $model->DAYA_INGAT ?? old('daya_ingat') }}" placeholder="Rentang: 70-130, kelipatan 5">
                                @error('daya_ingat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="pengertian_tentang_objek_dan_penilaian_terhadap_situasi" class="form-label">8. Pengertian tentang objek dan penilaian terhadap situasi (Rentang: 70-130, kelipatan 5)</label>
                                <input type="number" class="form-control @error('pengertian_tentang_objek_dan_penilaian_terhadap_situasi') is-invalid @enderror" id="pengertian_tentang_objek_dan_penilaian_terhadap_situasi" name="pengertian_tentang_objek_dan_penilaian_terhadap_situasi" value="{{ $model->PENGERTIAN_TENTANG_OBJEK_DAN_PENILAIAN_TERHADAP_SITUASI ?? old('pengertian_tentang_objek_dan_penilaian_terhadap_situasi') }}" placeholder="Rentang: 70-130, kelipatan 5">
                                @error('pengertian_tentang_objek_dan_penilaian_terhadap_situasi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="pemahaman_cerita" class="form-label">9. Pemahaman Cerita (Rentang: 70-130, kelipatan 5)</label>
                                <input type="number" class="form-control @error('pemahaman_cerita') is-invalid @enderror" id="pemahaman_cerita" name="pemahaman_cerita" value="{{ $model->PEMAHAMAN_CERITA ?? old('pemahaman_cerita') }}" placeholder="Rentang: 70-130, kelipatan 5">
                                @error('pemahaman_cerita')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="menggambar_manusia" class="form-label">9. Gambar Manusia (Rentang: 70-130, kelipatan 5)</label>
                                <input type="number" class="form-control @error('menggambar_manusia') is-invalid @enderror" id="menggambar_manusia" name="menggambar_manusia" value="{{ $model->MENGGAMBAR_MANUSIA ?? old('menggambar_manusia') }}" placeholder="Rentang: 70-130, kelipatan 5">
                                @error('menggambar_manusia')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <b>
                                <i>Keterangan: (70,75,80,85); Belum Siap, (90); Ragu, (95,100,105,110,115,120,125,130); Siap Untuk Sekolah</i>
                            </b>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="hasil_observasi" class="form-label">Hasil observasi: </label>
                                <textarea class="form-control ckeditor @error('hasil_observasi') is-invalid @enderror" id="hasil_observasi" name="hasil_observasi" rows="5">{{$model->HASIL_OBSERVASI ?? old('hasil_observasi') }}</textarea>
                                @error('hasil_observasi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="kesimpulan" class="form-label">Kesimpulan: </label>
                                <textarea class="form-control ckeditor @error('kesimpulan') is-invalid @enderror" id="kesimpulan" name="kesimpulan" rows="5">{{$model->KESIMPULAN ?? old('kesimpulan') }}</textarea>
                                @error('kesimpulan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input @error('verifikasi') is-invalid @enderror" type="checkbox" value="1" id="verifikasi" name="verifikasi">
                        <label class="form-check-label" for="verifikasi">
                            Saya menyatakan bahwa verifikasi/tanda tangan ini harus dilakukan oleh akun DPJP yang berwenang.
                        </label>
                        @error('verifikasi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    @isset($model->id)
                        <a href="{{route('cet.psikolog.tks.show', $model->id)}}" class="btn btn-success" target="_blank">Cetak</a>
                    @endisset
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
        .create( document.querySelector( '#kesimpulan' ) )
        .then( editor => {
                console.log( editor );
        } )
        .catch( error => {
                console.error( error );
        } );

        ClassicEditor
        .create( document.querySelector( '#hasil_observasi' ) )
        .then( editor => {
                console.log( editor );
        } )
        .catch( error => {
                console.error( error );
        } );
    </script>
@endpush
