@extends('layout.template')
@section('content')
    <div class="container mt-3">
        <title>KRS</title>
        <h1>Halaman KRS</h1>
        @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
        @endif
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
                            <td>
                                <form action="{{ route('krs.destroy', $item->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">
                                        Hapus
                                    </button>
                                </form>
                                <a href="{{ route('krs.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                                <a href="{{ route('krs.show', $item->id) }}" class="btn btn-info">Detail</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection