<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Jadwal;
use App\Models\MataKuliah;
use App\Models\Dosen;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataJadwal = Jadwal::orderByDesc('id')->get();
        return view('pages.jadwal.jadwal', compact('dataJadwal'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dosen = Dosen::all();
        $mataKuliah = MataKuliah::all();
        return view('pages.jadwal.form-create', compact('dosen'), compact('mataKuliah'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_matakuliah' => 'required',
            'nidn' => 'required',
            'kelas' => 'required',
            'hari' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required|after:jam_mulai',
        ]);

        Jadwal::create($validated);
        return redirect()->route('jadwal.index')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $detailJadwal = Jadwal::findOrFail($id);
        $detailDosen = Jadwal::find($detailJadwal->nidn);
        $detailMatkul = Jadwal::find($detailJadwal->kode_matakuliah);
        return view('pages.jadwal.detail-jadwal', compact('detailJadwal'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $detailJadwal = Jadwal::findOrFail($id);

        $dosen = Dosen::all();
        $mataKuliah = MataKuliah::all();

        $detailDosen = Jadwal::find($detailJadwal->nidn);
        $detailMatkul = Jadwal::find($detailJadwal->kode_matakuliah);

        return view('pages.jadwal.form-create', compact('detailJadwal', 'dosen', 'mataKuliah', 'detailDosen', 'detailMatkul'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'kode_matakuliah' => 'required',
            'nidn' => 'required',
            'kelas' => 'required',
            'hari' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required|after:jam_mulai',
        ]);

        Jadwal::where('id', $id)->update($validated);
        return redirect()->route('jadwal.index')->with('success', 'Data berhasil di update!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Jadwal::where('id', $id)->delete();
        return redirect()->route('jadwal.index')->with('success', 'Data jadwal berhasil dihapus.');
    }
}
