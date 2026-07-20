@extends('layouts.app')

@section('content')

<!-- Page Header Banner -->
<section class="page-header" style="background: linear-gradient(135deg, #1e40af 0%, #1d4ed8 100%); padding: 60px 0; border-bottom: 1px solid var(--border-dark); text-align: center; color: #ffffff;">
    <div class="container">
        <span class="sub-title">Spesialisasi Kami</span>
        <h1 style="font-size: 2.5rem; margin-top: 10px;">Layanan Bisnis Pelayaran</h1>
        <p style="color: var(--text-dark-muted); max-width: 600px; margin: 10px auto 0;">Menghubungkan pulau-pulau dengan angkutan penumpang terjadwal dan logistik curah pertambangan batubara.</p>
    </div>
</section>

<!-- Detailed Passenger Services Section -->
<section class="services-detail" style="padding: 80px 0; background-color: #ffffff;">
    <div class="container">
        <div style="display: grid; grid-template-columns: 1.1fr 0.9fr; gap: 60px; align-items: center;">
            <div>
                <span class="sub-title">Pelayaran Niaga</span>
                <h2 style="font-size: 2rem; color: var(--primary-navy); margin-bottom: 20px;">Layanan Kapal Penumpang & Angkutan Kendaraan</h2>
                <p style="color: var(--text-light-muted); margin-bottom: 20px; font-size: 0.95rem; line-height: 1.7;">PT PANCA MERAK SAMUDERA menyediakan jalur pelayaran terjadwal (liner) yang menghubungkan pelabuhan-pelabuhan niaga strategis di Pulau Sulawesi dan Kalimantan. Kapal-kapal kami didesain untuk membawa penumpang dalam jumlah besar secara aman dan ekonomis.</p>
                
                <h4 style="color: var(--primary-navy); margin-bottom: 10px;">Rute Utama Penumpang:</h4>
                <ul style="margin-bottom: 30px; list-style-type: none; padding-left: 0;">
                    <li style="position: relative; padding-left: 24px; margin-bottom: 8px; font-size: 0.9rem; color: var(--text-light-muted);">
                        <strong style="color: var(--primary-navy);">Pare-Pare &harr; Nunukan:</strong> Melalui kapal Cattleya Express (dek tidur & logistik).
                    </li>
                    <li style="position: relative; padding-left: 24px; margin-bottom: 8px; font-size: 0.9rem; color: var(--text-light-muted);">
                        <strong style="color: var(--primary-navy);">Pare-Pare &harr; Samarinda:</strong> Melalui kapal MV Queen Soya (kapasitas >1.500 penumpang).
                    </li>
                    <li style="position: relative; padding-left: 24px; margin-bottom: 8px; font-size: 0.9rem; color: var(--text-light-muted);">
                        <strong style="color: var(--primary-navy);">Samarinda &harr; Pare-Pare:</strong> Melalui kapal MV Pantokrator (rute reguler bolak-balik).
                    </li>
                </ul>

                <h4 style="color: var(--primary-navy); margin-bottom: 10px;">Fasilitas & Layanan Kendaraan:</h4>
                <p style="color: var(--text-light-muted); font-size: 0.95rem; margin-bottom: 20px;">Selain membawa penumpang, kapal kami memiliki dek kargo khusus yang mampu memuat kendaraan roda dua (sepeda motor), roda empat (mobil pribadi), hingga kendaraan berat logistik seperti truk tronton dan truk ekspedisi untuk mendukung distribusi logistik antar-pulau.</p>
                
                <a href="{{ route('schedules') }}" class="btn btn-primary">Lihat Jadwal & Tarif Tiket &rarr;</a>
            </div>

            <div style="background-color: var(--bg-light); border: 1px solid var(--border-light); padding: 40px; border-radius: var(--radius-lg);">
                <h3 style="color: var(--primary-navy); margin-bottom: 20px;">Standar Kenyamanan Dek</h3>
                <div style="display: flex; flex-direction: column; gap: 20px;">
                    <div style="display: flex; gap: 15px;">
                        <div style="color: var(--accent-cyan); font-weight: 700; font-size: 1.2rem;">01</div>
                        <div>
                            <h5 style="color: var(--primary-navy); font-size: 0.95rem; margin-bottom: 4px;">Dek Tidur Penumpang</h5>
                            <p style="font-size: 0.85rem; color: var(--text-light-muted);">Kamar tidur dan matras bersih yang disediakan untuk perjalanan jarak jauh antar pulau.</p>
                        </div>
                    </div>
                    <div style="display: flex; gap: 15px;">
                        <div style="color: var(--accent-cyan); font-weight: 700; font-size: 1.2rem;">02</div>
                        <div>
                            <h5 style="color: var(--primary-navy); font-size: 0.95rem; margin-bottom: 4px;">Kantin & Cafetaria Dek</h5>
                            <p style="font-size: 0.85rem; color: var(--text-light-muted);">Menyediakan makanan, minuman hangat, dan kebutuhan pokok penumpang selama pelayaran.</p>
                        </div>
                    </div>
                    <div style="display: flex; gap: 15px;">
                        <div style="color: var(--accent-cyan); font-weight: 700; font-size: 1.2rem;">03</div>
                        <div>
                            <h5 style="color: var(--primary-navy); font-size: 0.95rem; margin-bottom: 4px;">Sistem Keselamatan Modern</h5>
                            <p style="font-size: 0.85rem; color: var(--text-light-muted);">Semua kapal penumpang dilengkapi dengan life jacket, life raft, dan sekoci darurat yang diinspeksi secara berkala.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Detailed Coal & Tugboat/Barge Services Section -->
