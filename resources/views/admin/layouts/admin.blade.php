<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') - PT PANCA MERAK SAMUDERA</title>
    
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --admin-bg: #09121d;
            --admin-card: #0f1e2e;
            --admin-card-border: rgba(255, 255, 255, 0.08);
            --admin-sidebar: #060e18;
            --admin-accent: #00d2ff;
            --admin-accent-hover: #00b8e6;
            --admin-gold: #ffb703;
            --admin-text: #e2e8f0;
            --admin-muted: #94a3b8;
            --admin-danger: #ef4444;
            --admin-success: #10b981;
            --admin-warning: #f59e0b;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Outfit', sans-serif;
            background-color: var(--admin-bg);
            color: var(--admin-text);
            display: flex;
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* Sidebar */
        .sidebar {
            width: 260px;
            background: var(--admin-sidebar);
            border-right: 1px solid var(--admin-card-border);
            display: flex;
            flex-direction: column;
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 100;
            transition: all 0.3s ease;
        }

        .sidebar-brand {
            padding: 24px 20px;
            display: flex;
            align-items: center;
            gap: 12px;
            border-bottom: 1px solid var(--admin-card-border);
            text-decoration: none;
            color: white;
        }

        .sidebar-brand img {
            height: 38px;
            width: auto;
        }

        .sidebar-brand-text h1 {
            font-family: 'Montserrat', sans-serif;
            font-size: 0.95rem;
            font-weight: 800;
            letter-spacing: 0.5px;
            color: #ffffff;
            line-height: 1.2;
        }

        .sidebar-brand-text span {
            font-size: 0.7rem;
            color: var(--admin-accent);
            text-transform: uppercase;
            letter-spacing: 1px;
            display: block;
            font-weight: 600;
        }

        .sidebar-menu {
            list-style: none;
            padding: 20px 12px;
            display: flex;
            flex-direction: column;
            gap: 6px;
            flex: 1;
        }

        .sidebar-label {
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--admin-muted);
            padding: 12px 12px 6px;
            font-weight: 600;
        }

        .sidebar-item a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 14px;
            color: var(--admin-muted);
            text-decoration: none;
            border-radius: 8px;
            font-weight: 500;
            font-size: 0.92rem;
            transition: all 0.2s ease;
        }

        .sidebar-item a:hover {
            color: #ffffff;
            background: rgba(255, 255, 255, 0.05);
        }

        .sidebar-item.active a {
            color: #ffffff;
            background: linear-gradient(135deg, rgba(0, 210, 255, 0.2), rgba(0, 150, 255, 0.1));
            border-left: 3px solid var(--admin-accent);
            font-weight: 600;
        }

        .sidebar-item svg {
            width: 20px;
            height: 20px;
            flex-shrink: 0;
        }

        .sidebar-footer {
            padding: 16px 20px;
            border-top: 1px solid var(--admin-card-border);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .admin-user-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--admin-accent), #0066ff);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 0.9rem;
        }

        .user-details h4 {
            font-size: 0.85rem;
            color: white;
            font-weight: 600;
        }

        .user-details span {
            font-size: 0.72rem;
            color: var(--admin-muted);
        }

        /* Main Content Wrapper */
        .main-wrapper {
            margin-left: 260px;
            flex: 1;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Topbar */
        .topbar {
            height: 70px;
            background: rgba(15, 30, 46, 0.8);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid var(--admin-card-border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 30px;
            position: sticky;
            top: 0;
            z-index: 90;
        }

        .topbar-title h2 {
            font-family: 'Montserrat', sans-serif;
            font-size: 1.15rem;
            font-weight: 700;
            color: white;
        }

        .topbar-actions {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .btn-view-site {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 14px;
            border-radius: 6px;
            background: rgba(255, 255, 255, 0.06);
            color: var(--admin-text);
            text-decoration: none;
            font-size: 0.82rem;
            font-weight: 500;
            border: 1px solid var(--admin-card-border);
            transition: all 0.2s;
        }

        .btn-view-site:hover {
            background: rgba(255, 255, 255, 0.12);
            color: white;
        }

        .logout-btn {
            background: none;
            border: none;
            color: var(--admin-danger);
            cursor: pointer;
            padding: 6px;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background 0.2s;
        }

        .logout-btn:hover {
            background: rgba(239, 68, 68, 0.1);
        }

        /* Content Area */
        .content-area {
            padding: 30px;
            flex: 1;
        }

        /* Flash Alerts */
        .alert {
            padding: 14px 18px;
            border-radius: 10px;
            margin-bottom: 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-size: 0.9rem;
        }

        .alert-success {
            background: rgba(16, 185, 129, 0.15);
            border: 1px solid rgba(16, 185, 129, 0.3);
            color: #34d399;
        }

        .alert-danger {
            background: rgba(239, 68, 68, 0.15);
            border: 1px solid rgba(239, 68, 68, 0.3);
            color: #f87171;
        }

        /* UI Components */
        .card {
            background: var(--admin-card);
            border: 1px solid var(--admin-card-border);
            border-radius: 14px;
            padding: 24px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.88rem;
            text-decoration: none;
            cursor: pointer;
            border: none;
            transition: all 0.25s ease;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--admin-accent), #0080ff);
            color: #051322;
        }

        .btn-primary:hover {
            opacity: 0.92;
            transform: translateY(-1px);
            box-shadow: 0 4px 15px rgba(0, 210, 255, 0.3);
        }

        .btn-secondary {
            background: rgba(255, 255, 255, 0.08);
            color: white;
            border: 1px solid var(--admin-card-border);
        }

        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.15);
        }

        .btn-danger {
            background: rgba(239, 68, 68, 0.2);
            color: #f87171;
            border: 1px solid rgba(239, 68, 68, 0.3);
        }

        .btn-danger:hover {
            background: var(--admin-danger);
            color: white;
        }

        .btn-sm {
            padding: 6px 12px;
            font-size: 0.8rem;
            border-radius: 6px;
        }

        /* Tables */
        .table-responsive {
            overflow-x: auto;
        }

        .admin-table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }

        .admin-table th {
            padding: 14px 16px;
            font-size: 0.78rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: var(--admin-muted);
            border-bottom: 1px solid var(--admin-card-border);
            font-weight: 700;
        }

        .admin-table td {
            padding: 16px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.04);
            font-size: 0.9rem;
            color: #cbd5e1;
            vertical-align: middle;
        }

        .admin-table tr:hover td {
            background: rgba(255, 255, 255, 0.02);
        }

        /* Badges */
        .badge {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: capitalize;
        }

        .badge-passenger {
            background: rgba(0, 210, 255, 0.15);
            color: #38bdf8;
            border: 1px solid rgba(0, 210, 255, 0.3);
        }

        .badge-tugboat {
            background: rgba(245, 158, 11, 0.15);
            color: #fbbf24;
            border: 1px solid rgba(245, 158, 11, 0.3);
        }

        .badge-barge {
            background: rgba(168, 85, 247, 0.15);
            color: #c084fc;
            border: 1px solid rgba(168, 85, 247, 0.3);
        }

        /* Forms */
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
            padding: 12px 16px;
            background: rgba(6, 14, 24, 0.8);
            border: 1px solid var(--admin-card-border);
            border-radius: 8px;
            color: white;
            font-family: inherit;
            font-size: 0.9rem;
            transition: border-color 0.2s;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--admin-accent);
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 20px;
        }

        /* Footer */
        .admin-footer {
            padding: 20px 30px;
            border-top: 1px solid var(--admin-card-border);
            text-align: center;
            font-size: 0.8rem;
            color: var(--admin-muted);
        }
    </style>
