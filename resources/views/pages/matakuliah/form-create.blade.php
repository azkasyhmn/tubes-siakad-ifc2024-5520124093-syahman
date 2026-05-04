@extends('layout.template')
@section('content')
    <div class="container mt-3">
        <h1>{{ isset($detailMatkul) ? 'Edit' : 'Tambah' }} Mata Kuliah</h1>
        <div class="card">
            <div class="card-header"></div>
            <div class="card-body">

                <form method="POST" action="{{ isset($detailMatkul) ? route('matakuliah.update', ['matakuliah' => $detailMatkul->kode_matakuliah]) : route('matakuliah.store') }}">
                    @csrf
                    @if(isset($detailMatkul))
                        @method('PUT')
                    @endif

                    <div class="mb-3">
                        <label class="form-label">Kode Mata Kuliah</label>
                        <input type="text" class="form-control" name="kode_matakuliah" value="{{ old('kode_matakuliah', $detailMatkul->kode_matakuliah ?? '') }}">

                        @error('kode_matakuliah')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nama Mata Kuliah</label>
                        <input type="text" class="form-control" name="nama" value="{{ old('nama', $detailMatkul->nama ?? '') }}">

                        @error('nama')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">SKS</label>
                        <input type="text" class="form-control" name="sks" value="{{ old('sks', $detailMatkul->sks ?? '') }}">

                        @error('sks')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>

            </div>
        </div>
    </div>
@endsection