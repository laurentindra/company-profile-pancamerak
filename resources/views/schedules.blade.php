@extends('layouts.app')

@section('content')


<section class="page-header" style="background: linear-gradient(135deg, #1e40af 0%, #1d4ed8 100%); padding: 60px 0; border-bottom: 1px solid var(--border-dark); text-align: center; color: #ffffff;">
    <div class="container">
        <span class="sub-title">Jadwal Keberangkatan</span>
        <h1 style="font-size: 2.5rem; margin-top: 10px;">Jadwal & Simulasi Tarif</h1>
        <p style="color: var(--text-dark-muted); max-width: 600px; margin: 10px auto 0;">Gunakan simulator pencarian untuk memeriksa jadwal keberangkatan kapal atau lihat daftar tarif tiket standar di bawah ini.</p>
    </div>
</section>


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

        
        <div id="search-results" class="search-results-container" style="display: none;">
            <div class="results-header">
                <h3>Hasil Pencarian Jadwal</h3>
                <p id="results-meta"></p>
            </div>
            <div id="results-list" class="results-list">
                
            </div>
        </div>
    </div>
</section>


<section class="tariffs-reference-section" style="padding: 80px 0; background-color: #ffffff; border-top: 1px solid var(--border-light);">
    <div class="container">
        <div class="section-header text-center">
            <span class="sub-title">Jadwal & Tarif Resmi Kantor</span>
            <h2>Daftar Jadwal Kapal & Price List Resmi</h2>
            <p class="section-desc">Informasi resmi jadwal pelayaran reguler dan tabel tarif tiket penumpang & kendaraan PT PANCA MERAK SAMUDERA.</p>
        </div>

        
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

        
        <!-- Clean Corporate Tariff Section -->
        <div style="margin-top: 60px;">
            <div class="text-center" style="margin-bottom: 40px;">
                <h2 style="color: var(--primary-navy); font-size: 2rem; font-weight: 700; font-family: 'Plus Jakarta Sans', sans-serif;">Daftar Tarif Resmi Penumpang & Kendaraan</h2>
                <p style="color: var(--text-light-muted); font-size: 0.9rem; margin-top: 8px;">* Harga tiket penumpang sudah termasuk Pass Penumpang (LC) Rp 44.500</p>
            </div>

            <!-- Route 1: Parepare - Samarinda & Bontang -->
            <div class="corp-tariff-card" style="margin-bottom: 45px;">
                <div class="corp-tariff-header">
                    <div>
                        <h3>RUTE: PAREPARE &ndash; SAMARINDA & PAREPARE &ndash; BONTANG</h3>
                        <span>KM. Queen Soya & KM. Cattleya Express</span>
                    </div>
                </div>

                <div class="corp-tariff-body">
                    <h4 class="corp-subhead">1. Tiket Penumpang</h4>
                    <div class="table-responsive" style="margin-bottom: 30px;">
                        <table class="corp-table">
                            <thead>
                                <tr>
                                    <th>Jenis Tiket Penumpang</th>
                                    <th>Harga Tiket (Rp)</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><strong>Kelas Deck 3, Deck 2 (&ge; 10 Tahun)</strong></td>
                                    <td class="price-col">Rp 512.000</td>
                                    <td>Kabin ber-AC / Dek Kamar</td>
                                </tr>
                                <tr>
                                    <td><strong>Ekonomi (&ge; 10 Tahun)</strong></td>
                                    <td class="price-col">Rp 442.000</td>
                                    <td>Fasilitas dek tempat tidur standar</td>
                                </tr>
                                <tr>
                                    <td><strong>Anak-Anak (2 &ndash; 10 Tahun)</strong></td>
                                    <td class="price-col">Rp 312.000</td>
                                    <td>Tarif khusus anak</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <h4 class="corp-subhead">2. Tarif Kendaraan (Kosong) <span style="font-weight: normal; font-size: 0.85rem; color: #dc2626;">*(Belum termasuk tiket supir)</span></h4>
                    <div class="table-responsive">
                        <table class="corp-table">
                            <thead>
                                <tr>
                                    <th>Jenis / Golongan Kendaraan</th>
                                    <th>Samarinda</th>
                                    <th>Bontang</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><strong>Sepeda Motor (&lt; 150 cc)</strong></td>
                                    <td class="price-col">Rp 510.000</td>
                                    <td class="price-col">Rp 460.000</td>
                                    <td>Termasuk Buruh Porter</td>
                                </tr>
                                <tr>
                                    <td><strong>Sepeda Motor (&gt; 150 cc)</strong></td>
                                    <td class="price-col">Rp 560.000</td>
                                    <td class="price-col">Rp 510.000</td>
                                    <td>Termasuk Buruh Porter</td>
                                </tr>
                                <tr>
                                    <td><strong>Sedan / Jeep / Kijang & Sejenisnya</strong> (Mobil Mewah / Pribadi)</td>
                                    <td class="price-col" colspan="2" style="text-align: center;">Rp 3.400.000</td>
                                    <td>Kendaraan Pribadi</td>
                                </tr>
                                <tr>
                                    <td><strong>Truck TS Dyna (6 Roda)</strong></td>
                                    <td class="price-col" colspan="2" style="text-align: center;">Rp 4.600.000</td>
                                    <td>Truk Sedang Logistik</td>
                                </tr>
                                <tr>
                                    <td><strong>Truck (10 Roda)</strong></td>
                                    <td class="price-col" colspan="2" style="text-align: center;">Rp 7.100.000</td>
                                    <td>Truk Besar / Tronton</td>
                                </tr>
                                <tr>
                                    <td><strong>Excavator PC 200</strong></td>
                                    <td class="price-col" colspan="2" style="text-align: center;">Rp 24.450.000</td>
                                    <td>Alat Berat</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Route 2: Parepare - Nunukan -->
            <div class="corp-tariff-card">
                <div class="corp-tariff-header">
                    <div>
                        <h3>RUTE: PAREPARE &ndash; NUNUKAN</h3>
                        <span>KM. Pantokrator</span>
                    </div>
                </div>

                <div class="corp-tariff-body">
                    <h4 class="corp-subhead">1. Tiket Penumpang</h4>
                    <div class="table-responsive" style="margin-bottom: 30px;">
                        <table class="corp-table">
                            <thead>
                                <tr>
                                    <th>Jenis Tiket Penumpang</th>
                                    <th>Harga Tiket (Rp)</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><strong>Kelas (&ge; 10 Tahun)</strong></td>
                                    <td class="price-col">Rp 672.000</td>
                                    <td>Kabin ber-AC / Kelas Dek</td>
                                </tr>
                                <tr>
                                    <td><strong>Ekonomi (&ge; 10 Tahun)</strong></td>
                                    <td class="price-col">Rp 637.000</td>
                                    <td>Fasilitas dek tempat tidur standar</td>
                                </tr>
                                <tr>
                                    <td><strong>Anak-Anak (2 &ndash; 10 Tahun)</strong></td>
                                    <td class="price-col">Rp 367.000</td>
                                    <td>Tarif khusus anak</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <h4 class="corp-subhead">2. Tarif Kendaraan (Kosong) <span style="font-weight: normal; font-size: 0.85rem; color: #dc2626;">*(Belum termasuk tiket supir)</span></h4>
                    <div class="table-responsive">
                        <table class="corp-table">
                            <thead>
                                <tr>
                                    <th>Jenis / Golongan Kendaraan</th>
                                    <th>Tarif Nunukan</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><strong>Sepeda Motor (&lt; 150 cc)</strong></td>
                                    <td class="price-col">Rp 650.000</td>
                                    <td>Kendaraan Roda Dua</td>
                                </tr>
                                <tr>
                                    <td><strong>Sepeda Motor (&gt; 150 cc)</strong></td>
                                    <td class="price-col">Rp 700.000</td>
                                    <td>Kendaraan Roda Dua</td>
                                </tr>
                                <tr>
                                    <td><strong>Sedan / Jeep / Kijang & Sejenisnya</strong> (Mobil Mewah / Pribadi)</td>
                                    <td class="price-col">Rp 5.200.000</td>
                                    <td>Kendaraan Pribadi</td>
                                </tr>
                                <tr>
                                    <td><strong>Truck TS Dyna (6 Roda)</strong></td>
                                    <td class="price-col">Rp 6.200.000</td>
                                    <td>Truk Sedang Logistik</td>
                                </tr>
                                <tr>
                                    <td><strong>Truck (10 Roda)</strong></td>
                                    <td class="price-col">Rp 10.200.000</td>
                                    <td>Truk Besar / Tronton</td>
                                </tr>
                                <tr>
                                    <td><strong>Excavator PC 200</strong></td>
                                    <td class="price-col">Rp 35.000.000</td>
                                    <td>Alat Berat</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Clean Corporate Notice Box -->
        <div class="corp-notice-box" style="margin-top: 40px;">
            <div style="display: flex; align-items: flex-start; gap: 16px; flex-wrap: wrap;">
                <div style="flex: 1; min-width: 280px;">
                    <strong style="color: var(--primary-navy); font-size: 1rem; display: block; margin-bottom: 6px;">Catatan Pemesanan Tiket Resmi:</strong>
                    <p style="margin: 0; font-size: 0.88rem; color: var(--text-light-muted); line-height: 1.6;">
                        Pembelian tiket fisik resmi dan pemesanan muatan kendaraan dapat dilakukan langsung melalui <strong>Kantor Keagenan PT PANCA MERAK SAMUDERA</strong> (Jl. Bau Masepe No.419 F, Telp: 0421-21649, Parepare) atau hubungi layanan WhatsApp resmi keagenan.
                    </p>
                </div>
                <a href="https://wa.me/6281142021649?text=Halo%20Admin%20Keagenan%20PMS,%20saya%20ingin%20bertanya%20informasi%20pemesanan%20tiket%20dan%20muatan%20kapal" target="_blank" class="btn btn-primary btn-sm" style="white-space: nowrap; margin-top: 4px;">
                    Hubungi WhatsApp Keagenan
                </a>
            </div>
        </div>
    </div>
</section>

<style>
    .corp-tariff-card {
        background: #ffffff;
        border: 1px solid #cbd5e1;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(15, 23, 42, 0.04);
    }

    .corp-tariff-header {
        background: var(--primary-navy);
        color: #ffffff;
        padding: 16px 24px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 10px;
    }

    .corp-tariff-header h3 {
        margin: 0;
        font-size: 1.1rem;
        color: #ffffff;
        font-weight: 700;
        letter-spacing: 0.3px;
    }

    .corp-tariff-header span {
        font-size: 0.85rem;
        color: #93c5fd;
        font-weight: 600;
    }

    .corp-tariff-body {
        padding: 24px;
    }

    .corp-subhead {
        color: var(--primary-navy);
        font-size: 1.05rem;
        font-weight: 700;
        margin-bottom: 14px;
        padding-bottom: 6px;
        border-bottom: 2px solid #e2e8f0;
    }

    .corp-table {
        width: 100%;
        border-collapse: collapse;
        font-size: 0.9rem;
    }

    .corp-table th {
        background: #f1f5f9;
        color: var(--primary-navy);
        font-weight: 700;
        padding: 12px 16px;
        text-align: left;
        border-bottom: 2px solid #cbd5e1;
        border-top: 1px solid #e2e8f0;
    }

    .corp-table td {
        padding: 12px 16px;
        border-bottom: 1px solid #e2e8f0;
        color: #334155;
    }

    .corp-table tbody tr:nth-child(even) {
        background-color: #f8fafc;
    }

    .corp-table tbody tr:hover {
        background-color: #f1f5f9;
    }

    .corp-table td.price-col {
        font-weight: 700;
        color: #1e40af;
    }

    .corp-notice-box {
        background: #f8fafc;
        border: 1px solid #cbd5e1;
        border-left: 4px solid var(--primary-navy);
        border-radius: 8px;
        padding: 20px 24px;
    }
</style>

@endsection
