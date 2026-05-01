@extends('layout.template')
@section('content')
    <div class="container mt-3">
        <div class="card">
            <div class="card-header">
                <strong>Detail Dosen</strong>
            </div>
            <div class="card-body">
                <p>NIDN: {{ $detailDosen->nidn }}</p>
                <p>Nama Dosen: {{ $detailDosen->nama }}</p>
            </div>
        </div>
    </div>
@endsection