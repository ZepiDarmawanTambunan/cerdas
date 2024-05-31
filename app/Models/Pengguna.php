<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    use HasFactory;

    protected $connection = 'aplikasi';
    protected $table = 'pengguna';
    protected $primaryKey = 'ID';
    public $timestamps = false;

    protected $fillable = [
        'LOGIN',
        'PASSWORD',
        'NAMA',
        'NIP',
        'NIK',
        'JENIS',
        'MASA_AKTIF',
        'LOCK_APP',
        'TERAKHIR_UBAH_PASSWOD',
        'STATUS'
    ];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'NIP', 'NIP');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'LOGIN', 'username');
    }
}
