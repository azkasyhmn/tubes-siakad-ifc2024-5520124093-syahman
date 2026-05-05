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
        $detailKrs = Krs::findOrFail($id);
        $detailMahasiswa = Krs::find($detailKrs->npm);
        $detailMatkul = Krs::find($detailKrs->kode_matakuliah);
        return view('pages.krs.detail-krs', compact('detailKrs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $detailKrs = Krs::findOrFail($id);

        $mahasiswa = Mahasiswa::all();
        $mataKuliah = MataKuliah::all();

        $detailMahasiswa = Krs::find($detailKrs->npm);
        $detailMatkul = Krs::find($detailKrs->kode_matakuliah);

        return view('pages.krs.form-create', compact('detailKrs', 'mahasiswa', 'mataKuliah', 'detailMahasiswa', 'detailMatkul'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'kode_matakuliah' => 'required',
            'npm' => 'required',
        ]);

        Krs::where('id', $id)->update($validated);
        return redirect()->route('krs.index')->with('success', 'Data berhasil di update!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Krs::where('id', $id)->delete();
        return redirect()->route('krs.index')->with('success', 'Data KRS berhasil dihapus.');
    }
}
