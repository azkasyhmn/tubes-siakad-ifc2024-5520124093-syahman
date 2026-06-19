<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f0f2f5; }
        .login-card {
            max-width: 420px;
            margin: 100px auto;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,.1);
        }
        .card-header { background: #0d6efd; color: #fff; border-radius: 12px 12px 0 0; }
    </style>
</head>
<body>

<div class="card login-card">
    <div class="card-header py-3 text-center">
        <h4 class="mb-0">Sistem Informasi Akademik</h4>
        <small>Silakan login untuk melanjutkan</small>
    </div>
    <div class="card-body p-4">

        @if($errors->any())
            <div class="alert alert-danger py-2">
                {{ $errors->first() }}
            </div>
        @endif

        @if(session('status'))
            <div class="alert alert-success py-2">{{ session('status') }}</div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label fw-semibold">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror"
                    id="email" name="email" value="{{ old('email') }}"
                    placeholder="Masukkan Email" required autofocus>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label fw-semibold">Password</label>
                <input type="password" class="form-control"
                    id="password" name="password"
                    placeholder="Masukkan Password" required>
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                <label class="form-check-label" for="remember">Ingat saya</label>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-lg">Masuk</button>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>