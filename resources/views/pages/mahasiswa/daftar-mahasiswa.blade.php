@extends('layout.template')
@section('content')
    <div class="container mt-3">
        <title>Mahasiswa</title>
        <h1>Halaman Mahasiswa</h1>
        @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
        @endif
        <div class="card">
            <div class="card-body">
                <div class="button mb-3 ">
                    <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary">Tambah Mahasiswa</a>
                </div>
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">NPM</th>
                            <th scope="col">Dosen</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataMahasiswa as $item)
                        <tr>
                            <td scope="row">{{ $loop->iteration }}</td>
                            <td>{{ $item->npm }}</td>
                            <td>{{ $item->dosen->nama }}</td>
                            <td>{{ $item->nama }}</td>
                            <td><button type="button" class="btn btn-danger">Hapus</button>
                                <a href="{{ route('mahasiswa.edit', ['mahasiswa' => $item->npm ]) }}" class="btn btn-warning">Edit</a>
                                <a href="{{ route('mahasiswa.show', ['mahasiswa' => $item->npm ]) }}" class="btn btn-info">Detail</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection