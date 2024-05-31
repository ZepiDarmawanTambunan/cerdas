<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kunjungan extends Model
{
    use HasFactory;

    protected $connection = 'pendaftaran';
    protected $table = 'kunjungan';
    protected $primaryKey = 'NOMOR';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'NOMOR', 'NOPEN', 'RUANGAN', 'MASUK', 'KELUAR', 'RUANG_KAMAR_TIDUR', 'REF',
        'DITERIMA_OLEH', 'BARU', 'TITIPAN', 'TITIPAN_KELAS', 'STATUS', 'FINAL_HASIL',
        'FINAL_HASIL_OLEH', 'FINAL_HASIL_TANGGAL', 'DPJP', 'OTOMATIS'
    ];

    public function pendaftaran()
    {
        return $this->belongsTo(Pendaftaran::class, 'NOPEN', 'NOMOR');
    }

    public function dpjp()
    {
        return $this->belongsTo(Dokter::class, 'DPJP', 'ID');
    }

    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class, 'RUANGAN', 'ID');
    }
}
