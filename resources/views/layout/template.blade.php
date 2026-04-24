<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
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

            .navbar-nav .nav-link {
                color: #fff;
            }

            .navbar-nav .nav-link:hover {
                background-color: #0017ac;
                border-radius: 10px;
            }

        </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">MyBlog</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ url('/beranda') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/dosen') }}">Dosen</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/mahasiswa') }}">Mahasiswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/matakuliah') }}">Mata Kuliah</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/jadwal') }}">Jadwal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/krs') }}">KRS</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

@yield('content')
@include('layout.footer')


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>