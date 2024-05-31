<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    use HasFactory;

    protected $connection = 'master';
    protected $table = 'ruangan';
    protected $primaryKey = 'ID';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'ID',
        'JENIS',
        'JENIS_KUNJUNGAN',
        'REF_ID',
        'DESKRIPSI',
        'TANGGAL',
        'AKSES_PERMINTAAN',
        'STATUS'
    ];

    const CREATED_AT = 'TANGGAL';
    const UPDATED_AT = null;

    public $timestamps = false;

    public function kunjungan()
    {
        return $this->hasMany(Kunjungan::class, 'RUANGAN', 'ID');
    }
}
