<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Referensi extends Model
{
    use HasFactory;

    protected $connection = 'master';
    protected $table = 'referensi';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'TABEL_ID';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'int';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'JENIS',
        'ID',
        'DESKRIPSI',
        'REF_ID',
        'TEKS',
        'CONFIG',
        'SCORING',
        'STATUS',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'CONFIG' => 'array', // CONFIG is stored as JSON, so we cast it to an array
    ];
}
