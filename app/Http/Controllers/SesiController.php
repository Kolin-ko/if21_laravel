<?php

namespace App\Http\Controllers;

use App\Models\sesi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SesiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sesi = Sesi::all(); // SELECT * from sesi
        // dd($fakultas);
        return view('sesi.index', compact('sesi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(sesi $sesi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(sesi $sesi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, sesi $sesi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(sesi $sesi)
    {
        //
    }
}
