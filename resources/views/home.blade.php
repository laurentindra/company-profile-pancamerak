@extends('layouts.app')

@section('content')

<!-- Hero Section -->
<section id="hero" class="hero-section">
    <div class="hero-overlay"></div>
    <div class="hero-bg-asset left-asset">
        <img src="{{ asset('images/indextampakdepan.png') }}" alt="Tampak Depan">
    </div>
    <div class="hero-bg-asset right-asset">
        <img src="{{ asset('images/indextampakbelakang.png') }}" alt="Tampak Belakang">
    </div>
    <div class="container hero-container">
        <div class="hero-content">
            <span class="hero-tag">Pelayaran Nasional Terpercaya</span>
            <h1>Konektivitas Tanpa Batas & Logistik Maritim Efisien</h1>
            <p>PT PANCA MERAK SAMUDERA menyediakan solusi angkutan laut penumpang berkualitas tinggi dan logistik curah batubara terpercaya di seluruh perairan kepulauan Nusantara.</p>
            <div class="hero-actions">
                <a href="{{ route('schedules') }}" class="btn btn-primary">Simulasi Jadwal & Tarif</a>
                <a href="{{ route('about') }}" class="btn btn-secondary">Profil Perusahaan</a>
            </div>
        </div>
        
        <!-- Hero Stats Cards -->
        <div class="hero-stats">
            <div class="stat-card">
                <h3>2001</h3>
                <p>Didirikan & Melayani</p>
            </div>
            <div class="stat-card">
                <h3>18</h3>
                <p>Armada Kapal Aktif</p>
            </div>
            <div class="stat-card">
                <h3>3</h3>
                <p>Kantor Cabang Strategis</p>
            </div>
            <div class="stat-card">
                <h3>11</h3>
                <p>Kapal Tunda Hector</p>
            </div>
        </div>
    </div>
</section>

