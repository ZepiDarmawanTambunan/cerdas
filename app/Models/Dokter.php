<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory;

    protected $connection = 'master';
    protected $table = 'dokter';
    protected $primaryKey = 'ID';

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'NIP', 'NIP');
    }
}
