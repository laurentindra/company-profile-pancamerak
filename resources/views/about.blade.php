@extends('layouts.app')

@section('content')

<!-- Page Header Banner -->
<section class="page-header" style="background: linear-gradient(135deg, #1e40af 0%, #1d4ed8 100%); padding: 60px 0; border-bottom: 1px solid var(--border-dark); text-align: center; color: #ffffff;">
    <div class="container">
        <span class="sub-title">Profil Korporat</span>
        <h1 style="font-size: 2.5rem; margin-top: 10px;">Tentang Kami</h1>
        <p style="color: var(--text-dark-muted); max-width: 600px; margin: 10px auto 0;">Mengenal sejarah, nilai-nilai, kepatuhan hukum, dan tim manajemen PT PANCA MERAK SAMUDERA.</p>
    </div>
</section>

<!-- Company History & Milestones -->
<section class="about-section" style="padding: 80px 0; background-color: #ffffff;">
    <div class="container">
        <div class="about-grid">
            <div class="about-text-content">
                <h2>Sejarah & Pendirian Perusahaan</h2>
                <p>PT PANCA MERAK SAMUDERA didirikan secara resmi pada tanggal 6 Desember 2001 di Kota Surabaya berdasarkan Akta Pendirian Perusahaan Nomor 8 oleh Notaris Yanita. Perusahaan memperoleh pengesahan badan hukum dari Departemen Hukum dan Hak Asasi Manusia Republik Indonesia pada tanggal yang sama.</p>
                <p>Didirikan dengan visi untuk memfasilitasi integrasi ekonomi antar-pulau, kami memulai operasional kapal penumpang niaga dengan meluncurkan rute pelayaran reguler Sulawesi - Kalimantan Utara - Nunukan. Kesuksesan rute awal memicu ekspansi layanan penumpang kedua pada tahun 2007 (MV Queen Soya) dan ketiga pada tahun 2013 (MV Pantokrator).</p>
                <p>Seiring pesatnya perkembangan sektor energi tambang, pada tahun 2010 kami mengepakkan sayap bisnis dengan memasuki logistik laut pengangkutan batubara curah (coal bulk shipping) melalui skema penyewaan kapal tunda dan tongkang bagi perusahaan tambang batubara terkemuka nasional.</p>
                
                <h3 style="margin-top: 40px; margin-bottom: 20px; color: var(--primary-navy);">Visi & Misi Perusahaan</h3>
                <div style="background-color: var(--bg-light); padding: 30px; border-radius: var(--radius-md); border-left: 4px solid var(--accent-cyan);">
                    <h4 style="color: var(--primary-navy); margin-bottom: 10px;">Visi Kami:</h4>
                    <p style="font-style: italic; font-size: 0.95rem; margin-bottom: 20px; color: var(--text-light-muted);">
                        "Menjadi perusahaan pelayaran nasional terkemuka yang menyediakan solusi transportasi laut hemat biaya guna meningkatkan loyalitas pelanggan dan pertumbuhan perusahaan secara berkelanjutan."
                    </p>
                    <h4 style="color: var(--primary-navy); margin-bottom: 10px;">Misi Kami:</h4>
                    <ul style="padding-left: 20px; list-style-type: disc; color: var(--text-light-muted); font-size: 0.9rem;">
                        <li style="margin-bottom: 8px;">Meningkatkan secara konsisten kualitas layanan transportasi laut bagi penumpang dan kargo.</li>
                        <li style="margin-bottom: 8px;">Menyediakan operasi pengapalan yang efisien, aman, andal, dan ramah lingkungan.</li>
                        <li style="margin-bottom: 0;">Meningkatkan kepuasan pelanggan melalui efisiensi biaya logistik terintegrasi.</li>
                    </ul>
                </div>
            </div>
            
            <div class="about-timeline-content">
                <h3 class="timeline-title">Garis Waktu Perkembangan (Milestones)</h3>
                <div class="timeline">
                    <div class="timeline-item">
                        <div class="timeline-year">2001</div>
                        <div class="timeline-desc">
                            <h4>Pendirian Resmi PT PMS</h4>
                            <p>Berdiri pada 6 Desember 2001 di Surabaya sebagai perusahaan pelayaran niaga nasional.</p>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-year">2005</div>
                        <div class="timeline-desc">
                            <h4>Akuisisi Cattleya Express</h4>
                            <p>Meluncurkan pelayaran kapal penumpang Cattleya Express rute Pare-Pare - Nunukan (kapasitas >1.400 Penumpang).</p>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-year">2007</div>
                        <div class="timeline-desc">
                            <h4>Peluncuran MV Queen Soya</h4>
                            <p>Membeli MV Queen Soya untuk memperkuat jalur pelayaran niaga Pare-Pare - Samarinda.</p>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-year">2010</div>
                        <div class="timeline-desc">
                            <h4>Layanan Logistik Batubara</h4>
                            <p>Membeli armada tongkang Charles 205, 207, 208 dan kapal tunda Hector 101, 102, 103 untuk charter tambang.</p>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-year">2013</div>
                        <div class="timeline-desc">
                            <h4>Armada Penumpang Ketiga</h4>
                            <p>Menghadirkan MV Pantokrator untuk melayani rute pelayaran penumpang Samarinda - Pare-Pare.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Organizational Management Structure -->