<section class="services-detail" style="padding: 80px 0; background-color: var(--bg-light); border-top: 1px solid var(--border-light);">
    <div class="container">
        <div style="display: grid; grid-template-columns: 0.9fr 1.1fr; gap: 60px; align-items: center;">
            <div style="background-color: var(--primary-navy); padding: 40px; border-radius: var(--radius-lg); color: #ffffff;">
                <h3 style="color: #ffffff; margin-bottom: 24px; border-left: 4px solid var(--accent-cyan-light); padding-left: 15px;">Prosedur Kontrak Sewa Kapal</h3>
                <p style="color: var(--text-dark-muted); font-size: 0.85rem; margin-bottom: 20px;">Kami melayani kemitraan pengangkutan dengan dua skema kontrak utama:</p>
                <div style="display: flex; flex-direction: column; gap: 20px;">
                    <div>
                        <h4 style="color: #ffffff; font-size: 0.95rem; margin-bottom: 4px;">1. Time Charter (Sewa Berjangka)</h4>
                        <p style="color: var(--text-dark-muted); font-size: 0.8rem;">Penyewaan kapal tunda beserta tongkang secara bulanan atau tahunan, di mana operasional kapal dijalankan sepenuhnya untuk kebutuhan pengapalan klien.</p>
                    </div>
                    <div>
                        <h4 style="color: #ffffff; font-size: 0.95rem; margin-bottom: 4px;">2. Freight Charter (Sewa per Rute/Ton)</h4>
                        <p style="color: var(--text-dark-muted); font-size: 0.8rem;">Sewa armada berdasarkan perhitungan volume angkut (tonase batubara yang dimuat) dari pelabuhan asal (loading port) ke pelabuhan tujuan (discharging port).</p>
                    </div>
                </div>
            </div>
            
            <div>
                <span class="sub-title">Logistik Batubara</span>
                <h2 style="font-size: 2rem; color: var(--primary-navy); margin-bottom: 20px;">Penyewaan Tugboat (Kapal Tunda) & Barge (Tongkang)</h2>
                <p style="color: var(--text-light-muted); margin-bottom: 20px; font-size: 0.95rem; line-height: 1.7;">PT PANCA MERAK SAMUDERA adalah mitra andal bagi industri batubara di Indonesia. Sejak tahun 2010, kami mengoperasikan armada kapal tunda (Tugboat) bertenaga mesin ganda tinggi (610 HP hingga 850 HP) serta tongkang (Barge) besi berukuran 300 kaki yang dirawat secara ketat.</p>
                <p style="color: var(--text-light-muted); margin-bottom: 20px; font-size: 0.95rem;">Layanan kargo curah kami utamanya melayani pemuatan batubara di berbagai jeti/pelabuhan Kalimantan (seperti Sungai Mahakam, Samarinda, Taboneo) untuk didistribusikan ke pembangkit listrik tenaga uap (PLTU) serta pabrik peleburan bijih besi di Pulau Jawa dan Sulawesi.</p>
                
                <h4 style="color: var(--primary-navy); margin-bottom: 10px;">Fitur Logistik Kami:</h4>
                <ul style="padding-left: 20px; margin-bottom: 30px; color: var(--text-light-muted); font-size: 0.9rem;">
                    <li style="margin-bottom: 6px;">Tongkang berukuran 300 kaki dengan kapasitas angkut kargo curah &asymp; 7.500 - 8.000 Metrik Ton batubara.</li>
                    <li style="margin-bottom: 6px;">Kapal Tunda bermesin ganda (twin-screw) yang menjamin stabilitas manuver di laut lepas.</li>
                    <li style="margin-bottom: 0;">Sertifikasi BKI (Biro Klasifikasi Indonesia) lengkap untuk menjamin asuransi kargo tambang aman.</li>
                </ul>

                <a href="{{ route('contact') }}" class="btn btn-outline">Ajukan Penawaran Sewa Kapal</a>
            </div>
        </div>
    </div>
</section>

@endsection

