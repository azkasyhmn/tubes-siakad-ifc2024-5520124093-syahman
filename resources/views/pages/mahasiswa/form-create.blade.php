@extends('layout.template')
@section('content')
    <div class="container mt-3">
        <h1>{{ isset($detailMahasiswa) ? 'Edit' : 'Tambah' }} Mahasiswa</h1>
        <div class="card">
            <div class="card-header"></div>
            <div class="card-body">

                <form method="POST" action="{{ isset($detailMahasiswa) ? route('mahasiswa.update', ['mahasiswa' => $detailMahasiswa->npm]) : route('mahasiswa.store') }}">
                    @csrf
                    @if(isset($detailMahasiswa))
                        @method('PUT')
                    @endif

                    <div class="mb-3">
                        <label class="form-label">NPM</label>
                        <input type="text" class="form-control" name="npm" value="{{ old('npm', $detailMahasiswa->npm ?? '') }}">

                        @error('npm')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Dosen</label>
                        <select name="nidn" class="form-control">
                        <option value="" disabled {{ !isset($detailMahasiswa) ? 'selected' : '' }}>Pilih Dosen</option>
                            @foreach ($dosen as $d)
                                <option value="{{ $d->nidn }}" 
                                    {{ old('nidn', $detailMahasiswa->nidn ?? '') == $d->nidn ? 'selected' : '' }}>
                                    {{ $d->nama }}
                                </option>
                            @endforeach
                        </select>

                        @error('nidn')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nama Mahasiswa</label>
                        <input type="text" class="form-control" name="nama" value="{{ old('nama', $detailMahasiswa->nama ?? '') }}">

                        @error('nama')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>

            </div>
        </div>
    </div>
@endsection