<?php

namespace App\Http\Controllers;

use App\Models\Kunjungan;
use Illuminate\Http\Request;

class CetakanController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $query = $request->input('query');
        $status = $request->input('status', '1'); // Default status to "Sedang Dilayani" (1)

        $query = trim($query);

        $models = Kunjungan::with(['pendaftaran.pasien', 'dpjp.pegawai', 'ruangan'])
            ->when($query, function($queryBuilder) use ($query) {
                $queryBuilder->whereHas('pendaftaran', function($q) use ($query) {
                    $q->where('NORM', 'like', "%{$query}%");
                });
            })
            ->where('STATUS', $status) // Filter by status
            ->simplePaginate(10)
            ->appends(['query' => $query, 'status' => $status]); // Append query and status to pagination links

        return view('cetakan.index', [
            'models' => $models,
            'query' => $query,
            'status' => $status,
        ]);
    }

    public function show($kunjunganId){
        $data['model'] = Kunjungan::with(['pendaftaran.pasien', 'dpjp.pegawai', 'ruangan'])
        ->where('STATUS', '!=', '0')->where('NOMOR', '=', $kunjunganId)->first();
        return view('cetakan.show', $data);
    }
}
