<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftaran;
use App\Models\Kunjungan;
use App\Models\Referensi;

class TestingController extends Controller
{
    public function getKunjungan()
    {
        $kunjungans = Kunjungan::all();
        return response()->json($kunjungans);
    }

    public function getPendaftaran()
    {
        $pendaftarans = Pendaftaran::all();
        return response()->json($pendaftarans);
    }

    public function getReferensi()
    {
        $referensi = Referensi::all();
        return response()->json($referensi);
    }
}
