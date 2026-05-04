@extends('layout.template')
@section('content')
    <div class="container mt-3">
        <h1>{{ isset($detailJadwal) ? 'Edit' : 'Tambah' }} Jadwal</h1>
        <div class="card">
            <div class="card-body">

                <form method="POST" action="{{ isset($detailJadwal) ? route('jadwal.update', ['jadwal' => $detailJadwal->id]) : route('jadwal.store') }}">
                    @csrf
                    @if(isset($detailJadwal))
                        @method('PUT')
                    @endif

                    <div class="mb-3">
                        <label class="form-label">Mata Kuliah</label>
                        <select name="kode_matakuliah" class="form-control">
                        <option value="" disabled {{ !isset($detailJadwal) ? 'selected' : '' }}>Pilih Mata Kuliah</option>
                        @foreach ($mataKuliah as $mk)
                            <option value="{{ $mk->kode_matakuliah }}"
                                {{ old('kode_matakuliah', $detailJadwal->kode_matakuliah ?? '') == $mk->kode_matakuliah ? 'selected' : '' }}>
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
                        <option value="" disabled {{ !isset($detailJadwal) ? 'selected' : '' }}>Pilih Dosen</option>
                            @foreach ($dosen as $d)
                                <option value="{{ $d->nidn }}" 
                                    {{ old('nidn', $detailJadwal->nidn ?? '') == $d->nidn ? 'selected' : '' }}>
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
                        <input type="text" class="form-control" name="kelas" value="{{ old('kelas', $detailJadwal->kelas ?? '') }}">

                        @error('kelas')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Hari</label>
                        <select name="hari" class="form-control">
                            <option value="" disabled {{ !isset($detailJadwal) ? 'selected' : '' }}>Pilih Hari</option>
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
                        <input type="time" class="form-control" name="jam_mulai" value="{{ old('jam_mulai', $detailJadwal->jam_mulai ?? '') }}">

                        @error('jam_mulai')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Jam Selesai</label>
                        <input type="time" class="form-control" name="jam_selesai" value="{{ old('jadwal', $detailJadwal->jam_selesai ?? '') }}">

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