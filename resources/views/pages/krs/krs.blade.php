@extends('layout.template')
@section('content')
    <div class="container mt-3">
        <title>KRS</title>
        <h1>Halaman KRS</h1>
        <div class="card">
            <div class="card-body">
                <div class="button mb-3 ">
                    <a href="{{ route('krs.create') }}" class="btn btn-primary">Tambah KRS</a>
                </div>
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Mata Kuliah</th>
                            <th scope="col">Nama Mahasiswa</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataKrs as $item)
                        <tr>
                            <td scope="row">{{ $loop->iteration }}</td>
                            <td>{{ $item->mataKuliah->nama }}</td>
                            <td>{{ $item->mahasiswa->nama }}</td>
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