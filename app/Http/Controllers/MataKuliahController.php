<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\MataKuliah;

class MataKuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataMataKuliah = MataKuliah::orderByDesc('kode_matakuliah')->get();
        return view('pages.matakuliah.daftar-matakuliah', compact('dataMataKuliah'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.matakuliah.form-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_matakuliah' => 'required',
            'nama' => 'required',
            'sks' => 'required',
        ]);

        MataKuliah::create($validated);
        return redirect()->route('matakuliah.index')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $kode_matakuliah)
    {
        $detailMatkul = MataKuliah::findOrFail($kode_matakuliah);
        return view('pages.matakuliah.detail-matakuliah', compact('detailMatkul'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $kode_matakuliah)
    {
        $detailMatkul = MataKuliah::findOrFail($kode_matakuliah);
        return view('pages.matakuliah.form-create', compact('detailMatkul'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $kode_matakuliah)
    {
        $validated = $request->validate(
            [
                'kode_matakuliah' => 'required',
                'nama' => 'required|min:3',
                'sks' => 'required',
            ],
            [
                'kode_matakuliah.required' => 'Kode Mata Kuliah harus diisi.',
                'nama.min' => 'Nama terlalu pendek, minimal 3 karakter',
                'sks.min' => 'Isi SKS'
            ]
        );

        MataKuliah::where('kode_matakuliah', $kode_matakuliah)->update($validated);
        return redirect()->route('matakuliah.index')->with('success', 'Data berhasil di update!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $kode_matakuliah)
    {
        MataKuliah::where('kode_matakuliah', $kode_matakuliah)->delete();
        return redirect()->route('matakuliah.index')->with('success', 'Data mata kuliah berhasil dihapus.');
    }
}
