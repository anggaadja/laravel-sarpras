<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login – Inventaris Sarpras</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .password-toggle {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: var(--text-secondary);
        }
        .password-wrapper { position: relative; }
    </style>
</head>
<body>
<div class="app-container">
    <header class="main-header">
        <div class="header-content">
            <h1>Inventaris Sarana &amp; Prasarana</h1>
            <div class="user-profile">
                <span class="user-name">Tamu</span>
            </div>
        </div>
    </header>

    <main class="main-content">
        <div class="login-box" style="max-width:400px;margin:4rem auto;">
            <h2 class="text-center" style="font-size:1.5rem;margin-bottom:1.5rem;">Masuk</h2>

            @if ($errors->any())
                <div class="alert" style="margin-bottom:1rem;color:#DC2626;">
                    <ul style="margin:0;padding-left:1.2rem;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('login.post') }}">
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>
                </div>

                <div class="form-group password-wrapper">
                    <label for="password">Kata Sandi</label>
                    <input type="password" id="password" name="password" required>
                    <svg class="password-toggle" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#10B981" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                </div>

                <div class="form-group" style="display:flex;align-items:center;gap:0.5rem;">
                    <input type="checkbox" id="remember" name="remember">
                    <label for="remember" style="font-size:0.9rem;">Ingat Saya</label>
                </div>

                <button type="submit" class="btn btn-primary" style="width:100%;">Masuk</button>
            </form>
        </div>
    </main>
</div>

<script>
    document.querySelector('.password-toggle').addEventListener('click', function(){
        const pwd = document.getElementById('password');
        const type = pwd.getAttribute('type') === 'password' ? 'text' : 'password';
        pwd.setAttribute('type', type);
        // Ganti ikon (buka/tutup mata) – sederhana, hanya toggle warna
        this.style.color = type === 'text' ? '#059669' : 'var(--text-secondary)';
    });
</script>
</body>
</html>
