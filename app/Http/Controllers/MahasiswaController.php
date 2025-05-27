<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Prodi;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswa = Mahasiswa::all();
        return view('mahasiswa.index', compact('mahasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $prodi = Prodi::all();
        return view('mahasiswa.create', compact('prodi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
<<<<<<< HEAD
        $input = $request->validate([
            'nama' => 'required',
            'npm' => 'required|unique:mahasiswas',
=======
          $input = $request->validate([
            'nama' => 'required',
            'npm' => 'required|unique:mahasiswa',
>>>>>>> e5409382a023b42d2b33e423ed2b1bfed838dd40
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'jk' => 'required',
            'asal_sma' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
<<<<<<< HEAD
            'prodi_id' => 'required',
=======
            'prodi_id' => 'required'
>>>>>>> e5409382a023b42d2b33e423ed2b1bfed838dd40
        ]);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            // cara ke-1 upload ke dalam folder public
            // $file->move(public_path('images'), $filename);
            // cara ke-2 upload ke dalam folder storage
            $file->storeAs('images', $filename);

            $input['foto'] = $filename;
        }
        Mahasiswa::create($input);
        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();
        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa deleted successfully.');
    }
}