<!-- Quick Schedule Search Section -->
<section id="home-search" class="schedule-section">
    <div class="container">
        <div class="search-box-wrapper">
            <div style="margin-bottom: 20px; border-bottom: 1px solid var(--border-light); padding-bottom: 15px;">
                <h3 style="font-size: 1.3rem; color: var(--primary-navy);">Simulator Jadwal Pelayaran Penumpang</h3>
                <p style="font-size: 0.85rem; color: var(--text-light-muted);">Cek jadwal operasional pelayaran antar-pulau real-time.</p>
            </div>
            <form id="search-schedule-form" class="search-form-grid">
                @csrf
                <div class="form-group">
                    <label for="origin">Pelabuhan Asal</label>
                    <select name="origin" id="origin" required>
                        <option value="">-- Pilih Asal --</option>
                        @foreach($origins as $port)
                            <option value="{{ $port }}">{{ $port }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="destination">Pelabuhan Tujuan</label>
                    <select name="destination" id="destination" required>
                        <option value="">-- Pilih Tujuan --</option>
                        @foreach($destinations as $port)
                            <option value="{{ $port }}">{{ $port }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="travel_date">Tanggal Keberangkatan</label>
                    <input type="date" name="date" id="travel_date">
                </div>
                <div class="form-group submit-group">
                    <button type="submit" class="btn btn-primary btn-block">Cari Jadwal</button>
                </div>
            </form>
        </div>

        <!-- Results Container -->
        <div id="search-results" class="search-results-container" style="display: none;">
            <div class="results-header">
                <h3>Hasil Pencarian Jadwal</h3>
                <p id="results-meta"></p>
            </div>
            <div id="results-list" class="results-list">
                <!-- AJAX results injected here -->
            </div>
        </div>
    </div>
</section>

<!-- Company Profile Highlight -->
<section id="home-profile" class="about-section">
    <div class="container">
        <div class="about-grid" style="align-items: center;">
            <div class="about-text-content">
                <span class="sub-title">Profil Singkat</span>
                <h2>Penyedia Transportasi Laut Berkualitas Sejak 2001</h2>
                <p>PT PANCA MERAK SAMUDERA didirikan di Surabaya pada tanggal 6 Desember 2001. Mengawali kiprah operasional melalui layanan angkutan laut penumpang niaga terjadwal yang menghubungkan Pulau Sulawesi dan Kalimantan.</p>
                <p>Dengan komitmen keselamatan pelayaran yang ketat serta keandalan jadwal operasional, kami tumbuh menjadi mitra logistik utama bagi sektor pertambangan curah batubara dengan mengoperasikan rangkaian armada tongkang (barge) baja modern dan kapal tunda (tugboat) berkekuatan besar.</p>
                <div style="margin-top: 30px;">
                    <a href="{{ route('about') }}" class="btn btn-outline">Baca Selengkapnya Tentang Kami</a>
                </div>
            </div>
            
            <div class="about-values-box" style="background-color: var(--primary-navy); padding: 40px; border-radius: var(--radius-lg); color: #ffffff; box-shadow: var(--shadow-lg);">
                <h3 style="color: #ffffff; margin-bottom: 24px; border-left: 4px solid var(--accent-cyan-light); padding-left: 15px;">Kenapa Memilih Kami?</h3>
                <div style="display: flex; flex-direction: column; gap: 24px;">
                    <div style="display: flex; gap: 16px;">
                        <div style="color: var(--accent-cyan-light);">
                            <svg viewBox="0 0 24 24" width="28" height="28" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                        </div>
                        <div>
                            <h4 style="color: #ffffff; font-size: 1rem; margin-bottom: 4px;">Keamanan & Keselamatan Utama</h4>
                            <p style="color: var(--text-dark-muted); font-size: 0.85rem;">Sertifikasi SOLAS lengkap serta perawatan berkala klasifikasi BKI untuk memastikan perjalanan tanpa kendala.</p>
                        </div>
                    </div>
                    <div style="display: flex; gap: 16px;">
                        <div style="color: var(--accent-cyan-light);">
                            <svg viewBox="0 0 24 24" width="28" height="28" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                        </div>
                        <div>
                            <h4 style="color: #ffffff; font-size: 1rem; margin-bottom: 4px;">Ketepatan Waktu Pelayaran</h4>
                            <p style="color: var(--text-dark-muted); font-size: 0.85rem;">Kedisiplinan awak kapal dalam memenuhi tenggat waktu keberangkatan dan kedatangan logistik kargo tambang.</p>
                        </div>
                    </div>
                    <div style="display: flex; gap: 16px;">
                        <div style="color: var(--accent-cyan-light);">
                            <svg viewBox="0 0 24 24" width="28" height="28" fill="none" stroke="currentColor" stroke-width="2"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                        </div>
                        <div>
                            <h4 style="color: #ffffff; font-size: 1rem; margin-bottom: 4px;">Efisiensi Biaya Logistik</h4>
                            <p style="color: var(--text-dark-muted); font-size: 0.85rem;">Skema sewa yang fleksibel (Time / Freight Charter) guna mengoptimalkan biaya logistik bisnis tambang Anda.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Business Services Highlight -->
<section id="home-services" class="services-section">
    <div class="container">
        <div class="section-header text-center">
            <span class="sub-title">Layanan Utama</span>
            <h2>Solusi Pengapalan Logistik & Angkutan Penumpang</h2>
            <p class="section-desc">Menyediakan dua spesialisasi pelayaran nasional guna menjaga profesionalisme kerja maritim.</p>
        </div>
        
        <div class="services-grid">
            <div class="service-card">
                <div class="service-icon">
                    <svg viewBox="0 0 24 24" width="40" height="40" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                </div>
                <h3>Kapal Penumpang Niaga Terjadwal</h3>
                <p>Mengoperasikan kapal-kapal penumpang berkapasitas besar di rute Pare-Pare, Samarinda, dan Nunukan dengan kenyamanan dek tidur, fasilitas kantin, dan kepatuhan keselamatan tinggi.</p>
                <a href="{{ route('services') }}" class="btn btn-outline btn-sm">Lihat Detail Layanan</a>
            </div>
            
            <div class="service-card">
                <div class="service-icon">
                    <svg viewBox="0 0 24 24" width="40" height="40" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/></svg>
                </div>
                <h3>Sewa Tongkang Batubara & Bijih Besi</h3>
                <p>Penyewaan kapal tunda (Tugboat) bertenaga ganda beserta tongkang (Barge) 300 feet untuk kelancaran logistik tambang curah di seluruh Kalimantan, Jawa, dan Sulawesi.</p>
                <a href="{{ route('services') }}" class="btn btn-outline btn-sm">Lihat Prosedur Sewa</a>
            </div>
        </div>
    </div>
</section>

<!-- Featured Fleets Section -->
<section id="home-fleets" class="fleets-section">
    <div class="container">
        <div class="section-header text-center">
            <span class="sub-title">Armada Pilihan</span>
            <h2>Armada Kapal Penumpang Utama Kami</h2>
            <p class="section-desc">Jelajahi armada kapal penumpang andalan yang melayani pelayaran niaga terjadwal antar-pulau.</p>
        </div>
        
        <div class="fleets-grid">
            @foreach($featuredShips as $ship)
                <div class="fleet-card" data-category="passenger">
                    <div class="fleet-img-container">
                        @if($ship->image_path && file_exists(public_path($ship->image_path)))
                            <img src="{{ asset($ship->image_path) }}" alt="{{ $ship->name }}" class="fleet-img" style="width: 100%; height: 200px; object-fit: cover;">
                        @else
                            <div class="fleet-placeholder passenger-bg">
                                <svg viewBox="0 0 24 24" width="48" height="48" fill="currentColor"><path d="M19.4 11.2a16 16 0 0 0-14.8 0L2 13v3c0 .6.4 1 1 1h18c.6 0 1-.4 1-1v-3l-2.6-1.8zM12 2v10M12 2L8 6M12 2l4 4"/></svg>
                            </div>
                        @endif
                        <span class="fleet-badge">Kapal Penumpang</span>
                    </div>
                    <div class="fleet-info">
                        <h3>{{ $ship->name }}</h3>
                        <p class="fleet-short-desc">{{ Str::limit($ship->description, 100) }}</p>
                        <div class="fleet-meta-specs">
                            <span><strong>Rute:</strong> {{ $ship->route }}</span>
                            <span><strong>Kapasitas:</strong> {{ $ship->capacity }}</span>
                        </div>
                        <a href="{{ route('fleets.detail', $ship->id) }}" class="btn btn-outline btn-sm btn-block">Lihat Spesifikasi & Detail</a>
                    </div>
                </div>
            @endforeach
        </div>
        
        <div class="text-center" style="margin-top: 40px;">
            <a href="{{ route('fleets') }}" class="btn btn-secondary">Lihat Seluruh Armada Kapal (Tugboats & Barges)</a>
        </div>
    </div>
</section>

<!-- Corporate News Section (Expanded Content) -->
<section id="home-news" class="news-section" style="padding: 100px 0; background-color: #ffffff;">
    <div class="container">
        <div class="section-header text-center">
            <span class="sub-title">Berita & Informasi</span>
            <h2>Update Terbaru PT PANCA MERAK SAMUDERA</h2>
            <p class="section-desc">Ikuti perkembangan terbaru mengenai operasional armada, rute baru, dan kebijakan keselamatan pelayaran kami.</p>
        </div>
        
        <div class="news-grid" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 30px; margin-top: 50px;">
            <div class="news-card" style="background-color: var(--bg-light); border: 1px solid var(--border-light); border-radius: var(--radius-md); overflow: hidden; display: flex; flex-direction: column;">
                <div style="height: 180px; background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%); display: flex; align-items: center; justify-content: center; color: #ffffff;">
                    <svg viewBox="0 0 24 24" width="40" height="40" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 20H5a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h10l4 4v10a2 2 0 0 1-2 2z"/><polyline points="14 2 14 8 20 8"/></svg>
                </div>
                <div style="padding: 24px; display: flex; flex-direction: column; flex-grow: 1;">
                    <span style="font-size: 0.75rem; color: var(--accent-cyan); font-weight: 700; margin-bottom: 8px;">KORPORASI | 12 Juli 2026</span>
                    <h3 style="font-size: 1.1rem; color: var(--primary-navy); margin-bottom: 12px; line-height: 1.4;">PMS Siap Hadapi Tantangan Distribusi Batubara Semester II</h3>
                    <p style="font-size: 0.85rem; color: var(--text-light-muted); margin-bottom: 16px; flex-grow: 1;">PT PANCA MERAK SAMUDERA mengoptimalkan jadwal pemeliharaan berkala BKI (Biro Klasifikasi Indonesia) bagi armada Tugboat Hector guna mengantisipasi puncak permintaan kargo batubara...</p>
                    <a href="#" class="news-link-btn" style="color: var(--accent-cyan); font-weight: 700; font-size: 0.85rem; display: flex; align-items: center; gap: 6px;" onclick="alert('Detail berita akan dimuat pada halaman artikel resmi.')">Baca Selengkapnya &rarr;</a>
                </div>
            </div>
            
            <div class="news-card" style="background-color: var(--bg-light); border: 1px solid var(--border-light); border-radius: var(--radius-md); overflow: hidden; display: flex; flex-direction: column;">
                <div style="height: 180px; background: linear-gradient(135deg, #60a5fa 0%, #1d4ed8 100%); display: flex; align-items: center; justify-content: center; color: #ffffff;">
                    <svg viewBox="0 0 24 24" width="40" height="40" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                </div>
                <div style="padding: 24px; display: flex; flex-direction: column; flex-grow: 1;">
                    <span style="font-size: 0.75rem; color: var(--accent-cyan); font-weight: 700; margin-bottom: 8px;">KESELAMATAN | 29 Juni 2026</span>
                    <h3 style="font-size: 1.1rem; color: var(--primary-navy); margin-bottom: 12px; line-height: 1.4;">Audit ISM Code Penumpang: Cattleya Express Raih Predikat Sangat Baik</h3>
                    <p style="font-size: 0.85rem; color: var(--text-light-muted); margin-bottom: 16px; flex-grow: 1;">Audit keselamatan tahunan untuk sistem keselamatan operasional kapal penumpang Cattleya Express menyatakan kepatuhan 100% terhadap protokol mitigasi evakuasi darurat laut...</p>
                    <a href="#" class="news-link-btn" style="color: var(--accent-cyan); font-weight: 700; font-size: 0.85rem; display: flex; align-items: center; gap: 6px;" onclick="alert('Detail berita akan dimuat pada halaman artikel resmi.')">Baca Selengkapnya &rarr;</a>
                </div>
            </div>
            
            <div class="news-card" style="background-color: var(--bg-light); border: 1px solid var(--border-light); border-radius: var(--radius-md); overflow: hidden; display: flex; flex-direction: column;">
                <div style="height: 180px; background: linear-gradient(135deg, #0284c7 0%, #2563eb 100%); display: flex; align-items: center; justify-content: center; color: #ffffff;">
                    <svg viewBox="0 0 24 24" width="40" height="40" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M8 14s1.5 2 4 2 4-2 4-2"/><line x1="9" y1="9" x2="9.01" y2="9"/><line x1="15" y1="9" x2="15.01" y2="9"/></svg>
                </div>
                <div style="padding: 24px; display: flex; flex-direction: column; flex-grow: 1;">
                    <span style="font-size: 0.75rem; color: var(--accent-cyan); font-weight: 700; margin-bottom: 8px;">LOGISTIK | 15 Mei 2026</span>
                    <h3 style="font-size: 1.1rem; color: var(--primary-navy); margin-bottom: 12px; line-height: 1.4;">PMS Rampungkan Konstruksi Perbaikan Tongkang Charles 205</h3>
                    <p style="font-size: 0.85rem; color: var(--text-light-muted); margin-bottom: 16px; flex-grow: 1;">Perbaikan deck pelat baja tongkang Charles 205 selesai dilakukan di galangan kapal Surabaya, siap memperkuat kegiatan angkutan batubara korporasi pertambangan per Juni ini...</p>
                    <a href="#" class="news-link-btn" style="color: var(--accent-cyan); font-weight: 700; font-size: 0.85rem; display: flex; align-items: center; gap: 6px;" onclick="alert('Detail berita akan dimuat pada halaman artikel resmi.')">Baca Selengkapnya &rarr;</a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection


