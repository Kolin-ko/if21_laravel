<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\mata_kuliah;
use App\Models\Prodi;
use Illuminate\Http\Request;

class MataKuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mata_kuliah = Mata_kuliah::all();
        return view('mata_kuliah.index', compact('mata_kuliah'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $prodi = Prodi::all();
        return view('mata_kuliah.create', compact('prodi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
          $input = $request->validate([
            'kode_mk' => 'required|unique:mata_kuliah',
            'nama' => 'required',
            'prodi_id' => 'required',
        ]);

        // simpan ke tabel fakultas
        Mata_kuliah::create($input);

        // redirect ke route fakultas.index
        return redirect() -> route('mata_kuliah.index')
                            ->with('success', 'Mata Kuliah berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(mata_kuliah $mata_kuliah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(mata_kuliah $mata_kuliah)
    {
        $prodi = Prodi::all();
        return view('mata_kuliah.edit', compact('mata_kuliah', 'prodi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, mata_kuliah $mata_kuliah)
    {
        $input = $request->validate([
            'kode_mk' => 'required',
            'nama' => 'required',
            'prodi_id' => 'required'
        ]);
        $mata_kuliah->update($input);
        return redirect()->route('mata_kuliah.index')
                         ->with('success', 'Mata Kuliah berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(mata_kuliah $mata_kuliah)
    {
        $mata_kuliah->delete();
        return redirect()->route('mata_kuliah.index')
                         ->with('success', 'Mata Kuliah berhasil dihapus');
    }
}
