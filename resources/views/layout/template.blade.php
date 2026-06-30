<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Akademik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
        * { box-sizing: border-box; }
        body { margin: 0; background: #f0f4f8; }
        
        .main-content {
            margin-left: 240px;
            min-height: 100vh;
            padding: 1px 32px 0;
        }
        .container {
            padding-top: 24px;
        }
        
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 240px;
            height: 100vh;
            background: #0d6efd;
            display: flex;
            flex-direction: column;
            padding: 20px 0;
            z-index: 1000;
        }
        .sb-brand {
            padding: 0 20px 20px;
            display: flex;
            align-items: center;
            gap: 10px;
            border-bottom: 1px solid rgba(255,255,255,0.15);
            margin-bottom: 16px;
        }
        .sb-brand-icon {
            width: 36px; height: 36px;
            border-radius: 8px;
            background: rgba(255,255,255,0.15);
            display: flex; align-items: center; justify-content: center;
            font-size: 17px; color: #fff;
            flex-shrink: 0;
        }
        .sb-brand-text {
            color: #fff;
            font-size: 13px;
            font-weight: 600;
            line-height: 1.3;
        }
        .sb-menu { flex: 1; padding: 0 12px; overflow-y: auto; }
        .sb-link {
            display: flex;
            align-items: center;
            padding: 10px 16px;
            border-radius: 8px;
            color: rgba(255,255,255,0.85);
            font-size: 14px;
            text-decoration: none;
            margin-bottom: 3px;
            transition: background .15s;
        }
        .sb-link:hover {
            background: rgba(255,255,255,0.1);
            color: #fff;
        }
        .sb-link.active {
            background: rgba(255,255,255,0.2);
            color: #fff;
            font-weight: 600;
        }

        .sb-user {
            padding: 14px 20px 0;
            border-top: 1px solid rgba(255,255,255,0.15);
            margin-top: 12px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .sb-avatar {
            width: 34px; height: 34px;
            border-radius: 50%;
            background: rgba(255,255,255,0.2);
            display: flex; align-items: center; justify-content: center;
            font-size: 13px; font-weight: 600; color: #fff;
            flex-shrink: 0;
        }
        .sb-user-info { flex: 1; min-width: 0; }
        .sb-user-name {
            font-size: 12.5px; color: #fff; font-weight: 600;
            white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
        }
        .sb-user-role {
            font-size: 10px; color: #1a1a1a;
            background: #ffc107;
            display: inline-block;
            padding: 1px 7px;
            border-radius: 10px;
            margin-top: 2px;
            font-weight: 600;
        }
        .sb-logout-form { padding: 14px 20px 0; }
        .sb-logout {
            background: transparent;
            border: 1px solid rgba(255,255,255,0.4);
            color: #fff;
            font-size: 12.5px;
            padding: 8px;
            border-radius: 6px;
            cursor: pointer;
            width: 100%;
        }
        .sb-logout:hover { background: rgba(255,255,255,0.1); }

        .main-content {
            margin-left: 240px;
            min-height: 100vh;
        }

        .no-sidebar .main-content {
            margin-left: 0;
        }

        @media (max-width: 768px) {
            .sidebar { width: 200px; }
            .main-content { margin-left: 200px; }
        }
    </style>
</head>

<body class="{{ auth()->check() ? '' : 'no-sidebar' }}">

    @auth
    {{-- Sidebar --}}
    <div class="sidebar">
        <div class="sb-brand">
            <div class="sb-brand-icon"><i class="fa-solid fa-graduation-cap"></i></div>
            <div class="sb-brand-text">Sistem Informasi<br>Akademik</div>
        </div>

        <div class="sb-menu">
            @if(auth()->user()->isAdmin())
                <a class="sb-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
                   href="{{ route('admin.dashboard') }}">
                    <i class="fa-solid"></i>Home
                </a>
                <a class="sb-link {{ request()->is('admin/dosen*') ? 'active' : '' }}"
                   href="{{ url('/admin/dosen') }}">
                    <i class="fa-solid"></i>Dosen
                </a>
                <a class="sb-link {{ request()->is('admin/mahasiswa*') ? 'active' : '' }}"
                   href="{{ url('/admin/mahasiswa') }}">
                    <i class="fa-solid"></i>Mahasiswa
                </a>
                <a class="sb-link {{ request()->is('admin/matakuliah*') ? 'active' : '' }}"
                   href="{{ url('/admin/matakuliah') }}">
                    <i class="fa-solid"></i>Mata Kuliah
                </a>
                <a class="sb-link {{ request()->is('admin/jadwal*') ? 'active' : '' }}"
                   href="{{ url('/admin/jadwal') }}">
                    <i class="fa-solid"></i>Jadwal
                </a>
                <a class="sb-link {{ request()->is('admin/krs*') ? 'active' : '' }}"
                   href="{{ url('/admin/krs') }}">
                    <i class="fa-solid"></i>KRS
                </a>
            @endif

            @if(auth()->user()->isMahasiswa())
                <a class="sb-link {{ request()->routeIs('mahasiswa.dashboard') ? 'active' : '' }}"
                   href="{{ route('mahasiswa.dashboard') }}">
                    <i class="fa-solid"></i>Home
                </a>
                <a class="sb-link {{ request()->is('mhs/krs*') ? 'active' : '' }}"
                   href="{{ url('/mhs/krs') }}">
                    <i class="fa-solid"></i>KRS Saya
                </a>
                <a class="sb-link {{ request()->is('mhs/jadwal*') ? 'active' : '' }}"
                   href="{{ url('/mhs/jadwal') }}">
                    <i class="fa-solid"></i>Jadwal
                </a>
            @endif
        </div>

        <div class="sb-user">
            <div class="sb-avatar">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</div>
            <div class="sb-user-info">
                <div class="sb-user-name">{{ auth()->user()->name }}</div>
                <div class="sb-user-role">{{ ucfirst(auth()->user()->role) }}</div>
            </div>
        </div>

        <form method="POST" action="{{ route('logout') }}" class="sb-logout-form">
            @csrf
            <button type="submit" class="sb-logout">
                <i class="fa-solid fa-right-from-bracket me-1"></i>Logout
            </button>
        </form>
    </div>
    @endauth

    {{-- Main --}}
    <div class="main-content">
        @yield('content')

        @auth
        @include('layout.footer')
        @endauth
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/search.js') }}"></script>
</body>

</html>
