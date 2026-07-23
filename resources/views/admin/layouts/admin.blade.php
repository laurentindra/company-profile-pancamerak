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
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --admin-bg: #f8fafc;
            --admin-card: #ffffff;
            --admin-card-border: #e2e8f0;
            --admin-sidebar: #0f172a;
            --admin-sidebar-border: #1e293b;
            --admin-primary: #1e40af;
            --admin-primary-hover: #1e3a8a;
            --admin-accent: #2563eb;
            --admin-brand-red: #dc2626;
            --admin-text-main: #0f172a;
            --admin-text-muted: #64748b;
            --admin-border-subtle: #f1f5f9;
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
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            background-color: var(--admin-bg);
            color: var(--admin-text-main);
            display: flex;
            min-height: 100vh;
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            background: var(--admin-sidebar);
            border-right: 1px solid var(--admin-sidebar-border);
            display: flex;
            flex-direction: column;
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 100;
        }

        .sidebar-brand {
            padding: 20px 18px;
            display: flex;
            align-items: center;
            gap: 12px;
            border-bottom: 1px solid var(--admin-sidebar-border);
            text-decoration: none;
            color: white;
        }

        .sidebar-brand img {
            height: 36px;
            width: auto;
        }

        .sidebar-brand-text h1 {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 0.88rem;
            font-weight: 800;
            letter-spacing: 0.3px;
            color: #ffffff;
            line-height: 1.2;
        }

        .sidebar-brand-text span {
            font-size: 0.68rem;
            color: #94a3b8;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            display: block;
            font-weight: 600;
        }

        .sidebar-menu {
            list-style: none;
            padding: 16px 10px;
            display: flex;
            flex-direction: column;
            gap: 4px;
            flex: 1;
        }

        .sidebar-label {
            font-size: 0.68rem;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            color: #64748b;
            padding: 12px 12px 6px;
            font-weight: 700;
        }

        .sidebar-item a {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 12px;
            color: #94a3b8;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 500;
            font-size: 0.88rem;
            transition: all 0.15s ease;
        }

        .sidebar-item a:hover {
            color: #ffffff;
            background: rgba(255, 255, 255, 0.06);
        }

        .sidebar-item.active a {
            color: #ffffff;
            background: var(--admin-primary);
            font-weight: 600;
        }

        .sidebar-item svg {
            width: 18px;
            height: 18px;
            flex-shrink: 0;
        }

        .sidebar-footer {
            padding: 14px 16px;
            border-top: 1px solid var(--admin-sidebar-border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #090d16;
        }

        .admin-user-info {
            display: flex;
            align-items: center;
            gap: 10px;
            overflow: hidden;
        }

        .avatar {
            width: 34px;
            height: 34px;
            border-radius: 6px;
            background: #1e293b;
            color: #ffffff;
            border: 1px solid #334155;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 0.85rem;
            flex-shrink: 0;
        }

        .user-details h4 {
            font-size: 0.82rem;
            color: #ffffff;
            font-weight: 600;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .user-details span {
            font-size: 0.7rem;
            color: #64748b;
            display: block;
        }

        /* Main Content Wrapper */
        .main-wrapper {
            margin-left: 250px;
            flex: 1;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Topbar */
        .topbar {
            height: 64px;
            background: #ffffff;
            border-bottom: 1px solid var(--admin-card-border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 28px;
            position: sticky;
            top: 0;
            z-index: 90;
        }

        .topbar-title h2 {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--admin-text-main);
        }

        .topbar-actions {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .btn-view-site {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 7px 12px;
            border-radius: 6px;
            background: #ffffff;
            color: var(--admin-text-main);
            text-decoration: none;
            font-size: 0.82rem;
            font-weight: 600;
            border: 1px solid #cbd5e1;
            transition: all 0.15s;
        }

        .btn-view-site:hover {
            background: #f1f5f9;
            border-color: #94a3b8;
        }

        .logout-btn {
            background: none;
            border: none;
            color: #94a3b8;
            cursor: pointer;
            padding: 6px;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: color 0.15s;
        }

        .logout-btn:hover {
            color: var(--admin-danger);
        }

        /* Content Area */
        .content-area {
            padding: 28px;
            flex: 1;
        }

        /* Flash Alerts */
        .alert {
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-size: 0.88rem;
            font-weight: 500;
        }

        .alert-success {
            background: #ecfdf5;
            border: 1px solid #a7f3d0;
            color: #065f46;
        }

        .alert-danger {
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #991b1b;
        }

        /* UI Components */
        .card {
            background: var(--admin-card);
            border: 1px solid var(--admin-card-border);
            border-radius: 10px;
            padding: 20px 24px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.04);
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 9px 16px;
            border-radius: 6px;
            font-weight: 600;
            font-size: 0.85rem;
            text-decoration: none;
            cursor: pointer;
            border: none;
            transition: all 0.15s ease;
        }

        .btn-primary {
            background: var(--admin-primary);
            color: #ffffff;
        }

        .btn-primary:hover {
            background: var(--admin-primary-hover);
        }

        .btn-secondary {
            background: #ffffff;
            color: var(--admin-text-main);
            border: 1px solid #cbd5e1;
        }

        .btn-secondary:hover {
            background: #f8fafc;
            border-color: #94a3b8;
        }

        .btn-danger {
            background: #fef2f2;
            color: var(--admin-danger);
            border: 1px solid #fecaca;
        }

        .btn-danger:hover {
            background: var(--admin-danger);
            color: white;
        }

        .btn-sm {
            padding: 5px 10px;
            font-size: 0.78rem;
            border-radius: 5px;
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
            padding: 12px 14px;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: var(--admin-text-muted);
            background: #f8fafc;
            border-bottom: 1px solid var(--admin-card-border);
            font-weight: 700;
        }

        .admin-table td {
            padding: 14px;
            border-bottom: 1px solid #f1f5f9;
            font-size: 0.88rem;
            color: var(--admin-text-main);
            vertical-align: middle;
        }

        .admin-table tr:hover td {
            background: #f8fafc;
        }

        /* Badges */
        .badge {
            display: inline-block;
            padding: 3px 8px;
            border-radius: 4px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .badge-passenger {
            background: #eff6ff;
            color: #1d4ed8;
            border: 1px solid #bfdbfe;
        }

        .badge-tugboat {
            background: #fffbebf;
            color: #b45309;
            border: 1px solid #fde68a;
        }

        .badge-barge {
            background: #faf5ff;
            color: #7e22ce;
            border: 1px solid #e9d5ff;
        }

        /* Forms */
        .form-group {
            margin-bottom: 18px;
        }

        .form-label {
            display: block;
            margin-bottom: 6px;
            font-size: 0.83rem;
            font-weight: 600;
            color: var(--admin-text-main);
        }

        .form-control {
            width: 100%;
            padding: 10px 14px;
            background: #ffffff;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            color: var(--admin-text-main);
            font-family: inherit;
            font-size: 0.88rem;
            transition: border-color 0.15s, box-shadow 0.15s;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--admin-accent);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 16px;
        }

        /* Clean Pagination Styling */
        .pagination-wrapper {
            margin-top: 24px;
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }

        .pagination-wrapper .pagination {
            display: flex;
            list-style: none;
            gap: 6px;
            margin: 0;
            padding: 0;
            align-items: center;
        }

        .pagination-wrapper .page-item .page-link {
            padding: 8px 14px;
            border-radius: 6px;
            background: #ffffff;
            border: 1px solid #cbd5e1;
            color: #1e293b;
            font-size: 0.85rem;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.15s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .pagination-wrapper .page-item.active .page-link {
            background: var(--admin-primary);
            color: #ffffff;
            border-color: var(--admin-primary);
        }

        .pagination-wrapper .page-item .page-link:hover {
            background: #f1f5f9;
            border-color: #94a3b8;
        }

        .pagination-wrapper .page-item.disabled .page-link {
            opacity: 0.5;
            cursor: not-allowed;
            background: #f8fafc;
        }

        .pagination-wrapper svg {
            width: 16px !important;
            height: 16px !important;
            max-width: 16px !important;
            max-height: 16px !important;
        }

        /* Mobile Sidebar Overlay & Responsiveness */
        .sidebar-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(15, 23, 42, 0.6);
            backdrop-filter: blur(4px);
            z-index: 99;
            opacity: 0;
            visibility: hidden;
            transition: all 0.25s ease;
        }

        .sidebar-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        .mobile-sidebar-toggle {
            display: none;
            background: transparent;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            padding: 6px;
            color: #1e293b;
            cursor: pointer;
            align-items: center;
            justify-content: center;
        }

        @media (max-width: 992px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.25s cubic-bezier(0.16, 1, 0.3, 1);
                width: 260px;
                z-index: 1000;
            }

            .sidebar.active {
                transform: translateX(0);
                box-shadow: 10px 0 30px rgba(0, 0, 0, 0.3);
            }

            .main-wrapper {
                margin-left: 0 !important;
                width: 100% !important;
            }

            .mobile-sidebar-toggle {
                display: flex;
            }

            .topbar {
                padding: 0 16px;
            }

            .content-area {
                padding: 16px;
            }
        }

        @media (max-width: 576px) {
            .topbar-title h2 {
                font-size: 0.95rem;
            }

            .btn-view-site span {
                display: none;
            }

            .card {
                padding: 16px;
            }

            .filter-bar {
                flex-direction: column;
                align-items: stretch;
            }

            .search-filter-group {
                flex-direction: column;
                align-items: stretch;
                width: 100%;
            }

            .search-filter-group select,
            .search-filter-group input {
                width: 100% !important;
            }
        }

        /* Footer */
        .admin-footer {
            padding: 16px 28px;
            border-top: 1px solid var(--admin-card-border);
            text-align: center;
            font-size: 0.8rem;
            color: var(--admin-text-muted);
            background: #ffffff;
        }
    </style>
</head>
<body>

    <!-- Mobile Backdrop Overlay -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- Sidebar Navigation -->
    <aside class="sidebar" id="adminSidebar">
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

            <li class="sidebar-item {{ Route::is('admin.news.*') ? 'active' : '' }}">
                <a href="{{ route('admin.news.index') }}">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10l4 4v10a2 2 0 01-2 2z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 2v6h6M8 13h8M8 17h8M8 9h2"></path></svg>
                    Berita & Artikel
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
            <div style="display: flex; align-items: center; gap: 12px;">
                <button type="button" class="mobile-sidebar-toggle" id="sidebarToggleBtn" aria-label="Toggle Sidebar">
                    <svg width="22" height="22" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                </button>
                <div class="topbar-title">
                    <h2>@yield('header_title', 'Dashboard Overview')</h2>
                </div>
            </div>
            
            <div class="topbar-actions">
                <a href="{{ route('home') }}" target="_blank" class="btn-view-site">
                    <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                    <span>Lihat Situs Utama</span>
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('adminSidebar');
            const toggleBtn = document.getElementById('sidebarToggleBtn');
            const overlay = document.getElementById('sidebarOverlay');

            if (toggleBtn && sidebar && overlay) {
                toggleBtn.addEventListener('click', function() {
                    sidebar.classList.toggle('active');
                    overlay.classList.toggle('active');
                });

                overlay.addEventListener('click', function() {
                    sidebar.classList.remove('active');
                    overlay.classList.remove('active');
                });
            }
        });
    </script>

</body>
</html>
