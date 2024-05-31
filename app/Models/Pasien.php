<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    protected $connection = 'master';
    protected $table = 'pasien';
    protected $primaryKey = 'NORM';

    protected $fillable = [
        'NAMA',
        'PANGGILAN',
        'GELAR_DEPAN',
        'GELAR_BELAKANG',
        'TEMPAT_LAHIR',
        'TANGGAL_LAHIR',
        'JENIS_KELAMIN',
        'ALAMAT',
        'RT',
        'RW',
        'KODEPOS',
        'WILAYAH',
        'AGAMA',
        'PENDIDIKAN',
        'PEKERJAAN',
        'STATUS_PERKAWINAN',
        'GOLONGAN_DARAH',
        'KEWARGANEGARAAN',
        'SUKU',
        'TIDAK_DIKENAL',
        'BAHASA',
        'LOCK_AKSES',
        'TANGGAL',
        'OLEH',
        'STATUS',
    ];

    protected $dates = [
        'TANGGAL_LAHIR',
        'TANGGAL',
    ];


    public function pendaftaran()
    {
        return $this->hasMany(Pendaftaran::class, 'NORM', 'NORM');
    }

    public function getTempatTanggalLahirAttribute()
    {
        // Inisialisasi string tempat lahir dan tanggal lahir
        $tempatTanggalLahir = '';

        // Periksa apakah tempat lahir tidak null
        if ($this->TEMPAT_LAHIR) {
            $tempatTanggalLahir .= $this->TEMPAT_LAHIR;
        }

        // Periksa apakah tanggal lahir tidak null
        if ($this->TANGGAL_LAHIR) {
            // Tambahkan koma jika tempat lahir tidak null
            if ($tempatTanggalLahir) {
                $tempatTanggalLahir .= ', ';
            }

            // Konversi tanggal lahir menjadi objek Carbon
            $tanggalLahir = Carbon::parse($this->TANGGAL_LAHIR);

            // Tambahkan format tanggal lahir ke string
            $tempatTanggalLahir .= $tanggalLahir->translatedFormat('d F Y');

            // Hitung umur
            $umur = $tanggalLahir->age;
            $umurBulan = $tanggalLahir->diff(Carbon::now())->format('%m') - 1;
            $umurString = $umur . ' Tahun';

            // Tambahkan umur dalam bulan jika bulan kelahiran lebih kecil dari bulan saat ini
            if ($umurBulan > 0) {
                $umurString .= ' ' . $umurBulan . ' Bulan';
            }

            // Tambahkan umur ke string
            $tempatTanggalLahir .= ' / ' . $umurString;
        }

        return $tempatTanggalLahir;
    }
}
