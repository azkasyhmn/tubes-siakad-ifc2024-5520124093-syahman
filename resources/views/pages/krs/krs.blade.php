@extends('layout.template')
@section('content')
<div class="container mt-3">
    <h1>Halaman KRS</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="mb-3 d-flex align-items-center gap-2">
            @if(auth()->user()->isAdmin())
                <a href="{{ route('krs.create') }}" class="btn btn-primary mb-3">Tambah KRS</a>
                <a href="{{ route('krs.export.pdf') }}" class="btn btn-danger mb-3">
                    Export PDF
                </a>
                <a href="{{ route('krs.export.excel') }}" class="btn btn-success mb-3">
                    <i class="fa-solid fa-file-excel me-1"></i>Export Excel
                </a>
            @elseif(auth()->user()->isMahasiswa())
                <a href="{{ route('mahasiswa.krs.create') }}" class="btn btn-primary mb-3">Ambil Mata Kuliah</a>
                <a href="{{ route('mahasiswa.krs.export.pdf') }}" class="btn btn-danger mb-3">
                    Export PDF
                </a>
            @endif
            <div class="input-group ms-auto" style="max-width:300px;">
                <span class="input-group-text bg-white">
                    <i class="fa-solid fa-magnifying-glass text-muted"></i>
                </span>
                <input type="text" id="searchKrs" class="form-control"
                    placeholder="Cari KRS...">
            </div>
        </div>

            <table class="table table-hover table-bordered" id="tableKrs">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Mata Kuliah</th>
                        <th>Nama Mahasiswa</th>
                        @if(auth()->user()->isAdmin())
                            <th>Aksi</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @forelse($dataKrs as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->mataKuliah->nama ?? '-' }}</td>
                        <td>{{ $item->mahasiswa->nama ?? '-' }}</td>
                        @if(auth()->user()->isAdmin())
                        <td>
                            <form action="{{ route('krs.destroy', $item->id) }}"
                                  method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin ingin menghapus?')">
                                    Hapus
                                </button>
                            </form>
                            <a href="{{ route('krs.edit', $item->id) }}"
                               class="btn btn-warning btn-sm">Edit</a>
                            <a href="{{ route('krs.show', $item->id) }}"
                               class="btn btn-info btn-sm">Detail</a>
                        </td>
                        @endif
                    </tr>
                    @empty
                    <tr>
                        <td colspan="{{ auth()->user()->isAdmin() ? 4 : 3 }}"
                            class="text-center text-muted py-3">
                            @if(auth()->user()->isMahasiswa())
                                Anda belum mengambil mata kuliah. Klik <strong>Ambil Mata Kuliah</strong> untuk mulai.
                            @else
                                Belum ada data KRS.
                            @endif
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>
</div>
<script>
    initSearch('searchKrs', 'tableKrs', [1, 2]);
</script>
@endsection