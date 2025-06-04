<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\jadwal;
use App\Models\mata_kuliah;
use App\Models\sesi;
use App\Models\User;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jadwal = Jadwal::all(); // SELECT * from jadwal
        return view('jadwal.index', compact('jadwal'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mata_kuliah = Mata_kuliah::all();
        $users = User::all();
        $sesi = Sesi::all();
        return view('jadwal.create', compact('mata_kuliah', 'users', 'sesi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'tahun_akademik' => 'required',
            'kode_smt' => 'required',
            'kelas' => 'required|unique:jadwal',
            'mata_kuliah_id' => 'required',
            'dosen_id' => 'required',
            'sesi_id' => 'required'
        ]);

        // simpan ke tabel jadwal
        Jadwal::create($input);
        // redirect ke route fakultas.index
        return redirect() -> route('jadwal.index')
                            ->with('success', 'Jadwal berhasil disimpan');

    }

    /**
     * Display the specified resource.
     */
    public function show(jadwal $jadwal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(jadwal $jadwal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, jadwal $jadwal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(jadwal $jadwal)
    {
        //
    }
}
