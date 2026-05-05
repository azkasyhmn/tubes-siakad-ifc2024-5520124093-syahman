@extends('layout.template')
@section('content')
    <div class="container mt-3">
        <title>Mata Kuliah</title>
        <h1>Halaman Mata Kuliah</h1>
        @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
        @endif
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
                            <td>
                                <form action="{{ route('matakuliah.destroy', $item->kode_matakuliah) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">
                                        Hapus
                                    </button>
                                </form>
                                <a href="{{ route('matakuliah.edit', ['matakuliah' => $item->kode_matakuliah ]) }}" class="btn btn-warning">Edit</a>
                                <a href="{{ route('matakuliah.show', ['matakuliah' => $item->kode_matakuliah ]) }}" class="btn btn-info">Detail</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection