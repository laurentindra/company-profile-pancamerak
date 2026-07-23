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
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@600;700;800&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --bg-color: #0f172a;
            --card-bg: #ffffff;
            --primary-color: #1e40af;
            --primary-hover: #1e3a8a;
            --text-color: #0f172a;
            --muted-color: #64748b;
            --border-color: #e2e8f0;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            background: var(--bg-color);
            color: var(--text-color);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            -webkit-font-smoothing: antialiased;
        }

        .login-card {
            background: var(--card-bg);
            border-radius: 12px;
            padding: 36px 32px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.3), 0 8px 10px -6px rgba(0, 0, 0, 0.3);
        }

        .brand-header {
            text-align: center;
            margin-bottom: 28px;
        }

        .brand-header img {
            height: 48px;
            margin-bottom: 12px;
        }

        .brand-header h1 {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 1.15rem;
            font-weight: 800;
            color: #0f172a;
            letter-spacing: 0.3px;
        }

        .brand-header p {
            font-size: 0.78rem;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 600;
            margin-top: 2px;
        }

        .alert {
            padding: 10px 14px;
            border-radius: 6px;
            margin-bottom: 18px;
            font-size: 0.82rem;
            font-weight: 500;
        }

        .alert-danger {
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #991b1b;
        }

        .alert-success {
            background: #ecfdf5;
            border: 1px solid #a7f3d0;
            color: #065f46;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-label {
            display: block;
            margin-bottom: 6px;
            font-size: 0.82rem;
            font-weight: 600;
            color: #334155;
        }

        .form-control {
            width: 100%;
            padding: 10px 14px;
            background: #ffffff;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            color: #0f172a;
            font-family: inherit;
            font-size: 0.9rem;
            transition: all 0.15s ease;
        }

        .form-control:focus {
            outline: none;
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        .form-options {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 22px;
            font-size: 0.83rem;
        }

        .checkbox-container {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            color: #475569;
            font-weight: 500;
        }

        .btn-submit {
            width: 100%;
            padding: 12px;
            border-radius: 6px;
            border: none;
            background: var(--primary-color);
            color: #ffffff;
            font-size: 0.9rem;
            font-weight: 700;
            font-family: 'Plus Jakarta Sans', sans-serif;
            cursor: pointer;
            transition: all 0.15s ease;
        }

        .btn-submit:hover {
            background: var(--primary-hover);
        }

        .footer-note {
            text-align: center;
            margin-top: 20px;
            font-size: 0.8rem;
            color: #64748b;
        }

        .footer-note a {
            color: #2563eb;
            text-decoration: none;
            font-weight: 600;
        }
        .footer-note a:hover {
            text-decoration: underline;
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
