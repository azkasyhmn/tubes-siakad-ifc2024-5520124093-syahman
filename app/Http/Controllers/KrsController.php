<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Krs;
use App\Models\MataKuliah;
use App\Models\Mahasiswa;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\KrsExport;
use Maatwebsite\Excel\Facades\Excel;

class KrsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->isAdmin()) {
            $dataKrs = Krs::with(['mahasiswa', 'mataKuliah'])
                          ->orderByDesc('id')->get();
        } else {
            $npm     = auth()->user()->npm;
            $dataKrs = Krs::with(['mahasiswa', 'mataKuliah'])
                          ->where('npm', $npm)
                          ->orderByDesc('id')->get();
        }

        return view('pages.krs.krs', compact('dataKrs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mataKuliah = MataKuliah::all();
        if (auth()->user()->isAdmin()) {
            $mahasiswa = Mahasiswa::all();
            return view('pages.krs.form-create', compact('mataKuliah', 'mahasiswa'));
        }

        return view('pages.krs.form-create', compact('mataKuliah'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (auth()->user()->isAdmin()) {
            $request->validate([
                'kode_matakuliah' => 'required',
                'npm'             => 'required',
            ]);

            $sudahAda = Krs::where('npm', $request->npm)->where('kode_matakuliah', $request->kode_matakuliah)->exists();

            if ($sudahAda) {
                return back()->withErrors([
                    'kode_matakuliah' => 'Mata kuliah ini sudah ada di KRS mahasiswa tersebut.'
                ])->withInput();
            }

            Krs::create([
                'npm'             => $request->npm,
                'kode_matakuliah' => $request->kode_matakuliah,
            ]);

            return redirect()->route('krs.index')->with('success', 'KRS berhasil ditambahkan!');

        } else {
            $request->validate([
                'kode_matakuliah'   => 'required|array|min:1',
                'kode_matakuliah.*' => 'required|string',
            ], [
                'kode_matakuliah.required' => 'Pilih minimal satu mata kuliah.',
                'kode_matakuliah.min'      => 'Pilih minimal satu mata kuliah.',
            ]);

            $npm      = auth()->user()->npm;
            $berhasil = 0;
            $duplikat = 0;

            foreach ($request->kode_matakuliah as $kodeMk) {
                $sudahAda = Krs::where('npm', $npm)->where('kode_matakuliah', $kodeMk)->exists();
                if ($sudahAda) {
                    $duplikat++;
                    continue;
                }

                Krs::create([
                    'npm'             => $npm,
                    'kode_matakuliah' => $kodeMk,
                ]);
                $berhasil++;
            }

            $pesan = "{$berhasil} mata kuliah berhasil diambil!";
            if ($duplikat > 0) {
                $pesan .= " ({$duplikat} mata kuliah dilewati karena sudah diambil)";
            }

            return redirect()->route('mahasiswa.krs.index')->with('success', $pesan);
        }
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

    public function exportPdf() {
            if (auth()->user()->isAdmin()) {
                $dataKrs = Krs::with(['mahasiswa', 'mataKuliah'])->orderByDesc('id')->get();
                $title   = 'Data KRS Seluruh Mahasiswa';
                $nama    = 'Semua Mahasiswa';
            } else {
                $npm     = auth()->user()->npm;
                $dataKrs = Krs::with(['mahasiswa', 'mataKuliah'])->where('npm', $npm)->orderByDesc('id')->get();
                $title   = 'Kartu Rencana Studi (KRS)';
                $nama    = auth()->user()->mahasiswa->nama ?? auth()->user()->name;
            }

            $pdf = Pdf::loadView('pages.krs.export-pdf', compact('dataKrs', 'title', 'nama'))->setPaper('a4', 'portrait');

            return $pdf->download('KRS-' . str_replace(' ', '-', $nama) . '.pdf');
    }

    public function exportExcel() {
        $filename = 'Data-KRS-' . now()->format('d-m-Y') . '.xlsx';

        return Excel::download(new KrsExport, $filename);
    }
}
