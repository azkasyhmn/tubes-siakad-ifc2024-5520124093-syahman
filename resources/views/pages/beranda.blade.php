@extends('layout.template')

@section('content')
<div style="background:#f0f4f8; min-height:calc(100vh - 56px); padding:28px 0 60px;">
<div class="container">
    <div class="mb-4">
        <h5 class="fw-semibold text-dark mb-1">
            <i class="fa-solid fa-house me-2 text-primary"></i>
            Selamat datang, {{ auth()->user()->name }}!
        </h5>
        <p class="text-muted small mb-0">Ringkasan data Sistem Informasi Akademik</p>
    </div>
    <div class="row g-3 mb-4">
        <div class="col">
            <div class="card border-0 shadow-sm h-100" style="border-radius:12px;">
                <div class="card-body p-3">
                    <div class="d-flex align-items-center gap-3">
                        <div class="rounded-3 d-flex align-items-center justify-content-center"
                             style="width:48px;height:48px;background:#e6f1fb;">
                            <i class="fa-solid fa-chalkboard-user fa-lg" style="color:#185fa5;"></i>
                        </div>
                        <div>
                            <div class="fw-semibold fs-4 text-dark lh-1">{{ $stats['dosen'] }}</div>
                            <div class="text-muted small mt-1">Total Dosen</div>
                        </div>
                    </div>
                    <div class="mt-2">
                        <a href="{{ url('/admin/dosen') }}" class="text-decoration-none small" style="color:#185fa5;">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card border-0 shadow-sm h-100" style="border-radius:12px;">
                <div class="card-body p-3">
                    <div class="d-flex align-items-center gap-3">
                        <div class="rounded-3 d-flex align-items-center justify-content-center"
                             style="width:48px;height:48px;background:#eaf3de;">
                            <i class="fa-solid fa-user-graduate fa-lg" style="color:#3b6d11;"></i>
                        </div>
                        <div>
                            <div class="fw-semibold fs-4 text-dark lh-1">{{ $stats['mahasiswa'] }}</div>
                            <div class="text-muted small mt-1">Total Mahasiswa</div>
                        </div>
                    </div>
                    <div class="mt-2">
                        <a href="{{ url('/admin/mahasiswa') }}" class="text-decoration-none small" style="color:#3b6d11;">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card border-0 shadow-sm h-100" style="border-radius:12px;">
                <div class="card-body p-3">
                    <div class="d-flex align-items-center gap-3">
                        <div class="rounded-3 d-flex align-items-center justify-content-center"
                             style="width:48px;height:48px;background:#faeeda;">
                            <i class="fa-solid fa-book fa-lg" style="color:#854f0b;"></i>
                        </div>
                        <div>
                            <div class="fw-semibold fs-4 text-dark lh-1">{{ $stats['matakuliah'] }}</div>
                            <div class="text-muted small mt-1">Mata Kuliah</div>
                        </div>
                    </div>
                    <div class="mt-2">
                        <a href="{{ url('/admin/matakuliah') }}" class="text-decoration-none small" style="color:#854f0b;">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card border-0 shadow-sm h-100" style="border-radius:12px;">
                <div class="card-body p-3">
                    <div class="d-flex align-items-center gap-3">
                        <div class="rounded-3 d-flex align-items-center justify-content-center"
                             style="width:48px;height:48px;background:#eeedfe;">
                            <i class="fa-solid fa-calendar-days fa-lg" style="color:#534ab7;"></i>
                        </div>
                        <div>
                            <div class="fw-semibold fs-4 text-dark lh-1">{{ $stats['jadwal'] }}</div>
                            <div class="text-muted small mt-1">Total Jadwal</div>
                        </div>
                    </div>
                    <div class="mt-2">
                        <a href="{{ url('/admin/jadwal') }}" class="text-decoration-none small" style="color:#534ab7;">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card border-0 shadow-sm h-100" style="border-radius:12px;">
                <div class="card-body p-3">
                    <div class="d-flex align-items-center gap-3">
                        <div class="rounded-3 d-flex align-items-center justify-content-center"
                             style="width:48px;height:48px;background:#e1f5ee;">
                            <i class="fa-solid fa-file-pen fa-lg" style="color:#0f6e56;"></i>
                        </div>
                        <div>
                            <div class="fw-semibold fs-4 text-dark lh-1">{{ $stats['krs'] }}</div>
                            <div class="text-muted small mt-1">Total KRS</div>
                        </div>
                    </div>
                    <div class="mt-2">
                        <a href="{{ url('/admin/krs') }}" class="text-decoration-none small" style="color:#0f6e56;">
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="card border-0 shadow-sm" style="border-radius:12px;">
        <div class="card-header bg-white d-flex justify-content-between align-items-center py-3"
             style="border-radius:12px 12px 0 0; border-bottom:1px solid #e9ecef;">
            <span class="fw-semibold small text-dark">
                <i class="fa-solid fa-clock-rotate-left me-2 text-primary"></i>KRS Terbaru
            </span>
            <a href="{{ url('/admin/krs') }}" class="small text-decoration-none" style="color:#185fa5;">
                Lihat semua <i class="fa-solid fa-arrow-right ms-1"></i>
            </a>
        </div>
        <div class="card-body p-0">
            <table class="table table-hover mb-0" style="font-size:13px;">
                <thead style="background:#f8fafc;">
                    <tr>
                        <th class="px-3 py-2 fw-normal text-muted border-0">No</th>
                        <th class="px-3 py-2 fw-normal text-muted border-0">Mahasiswa</th>
                        <th class="px-3 py-2 fw-normal text-muted border-0">Mata Kuliah</th>
                        <th class="px-3 py-2 fw-normal text-muted border-0">Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($krsTerbaru as $i => $krs)
                    <tr>
                        <td class="px-3">{{ $i + 1 }}</td>
                        <td class="px-3">
                            <i class="fa-solid fa-circle-user me-1 text-muted"></i>
                            {{ $krs->mahasiswa->nama ?? '-' }}
                        </td>
                        <td class="px-3">
                            <i class="fa-solid fa-book-open me-1 text-muted"></i>
                            {{ $krs->mataKuliah->nama ?? '-' }}
                        </td>
                        <td class="px-3 text-muted">
                            <i class="fa-regular fa-calendar me-1"></i>
                            {{ $krs->created_at->format('d M Y') }}
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted py-3">
                            <i class="fa-solid fa-inbox me-2"></i>Belum ada data KRS
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
@endsection