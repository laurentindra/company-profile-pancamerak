@extends('layouts.app')

@section('content')

<!-- Page Header Banner -->
<section class="page-header" style="background: linear-gradient(135deg, #1e40af 0%, #1d4ed8 100%); padding: 60px 0; border-bottom: 1px solid var(--border-dark); text-align: center; color: #ffffff;">
    <div class="container">
        <span class="sub-title">Jadwal Keberangkatan</span>
        <h1 style="font-size: 2.5rem; margin-top: 10px;">Jadwal & Simulasi Tarif</h1>
        <p style="color: var(--text-dark-muted); max-width: 600px; margin: 10px auto 0;">Gunakan simulator pencarian untuk memeriksa jadwal keberangkatan kapal atau lihat daftar tarif tiket standar di bawah ini.</p>
    </div>
</section>

<!-- Search Form Section -->
<section class="schedule-section" style="padding: 80px 0; background-color: var(--bg-light);">
    <div class="container">
        <div class="search-box-wrapper" style="background-color: #ffffff; padding: 30px; border-radius: var(--radius-md); box-shadow: var(--shadow-md); border: 1px solid var(--border-light);">
            <div style="margin-bottom: 20px; border-bottom: 1px solid var(--border-light); padding-bottom: 15px;">
                <h3 style="font-size: 1.3rem; color: var(--primary-navy);">Cari Jadwal Pelayaran Penumpang</h3>
                <p style="font-size: 0.85rem; color: var(--text-light-muted);">Pilih pelabuhan asal, tujuan, dan tanggal keberangkatan.</p>
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

<!-- Default Reference Tariffs Section (Expanded Content) -->
<section class="tariffs-reference-section" style="padding: 80px 0; background-color: #ffffff; border-top: 1px solid var(--border-light);">
    <div class="container">
        <div class="section-header text-center">
            <span class="sub-title">Tarif Referensi</span>
            <h2>Daftar Harga Tiket & Tarif Angkutan</h2>
            <p class="section-desc">Berikut adalah tabel tarif tiket kapal penumpang standar PT PANCA MERAK SAMUDERA untuk masing-masing rute.</p>
        </div>
        
        <div style="display: flex; flex-direction: column; gap: 40px; margin-top: 50px;">
            @foreach($passengerShips as $ship)
                <div style="background-color: var(--bg-light); border: 1px solid var(--border-light); border-radius: var(--radius-md); padding: 30px; box-shadow: var(--shadow-sm);">
                    <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 2px solid var(--accent-cyan); padding-bottom: 12px; margin-bottom: 20px; flex-wrap: wrap; gap: 10px;">
                        <h3 style="color: var(--primary-navy); margin-bottom: 0;">{{ $ship->name }}</h3>
                        <span style="background-color: var(--primary-navy); color: #ffffff; padding: 4px 12px; border-radius: 20px; font-size: 0.8rem; font-weight: 700;">Rute: {{ $ship->route }}</span>
                    </div>
                    
                    <div class="table-responsive">
                        <table class="legal-table" style="box-shadow: none; border-radius: 0;">
                            <thead>
                                <tr>
                                    <th>Kategori Tiket / Kendaraan</th>
                                    <th>Kelas Pelayanan</th>
                                    <th>Simulasi Tarif Tiket (Rupiah)</th>
                                    <th>Keterangan Fasilitas</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($ship->schedules as $sched)
                                    <tr>
                                        <td><strong>Penumpang Dewasa</strong></td>
                                        <td>VIP (Kabin Ber-AC)</td>
                                        <td style="font-weight: 700; color: var(--accent-orange);">Rp {{ number_format($sched->price_vip, 0, ',', '.') }}</td>
                                        <td>Kasur busa, selimut, air mineral, TV bersama.</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Penumpang Dewasa</strong></td>
                                        <td>Ekonomi (Non-AC/Standard)</td>
                                        <td style="font-weight: 700; color: var(--accent-orange);">Rp {{ number_format($sched->price_economy, 0, ',', '.') }}</td>
                                        <td>Dek tidur luas, kamar mandi bersih, kantin dekat.</td>
                                    </tr>
                                    @if($sched->price_vehicle)
                                        <tr>
                                            <td><strong>Kendaraan Roda 2 (Motor)</strong></td>
                                            <td>Ferry Angkutan Dek Bawah</td>
                                            <td style="font-weight: 700; color: var(--accent-cyan);">Rp {{ number_format($sched->price_vehicle * 0.2, 0, ',', '.') }}</td>
                                            <td>Termasuk lashing keamanan rantai motor selama berlayar.</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Kendaraan Roda 4 (Mobil)</strong></td>
                                            <td>Ferry Angkutan Dek Bawah</td>
                                            <td style="font-weight: 700; color: var(--accent-cyan);">Rp {{ number_format($sched->price_vehicle, 0, ',', '.') }}</td>
                                            <td>Termasuk tiket pengemudi, keamanan deck guard.</td>
                                        </tr>
                                    @else
                                        <tr>
                                            <td><strong>Semua Kendaraan</strong></td>
                                            <td>-</td>
                                            <td style="font-weight: 700; color: #94a3b8;">Tidak Melayani</td>
                                            <td>Kapal ini khusus melayani angkutan penumpang saja.</td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endforeach
        </div>
        
        <div class="booking-notice" style="margin-top: 40px;">
            <p><strong>Catatan Penting Pemesanan:</strong> Pembelian tiket kapal penumpang niaga di atas disimulasikan secara lokal. Untuk pembelian tiket fisik resmi, silakan kunjungi agen tiket resmi pelabuhan PT PANCA MERAK SAMUDERA atau hubungi keagenan kami melalui nomor WhatsApp di pojok kanan bawah halaman.</p>
        </div>
    </div>
</section>

@endsection

