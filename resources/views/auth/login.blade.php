<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Panel Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 2rem;
            background-color: var(--bg-paper);
        }
        .login-card {
            max-width: 450px;
            width: 100%;
            padding: 3rem;
            border: 3px solid var(--accent-blue);
            background: var(--bg-paper);
            box-shadow: 8px 8px 0 var(--accent-blue);
            position: relative;
        }
        .login-card::after {
            content: '';
            position: absolute;
            bottom: -14px;
            right: -14px;
            width: 100%;
            height: 100%;
            border: 3px solid var(--accent-red);
            z-index: -1;
            pointer-events: none;
        }
        .form-control {
            border: 2px solid var(--accent-blue);
            border-radius: 0;
            background: transparent;
            color: var(--text-primary);
            padding: 0.75rem 1rem;
            font-family: 'Space Mono', monospace;
        }
        .form-control:focus {
            background: transparent;
            color: var(--text-primary);
            box-shadow: 4px 4px 0 var(--accent-red);
            border-color: var(--accent-red);
        }
        .btn-neon {
            background: var(--accent-blue);
            color: var(--bg-paper);
            border: 2px solid var(--accent-blue);
            padding: 0.75rem 2rem;
            font-family: 'Space Mono', monospace;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            width: 100%;
        }
        .btn-neon:hover {
            background: var(--accent-red);
            border-color: var(--accent-red);
            color: var(--bg-paper);
            box-shadow: 4px 4px 0 var(--accent-blue);
            transform: translate(-2px, -2px);
        }
        .login-title {
            font-family: 'Space Mono', monospace;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: -1px;
            color: var(--accent-blue);
        }
        .nav-logo {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            color: var(--accent-blue);
        }
        .nav-logo img {
            width: 40px;
            height: 40px;
            border-radius: 0;
            border: 2px solid var(--accent-blue);
            object-fit: cover;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="text-center mb-5">
            <a href="{{ url('/') }}" class="nav-logo justify-content-center mb-4">
                <img src="{{ asset('profil.jpg') }}" alt="Logo" style="width: 60px; height: 60px; border: 3px solid var(--accent-blue);">
            </a>
            <h2 class="login-title">LOGIN ADMIN</h2>
            <p class="text-secondary small mt-2" style="font-family: 'Space Mono', monospace;">Silakan masuk untuk mengelola portofolio</p>
        </div>

        @if($errors->any())
            <div class="alert alert-danger rounded-0 border-2 mb-4" style="background: transparent; border-color: var(--accent-red); color: var(--accent-red); font-family: 'Space Mono', monospace; font-size: 0.85rem;" role="alert">
                <i class="fas fa-exclamation-circle me-2"></i> {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="form-label fw-bold" style="font-family: 'Space Mono', monospace; color: var(--accent-blue); font-size: 0.85rem;">EMAIL ADDRESS</label>
                <input type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="" autocomplete="off">
            </div>

            <div class="mb-4">
                <label class="form-label fw-bold" style="font-family: 'Space Mono', monospace; color: var(--accent-blue); font-size: 0.85rem;">PASSWORD</label>
                <input type="password" class="form-control" name="password" required placeholder="" autocomplete="new-password">
            </div>

            <div class="mb-4 form-check">
                <input type="checkbox" class="form-check-input border-2 border-primary rounded-0" id="remember" name="remember">
                <label class="form-check-label text-secondary small" for="remember" style="font-family: 'Space Mono', monospace;">Ingat Saya</label>
            </div>

            <button type="submit" class="btn-neon">MASUK PANEL <i class="fas fa-sign-in-alt ms-1"></i></button>
        </form>

        <div class="text-center mt-4">
            <a href="{{ url('/') }}" class="text-secondary small" style="text-decoration: none; font-family: 'Space Mono', monospace;"><i class="fas fa-arrow-left me-1"></i> Kembali ke Beranda</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
