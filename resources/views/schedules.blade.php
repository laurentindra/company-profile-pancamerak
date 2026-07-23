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
            <span class="sub-title">Jadwal & Tarif Resmi Kantor</span>
            <h2>Daftar Jadwal Kapal & Price List Resmi</h2>
            <p class="section-desc">Informasi resmi jadwal pelayaran reguler dan tabel tarif tiket penumpang & kendaraan PT PANCA MERAK SAMUDERA.</p>
        </div>

        <!-- Schedule Summary Cards -->
        <div style="margin-top: 40px; display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 24px;">
            @foreach($passengerShips as $ship)
                <div style="background-color: var(--bg-light); border: 1px solid var(--border-light); border-radius: var(--radius-md); padding: 24px; box-shadow: var(--shadow-sm);">
                    <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 2px solid var(--primary-navy); padding-bottom: 12px; margin-bottom: 16px;">
                        <h3 style="color: var(--primary-navy); margin: 0; font-size: 1.2rem;">{{ $ship->name }}</h3>
                        <span style="background-color: var(--accent-cyan); color: #ffffff; padding: 4px 10px; border-radius: 16px; font-size: 0.75rem; font-weight: 700;">{{ $ship->route }}</span>
                    </div>

                    <div style="font-size: 0.9rem; line-height: 1.6; color: var(--text-dark-muted);">
                        <strong style="color: var(--primary-navy);">Jadwal Keberangkatan:</strong>
                        <ul style="margin-top: 8px; margin-left: 20px; padding: 0;">
                            @foreach($ship->schedules as $sched)
                                <li>
                                    <strong>{{ $sched->origin_port }} &rarr; {{ $sched->destination_port }}:</strong>
                                    Hari <span style="color: var(--accent-orange); font-weight: 700;">{{ $sched->days_of_week }}</span> (Jam {{ $sched->departure_time }})
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Detailed Official Tariff Tables -->
        <div style="margin-top: 60px;">
            <h3 style="text-align: center; color: var(--primary-navy); margin-bottom: 10px; font-size: 1.6rem;">Tabel Tarif Tiket Penumpang & Kendaraan (Harga Kantor)</h3>
            <p style="text-align: center; color: var(--text-light-muted); font-size: 0.9rem; margin-bottom: 40px;">* Harga tiket penumpang sudah termasuk Pass Penumpang (LC) Rp 44.500</p>

            <!-- Table 1: Parepare - Samarinda & Parepare - Bontang -->
            <div style="background-color: var(--bg-light); border: 1px solid var(--border-light); border-radius: var(--radius-md); padding: 30px; box-shadow: var(--shadow-sm); margin-bottom: 40px;">
                <div style="background-color: var(--primary-navy); color: white; padding: 14px 20px; border-radius: var(--radius-sm); margin-bottom: 20px; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 10px;">
                    <h4 style="margin: 0; font-size: 1.1rem; color: #ffffff;">RUTE: PAREPARE - SAMARINDA & PAREPARE - BONTANG</h4>
                    <span style="font-size: 0.85rem; background: rgba(255,255,255,0.2); padding: 4px 10px; border-radius: 12px;">KM. Queen Soya & KM. Cattleya Express</span>
                </div>

                <h5 style="color: var(--primary-navy); margin-bottom: 12px;">1. Tiket Penumpang</h5>
                <div class="table-responsive" style="margin-bottom: 24px;">
                    <table class="legal-table" style="box-shadow: none; border-radius: 0;">
                        <thead>
                            <tr>
                                <th>Jenis Tiket Penumpang</th>
                                <th>Setoran (Rp)</th>
                                <th>Di Tiket (Rp)</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Kelas Deck 3, Deck 2 (&ge; 10 Tahun)</strong></td>
                                <td>Rp 480.000</td>
                                <td style="font-weight: 700; color: var(--accent-orange);">Rp 512.000</td>
                                <td>Kabin ber-AC / Dek Kamar</td>
                            </tr>
                            <tr>
                                <td><strong>Ekonomi (&ge; 10 Tahun)</strong></td>
                                <td>Rp 410.000</td>
                                <td style="font-weight: 700; color: var(--accent-orange);">Rp 442.000</td>
                                <td>Fasilitas dek tempat tidur standar</td>
                            </tr>
                            <tr>
                                <td><strong>Anak-Anak (2 - 10 Tahun)</strong></td>
                                <td>Rp 280.000</td>
                                <td style="font-weight: 700; color: var(--accent-orange);">Rp 312.000</td>
                                <td>Tarif khusus anak</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <h5 style="color: var(--primary-navy); margin-bottom: 12px;">2. Tarif Kendaraan (Kosong) <span style="font-size: 0.8rem; font-weight: normal; color: var(--accent-orange);">(Belum termasuk tiket supir)</span></h5>
                <div class="table-responsive">
                    <table class="legal-table" style="box-shadow: none; border-radius: 0;">
                        <thead>
                            <tr>
                                <th>Jenis Kendaraan</th>
                                <th>Samarinda (Rp)</th>
                                <th>Bontang (Rp)</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Sepeda Motor (&lt; 150 cc)</strong></td>
                                <td style="font-weight: 700; color: var(--accent-cyan);">Rp 510.000</td>
                                <td style="font-weight: 700; color: var(--accent-cyan);">Rp 460.000</td>
                                <td>Dengan Buruh</td>
                            </tr>
                            <tr>
                                <td><strong>Sepeda Motor (&gt; 150 cc)</strong></td>
                                <td style="font-weight: 700; color: var(--accent-cyan);">Rp 560.000</td>
                                <td style="font-weight: 700; color: var(--accent-cyan);">Rp 510.000</td>
                                <td>Dengan Buruh</td>
                            </tr>
                            <tr>
                                <td><strong>Sedan / Jeep / Kijang & Sejenisnya</strong> (Mobil Mewah / Pribadi)</td>
                                <td style="font-weight: 700; color: var(--accent-cyan);" colspan="2">Rp 3.400.000</td>
                                <td>Kendaraan Pribadi</td>
                            </tr>
                            <tr>
                                <td><strong>Truck TS Dyna (6 Roda)</strong></td>
                                <td style="font-weight: 700; color: var(--accent-cyan);" colspan="2">Rp 4.600.000</td>
                                <td>Truk Sedang</td>
                            </tr>
                            <tr>
                                <td><strong>Truck (10 Roda)</strong></td>
                                <td style="font-weight: 700; color: var(--accent-cyan);" colspan="2">Rp 7.100.000</td>
                                <td>Truk Besar / Tronton</td>
                            </tr>
                            <tr>
                                <td><strong>Excavator PC 200</strong></td>
                                <td style="font-weight: 700; color: var(--accent-cyan);" colspan="2">Rp 24.450.000</td>
                                <td>Alat Berat</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Table 2: Parepare - Nunukan -->
            <div style="background-color: var(--bg-light); border: 1px solid var(--border-light); border-radius: var(--radius-md); padding: 30px; box-shadow: var(--shadow-sm);">
                <div style="background-color: var(--primary-navy); color: white; padding: 14px 20px; border-radius: var(--radius-sm); margin-bottom: 20px; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 10px;">
                    <h4 style="margin: 0; font-size: 1.1rem; color: #ffffff;">RUTE: PAREPARE - NUNUKAN</h4>
                    <span style="font-size: 0.85rem; background: rgba(255,255,255,0.2); padding: 4px 10px; border-radius: 12px;">KM. Pantokrator</span>
                </div>

                <h5 style="color: var(--primary-navy); margin-bottom: 12px;">1. Tiket Penumpang</h5>
                <div class="table-responsive" style="margin-bottom: 24px;">
                    <table class="legal-table" style="box-shadow: none; border-radius: 0;">
                        <thead>
                            <tr>
                                <th>Jenis Tiket Penumpang</th>
                                <th>Setoran (Rp)</th>
                                <th>Di Tiket (Rp)</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Kelas (&ge; 10 Tahun)</strong></td>
                                <td>Rp 660.000</td>
                                <td style="font-weight: 700; color: var(--accent-orange);">Rp 672.000</td>
                                <td>Kabin ber-AC / Kelas Dek</td>
                            </tr>
                            <tr>
                                <td><strong>Ekonomi (&ge; 10 Tahun)</strong></td>
                                <td>Rp 625.000</td>
                                <td style="font-weight: 700; color: var(--accent-orange);">Rp 637.000</td>
                                <td>Fasilitas dek tempat tidur standar</td>
                            </tr>
                            <tr>
                                <td><strong>Anak-Anak (2 - 10 Tahun)</strong></td>
                                <td>Rp 355.000</td>
                                <td style="font-weight: 700; color: var(--accent-orange);">Rp 367.000</td>
                                <td>Tarif khusus anak</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <h5 style="color: var(--primary-navy); margin-bottom: 12px;">2. Tarif Kendaraan (Kosong) <span style="font-size: 0.8rem; font-weight: normal; color: var(--accent-orange);">(Belum termasuk tiket supir)</span></h5>
                <div class="table-responsive">
                    <table class="legal-table" style="box-shadow: none; border-radius: 0;">
                        <thead>
                            <tr>
                                <th>Jenis Kendaraan</th>
                                <th>Tarif Nunukan (Rp)</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Sepeda Motor (&lt; 150 cc)</strong></td>
                                <td style="font-weight: 700; color: var(--accent-cyan);">Rp 650.000</td>
                                <td>Motor kecil</td>
                            </tr>
                            <tr>
                                <td><strong>Sepeda Motor (&gt; 150 cc)</strong></td>
                                <td style="font-weight: 700; color: var(--accent-cyan);">Rp 700.000</td>
                                <td>Motor besar</td>
                            </tr>
                            <tr>
                                <td><strong>Sedan / Jeep / Kijang & Sejenisnya</strong> (Mobil Mewah / Pribadi)</td>
                                <td style="font-weight: 700; color: var(--accent-cyan);">Rp 5.200.000</td>
                                <td>Kendaraan Pribadi</td>
                            </tr>
                            <tr>
                                <td><strong>Truck TS Dyna (6 Roda)</strong></td>
                                <td style="font-weight: 700; color: var(--accent-cyan);">Rp 6.200.000</td>
                                <td>Truk Sedang</td>
                            </tr>
                            <tr>
                                <td><strong>Truck (10 Roda)</strong></td>
                                <td style="font-weight: 700; color: var(--accent-cyan);">Rp 10.200.000</td>
                                <td>Truk Besar / Tronton</td>
                            </tr>
                            <tr>
                                <td><strong>Excavator PC 200</strong></td>
                                <td style="font-weight: 700; color: var(--accent-cyan);">Rp 35.000.000</td>
                                <td>Alat Berat</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="booking-notice" style="margin-top: 40px;">
            <p><strong>Catatan Penting Pemesanan:</strong> Pembelian tiket fisik resmi dan pemesanan muatan kendaraan dapat dilakukan langsung melalui Kantor Keagenan PT PANCA MERAK SAMUDERA (Jl. Bau Masepe No.419 F, Telp: 0421-21649, Parepare) atau hubungi layanan WhatsApp keagenan kami.</p>
        </div>
    </div>
</section>

@endsection

