@extends('layout.template')
@section('content')
    <div class="container mt-3">
        <div class="card">
            <div class="card-header">
                <strong>Detail Jadwal</strong>
            </div>
            <div class="card-body">
                <p>Mata Kuliah: {{ $detailKrs->mataKuliah->nama }}</p>
                <p>Mahasiswa: {{ $detailKrs->mahasiswa->nama }}</p>
            </div>
        </div>
    </div>
@endsection