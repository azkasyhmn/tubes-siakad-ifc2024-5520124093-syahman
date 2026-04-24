@extends('layout.template')
@section('content')
    <div class="container mt-3">
        <div class="card">
            <div class="card-header">Form Tambah Jadwal</div>
            <div class="card-body">

                <form method="POST" action="{{ route('jadwal.store') }}">
                    
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
                        <label class="form-label">Kelas</label>
                        <input type="text" class="form-control" name="kelas">

                        @error('kelas')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Hari</label>
                        <select name="hari" class="form-control">
                            <option value="" selected disabled hidden>Pilih Hari</option>
                            <option>Senin</option>
                            <option>Selasa</option>
                            <option>Rabu</option>
                            <option>Kamis</option>
                            <option>Jumat</option>
                            <option>Sabtu</option>
                        </select>

                        @error('hari')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Jam Mulai</label>
                        <input type="time" class="form-control" name="jam_mulai">

                        @error('jam_mulai')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Jam Selesai</label>
                        <input type="time" class="form-control" name="jam_selesai">

                        @error('jam_selesai')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>

            </div>
        </div>
    </div>
@endsection