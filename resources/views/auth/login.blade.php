<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login – Sarpras App</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}?v={{ time() }}">
</head>
<body class="login-page">
    <div class="login-card">
        <div class="text-center" style="margin-bottom: 2rem;">
            <h1 style="font-size: 1.5rem; color: var(--text-main); font-weight: 700;">Sarpras & Inventaris</h1>
            <p style="color: var(--text-muted);">Silakan masuk untuk melanjutkan</p>
        </div>

        @if ($errors->any())
            <div style="background: #fee2e2; color: #991b1b; padding: 0.75rem; border-radius: var(--radius); margin-bottom: 1.5rem; font-size: 0.875rem;">
                <ul style="list-style: none;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login.post') }}">
            @csrf
            <div style="margin-bottom: 1rem;">
                <label for="email" style="display: block; margin-bottom: 0.25rem; font-size: 0.875rem; font-weight: 500;">Email Address</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required autofocus>
            </div>

            <div style="margin-bottom: 1.5rem;">
                <label for="password" style="display: block; margin-bottom: 0.25rem; font-size: 0.875rem; font-weight: 500;">Password</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>

            <div style="margin-bottom: 1.5rem; display: flex; align-items: center;">
                <input type="checkbox" id="remember" name="remember" style="margin-right: 0.5rem;">
                <label for="remember" style="font-size: 0.875rem; color: var(--text-muted); cursor: pointer;">Ingat Saya</label>
            </div>

            <button type="submit" class="btn btn-primary" style="width: 100%;">
                Masuk ke Aplikasi
            </button>
        </form>
    </div>
</body>
</html>
