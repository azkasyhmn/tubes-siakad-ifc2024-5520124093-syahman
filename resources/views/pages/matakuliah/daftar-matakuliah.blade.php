@extends('layout.template')
@section('content')
    <div class="container mt-3">
        <title>Mata Kuliah</title>
        <h1>Halaman Mata Kuliah</h1>
        <div class="card">
            <div class="card-body">
                <div class="button mb-3 ">
                    <a href="{{ route('matakuliah.create') }}" class="btn btn-primary">Tambah Mata Kuliah</a>
                </div>
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Kode Mata Kuliah</th>
                            <th scope="col">Nama</th>
                            <th scope="col">SKS</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataMataKuliah as $item)
                        <tr>
                            <td scope="row">{{ $loop->iteration }}</td>
                            <td>{{ $item->kode_matakuliah }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->sks }}</td>
                            <td><button type="button" class="btn btn-danger">Hapus</button>
                                <button type="button" class="btn btn-warning">Edit</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection