@extends('layout.template')
@section('content')
    <div class="container mt-3">
        <div class="card">
            <div class="card-header">
                <strong>Detail Mata Kuliah</strong>
            </div>
            <div class="card-body">
                <p>Kode Mata Kuliah: {{ $detailMatkul->kode_matakuliah }}</p>
                <p>Nama Mata Kuliah: {{ $detailMatkul->nama }}</p>
                <p>SKS: {{ $detailMatkul->sks }}</p>
            </div>
        </div>
    </div>
@endsection