@extends('layout.template')
@section('content')
    <div class="container mt-3">
        <h1>{{ isset($detailKrs) ? 'Edit' : 'Tambah' }} KRS</h1>
        <div class="card">
            <div class="card-body">

                <form method="POST" action="{{ isset($detailKrs) ? route('krs.update', $detailKrs->id) : route('krs.store') }}">
                    @csrf
                    @if(isset($detailKrs))
                        @method('PUT')
                    @endif

                    <div class="mb-3">
                        <label class="form-label">Mata Kuliah</label>
                        <select name="kode_matakuliah" class="form-control">
                        <option value="" disabled {{ !isset($detailKrs) ? 'selected' : '' }}>Pilih Mata Kuliah</option>
                        @foreach ($mataKuliah as $mk)
                            <option value="{{ $mk->kode_matakuliah }}"
                                {{ old('kode_matakuliah', $detailKrs->kode_matakuliah ?? '') == $mk->kode_matakuliah ? 'selected' : '' }}>
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
                        <option value="" disabled {{ !isset($detailKrs) ? 'selected' : '' }}>Pilih Mahasiswa</option>
                        @foreach ($mahasiswa as $m)
                            <option value="{{ $m->npm }}"
                                {{ old('npm', $detailKrs->npm ?? '') == $m->npm ? 'selected' : '' }}>
                                {{ $m->nama }}
                            </option>
                        @endforeach
                        </select>
                            @error('npm')
                                <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>

            </div>
        </div>
    </div>
@endsection