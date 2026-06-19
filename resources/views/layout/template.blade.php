<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Akademik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <script src="{{ asset('js/search.js') }}"></script>
    <style>
        .footer, h4 {
            position: absolute;
            bottom: 0;
            right: 0;
            height: 6vh;
            width: 100%;
            color: #fff;
            background: #252525;
            text-align: center;
            font-size: 10px;
            line-height: 35px;
        }
        .navbar-nav .nav-link { color: #fff; }
        .navbar-nav .nav-link:hover {
            background-color: #0017ac;
            border-radius: 10px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">Sistem Informasi Akademik</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">

                    @auth
                        {{-- Menu Admin --}}
                        @if(auth()->user()->isAdmin())
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.dashboard') }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/admin/dosen') }}">Dosen</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/admin/mahasiswa') }}">Mahasiswa</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/admin/matakuliah') }}">Mata Kuliah</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/admin/jadwal') }}">Jadwal</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/admin/krs') }}">KRS</a>
                            </li>
                        @endif

                        {{-- Menu Mahasiswa --}}
                        @if(auth()->user()->isMahasiswa())
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('mahasiswa.dashboard') }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/mhs/krs') }}">KRS Saya</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/mhs/jadwal') }}">Jadwal</a>
                            </li>
                        @endif

                        {{-- Info User & Logout --}}
                        <li class="nav-item d-flex align-items-center ms-3">
                            <span class="text-white me-3" style="font-size:13px;">
                                {{ auth()->user()->name }}
                                <span class="badge bg-warning text-dark ms-1">
                                    {{ ucfirst(auth()->user()->role) }}
                                </span>
                            </span>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-outline-light">
                                    Logout
                                </button>
                            </form>
                        </li>

                    @else
                        {{-- Belum login --}}
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                    @endauth

                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    @include('layout.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>