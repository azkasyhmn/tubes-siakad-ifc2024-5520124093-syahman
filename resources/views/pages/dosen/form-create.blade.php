@extends('layout.template')
@section('content')
    <div class="container mt-3">
        <h1>{{ isset($detailDosen) ? 'Edit' : 'Tambah' }} Dosen</h1>
        <div class="card">
            <div class="card-header"></div>
            <div class="card-body">

                <form method="POST" action="{{ isset($detailDosen) ? route('dosen.update', ['dosen' => $detailDosen->nidn]) : route('dosen.store') }}">
                    @csrf
                    @if(isset($detailDosen))
                        @method('PUT')
                    @endif

                    <div class="mb-3">
                        <label class="form-label">NIDN</label>
                        <input type="text" class="form-control" name="nidn" value="{{ old('nidn', $detailDosen->nidn ?? '') }}">

                        @error('nidn')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nama Dosen</label>
                        <input type="text" class="form-control" name="nama" value="{{ old('nama', $detailDosen->nama ?? '') }}">

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