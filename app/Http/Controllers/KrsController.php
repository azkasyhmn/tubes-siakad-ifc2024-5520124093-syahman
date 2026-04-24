<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Krs;
use App\Models\MataKuliah;
use App\Models\Mahasiswa;

class KrsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataKrs = Krs::orderByDesc('id')->get();
        return view('pages.krs.krs', compact('dataKrs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mataKuliah = MataKuliah::all();
        $mahasiswa = Mahasiswa::all();
        return view('pages.krs.form-create', compact('mataKuliah'), compact('mahasiswa'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_matakuliah' => 'required',
            'npm' => 'required',
        ]);

        Krs::create($validated);
        return redirect()->route('krs.index')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
