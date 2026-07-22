<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - PT PANCA MERAK SAMUDERA</title>
    
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700;800&family=Outfit:wght@400;500;600&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --bg-color: #060e18;
            --card-bg: #0d1b2a;
            --accent-color: #00d2ff;
            --text-color: #f1f5f9;
            --muted-color: #94a3b8;
            --border-color: rgba(255, 255, 255, 0.08);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Outfit', sans-serif;
            background: var(--bg-color);
            color: var(--text-color);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            background-image: 
                radial-gradient(circle at 15% 15%, rgba(0, 210, 255, 0.08) 0%, transparent 40%),
                radial-gradient(circle at 85% 85%, rgba(0, 102, 255, 0.08) 0%, transparent 40%);
        }

        .login-card {
            background: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: 20px;
            padding: 40px;
            width: 100%;
            max-width: 440px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(10px);
        }

        .brand-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .brand-header img {
            height: 54px;
            margin-bottom: 16px;
        }

        .brand-header h1 {
            font-family: 'Montserrat', sans-serif;
            font-size: 1.25rem;
            font-weight: 800;
            color: #ffffff;
            letter-spacing: 0.5px;
        }

        .brand-header p {
            font-size: 0.82rem;
            color: var(--accent-color);
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 600;
            margin-top: 4px;
        }

        .alert {
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 0.85rem;
        }

        .alert-danger {
            background: rgba(239, 68, 68, 0.15);
            border: 1px solid rgba(239, 68, 68, 0.3);
            color: #f87171;
        }

        .alert-success {
            background: rgba(16, 185, 129, 0.15);
            border: 1px solid rgba(16, 185, 129, 0.3);
            color: #34d399;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-size: 0.85rem;
            font-weight: 600;
            color: #cbd5e1;
        }

        .form-control {
            width: 100%;
            padding: 14px 18px;
            background: rgba(6, 14, 24, 0.9);
            border: 1px solid var(--border-color);
            border-radius: 10px;
            color: white;
            font-family: inherit;
            font-size: 0.95rem;
            transition: all 0.25s ease;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--accent-color);
            box-shadow: 0 0 0 3px rgba(0, 210, 255, 0.15);
        }

        .form-options {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 24px;
            font-size: 0.85rem;
        }

        .checkbox-container {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            color: var(--muted-color);
        }

        .btn-submit {
            width: 100%;
            padding: 14px;
            border-radius: 10px;
            border: none;
            background: linear-gradient(135deg, var(--accent-color), #0066ff);
            color: #051322;
            font-size: 0.95rem;
            font-weight: 700;
            font-family: 'Montserrat', sans-serif;
            cursor: pointer;
            transition: all 0.25s ease;
        }

        .btn-submit:hover {
            opacity: 0.95;
            transform: translateY(-1px);
            box-shadow: 0 6px 20px rgba(0, 210, 255, 0.35);
        }

        .footer-note {
            text-align: center;
            margin-top: 24px;
            font-size: 0.78rem;
            color: var(--muted-color);
        }

        .footer-note a {
            color: var(--accent-color);
            text-decoration: none;
        }
    </style>
</head>
<body>

    <div class="login-card">
        <div class="brand-header">
            <img src="{{ asset('images/logo.png') }}" alt="Logo PT PANCA MERAK SAMUDERA">
            <h1>PANCA MERAK SAMUDERA</h1>
            <p>Portal Sistem Admin</p>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('admin.login.submit') }}" method="POST">
            @csrf
            
            <div class="form-group">
                <label for="email" class="form-label">Email Admin</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email', 'admin@pancamerak.co.id') }}" required autofocus placeholder="masukkan email admin">
            </div>

            <div class="form-group">
                <label for="password" class="form-label">Kata Sandi</label>
                <input type="password" name="password" id="password" class="form-control" required placeholder="••••••••">
            </div>

            <div class="form-options">
                <label class="checkbox-container">
                    <input type="checkbox" name="remember"> Ingat Saya
                </label>
            </div>

            <button type="submit" class="btn-submit">MASUK KE DASHBOARD</button>
        </form>

        <div class="footer-note">
            Kembali ke <a href="{{ route('home') }}">Website Utama</a>
        </div>
    </div>

</body>
</html>
