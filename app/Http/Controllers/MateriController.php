<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materi = Materi::all();
        return view('materi.index', compact('materi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Ambil data mata kuliah dan dosen untuk form input materi
        $mata_kuliah = MataKuliah::all();
        $users = User::all();
        return view('materi.create', compact('mata_kuliah', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'mata_kuliah_id' => 'required',
            'dosen_id' => 'required',
            'pertemuan' => 'required',
            'pokok_bahasan' => 'required',
            'file_materi' => 'required|file|mimes:pdf|max:2048',
        ]);
        $input = $request->all();
        if ($request->hasFile('file_materi')) {
            $file = $request->file('file_materi');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            // Simpan file ke dalam folder public/materi
            $file->move(public_path('materi'), $filename);
            $input['file_materi'] = $filename;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Materi $materi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Materi $materi)
    {
        $mata_kuliah = MataKuliah::all();
        $users = User::all();
        return view('materi.edit', compact('materi', 'mata_kuliah', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Materi $materi)
    {
        $input = $request->validate([
            'mata_kuliah_id' => 'required',
            'dosen_id' => 'required',
            'pertemuan' => 'required',
            'pokok_bahasan' => 'required',
            'file_materi' => 'nullable|file|mimes:pdf|max:2048',
        ]);
        $input = $request->all();
        if ($request->hasFile('file_materi')) {
            // Hapus file lama jika ada
            if ($materi->file_materi) {
                $filePath = public_path('materi/' . $materi->file_materi);
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }
            $file = $request->file('file_materi');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            // Simpan file baru ke dalam folder public/materi
            $file->move(public_path('materi'), $filename);
            $input['file_materi'] = $filename;
        } else {
            // Jika tidak ada file baru, tetap gunakan file lama
            unset($input['file_materi']);
        }
        $materi->update($input);
        return redirect()->route('materi.index')->with('success', 'Materi berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Materi $materi)
    {
        if ($materi->file_materi) {
            $filePath = public_path('materi/' . $materi->file_materi);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }
        $materi->delete();
        return redirect()->route('materi.index')->with('success', 'Materi berhasil dihapus');
    }
}
