@extends('layout.template')
@section('content')
<div class="container mt-3">
    <h1>{{ isset($detailKrs) ? 'Edit KRS' : 'Ambil Mata Kuliah' }}</h1>
    <div class="card">
        <div class="card-body">

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if(isset($detailKrs))
                <form method="POST" action="{{ route('krs.update', $detailKrs->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Mata Kuliah</label>
                        <select name="kode_matakuliah" class="form-control">
                            <option value="" disabled>Pilih Mata Kuliah</option>
                            @foreach($mataKuliah as $mk)
                                <option value="{{ $mk->kode_matakuliah }}"
                                    {{ $detailKrs->kode_matakuliah == $mk->kode_matakuliah ? 'selected' : '' }}>
                                    {{ $mk->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Mahasiswa</label>
                        <select name="npm" class="form-control">
                            <option value="" disabled>Pilih Mahasiswa</option>
                            @foreach($mahasiswa as $m)
                                <option value="{{ $m->npm }}"
                                    {{ $detailKrs->npm == $m->npm ? 'selected' : '' }}>
                                    {{ $m->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('krs.index') }}" class="btn btn-secondary ms-2">Batal</a>
                </form>

            @elseif(auth()->user()->isAdmin())
                <form method="POST" action="{{ route('krs.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Mata Kuliah</label>
                        <select name="kode_matakuliah" class="form-control">
                            <option value="" disabled selected>Pilih Mata Kuliah</option>
                            @foreach($mataKuliah as $mk)
                                <option value="{{ $mk->kode_matakuliah }}">{{ $mk->nama }}</option>
                            @endforeach
                        </select>
                        @error('kode_matakuliah')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Mahasiswa</label>
                        <select name="npm" class="form-control">
                            <option value="" disabled selected>Pilih Mahasiswa</option>
                            @foreach($mahasiswa as $m)
                                <option value="{{ $m->npm }}">{{ $m->nama }}</option>
                            @endforeach
                        </select>
                        @error('npm')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('krs.index') }}" class="btn btn-secondary ms-2">Batal</a>
                </form>

            @else
                <form method="POST" action="{{ route('mahasiswa.krs.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Mahasiswa</label>
                        <input type="text" class="form-control" value="{{ auth()->user()->mahasiswa->nama ?? auth()->user()->name }}" disabled>
                        <div class="form-text text-muted">NPM tersimpan otomatis.</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Pilih Mata Kuliah</label>
                        <p class="text-muted small mb-2">Centang mata kuliah yang ingin diambil:</p>

                        @php
                            $sudahAmbil = auth()->user()->npm
                                ? \App\Models\Krs::where('npm', auth()->user()->npm)
                                    ->pluck('kode_matakuliah')->toArray()
                                : [];
                        @endphp

                        @forelse($mataKuliah as $mk)
                            @if(!in_array($mk->kode_matakuliah, $sudahAmbil))
                            <div class="border rounded mb-2" style="background:#f8fafc;">
                                <label for="mk_{{ $mk->kode_matakuliah }}" class="d-flex align-items-center gap-3 px-3 py-3 w-100 mb-0" style="cursor:pointer;">
                                    <input class="form-check-input mt-0 flex-shrink-0" type="checkbox" name="kode_matakuliah[]" value="{{ $mk->kode_matakuliah }}" id="mk_{{ $mk->kode_matakuliah }}" style="width:18px;height:18px;">
                                    <span class="fw-semibold">{{ $mk->nama }}</span>
                                    @if($mk->sks ?? null)
                                        <span class="badge bg-light text-muted border ms-auto">
                                            {{ $mk->sks }} SKS
                                        </span>
                                    @endif
                                </label>
                            </div>
                            @endif
                        @empty
                            <div class="alert alert-info">Tidak ada mata kuliah tersedia.</div>
                        @endforelse

                        @if(count($sudahAmbil) === $mataKuliah->count())
                            <div class="alert alert-success">
                                Anda sudah mengambil semua mata kuliah yang tersedia.
                            </div>
                        @endif

                        @error('kode_matakuliah')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan KRS</button>
                    <a href="{{ route('mahasiswa.krs.index') }}" class="btn btn-secondary ms-2">Batal</a>
                </form>
            @endif

        </div>
    </div>
</div>
@endsection