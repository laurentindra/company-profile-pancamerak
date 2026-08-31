@extends('layouts.app')

@section('content')

<!-- Page Header -->
<section class="page-header" style="background: linear-gradient(135deg, #1e40af 0%, #1d4ed8 100%); padding: 60px 0; border-bottom: 1px solid var(--border-dark); text-align: center; color: #ffffff;">
    <div class="container">
        <span class="sub-title">Spesialisasi Kami</span>
        <h1 style="font-size: 2.5rem; margin-top: 10px;">Layanan Bisnis Pelayaran</h1>
        <p style="color: var(--text-dark-muted); max-width: 650px; margin: 10px auto 0;">PT PANCA MERAK SAMUDERA menyediakan dua pilar layanan terpadu: Angkutan Kapal Penumpang Terjadwal dan Penyewaan Armada Tongkang & Kapal Tunda Batubara.</p>
    </div>
</section>

<!-- Interactive Service Category Tabs -->
<section style="background-color: var(--bg-light); padding: 24px 0; border-bottom: 1px solid var(--border-light); position: sticky; top: 0; z-index: 20; backdrop-filter: blur(10px); background-color: rgba(239, 246, 255, 0.95);">
    <div class="container">
        <div class="service-nav-tabs" style="display: flex; justify-content: center; gap: 12px; flex-wrap: wrap;">
            <button type="button" class="service-tab-btn active" data-target="all" onclick="selectServiceTab('all')" style="padding: 10px 20px; border-radius: 30px; font-weight: 600; font-size: 0.9rem; border: 1.5px solid var(--primary-navy); background: var(--primary-navy); color: #ffffff; cursor: pointer; transition: all 0.25s ease; display: inline-flex; align-items: center; gap: 8px;">
                <span>📋</span> Tampilkan Semua Layanan
            </button>
            <button type="button" class="service-tab-btn" data-target="penumpang" onclick="selectServiceTab('penumpang')" style="padding: 10px 20px; border-radius: 30px; font-weight: 600; font-size: 0.9rem; border: 1.5px solid #cbd5e1; background: #ffffff; color: var(--primary-navy); cursor: pointer; transition: all 0.25s ease; display: inline-flex; align-items: center; gap: 8px;">
                <span>🚢</span> 1. Kapal Penumpang & Kendaraan
            </button>
            <button type="button" class="service-tab-btn" data-target="sewa-tongkang" onclick="selectServiceTab('sewa-tongkang')" style="padding: 10px 20px; border-radius: 30px; font-weight: 600; font-size: 0.9rem; border: 1.5px solid #cbd5e1; background: #ffffff; color: var(--primary-navy); cursor: pointer; transition: all 0.25s ease; display: inline-flex; align-items: center; gap: 8px;">
                <span>⚓</span> 2. Sewa Tongkang & Kapal Tunda (Tugboat)
            </button>
        </div>
    </div>
</section>

