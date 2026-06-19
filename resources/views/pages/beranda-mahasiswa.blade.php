@extends('layout.template')

@section('content')
<div style="background:#f0f4f8; min-height:calc(100vh - 56px); padding:28px 0 60px;">
<div class="container">

    <div class="mb-4">
        <h5 class="fw-semibold text-dark mb-1">
            <i class="fa-solid fa-house me-2 text-primary"></i>
            Selamat datang, {{ auth()->user()->name }}!
        </h5>
        <p class="text-muted small mb-0">Akses menu perkuliahan Anda di bawah ini</p>
    </div>

    <div class="row g-3">
        <div class="col-md-4">
            <a href="{{ url('/mhs/krs') }}" class="text-decoration-none">
                <div class="card border-0 shadow-sm h-100 text-center py-4"
                     style="border-radius:12px;">
                    <div class="card-body">
                        <div class="rounded-3 d-flex align-items-center justify-content-center mx-auto mb-3"
                             style="width:56px;height:56px;background:#e1f5ee;">
                            <i class="fa-solid fa-file-pen fa-xl" style="color:#0f6e56;"></i>
                        </div>
                        <div class="fw-semibold text-dark mb-1">KRS Saya</div>
                        <div class="text-muted small">Lihat & ambil mata kuliah</div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="{{ url('/mhs/jadwal') }}" class="text-decoration-none">
                <div class="card border-0 shadow-sm h-100 text-center py-4"
                     style="border-radius:12px;">
                    <div class="card-body">
                        <div class="rounded-3 d-flex align-items-center justify-content-center mx-auto mb-3"
                             style="width:56px;height:56px;background:#eeedfe;">
                            <i class="fa-solid fa-calendar-days fa-xl" style="color:#534ab7;"></i>
                        </div>
                        <div class="fw-semibold text-dark mb-1">Jadwal Kuliah</div>
                        <div class="text-muted small">Lihat jadwal perkuliahan</div>
                    </div>
                </div>
            </a>
        </div>
    </div>

</div>
</div>
@endsection