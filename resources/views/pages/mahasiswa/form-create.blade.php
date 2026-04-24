@extends('layout.template')
@section('content')
    <div class="container mt-3">
        <div class="card">
            <div class="card-header">Form Tambah Mahasiswa</div>
            <div class="card-body">

                <form method="POST" action="{{ route('mahasiswa.store') }}">
                    
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">NPM</label>
                        <input type="text" class="form-control" name="npm">

                        @error('npm')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Dosen</label>
                        <select name="nidn" class="form-control">
                        <option value="" selected disabled hidden>Pilih Dosen</option>

                        @foreach ($dosen as $d)
                            <option value="{{ $d->nidn }}">
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
                        <input type="text" class="form-control" name="nama">

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