@extends('layout.template')
@section('content')
    <div class="container mt-3">
        <div class="card">
            <div class="card-header">
                <strong>Detail Jadwal</strong>
            </div>
            <div class="card-body">
                <p>Mata Kuliah: {{ $detailJadwal->mataKuliah->nama }}</p>
                <p>Dosen: {{ $detailJadwal->dosen->nama }}</p>
                <p>Kelas: {{ $detailJadwal->kelas }}</p>
                <p>Hari: {{ $detailJadwal->hari }}</p>
                <p>Jam Mulai: {{ $detailJadwal->jam_mulai }}</p>
                <p>Jam Selesai: {{ $detailJadwal->jam_selesai }}</p>
            </div>
        </div>
    </div>
@endsection