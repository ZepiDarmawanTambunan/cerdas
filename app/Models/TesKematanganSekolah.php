<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TesKematanganSekolah extends Model
{
    use HasFactory;

    protected $table = 'pemeriksaan_tes_kematangan_sekolah';

    protected $fillable = [
        'KUNJUNGAN',
        'NOMOR_SURAT',
        'TUJUAN_PEMERIKSAAN',
        'PENDIDIKAN',
        'TANGGAL',
        'PENGAMATAN_BENTUK_DAN_KEMAMPUAN_MEMBEDAKAN',
        'MOTORIK_HALUS',
        'PENGERTIAN_JUMLAH_DAN_PERBANDINGAN',
        'PENGAMATAN_TAJAM',
        'PENGAMATAN_KRITIS',
        'KONSENTRASI',
        'DAYA_INGAT',
        'PENGERTIAN_TENTANG_OBJEK_DAN_PENILAIAN_TERHADAP_SITUASI',
        'PEMAHAMAN_CERITA',
        'MENGGAMBAR_MANUSIA',
        'KESIMPULAN',
        'HASIL_OBSERVASI',
        'VERIFIKASI',
        'TANGGAL_VERIFIKASI',
        'STATUS',
    ];

    protected $casts = [
        'STATUS' => 'boolean',
    ];

    public function kunjungan()
    {
        return $this->belongsTo(Kunjungan::class, 'KUNJUNGAN', 'NOMOR');
    }
}