<section class="management-section" style="padding: 80px 0; background-color: var(--bg-light); border-top: 1px solid var(--border-light); border-bottom: 1px solid var(--border-light);">
    <div class="container">
        <div class="section-header text-center">
            <span class="sub-title">Manajemen Perusahaan</span>
            <h2>Dewan Komisaris & Direksi Eksekutif</h2>
            <p class="section-desc">Pimpinan kepengurusan maritim yang mengawal arah kemajuan dan keberlanjutan bisnis PT PANCA MERAK SAMUDERA.</p>
        </div>
        
        <div class="management-grid" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 30px; margin-top: 50px;">
            <div class="member-card" style="background-color: #ffffff; border: 1px solid var(--border-light); border-radius: var(--radius-md); padding: 30px; text-align: center; box-shadow: var(--shadow-sm); transition: var(--transition-smooth);">
                <div style="width: 100px; height: 100px; border-radius: 50%; background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%); margin: 0 auto 20px; display: flex; align-items: center; justify-content: center; color: #ffffff;">
                    <svg viewBox="0 0 24 24" width="40" height="40" fill="currentColor"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                </div>
                <h4 style="color: var(--primary-navy); font-size: 1.1rem; margin-bottom: 4px;">Capt. H. Panca Merak, M.Mar.</h4>
                <span style="font-size: 0.8rem; color: var(--accent-cyan); font-weight: 700; text-transform: uppercase; letter-spacing: 1px; display: block; margin-bottom: 12px;">Komisaris Utama</span>
                <p style="font-size: 0.85rem; color: var(--text-light-muted); line-height: 1.5;">Praktisi senior perkapalan niaga nasional dengan pengalaman maritim lebih dari 30 tahun.</p>
            </div>
            
            <div class="member-card" style="background-color: #ffffff; border: 1px solid var(--border-light); border-radius: var(--radius-md); padding: 30px; text-align: center; box-shadow: var(--shadow-sm); transition: var(--transition-smooth);">
                <div style="width: 100px; height: 100px; border-radius: 50%; background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%); margin: 0 auto 20px; display: flex; align-items: center; justify-content: center; color: #ffffff;">
                    <svg viewBox="0 0 24 24" width="40" height="40" fill="currentColor"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                </div>
                <h4 style="color: var(--primary-navy); font-size: 1.1rem; margin-bottom: 4px;">H. Merak Panca, S.E.</h4>
                <span style="font-size: 0.8rem; color: var(--accent-cyan); font-weight: 700; text-transform: uppercase; letter-spacing: 1px; display: block; margin-bottom: 12px;">Direktur Utama</span>
                <p style="font-size: 0.85rem; color: var(--text-light-muted); line-height: 1.5;">Memimpin eksekusi pengembangan armada dan kemitraan kontrak sewa tambang batubara.</p>
            </div>
            
            <div class="member-card" style="background-color: #ffffff; border: 1px solid var(--border-light); border-radius: var(--radius-md); padding: 30px; text-align: center; box-shadow: var(--shadow-sm); transition: var(--transition-smooth);">
                <div style="width: 100px; height: 100px; border-radius: 50%; background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%); margin: 0 auto 20px; display: flex; align-items: center; justify-content: center; color: #ffffff;">
                    <svg viewBox="0 0 24 24" width="40" height="40" fill="currentColor"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                </div>
                <h4 style="color: var(--primary-navy); font-size: 1.1rem; margin-bottom: 4px;">Capt. Setyo Utomo, M.Mar.</h4>
                <span style="font-size: 0.8rem; color: var(--accent-cyan); font-weight: 700; text-transform: uppercase; letter-spacing: 1px; display: block; margin-bottom: 12px;">Direktur Operasional</span>
                <p style="font-size: 0.85rem; color: var(--text-light-muted); line-height: 1.5;">Mengawasi keselamatan navigasi kru, standar kelaikan laut kapal, dan penanganan kargo tambang.</p>
            </div>
        </div>
    </div>
</section>

<!-- Legalitas Section -->
<section class="legal-section" style="padding: 80px 0; background-color: #ffffff;">
    <div class="container">
        <div class="section-header text-center">
            <span class="sub-title">Kepatuhan Hukum</span>
            <h2>Legalitas & Perizinan Angkutan Laut</h2>
            <p class="section-desc">PT PANCA MERAK SAMUDERA menjamin kelancaran operasional kapal dengan memenuhi seluruh aspek legalitas hukum di Indonesia.</p>
        </div>
        
        <div class="table-responsive" style="margin-top: 30px;">
            <table class="legal-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Jenis Dokumen Perizinan</th>
                        <th>Nomor Dokumen Perizinan</th>
                        <th>Instansi Penerbit / Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Surat Izin Usaha Perusahaan Angkutan Laut (SIUPAL)</td>
                        <td>No. BXXV-1753/AL-58</td>
                        <td>Direktorat Jenderal Perhubungan Laut RI</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Nomor Pokok Wajib Pajak (NPWP)</td>
                        <td>02.091.781.1-605.000</td>
                        <td>KPP Surabaya Krembangan</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Akta Pendirian Perusahaan</td>
                        <td>No. 8 (6 Desember 2001)</td>
                        <td>Notaris Yanita, Surabaya (Disahkan Menkumham RI)</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Akta Perubahan Anggaran Dasar Terakhir</td>
                        <td>No. 01 (1 Juli 2013)</td>
                        <td>Notaris Dharma, Surabaya (Disahkan Menkumham RI)</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Tanda Daftar Perusahaan (TDP)</td>
                        <td>No. 13.01.1.61.13703</td>
                        <td>Dinas Perdagangan, Perindustrian & Investasi Surabaya</td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>Angka Pengenal Importir Produsen (API-P)</td>
                        <td>No. 133701517-P</td>
                        <td>Dinas Perindustrian & Perdagangan Kota Surabaya</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>

@endsection


