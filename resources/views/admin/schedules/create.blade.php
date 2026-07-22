@extends('admin.layouts.admin')

@section('title', 'Tambah Jadwal Pelayaran Baru')
@section('header_title', 'Tambah Jadwal Pelayaran Baru')

@section('content')
<style>
    .days-checkboxes {
        display: flex;
        gap: 14px;
        flex-wrap: wrap;
        margin-top: 8px;
    }
    .day-item {
        display: flex;
        align-items: center;
        gap: 6px;
        background: rgba(255, 255, 255, 0.05);
        padding: 8px 12px;
        border-radius: 6px;
        border: 1px solid var(--admin-card-border);
        font-size: 0.85rem;
        cursor: pointer;
    }
</style>

<div class="card" style="max-width: 800px; margin: 0 auto;">
    <div style="margin-bottom: 24px;">
        <h3 style="font-family: 'Montserrat', sans-serif; font-size: 1.1rem; color: white;">Form Tambah Jadwal Pelayaran</h3>
        <p style="font-size: 0.85rem; color: var(--admin-muted);">Atur rute keberangkatan, jam operasional, dan tarif tiket.</p>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul style="margin-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.schedules.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="ship_id" class="form-label">Kapal Penumpang *</label>
            <select name="ship_id" id="ship_id" class="form-control" required>
                <option value="">-- Pilih Kapal --</option>
                @foreach($ships as $ship)
                    <option value="{{ $ship->id }}" {{ old('ship_id') == $ship->id ? 'selected' : '' }}>
                        {{ $ship->name }} (Rute: {{ $ship->route }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-grid">
            <div class="form-group">
                <label for="origin_port" class="form-label">Pelabuhan Asal *</label>
                <input type="text" name="origin_port" id="origin_port" class="form-control" value="{{ old('origin_port') }}" placeholder="Contoh: Pare-Pare" required>
            </div>

            <div class="form-group">
                <label for="destination_port" class="form-label">Pelabuhan Tujuan *</label>
                <input type="text" name="destination_port" id="destination_port" class="form-control" value="{{ old('destination_port') }}" placeholder="Contoh: Samarinda" required>
            </div>
        </div>

        <div class="form-grid">
            <div class="form-group">
                <label for="departure_time" class="form-label">Waktu Keberangkatan *</label>
                <input type="text" name="departure_time" id="departure_time" class="form-control" value="{{ old('departure_time') }}" placeholder="Contoh: 14:00 WITA" required>
            </div>

            <div class="form-group">
                <label for="arrival_time" class="form-label">Estimasi Tiba *</label>
                <input type="text" name="arrival_time" id="arrival_time" class="form-control" value="{{ old('arrival_time') }}" placeholder="Contoh: 08:00 WITA (Besok)" required>
            </div>
        </div>

        <div class="form-group">
            <label class="form-label">Hari Operasional *</label>
            <div class="days-checkboxes">
                @php $daysList = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu']; @endphp
                @foreach($daysList as $day)
                    <label class="day-item">
                        <input type="checkbox" name="days[]" value="{{ $day }}" {{ is_array(old('days')) && in_array($day, old('days')) ? 'checked' : '' }}>
                        {{ $day }}
                    </label>
                @endforeach
            </div>
        </div>

        <div class="form-grid">
            <div class="form-group">
                <label for="price_vip" class="form-label">Harga Tiket VIP (Rp) *</label>
                <input type="number" name="price_vip" id="price_vip" class="form-control" value="{{ old('price_vip') }}" placeholder="Contoh: 500000" required>
            </div>

            <div class="form-group">
                <label for="price_economy" class="form-label">Harga Tiket Ekonomi (Rp) *</label>
                <input type="number" name="price_economy" id="price_economy" class="form-control" value="{{ old('price_economy') }}" placeholder="Contoh: 350000" required>
            </div>

            <div class="form-group">
                <label for="price_vehicle" class="form-label">Harga Tiket Kendaraan (Rp) (Opsional)</label>
                <input type="number" name="price_vehicle" id="price_vehicle" class="form-control" value="{{ old('price_vehicle') }}" placeholder="Contoh: 1500000">
            </div>
        </div>

        <div style="display: flex; gap: 12px; margin-top: 30px;">
            <button type="submit" class="btn btn-primary">Simpan Jadwal</button>
            <a href="{{ route('admin.schedules.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection
