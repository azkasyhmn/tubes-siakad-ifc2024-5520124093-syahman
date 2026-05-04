@extends('layout.template')
@section('content')
    <div class="container mt-3">
        <title>Jadwal</title>
        <h1>Halaman Jadwal</h1>
        @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
        @endif
        <div class="card">
            <div class="card-body">
                <div class="button mb-3 ">
                    <a href="{{ route('jadwal.create') }}" class="btn btn-primary">Tambah Jadwal</a>
                </div>
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Mata Kuliah</th>
                            <th scope="col">Dosen</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Hari</th>
                            <th scope="col">Waktu</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataJadwal as $item)
                        <tr>
                            <td scope="row">{{ $loop->iteration }}</td>
                            <td>{{ $item->mataKuliah->nama }}</td>
                            <td>{{ $item->dosen->nama }}</td>
                            <td>{{ $item->kelas }}</td>
                            <td>{{ $item->hari }}</td>
                            <td>{{ $item->jam_mulai }} - {{ $item->jam_selesai }}</td>
                            <td><button type="button" class="btn btn-danger">Hapus</button>
                                <a href="{{ route('jadwal.edit', ['jadwal' => $item->id ]) }}" class="btn btn-warning">Edit</a>
                                <a href="{{ route('jadwal.show', ['jadwal' => $item->id ]) }}" class="btn btn-info">Detail</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection