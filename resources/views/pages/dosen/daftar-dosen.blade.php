@extends('layout.template')
@section('content')
    <div class="container mt-3">
        <title>Dosen</title>
        <h1>Halaman Dosen</h1>
        @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
        @endif
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
                            <td>
                                <form action="{{ route('dosen.destroy', $item->nidn) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">
                                        Hapus
                                    </button>
                                </form>
                                <a href="{{ route('dosen.edit', ['dosen' => $item->nidn ]) }}" class="btn btn-warning">Edit</a>
                                <a href="{{ route('dosen.show', ['dosen' => $item->nidn ]) }}" class="btn btn-info">Detail</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection