@extends('layouts.app')

@section('content')


<section class="page-header" style="background: linear-gradient(135deg, #1e40af 0%, #1d4ed8 100%); padding: 60px 0; border-bottom: 1px solid var(--border-dark); text-align: center; color: #ffffff;">
    <div class="container">
        <span class="sub-title">Hubungi Kami</span>
        <h1 style="font-size: 2.5rem; margin-top: 10px;">Kantor & Layanan Pelanggan</h1>
        <p style="color: var(--text-dark-muted); max-width: 600px; margin: 10px auto 0;">Silakan hubungi kantor pusat kami di Surabaya atau kantor cabang terdekat untuk keperluan pemesanan tiket maupun logistik.</p>
    </div>
</section>


<section class="contact-section" style="padding: 80px 0; background-color: #ffffff;">
    <div class="container">
        <div class="contact-grid">
            
            
            <div class="contact-info-panel">
                <h2>Informasi Kontak Kantor Cabang</h2>
                <p style="color: var(--text-light-muted); margin-bottom: 30px;">PT PANCA MERAK SAMUDERA mengoperasikan tiga titik jaringan kantor utama guna menjamin koordinasi pelayaran lancar antara wilayah Jawa, Kalimantan, dan Sulawesi.</p>
                
                <div class="contact-details-list">
                    <div style="background-color: var(--bg-light); padding: 24px; border-radius: var(--radius-md); border: 1px solid var(--border-light); margin-bottom: 20px;">
                        <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 12px;">
                            <div class="icon-circle">
                                <svg viewBox="0 0 24 24" width="20" height="20" fill="currentColor"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
                            </div>
                            <h4 style="margin: 0; font-size: 1.1rem; color: var(--primary-navy);">Surabaya (Head Office)</h4>
                        </div>
                        <p style="font-size: 0.85rem; color: var(--text-light-muted); line-height: 1.5; margin-bottom: 8px;">Jl. Krembangan Timur No. 8-10, Surabaya, Jawa Timur, Indonesia</p>
                        <p style="font-size: 0.85rem; color: var(--text-light-muted); margin-bottom: 4px;"><strong>Telp:</strong> (031) 3522385, 3523756</p>
                        <p style="font-size: 0.85rem; color: var(--text-light-muted);"><strong>Fax:</strong> (031) 3539432</p>
                    </div>
                    
                    <div style="background-color: var(--bg-light); padding: 24px; border-radius: var(--radius-md); border: 1px solid var(--border-light); margin-bottom: 20px;">
                        <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 12px;">
                            <div class="icon-circle">
                                <svg viewBox="0 0 24 24" width="20" height="20" fill="currentColor"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
                            </div>
                            <h4 style="margin: 0; font-size: 1.1rem; color: var(--primary-navy);">Samarinda (Cabang)</h4>
                        </div>
                        <p style="font-size: 0.85rem; color: var(--text-light-muted); line-height: 1.5; margin-bottom: 8px;">Jl. Arif Rahman Hakim Rt. 02 No. 32, Kel. Sungai Pinang Luar, Samarinda, Kalimantan Timur</p>
                        <p style="font-size: 0.85rem; color: var(--text-light-muted); margin-bottom: 4px;"><strong>Telp:</strong> (0541) 727 3080</p>
                        <p style="font-size: 0.85rem; color: var(--text-light-muted);"><strong>Fax:</strong> (0541) 727 3070</p>
                    </div>
                    
                    <div style="background-color: var(--bg-light); padding: 24px; border-radius: var(--radius-md); border: 1px solid var(--border-light);">
                        <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 12px;">
                            <div class="icon-circle">
                                <svg viewBox="0 0 24 24" width="20" height="20" fill="currentColor"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
                            </div>
                            <h4 style="margin: 0; font-size: 1.1rem; color: var(--primary-navy);">Pare-Pare (Cabang)</h4>
                        </div>
                        <p style="font-size: 0.85rem; color: var(--text-light-muted); line-height: 1.5; margin-bottom: 8px;">Jl. Bau Massepe No. 419E-419F, Pare-Pare, Sulawesi Selatan</p>
                        <p style="font-size: 0.85rem; color: var(--text-light-muted); margin-bottom: 4px;"><strong>Telp:</strong> (0421) 21649</p>
                        <p style="font-size: 0.85rem; color: var(--text-light-muted);"><strong>Fax:</strong> (0421) 28866</p>
                    </div>
                </div>
            </div>
            
            <!-- Contact Form -->
            <div class="contact-form-panel">
                <h3>Hubungi Tim Kami</h3>
                <p style="font-size: 0.85rem; color: var(--text-light-muted); margin-bottom: 25px;">Kirim pesan langsung kepada bagian operasional kami untuk permohonan informasi umum, agen logistik, atau kerjasama bisnis perkapalan.</p>
                <form id="contact-form" class="inquiry-form">
                    @csrf
                    <div>
                        <label for="c_name">Nama Lengkap</label>
                        <input type="text" id="c_name" name="name" required placeholder="Bapak / Ibu...">
                    </div>
                    <div>
                        <label for="c_email">Alamat Email</label>
                        <input type="email" id="c_email" name="email" required placeholder="nama@email.com">
                    </div>
                    <div>
                        <label for="c_phone">Nomor Telepon / WA</label>
                        <input type="tel" id="c_phone" name="phone" required placeholder="0812xxxxxx">
                    </div>
                    <div>
                        <label for="c_branch">Kantor Tujuan Hubung</label>
                        <select id="c_branch" name="branch">
                            <option value="surabaya">Head Office Surabaya (Pemasaran & Sewa)</option>
                            <option value="samarinda">Kantor Cabang Samarinda (Batubara & Penumpang)</option>
                            <option value="parepare">Kantor Cabang Pare-Pare (Pelayaran Penumpang)</option>
                        </select>
                    </div>
                    <div>
                        <label for="c_interest">Topik Kepentingan</label>
                        <select id="c_interest" name="interest">
                            <option value="tiket_reguler">Pemesanan Tiket Penumpang & Roda 4</option>
                            <option value="sewa_tongkang">Penyewaan Armada Tugboat & Barge Batubara</option>
                            <option value="keagenan">Jasa Keagenan Perkapalan (Port Agency)</option>
                            <option value="karir">Kerjasama Bisnis & Karir Awak Kapal</option>
                        </select>
                    </div>
                    <div>
                        <label for="c_message">Detail Pesan / Pertanyaan</label>
                        <textarea id="c_message" name="message" rows="5" required placeholder="Tulis pesan Anda secara detail..."></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Kirim Pesan Sekarang</button>
                </form>
            </div>
            
        </div>
    </div>
</section>

@endsection

