@extends('layout.template')
@section('content')
    <div class="container mt-3">
        <div class="card">
            <div class="card-header">Form Tambah Dosen</div>
            <div class="card-body">

                <form method="POST" action="{{ route('dosen.store') }}">
                    
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">NIDN</label>
                        <input type="text" class="form-control" name="nidn">

                        @error('nidn')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nama Dosen</label>
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