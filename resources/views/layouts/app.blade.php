<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>PT PANCA MERAK SAMUDERA - Penyedia Kapal Penumpang & Logistik Batubara</title>
    <meta name="description" content="PT PANCA MERAK SAMUDERA menyediakan solusi angkutan laut hemat biaya dan berkelanjutan. Mengoperasikan armada kapal penumpang Cattleya Express, Queen Soya, Pantokrator, serta kapal tunda Hector & tongkang batubara.">
    
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Main Style -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <!-- Preloader / Welcome Animation -->
    <div id="preloader">
        <div class="preloader-content">
            <div class="preloader-logo-wrapper">
                <img src="{{ asset('images/logo.png') }}" alt="PT PANCA MERAK SAMUDERA Logo" class="preloader-logo">
            </div>
            <div class="preloader-brand">
                <span class="p-title">PANCA MERAK SAMUDERA</span>
                <span class="p-subtitle">Est. 2001</span>
            </div>
            <div class="preloader-loader">
                <div class="preloader-bar"></div>
            </div>
        </div>
    </div>

    <!-- Top Info Bar -->
    <div class="top-bar">
        <div class="container top-bar-content">
            <div class="top-info">
                <span>
                    <svg viewBox="0 0 24 24" width="16" height="16" fill="currentColor"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
                    panca_merak_samudera@yahoo.com
                </span>
                <span>
                    <svg viewBox="0 0 24 24" width="16" height="16" fill="currentColor"><path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/></svg>
                    (031) 3522385 (Surabaya)
                </span>
            </div>
            <div class="top-socials">
                <span class="badge">Est. 2001</span>
                <span class="badge accent">SIUPAL BXXV-1753/AL-58</span>
            </div>
        </div>
    </div>

    <!-- Official Kop Surat Header -->
    <header class="official-pms-header">
        <div class="pms-letterhead-banner">
            <div class="container pms-letterhead-wrapper">
                <div class="pms-logo-col">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo PT PANCA MERAK SAMUDERA" class="pms-header-logo">
                    </a>
                </div>

                <div class="pms-title-col">
                    <span class="pms-header-subtitle">PERUSAHAAN ANGKUTAN LAUT</span>
                    <h1 class="pms-header-title">P.T. PANCA MERAK SAMUDERA</h1>
                </div>

                <div class="pms-address-col">
                    <div class="pms-address-block">
                        <span class="pms-address-header">Pusat :</span>
                        <p>Jl. Krembangan Timur No. 8 - 10</p>
                        <p>Telp. (031) 3522385, 3523756</p>
                        <p>Fax. (031) 3539432</p>
                        <p>Surabaya</p>
                    </div>

                    <div class="pms-address-block" style="margin-top: 6px;">
                        <span class="pms-address-header">Cabang :</span>
                        <p>Jl. Arif Rahman hakim RT. 002 No. 32</p>
                        <p>Kel. Sungai Pinang Luar</p>
                        <p>Kec. Samarinda Kota 75115</p>
                        <p>Telp. (0541) 7273080</p>
                        <p>Samarinda, Kalimantan Timur</p>
                    </div>

                    <div class="pms-address-block" style="margin-top: 4px;">
                        <p>Jl. Bau Massepe F-419</p>
                        <p>Telp. (0421) 21649 Fax. (0421) 22777</p>
                        <p>Pare-pare ( Sul-sel )</p>
                    </div>
                </div>
            </div>

            <!-- Double Blue Line -->
            <div class="container">
                <div class="pms-double-line"></div>
            </div>
        </div>

        <!-- Sticky Navigation Bar with Hamburger Icon -->
        <div class="header-nav-bar">
            <div class="container nav-bar-container">
                <!-- 3-Lines Hamburger Button -->
                <button class="nav-toggle" aria-label="Toggle navigation">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>

                <!-- Nav Menu Dropdown -->
                <nav class="nav-menu">
                    <a href="{{ route('home') }}" class="nav-link {{ Route::is('home') ? 'active' : '' }}">Beranda</a>
                    <a href="{{ route('about') }}" class="nav-link {{ Route::is('about') ? 'active' : '' }}">Profil</a>
                    <a href="{{ route('services') }}" class="nav-link {{ Route::is('services') ? 'active' : '' }}">Layanan</a>
                    <a href="{{ route('schedules') }}" class="nav-link {{ Route::is('schedules') ? 'active' : '' }}">Jadwal & Tarif</a>
                    <a href="{{ route('fleets') }}" class="nav-link {{ Route::is('fleets') || Route::is('fleets.detail') ? 'active' : '' }}">Armada Kami</a>
                    <a href="{{ route('contact') }}" class="nav-link contact-btn {{ Route::is('contact') ? 'active' : '' }}">Hubungi Kami</a>
                </nav>
            </div>
        </div>
    </header>

    <!-- Main Content Area -->
    <main>
        @yield('content')
    </main>

    <!-- Footer Section (Restored Original Dark 3-Column Theme) -->
    <footer class="footer">
        <div class="container footer-grid">
            <div class="footer-col about-col">
                <div class="footer-logo" style="display: flex; align-items: center; gap: 10px;">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo PT PANCA MERAK SAMUDERA" class="logo-img" style="height: 38px;">
                    <span>PT PANCA MERAK SAMUDERA</span>
                </div>
                <p class="footer-desc">
                    Perusahaan pelayaran nasional penyedia jasa transportasi laut untuk penumpang dan logistik curah batubara. Terpercaya sejak 2001 dengan komitmen keselamatan, efisiensi biaya, dan operasi berkelanjutan.
                </p>
                <div class="legal-tag">
                    <strong>SIUPAL:</strong> BXXV-1753/AL-58<br>
                    <strong>NPWP:</strong> 02.091.781.1-605.000
                </div>
            </div>

            <div class="footer-col links-col">
                <h4>Navigasi</h4>
                <ul>
                    <li><a href="{{ route('home') }}">Beranda</a></li>
                    <li><a href="{{ route('about') }}">Profil & Sejarah</a></li>
                    <li><a href="{{ route('services') }}">Layanan Bisnis</a></li>
                    <li><a href="{{ route('schedules') }}">Pencarian Jadwal</a></li>
                    <li><a href="{{ route('fleets') }}">Armada Kapal</a></li>
                </ul>
            </div>

            <div class="footer-col branch-col">
                <h4>Kantor Cabang</h4>
                <div class="branch-item">
                    <h5>Surabaya (Head Office)</h5>
                    <p>Jl. Krembangan Timur No. 8-10, Surabaya, Jawa Timur</p>
                    <p>Telp: (031) 3522385, 3523756 | Fax: (031) 3539432</p>
                </div>
                <div class="branch-item">
                    <h5>Samarinda (Cabang)</h5>
                    <p>Jl. Arif Rahman Hakim Rt. 02 No. 32, Kel. Sungai Pinang Luar, Samarinda</p>
                    <p>Telp: (0541) 727 3080 | Fax: (0541) 727 3070</p>
                </div>
                <div class="branch-item">
                    <h5>Pare-Pare (Cabang)</h5>
                    <p>Jl. Bau Massepe No. 419E-419F, Pare-Pare, Sulawesi Selatan</p>
                    <p>Telp: (0421) 21649 | Fax: (0421) 28866</p>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="container footer-bottom-content">
                <p>&copy; {{ date('Y') }} PT PANCA MERAK SAMUDERA. Hak Cipta Dilindungi Undang-Undang.</p>
                <p>Designed with Excellence</p>
            </div>
        </div>
    </footer>

    <!-- Floating WhatsApp Widget -->
    <a href="https://wa.me/62813522385" target="_blank" class="whatsapp-float" aria-label="Chat via WhatsApp">
        <svg viewBox="0 0 24 24" width="32" height="32" fill="currentColor"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946C.06 5.348 5.397.01 12.008.01c3.202.001 6.212 1.246 8.477 3.514 2.266 2.268 3.507 5.28 3.505 8.484-.004 6.657-5.34 11.997-11.953 11.997-2.005-.001-3.973-.503-5.729-1.46L0 24zm6.59-4.846c1.6.95 3.188 1.449 4.825 1.451 5.436 0 9.86-4.37 9.864-9.748.002-2.607-1.01-5.059-2.85-6.902C16.643 2.113 14.193.987 11.587.987c-5.442 0-9.868 4.373-9.872 9.753-.001 1.748.477 3.456 1.386 4.982l-.996 3.636 3.738-.967zM17.8 14.6c-.284-.144-1.683-.831-1.947-.927-.263-.096-.454-.144-.645.144-.19.288-.737.927-.904 1.12-.167.192-.335.216-.62.072-.284-.144-1.2-.442-2.285-1.41-.845-.753-1.415-1.683-1.58-1.97-.166-.288-.018-.444.124-.587.129-.129.284-.335.426-.503.14-.168.188-.288.284-.48.096-.192.048-.361-.024-.505-.072-.144-.646-1.558-.885-2.133-.233-.564-.47-.488-.646-.497-.167-.008-.358-.01-.55-.01s-.502.072-.765.36c-.263.288-1.004.982-1.004 2.397 0 1.415 1.028 2.782 1.17 2.974.144.192 2.025 3.09 4.905 4.331.685.295 1.22.472 1.637.605.69.219 1.317.188 1.812.115.55-.082 1.683-.687 1.922-1.353.238-.667.238-1.24.167-1.353-.07-.113-.263-.211-.548-.353z"/></svg>
        <span>Tanya Kami</span>
    </a>

    <!-- Custom App Script -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
