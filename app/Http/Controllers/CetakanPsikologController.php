<?php

namespace App\Http\Controllers;

use App\Models\TesKematanganSekolah;
use Illuminate\Http\Request;

class CetakanPsikologController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $kunjunganId = $request->input('kunjunganId');
        session(['kunjunganId' => $kunjunganId]);
        return view('cetakan.psikolog.index');
    }
}
