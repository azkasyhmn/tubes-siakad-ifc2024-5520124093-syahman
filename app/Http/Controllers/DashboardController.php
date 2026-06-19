<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use App\Models\Jadwal;
use App\Models\Krs;

class DashboardController extends Controller
{
    public function adminDashboard()
    {
        $stats = [
            'dosen'       => Dosen::count(),
            'mahasiswa'   => Mahasiswa::count(),
            'matakuliah'  => MataKuliah::count(),
            'jadwal'      => Jadwal::count(),
            'krs'         => Krs::count(),
        ];

        // 5 KRS terbaru
        $krsTerbaru = Krs::with(['mahasiswa', 'mataKuliah'])
                         ->orderByDesc('id')
                         ->take(5)
                         ->get();

        return view('pages.beranda', compact('stats', 'krsTerbaru'));
    }

    public function mahasiswaDashboard()
    {
        return view('pages.beranda-mahasiswa');
    }
}
