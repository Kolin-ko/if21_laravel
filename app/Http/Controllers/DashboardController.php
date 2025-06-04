<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
USE DB;
use function Laravel\Prompts\select;

class DashboardController extends Controller
{
    public function index()
    {
        $mahasiswaprodi = DB::select("
            SELECT prodi.nama, COUNT(*) as jumlah
            FROM mahasiswa
            JOIN prodi ON mahasiswa.prodi_id = prodi.id
            GROUP BY prodi.nama
            ");

        $mahasiswaasalsma = DB::select("
            SELECT mahasiswa.asal_sma, count(*) as jumlah
            FROM mahasiswa
            GROUP BY asal_sma
            ");

        $mahasiswatahunmasuk = DB::select("
            SELECT left(npm,2) as tahun, count(*) as jumlah
            from mahasiswa
            GROUP BY LEFT(npm,2)
            ");

        return view('dashboard.index', compact('mahasiswaprodi', 'mahasiswaasalsma', 'mahasiswatahunmasuk'));
    }
}
