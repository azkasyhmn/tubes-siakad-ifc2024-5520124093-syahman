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
                <div class="mb-3 d-flex align-items-center gap-2">
                    @if(auth()->user()->isAdmin())
                        <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary">Tambah Mahasiswa</a>
                    @endif
                    <div class="input-group ms-auto" style="max-width:300px;">
                        <span class="input-group-text bg-white">
                            <i class="fa-solid fa-magnifying-glass text-muted"></i>
                        </span>
                        <input type="text" id="searchMahasiswa" class="form-control" placeholder="Cari mahasiswa...">
                    </div>
                </div>

                <table class="table table-hover table-bordered" id="tableMahasiswa">
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
                            <td>
                                <form action="{{ route('mahasiswa.destroy', $item->npm) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">
                                        Hapus
                                    </button>
                                </form>
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
    <script>
        initSearch('searchMahasiswa', 'tableMahasiswa', [1, 2, 3]);
    </script>
@endsection