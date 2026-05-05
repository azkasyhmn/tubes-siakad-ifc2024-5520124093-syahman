<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Mahasiswa;
use App\Models\Dosen;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataMahasiswa = Mahasiswa::orderByDesc('npm')->get();
        return view('pages.mahasiswa.daftar-mahasiswa', compact('dataMahasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dosen = Dosen::all();
        return view('pages.mahasiswa.form-create', compact('dosen'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'npm' => 'required',
            'nidn' => 'required',
            'nama' => 'required',
        ]);

        Mahasiswa::create($validated);
        return redirect()->route('mahasiswa.index')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $npm)
    {
        $detailMahasiswa = Mahasiswa::findOrFail($npm);
        $detailDosen = Dosen::find($detailMahasiswa->nidn);
        return view('pages.mahasiswa.detail-mahasiswa', compact('detailMahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $npm)
    {
        $detailMahasiswa = Mahasiswa::findOrFail($npm);
        $dosen = Dosen::all();
        $detailDosen = Dosen::find($detailMahasiswa->nidn);
        return view('pages.mahasiswa.form-create', compact('detailMahasiswa', 'dosen', 'detailDosen'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $npm)
    {
        $validated = $request->validate(
            [
                'npm' => 'required|min:10',
                'nidn' => 'required|min:10',
                'nama' => 'required|min:3',
            ],
            [
                'npm.required' => 'NPM harus diisi.',
                'nidn.required' => 'NIDN harus diisi.',
                'nama.min' => 'nama terlalu pendek, minimal 3 karakter'
            ]
        );

        Mahasiswa::where('npm', $npm)->update($validated);
        return redirect()->route('mahasiswa.index')->with('success', 'Data berhasil di update!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $npm)
    {
        Mahasiswa::where('npm', $npm)->delete();
        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil dihapus.');
    }
}