</head>
<body>

    <!-- Sidebar Navigation -->
    <aside class="sidebar">
        <a href="{{ route('admin.dashboard') }}" class="sidebar-brand">
            <img src="{{ asset('images/logo.png') }}" alt="Logo PMS">
            <div class="sidebar-brand-text">
                <h1>PANCA MERAK</h1>
                <span>ADMIN PANEL</span>
            </div>
        </a>

        <ul class="sidebar-menu">
            <li class="sidebar-label">Navigasi Utama</li>
            
            <li class="sidebar-item {{ Route::is('admin.dashboard') ? 'active' : '' }}">
                <a href="{{ route('admin.dashboard') }}">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                    Dashboard
                </a>
            </li>

            <li class="sidebar-label">Kelola Data</li>

            <li class="sidebar-item {{ Route::is('admin.ships.*') ? 'active' : '' }}">
                <a href="{{ route('admin.ships.index') }}">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                    Armada Kapal
                </a>
            </li>

            <li class="sidebar-item {{ Route::is('admin.schedules.*') ? 'active' : '' }}">
                <a href="{{ route('admin.schedules.index') }}">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    Jadwal & Tarif
                </a>
            </li>
        </ul>

        <div class="sidebar-footer">
            <div class="admin-user-info">
                <div class="avatar">
                    {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}
                </div>
                <div class="user-details">
                    <h4>{{ Auth::user()->name ?? 'Administrator' }}</h4>
                    <span>{{ Auth::user()->email ?? 'admin@pancamerak.co.id' }}</span>
                </div>
            </div>
            
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="logout-btn" title="Keluar">
                    <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Wrapper -->
    <div class="main-wrapper">
        <!-- Topbar -->
        <header class="topbar">
            <div class="topbar-title">
                <h2>@yield('header_title', 'Dashboard Overview')</h2>
            </div>
            
            <div class="topbar-actions">
                <a href="{{ route('home') }}" target="_blank" class="btn-view-site">
                    <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                    Lihat Situs Utama
                </a>
            </div>
        </header>

        <!-- Main Content -->
        <main class="content-area">
            @if(session('success'))
                <div class="alert alert-success">
                    <span>✓ {{ session('success') }}</span>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">
                    <span>⚠️ {{ session('error') }}</span>
                </div>
            @endif

            @yield('content')
        </main>

        <!-- Admin Footer -->
        <footer class="admin-footer">
            &copy; {{ date('Y') }} PT PANCA MERAK SAMUDERA - Sistem Informasi Admin Pelayaran.
        </footer>
    </div>

</body>
</html>
