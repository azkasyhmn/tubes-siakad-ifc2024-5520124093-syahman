@extends('layout.template')
@section('content')
    <div class="container mt-3">
        <div class="card">
            <div class="card-header">
                <strong>Detail Mahasiswa</strong>
            </div>
            <div class="card-body">
                <p>NPM: {{ $detailMahasiswa->npm }}</p>
                <p>Dosen Wali: {{ $detailMahasiswa->dosen->nama }}</p>
                <p>Nama Mahasiswa: {{ $detailMahasiswa->nama }}</p>
            </div>
        </div>
    </div>
@endsection