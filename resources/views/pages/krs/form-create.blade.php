@extends('layout.template')
@section('content')
    <div class="container mt-3">
        <div class="card">
            <div class="card-header">Form Tambah Mahasiswa</div>
            <div class="card-body">

                <form method="POST" action="{{ route('krs.store') }}">
                    
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Mata Kuliah</label>
                        <select name="kode_matakuliah" class="form-control">
                        <option value="" selected disabled hidden>Pilih Mata Kuliah</option>

                        @foreach ($mataKuliah as $mk)
                            <option value="{{ $mk->kode_matakuliah }}">
                                {{ $mk->nama }}
                            </option>
                        @endforeach
                        </select>

                        @error('kode_matakuliah')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nama Mahasiswa</label>
                        <select name="npm" class="form-control">
                        <option value="" selected disabled hidden>Pilih Mahasiswa</option>

                        @foreach ($mahasiswa as $m)
                            <option value="{{ $m->npm }}">
                                {{ $m->nama }}
                            </option>

                        @error('npm')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                        @endforeach
                        </select>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>

            </div>
        </div>
    </div>
@endsection