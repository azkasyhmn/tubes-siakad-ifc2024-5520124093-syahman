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
                <div class="mb-3 d-flex align-items-center gap-2">
                    @if(auth()->user()->isAdmin())
                        <a href="{{ route('jadwal.create') }}" class="btn btn-primary">Tambah Jadwal</a>
                    @endif
                    <div class="input-group ms-auto" style="max-width:300px;">
                        <span class="input-group-text bg-white">
                            <i class="fa-solid fa-magnifying-glass text-muted"></i>
                        </span>
                        <input type="text" id="searchJadwal" class="form-control"placeholder="Cari jadwal...">
                    </div>
                </div>

                <table class="table table-hover table-bordered" id="tableJadwal">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Mata Kuliah</th>
                            <th scope="col">Dosen</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Hari</th>
                            <th scope="col">Waktu</th>
                            @if(auth()->user()->isAdmin())
                                <th>Aksi</th>
                            @endif
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
                                @if(auth()->user()->isAdmin())
                                    <td>
                                        <form action="{{ route('jadwal.destroy', $item->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">
                                                Hapus
                                            </button>
                                        </form>
                                        <a href="{{ route('jadwal.edit', ['jadwal' => $item->id ]) }}" class="btn btn-warning">Edit</a>
                                        <a href="{{ route('jadwal.show', ['jadwal' => $item->id ]) }}" class="btn btn-info">Detail</a>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<script>
    initSearch('searchJadwal', 'tableJadwal', [1, 2, 3, 4, 5]);
</script>
@endsection