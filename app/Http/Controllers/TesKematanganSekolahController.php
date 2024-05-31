<?php

namespace App\Http\Controllers;

use App\Models\Kunjungan;
use App\Models\Pengguna;
use App\Models\TesKematanganSekolah;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
USE Milon\Barcode\DNS2D;

class TesKematanganSekolahController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('ensure.kunjunganId')->only(['index']);
        $this->middleware('auth');
    }

    public function index(Request $request){

        // Alert::success('Title', 'Message');
        $kunjunganId = $request->input('kunjunganId');
        session(['kunjunganId' => $kunjunganId]);
        $model = TesKematanganSekolah::with('kunjungan.pendaftaran.pasien')
        ->where('KUNJUNGAN', $kunjunganId)->first();
        if($model){
            return view('cetakan.psikolog.tks.index', ['model' => $model]);
        }
        return view('cetakan.psikolog.tks.index');
    }

   public function store(Request $request){

    $data = $request->validate([
        'kunjunganId' => 'required|string|min:19',
        'tujuan_pemeriksaan' => 'required|string',
        'pendidikan' => 'required|string',
        'pengamatan_bentuk_dan_kemampuan_membedakan' => 'required|integer|in:70,75,80,85,90,95,100,105,110,115,120,125,130',
        'motorik_halus' => 'required|integer|in:70,75,80,85,90,95,100,105,110,115,120,125,130',
        'pengertian_jumlah_dan_perbandingan' => 'required|integer|in:70,75,80,85,90,95,100,105,110,115,120,125,130',
        'pengamatan_tajam' => 'required|integer|in:70,75,80,85,90,95,100,105,110,115,120,125,130',
        'pengamatan_kritis' => 'required|integer|in:70,75,80,85,90,95,100,105,110,115,120,125,130',
        'konsentrasi' => 'required|integer|in:70,75,80,85,90,95,100,105,110,115,120,125,130',
        'daya_ingat' => 'required|integer|in:70,75,80,85,90,95,100,105,110,115,120,125,130',
        'pengertian_tentang_objek_dan_penilaian_terhadap_situasi' => 'required|integer|in:70,75,80,85,90,95,100,105,110,115,120,125,130',
        'pemahaman_cerita' => 'required|integer|in:70,75,80,85,90,95,100,105,110,115,120,125,130',
        'menggambar_manusia' => 'required|integer|in:70,75,80,85,90,95,100,105,110,115,120,125,130',
        'hasil_observasi' => 'required|string',
        'kesimpulan' => 'required|string',
        'verifikasi' => 'required|boolean',
    ]);

        // kunjungan wajib ada
        $kunjungan = Kunjungan::with('dpjp.pegawai')
            ->where('NOMOR', $data['kunjunganId'])
            ->where('STATUS', '!=', 0)
            ->first();
        if (is_null($kunjungan)) {
            return back()->withErrors(['kunjunganId' => 'Kunjungan tidak ditemukan'])->withInput();
        }
        // user == dpjp
        if($data['verifikasi'] == 1){
            // Pengguna.login == user.username
            $checkUserInSimgos = Pengguna::with('pegawai.dokter')
                ->where('LOGIN', auth()->user()->username)
                ->first();

            if(!$checkUserInSimgos || !$checkUserInSimgos->pegawai || !$checkUserInSimgos->pegawai->dokter){
                return back()->withErrors(['verifikasi' => 'Silahkan login menggunakan akun DPJP'])->withInput();
            }

            // user == kunjungan.DPJP
            if($checkUserInSimgos->pegawai->dokter->ID == $kunjungan->DPJP){
                $data['tanggal_verifikasi'] = now();
                $data['verifikasi'] = $checkUserInSimgos->pegawai->nama_lengkap . '-' . $data['tanggal_verifikasi']->toDateString();
            } else {
                return back()->withErrors(['verifikasi' => 'Silahkan login menggunakan akun DPJP'])->withInput();
            }
        } else {
            return back()->withErrors(['verifikasi' => 'Verifikasi wajib dilakukan'])->withInput();
        }

        $tesKematanganSekolah = TesKematanganSekolah::where('KUNJUNGAN', $data['kunjunganId'])->first();
        if ($tesKematanganSekolah) {
            // Update data jika sudah ada
            $tesKematanganSekolah->update([
                'TUJUAN_PEMERIKSAAN' => $data['tujuan_pemeriksaan'],
                'PENDIDIKAN' => $data['pendidikan'],
                'TANGGAL' => now(),
                'PENGAMATAN_BENTUK_DAN_KEMAMPUAN_MEMBEDAKAN' => $data['pengamatan_bentuk_dan_kemampuan_membedakan'],
                'MOTORIK_HALUS' => $data['motorik_halus'],
                'PENGERTIAN_JUMLAH_DAN_PERBANDINGAN' => $data['pengertian_jumlah_dan_perbandingan'],
                'PENGAMATAN_TAJAM' => $data['pengamatan_tajam'],
                'PENGAMATAN_KRITIS' => $data['pengamatan_kritis'],
                'KONSENTRASI' => $data['konsentrasi'],
                'DAYA_INGAT' => $data['daya_ingat'],
                'PENGERTIAN_TENTANG_OBJEK_DAN_PENILAIAN_TERHADAP_SITUASI' => $data['pengertian_tentang_objek_dan_penilaian_terhadap_situasi'],
                'PEMAHAMAN_CERITA' => $data['pemahaman_cerita'],
                'MENGGAMBAR_MANUSIA' => $data['menggambar_manusia'],
                'HASIL_OBSERVASI' => $data['hasil_observasi'],
                'KESIMPULAN' => $data['kesimpulan'],
                'VERIFIKASI' => $data['verifikasi'],
                'TANGGAL_VERIFIKASI' => $data['tanggal_verifikasi'],
            ]);
            $data['success'] = 'Data berhasil diubah';
        } else {
            // Buat entri baru jika tidak ditemukan
            $data['nomor_surat'] = $this->generateNomorSurat();
            $tesKematanganSekolah = TesKematanganSekolah::create([
                'KUNJUNGAN' => $data['kunjunganId'],
                'NOMOR_SURAT' => $data['nomor_surat'],
                'TUJUAN_PEMERIKSAAN' => $data['tujuan_pemeriksaan'],
                'PENDIDIKAN' => $data['pendidikan'],
                'TANGGAL' => now(),
                'PENGAMATAN_BENTUK_DAN_KEMAMPUAN_MEMBEDAKAN' => $data['pengamatan_bentuk_dan_kemampuan_membedakan'],
                'MOTORIK_HALUS' => $data['motorik_halus'],
                'PENGERTIAN_JUMLAH_DAN_PERBANDINGAN' => $data['pengertian_jumlah_dan_perbandingan'],
                'PENGAMATAN_TAJAM' => $data['pengamatan_tajam'],
                'PENGAMATAN_KRITIS' => $data['pengamatan_kritis'],
                'KONSENTRASI' => $data['konsentrasi'],
                'DAYA_INGAT' => $data['daya_ingat'],
                'PENGERTIAN_TENTANG_OBJEK_DAN_PENILAIAN_TERHADAP_SITUASI' => $data['pengertian_tentang_objek_dan_penilaian_terhadap_situasi'],
                'PEMAHAMAN_CERITA' => $data['pemahaman_cerita'],
                'MENGGAMBAR_MANUSIA' => $data['menggambar_manusia'],
                'HASIL_OBSERVASI' => $data['hasil_observasi'],
                'KESIMPULAN' => $data['kesimpulan'],
                'VERIFIKASI' => $data['verifikasi'],
                'TANGGAL_VERIFIKASI' => $data['tanggal_verifikasi'],
            ]);
            $data['success'] = 'Data berhasil dibuat';
        }

        return redirect()->route('cet.psikolog.tks', ['kunjunganId' => $data['kunjunganId']])
        ->with(['id', $tesKematanganSekolah->id]);
    }

    public function show($id)
    {
        $model = TesKematanganSekolah::with('kunjungan.pendaftaran.pasien')->findOrFail($id);
        $barcode = (new DNS2D())->getBarcodePNG($model->VERIFIKASI, 'QRCODE');
        return view('cetakan.psikolog.tks.show', compact('model', 'barcode'));
    }

    private function generateNomorSurat()
    {
        $bulan = (int) now()->format('m');
        $bulanRomawi = bulan_romawi($bulan); //helper
        $tahun = now()->format('Y');
        $idTerakhir = TesKematanganSekolah::max('id') ?? 0;
        $id = sprintf('%03d', $idTerakhir + 1);
        return $id . '/PSI/GRAHA/RSUD RM/' . $bulanRomawi . '/' . $tahun;
    }
}
