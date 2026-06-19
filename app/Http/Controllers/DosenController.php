<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Dosen;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataDosen = Dosen::orderByDesc('nidn')->get();
        return view('pages.dosen.daftar-dosen', compact('dataDosen'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.dosen.form-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'nidn' => 'required',
                'nama' => 'required',
            ],
        );

        Dosen::create($validated);
        return redirect()->route('dosen.index')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $nidn)
    {
        $detailDosen = Dosen::findOrFail($nidn);
        return view('pages.dosen.detail-dosen', compact('detailDosen'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $nidn)
    {
        $detailDosen = Dosen::findOrFail($nidn);
        return view('pages.dosen.form-create', compact('detailDosen'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $nidn)
    {
        $validated = $request->validate(
            [
                'nidn' => 'required|min:3',
                'nama' => 'required|min:3',
            ],
            [
                'nidn.required' => 'NIDN harus diisi.',
                'nama.min' => 'nama terlalu pendek, minimal 3 karakter'
            ]
        );

        Dosen::where('nidn', $nidn)->update($validated);
        return redirect()->route('dosen.index')->with('success', 'Data berhasil di update!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $nidn)
    {
        Dosen::where('nidn', $nidn)->delete();
        return redirect()->route('dosen.index')->with('success', 'Data dosen berhasil dihapus.');
    }

    
}
