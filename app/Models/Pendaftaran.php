<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $connection = 'pendaftaran';
    protected $table = 'pendaftaran';
    protected $primaryKey = 'NOMOR';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'NOMOR', 'NORM', 'TANGGAL', 'DIAGNOSA_MASUK', 'RUJUKAN', 'PAKET', 'BERAT_BAYI',
        'PANJANG_BAYI', 'CITO', 'RESIKO_JATUH', 'LOKASI_DITEMUKAN', 'TANGGAL_DITEMUKAN',
        'JAM_LAHIR', 'CONSENT_SATUSEHAT', 'OLEH', 'STATUS'
    ];

    public function kunjungans()
    {
        return $this->hasMany(Kunjungan::class, 'NOPEN', 'NOMOR');
    }

    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'NORM', 'NORM');
    }
}
