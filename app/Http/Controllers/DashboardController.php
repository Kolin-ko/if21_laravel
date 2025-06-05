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

        $grafikjumlahkelasprodi = DB::select("
            SELECT prodi.nama, jadwal.tahun_akademik, COUNT(kelas) as jumlah
            FROM jadwal
            JOIN mata_kuliah ON jadwal.mata_kuliah_id = mata_kuliah.id
            JOIN prodi ON mata_kuliah.prodi_id = prodi.id
            GROUP BY prodi.nama, jadwal.tahun_akademik
            Order By jadwal.tahun_akademik, prodi.nama
            ");

        return view('dashboard.index', compact('mahasiswaprodi', 'mahasiswaasalsma', 'mahasiswatahunmasuk', 'grafikjumlahkelasprodi'));
    }
}
