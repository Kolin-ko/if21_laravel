<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $mahasiswaprodi = DB::select("SELECT prodi.nama, COUNT(*) as jumlah_mahasiswa
                                      FROM mahasiswa
                                      JOIN prodi ON mahasiswa.prodi_id = prodi.id
                                      GROUP BY prodi.nama");
        return view('dashboard.index');
    }
}
