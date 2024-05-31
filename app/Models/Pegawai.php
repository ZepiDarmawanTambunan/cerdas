<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $connection = 'master';
    protected $table = 'pegawai';
    protected $primaryKey = 'ID';

    protected $fillable = [
        'NIP',
        'NAMA',
        'PANGGILAN',
        'GELAR_DEPAN',
        'GELAR_BELAKANG',
        'TEMPAT_LAHIR',
        'TANGGAL_LAHIR',
        'AGAMA',
        'JENIS_KELAMIN',
        'PROFESI',
        'SMF',
        'ALAMAT',
        'RT',
        'RW',
        'KODEPOS',
        'WILAYAH',
        'NON_PEGAWAI',
        'STATUS'
    ];

    protected $dates = [
        'TANGGAL_LAHIR',
        'TANGGAL',
    ];

    public function getNamaLengkapAttribute()
    {
        $gelar_depan = $this->GELAR_DEPAN;
        $nama = $this->NAMA;
        $gelar_belakang = $this->GELAR_BELAKANG;

        // Mengonversi setiap kata dalam nama menjadi huruf kapital
        $nama_kapital = ucwords(strtolower($nama));

        // Menggabungkan gelar depan, nama, dan gelar belakang dengan spasi
        $nama_lengkap = implode(' ', array_filter([$gelar_depan, $nama_kapital, $gelar_belakang]));

        return $nama_lengkap;
    }

    public function kunjungan()
    {
        return $this->hasMany(Kunjungan::class, 'DPJP', 'ID');
    }

    public function dokter()
    {
        return $this->hasOne(Dokter::class, 'NIP', 'NIP');
    }

    public function pengguna()
    {
        return $this->hasOne(Pengguna::class, 'NIP', 'NIP');
    }
}