<!-- ========================================================
     SECTION 1: KAPAL PENUMPANG & ANGKUTAN KENDARAAN (#penumpang)
     ======================================================== -->
<section id="penumpang" class="service-content-block" style="padding: 80px 0; background-color: #ffffff; border-bottom: 2px solid #e2e8f0; scroll-margin-top: 80px;">
    <div class="container">
        <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 12px;">
            <span style="background-color: #dbeafe; color: #1e40af; font-size: 0.78rem; font-weight: 800; padding: 6px 14px; border-radius: 20px; text-transform: uppercase; letter-spacing: 1px;">
                🚢 Layanan 01 &bull; Pelayaran Niaga Reguler
            </span>
        </div>

        <div class="service-grid-2col">
            <div>
                <h2 style="font-size: 2.1rem; color: var(--primary-navy); margin-bottom: 18px; line-height: 1.3;">
                    Layanan Kapal Penumpang & Angkutan Kendaraan
                </h2>
                <p style="color: var(--text-light-muted); margin-bottom: 24px; font-size: 0.95rem; line-height: 1.75;">
                    PT PANCA MERAK SAMUDERA mengoperasikan jalur pelayaran niaga terjadwal (liner) yang menghubungkan pelabuhan-pelabuhan strategis di Pulau Sulawesi dan Kalimantan. Kapal-kapal kami didesain dengan kapasitas besar, standar kenyamanan kabin, serta dek kargo khusus kendaraan.
                </p>
                
                <!-- Rute & Armada Box -->
                <div style="background-color: #f8fafc; border: 1.5px solid #e2e8f0; border-left: 4px solid var(--primary-navy); border-radius: var(--radius-md); padding: 24px; margin-bottom: 30px;">
                    <h4 style="color: var(--primary-navy); margin-bottom: 14px; font-size: 1.05rem; display: flex; align-items: center; gap: 8px;">
                        <span>📍</span> Rute Utama Penumpang & Armada Kapal:
                    </h4>
                    <ul style="list-style-type: none; padding-left: 0; margin: 0; display: flex; flex-direction: column; gap: 14px;">
                        <li style="position: relative; padding-left: 28px; font-size: 0.95rem; color: var(--text-light-muted);">
                            <span style="position: absolute; left: 0; color: #16a34a; font-weight: bold; font-size: 1.1rem;">&#10004;</span>
                            <strong style="color: var(--primary-navy);">Pare-Pare &harr; Nunukan:</strong> Dilayani oleh kapal <strong>KM. Pantokrator</strong> (fasilitas dek tempat tidur ber-AC, kantin, kafetaria & muatan kendaraan).
                        </li>
                        <li style="position: relative; padding-left: 28px; font-size: 0.95rem; color: var(--text-light-muted);">
                            <span style="position: absolute; left: 0; color: #16a34a; font-weight: bold; font-size: 1.1rem;">&#10004;</span>
                            <strong style="color: var(--primary-navy);">Pare-Pare &harr; Samarinda:</strong> Dilayani oleh kapal <strong>KM. Queen Soya</strong> (kapasitas &gt;1.500 penumpang, dek kabin ber-AC & kargo logistik).
                        </li>
                        <li style="position: relative; padding-left: 28px; font-size: 0.95rem; color: var(--text-light-muted);">
                            <span style="position: absolute; left: 0; color: #16a34a; font-weight: bold; font-size: 1.1rem;">&#10004;</span>
                            <strong style="color: var(--primary-navy);">Pare-Pare &harr; Bontang:</strong> Dilayani oleh kapal <strong>KM. Cattleya Express</strong> (kapasitas &gt;1.400 penumpang, dek tidur & logistik kendaraan).
                        </li>
                    </ul>
                </div>

                <!-- Kendaraan & Kargo -->
                <h4 style="color: var(--primary-navy); margin-bottom: 10px; font-size: 1.05rem;">Fasilitas Angkutan Kendaraan & Kargo:</h4>
                <p style="color: var(--text-light-muted); font-size: 0.95rem; margin-bottom: 24px; line-height: 1.7;">
                    Selain mengangkut penumpang umum, kapal penumpang kami dilengkapi ramp door dan dek kargo lapang untuk mengangkut berbagai golongan muatan: Sepeda Motor (&lt;150cc dan &gt;150cc), Mobil Pribadi/Mewah (Sedan, Jeep, Kijang), Truk Sedang (TS Dyna 6 Roda), Truk Besar (10 Roda/Tronton), hingga Alat Berat (Excavator PC 200).
                </p>
                
                <!-- Action Buttons -->
                <div style="display: flex; gap: 12px; flex-wrap: wrap; align-items: center;">
                    <a href="{{ route('schedules') }}" class="btn btn-primary" style="display: inline-flex; align-items: center; gap: 8px;">
                        <span>📅</span> Cek Jadwal & Tarif Tiket &rarr;
                    </a>
                    <a href="{{ route('fleets') }}?type=passenger" class="btn btn-outline" style="display: inline-flex; align-items: center; gap: 8px;">
                        <span>🚢</span> Lihat Unit Kapal Penumpang
                    </a>
                </div>
            </div>

            <!-- Side Card: Fasilitas & Keagenan Tiket -->
            <div>
                <div style="background-color: var(--bg-light); border: 1px solid var(--border-light); padding: 32px; border-radius: var(--radius-lg); margin-bottom: 24px;">
                    <h3 style="color: var(--primary-navy); margin-bottom: 20px; font-size: 1.2rem; border-bottom: 2px solid var(--accent-cyan); padding-bottom: 10px;">
                        Standar Kenyamanan & Fasilitas Dek
                    </h3>
                    <div style="display: flex; flex-direction: column; gap: 18px;">
                        <div style="display: flex; gap: 14px;">
                            <div style="color: #1e40af; font-weight: 800; font-size: 1.1rem; background: #dbeafe; width: 34px; height: 34px; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">01</div>
                            <div>
                                <h5 style="color: var(--primary-navy); font-size: 0.95rem; margin-bottom: 4px;">Dek Tidur & Kabin Ber-AC</h5>
                                <p style="font-size: 0.85rem; color: var(--text-light-muted); line-height: 1.5;">Kamar ber-AC dan matras tidur bersih untuk kenyamanan pelayaran jarak jauh lintas pulau.</p>
                            </div>
                        </div>
                        <div style="display: flex; gap: 14px;">
                            <div style="color: #1e40af; font-weight: 800; font-size: 1.1rem; background: #dbeafe; width: 34px; height: 34px; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">02</div>
                            <div>
                                <h5 style="color: var(--primary-navy); font-size: 0.95rem; margin-bottom: 4px;">Kantin & Cafetaria Dek</h5>
                                <p style="font-size: 0.85rem; color: var(--text-light-muted); line-height: 1.5;">Menyediakan hidangan makanan, minuman hangat, dan perlengkapan perjalanan selama pelayaran.</p>
                            </div>
                        </div>
                        <div style="display: flex; gap: 14px;">
                            <div style="color: #1e40af; font-weight: 800; font-size: 1.1rem; background: #dbeafe; width: 34px; height: 34px; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">03</div>
                            <div>
                                <h5 style="color: var(--primary-navy); font-size: 0.95rem; margin-bottom: 4px;">Sistem Keselamatan SOLAS & BKI</h5>
                                <p style="font-size: 0.85rem; color: var(--text-light-muted); line-height: 1.5;">Dilengkapi Life Jacket, Inflatable Life Raft, Sekoci Darurat, dan sertifikasi keselamatan aktif dari BKI.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Keagenan Parepare Info Box -->
                <div style="background: #ffffff; border: 1.5px solid #cbd5e1; border-radius: var(--radius-md); padding: 20px; box-shadow: var(--shadow-sm);">
                    <h5 style="color: var(--primary-navy); font-size: 0.95rem; margin-bottom: 6px; display: flex; align-items: center; gap: 6px;">
                        <span>🏢</span> Kantor Keagenan Tiket Pare-Pare:
                    </h5>
                    <p style="font-size: 0.85rem; color: var(--text-light-muted); margin-bottom: 12px; line-height: 1.5;">
                        Jl. Bau Massepe No. 419E-419F, Pare-Pare, Sulawesi Selatan<br>
                        <strong>Telp:</strong> (0421) 21649 | <strong>Fax:</strong> (0421) 28866
                    </p>
                    <a href="https://wa.me/6281142021649?text=Halo%20Admin%20Keagenan%20PMS,%20saya%20ingin%20bertanya%20informasi%20pemesanan%20tiket%20dan%20muatan%20kapal" target="_blank" class="btn btn-primary btn-sm btn-block" style="background: #16a34a; border-color: #16a34a; text-align: center; justify-content: center;">
                        Hubungi WhatsApp Agen Tiket
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- ========================================================
     SECTION 2: SEWA TONGKANG & KAPAL TUNDA / TUGBOAT (#sewa-tongkang)
     ======================================================== -->
<section id="sewa-tongkang" class="service-content-block" style="padding: 80px 0; background-color: var(--bg-light); scroll-margin-top: 80px;">
    <div class="container">
        <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 12px;">
            <span style="background-color: #fef3c7; color: #92400e; font-size: 0.78rem; font-weight: 800; padding: 6px 14px; border-radius: 20px; text-transform: uppercase; letter-spacing: 1px;">
                ⚓ Layanan 02 &bull; Logistik Batubara & Tambang Curah
            </span>
        </div>

        <div class="service-grid-2col reverse">
            <!-- Left: Dark Blue Contract Procedure Box -->
            <div style="background-color: var(--primary-navy); padding: 36px; border-radius: var(--radius-lg); color: #ffffff; box-shadow: var(--shadow-md);">
                <span class="sub-title" style="color: #93c5fd;">Prosedur Kemitraan</span>
                <h3 style="color: #ffffff; font-size: 1.4rem; margin-top: 6px; margin-bottom: 18px; border-left: 4px solid var(--accent-cyan-light); padding-left: 14px;">
                    Skema Kontrak Sewa Kapal
                </h3>
                <p style="color: var(--text-dark-muted); font-size: 0.88rem; margin-bottom: 24px; line-height: 1.6;">
                    Kami melayani kerjasama pengangkutan batubara dan mineral tambang curah dengan dua skema kontrak fleksibel:
                </p>

                <div style="display: flex; flex-direction: column; gap: 20px;">
                    <div style="background: rgba(255, 255, 255, 0.08); padding: 18px; border-radius: var(--radius-sm); border: 1px solid rgba(255,255,255,0.12);">
                        <h4 style="color: #ffffff; font-size: 1rem; margin-bottom: 6px; display: flex; align-items: center; gap: 6px;">
                            <span>⏱️</span> 1. Time Charter (Sewa Berjangka)
                        </h4>
                        <p style="color: var(--text-dark-muted); font-size: 0.83rem; line-height: 1.6; margin: 0;">
                            Penyewaan unit kapal tunda (Tugboat) beserta tongkang (Barge) secara bulanan maupun tahunan. Operasional armada didedikasikan penuh untuk mendukung rantai pasok pengapalan batubara klien.
                        </p>
                    </div>

                    <div style="background: rgba(255, 255, 255, 0.08); padding: 18px; border-radius: var(--radius-sm); border: 1px solid rgba(255,255,255,0.12);">
                        <h4 style="color: #ffffff; font-size: 1rem; margin-bottom: 6px; display: flex; align-items: center; gap: 6px;">
                            <span>📦</span> 2. Freight Charter (Sewa per Rute/Tonase)
                        </h4>
                        <p style="color: var(--text-dark-muted); font-size: 0.83rem; line-height: 1.6; margin: 0;">
                            Sewa armada berdasarkan perhitungan volume muatan (tonase batubara) dari pelabuhan muat (loading port/jeti) ke pelabuhan tujuan (discharging port PLTU/Smelter).
                        </p>
                    </div>
                </div>

                <div style="margin-top: 24px; padding-top: 18px; border-top: 1px solid rgba(255,255,255,0.15); font-size: 0.82rem; color: var(--text-dark-muted);">
                    <strong>Area Loading Port Utama:</strong> Jeti Sungai Mahakam, Samarinda, Taboneo (Kalimantan) menuju PLTU & Industri di Jawa dan Sulawesi.
                </div>
            </div>
            
            <!-- Right: Service Details & Fleet Specs -->
            <div>
                <h2 style="font-size: 2.1rem; color: var(--primary-navy); margin-bottom: 18px; line-height: 1.3;">
                    Penyewaan Tugboat (Kapal Tunda) & Barge (Tongkang)
                </h2>
                <p style="color: var(--text-light-muted); margin-bottom: 20px; font-size: 0.95rem; line-height: 1.75;">
                    PT PANCA MERAK SAMUDERA adalah mitra pengangkutan laut terpercaya bagi industri pertambangan nasional. Sejak tahun 2010, kami mengoperasikan armada kapal tunda bertenaga tinggi serta tongkang besi berukuran 300 kaki yang terawat sesuai standar klasifikasi resmi.
                </p>
                
                <!-- Spesifikasi Armada Box -->
                <div style="background-color: #ffffff; border: 1.5px solid #cbd5e1; border-radius: var(--radius-md); padding: 24px; margin-bottom: 24px; box-shadow: var(--shadow-sm);">
                    <h4 style="color: var(--primary-navy); margin-bottom: 14px; font-size: 1.05rem; display: flex; align-items: center; gap: 8px;">
                        <span>⚓</span> Keunggulan & Spesifikasi Armada Logistik:
                    </h4>
                    <ul style="list-style-type: none; padding-left: 0; margin: 0; display: flex; flex-direction: column; gap: 12px;">
                        <li style="position: relative; padding-left: 26px; font-size: 0.9rem; color: var(--text-light-muted);">
                            <span style="position: absolute; left: 0; color: #1e40af; font-weight: bold;">&bull;</span>
                            <strong style="color: var(--primary-navy);">Tongkang Charles Series (300 Feet):</strong> Kapasitas muat kargo curah sebesar <strong>7.500 &ndash; 8.000 Metrik Ton</strong> batubara per trip.
                        </li>
                        <li style="position: relative; padding-left: 26px; font-size: 0.9rem; color: var(--text-light-muted);">
                            <span style="position: absolute; left: 0; color: #1e40af; font-weight: bold;">&bull;</span>
                            <strong style="color: var(--primary-navy);">Kapal Tunda Hector Series (Twin Screw):</strong> Ditenagai mesin ganda <strong>610 HP hingga 850 HP</strong> untuk stabilitas dan daya tarik kuat di perairan laut lepas.
                        </li>
                        <li style="position: relative; padding-left: 26px; font-size: 0.9rem; color: var(--text-light-muted);">
                            <span style="position: absolute; left: 0; color: #1e40af; font-weight: bold;">&bull;</span>
                            <strong style="color: var(--primary-navy);">Sertifikasi Klasifikasi BKI Lengkap:</strong> Seluruh armada memenuhi standar Biro Klasifikasi Indonesia untuk keamanan asuransi muatan kargo.
                        </li>
                    </ul>
                </div>

                <!-- Contact & Action Buttons -->
                <div style="display: flex; gap: 12px; flex-wrap: wrap; align-items: center; margin-top: 10px;">
                    <a href="{{ route('contact') }}" class="btn btn-primary" style="display: inline-flex; align-items: center; gap: 8px;">
                        <span>📄</span> Ajukan Penawaran Sewa Kapal &rarr;
                    </a>
                    <a href="{{ route('fleets') }}?type=tugboat" class="btn btn-outline" style="display: inline-flex; align-items: center; gap: 8px;">
                        <span>⚓</span> Lihat Armada Tugboat & Tongkang
                    </a>
                </div>

                <!-- Hotline Pemasaran Sewa -->
                <div style="margin-top: 24px; padding: 16px 20px; background: #e0f2fe; border: 1px solid #bae6fd; border-radius: var(--radius-sm); display: flex; align-items: center; justify-content: space-between; gap: 16px; flex-wrap: wrap;">
                    <div>
                        <strong style="color: #0369a1; font-size: 0.9rem; display: block;">Konsultasi Kebutuhan Pengapalan Batubara:</strong>
                        <span style="color: #0284c7; font-size: 0.82rem;">Head Office Surabaya: (031) 3522385 | Cabang Samarinda: (0541) 727 3080</span>
                    </div>
                    <a href="https://wa.me/62813522385?text=Halo%20Tim%20Pemasaran%20PT%20PANCA%20MERAK%20SAMUDERA,%20saya%20ingin%20konsultasi%20penyewaan%20Tugboat%20dan%20Tongkang" target="_blank" class="btn btn-sm" style="background: #16a34a; color: #ffffff; font-weight: 600; white-space: nowrap;">
                        Chat WhatsApp Pemasaran
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Interactive Tab Switcher Script -->
<script>
    function selectServiceTab(target) {
        const buttons = document.querySelectorAll('.service-tab-btn');
        const blockPenumpang = document.getElementById('penumpang');
        const blockTongkang = document.getElementById('sewa-tongkang');

        buttons.forEach(btn => {
            if (btn.getAttribute('data-target') === target) {
                btn.style.background = 'var(--primary-navy)';
                btn.style.color = '#ffffff';
                btn.style.borderColor = 'var(--primary-navy)';
            } else {
                btn.style.background = '#ffffff';
                btn.style.color = 'var(--primary-navy)';
                btn.style.borderColor = '#cbd5e1';
            }
        });

        if (target === 'penumpang') {
            if (blockPenumpang) blockPenumpang.style.display = 'block';
            if (blockTongkang) blockTongkang.style.display = 'none';
            if (blockPenumpang) blockPenumpang.scrollIntoView({ behavior: 'smooth', block: 'start' });
        } else if (target === 'sewa-tongkang') {
            if (blockPenumpang) blockPenumpang.style.display = 'none';
            if (blockTongkang) blockTongkang.style.display = 'block';
            if (blockTongkang) blockTongkang.scrollIntoView({ behavior: 'smooth', block: 'start' });
        } else {
            if (blockPenumpang) blockPenumpang.style.display = 'block';
            if (blockTongkang) blockTongkang.style.display = 'block';
        }
    }

    document.addEventListener('DOMContentLoaded', () => {
        const hash = window.location.hash.replace('#', '');
        const urlParams = new URLSearchParams(window.location.search);
        const tabParam = urlParams.get('tab') || urlParams.get('type');

        if (hash === 'penumpang' || tabParam === 'penumpang' || tabParam === 'passenger') {
            selectServiceTab('penumpang');
        } else if (hash === 'sewa-tongkang' || hash === 'tongkang' || tabParam === 'sewa-tongkang' || tabParam === 'tongkang' || tabParam === 'barge' || tabParam === 'tugboat') {
            selectServiceTab('sewa-tongkang');
        }
    });

    window.addEventListener('hashchange', () => {
        const hash = window.location.hash.replace('#', '');
        if (hash === 'penumpang') {
            selectServiceTab('penumpang');
        } else if (hash === 'sewa-tongkang' || hash === 'tongkang') {
            selectServiceTab('sewa-tongkang');
        }
    });
</script>

<style>
    .service-grid-2col {
        display: grid;
        grid-template-columns: 1.15fr 0.85fr;
        gap: 50px;
        align-items: flex-start;
    }
    .service-grid-2col.reverse {
        grid-template-columns: 0.95fr 1.05fr;
    }
    @media (max-width: 991px) {
        .service-grid-2col,
        .service-grid-2col.reverse {
            grid-template-columns: 1fr;
            gap: 36px;
        }
        .service-nav-tabs {
            justify-content: flex-start !important;
            overflow-x: auto;
            padding-bottom: 4px;
            -webkit-overflow-scrolling: touch;
        }
        .service-tab-btn {
            white-space: nowrap;
            font-size: 0.82rem !important;
            padding: 8px 16px !important;
        }
    }
</style>

@endsection

