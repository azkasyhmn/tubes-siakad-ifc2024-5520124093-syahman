@extends('layout.template')
@section('content')
    <div class="container mt-3">
        <title>Dosen</title>
        <h1>Halaman Dosen</h1>
        <div class="card">
            <div class="card-body">
                <div class="button mb-3 ">
                    <a href="{{ route('dosen.create') }}" class="btn btn-primary">Tambah Dosen</a>
                </div>
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">NIDN</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataDosen as $item)
                        <tr>
                            <td scope="row">{{ $loop->iteration }}</td>
                            <td>{{ $item->nidn }}</td>
                            <td>{{ $item->nama }}</td>
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