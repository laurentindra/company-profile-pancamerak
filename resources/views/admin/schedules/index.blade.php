@extends('admin.layouts.admin')

@section('title', 'Kelola Jadwal & Tarif Pelayaran')
@section('header_title', 'Kelola Jadwal & Tarif Pelayaran')

@section('content')
<style>
    .filter-bar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 24px;
        gap: 16px;
        flex-wrap: wrap;
    }

    .search-filter-group {
        display: flex;
        align-items: center;
        gap: 12px;
        flex-wrap: wrap;
    }

    .action-btns {
        display: flex;
        gap: 8px;
    }

    .days-pill {
        display: inline-block;
        padding: 3px 8px;
        background: rgba(0, 210, 255, 0.1);
        border: 1px solid rgba(0, 210, 255, 0.2);
        color: var(--admin-accent);
        border-radius: 4px;
        font-size: 0.75rem;
        font-weight: 600;
    }

    .price-list {
        font-size: 0.82rem;
    }

    .price-item {
        margin-bottom: 2px;
    }

    .pagination-wrapper {
        margin-top: 20px;
        display: flex;
        justify-content: flex-end;
    }
</style>

<div class="filter-bar">
    <form action="{{ route('admin.schedules.index') }}" method="GET" class="search-filter-group">
        <select name="ship_id" class="form-control" style="width: auto;" onchange="this.form.submit()">
            <option value="">-- Semua Kapal Penumpang --</option>
            @foreach($ships as $ship)
                <option value="{{ $ship->id }}" {{ request('ship_id') == $ship->id ? 'selected' : '' }}>{{ $ship->name }}</option>
            @endforeach
        </select>

        <input type="text" name="search" class="form-control" style="width: 220px;" placeholder="Cari pelabuhan asal/tujuan..." value="{{ request('search') }}">
        <button type="submit" class="btn btn-secondary">Cari</button>
        @if(request('ship_id') || request('search'))
            <a href="{{ route('admin.schedules.index') }}" class="btn btn-secondary btn-sm">Reset</a>
        @endif
    </form>

    <a href="{{ route('admin.schedules.create') }}" class="btn btn-primary">
        <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
        Tambah Jadwal Baru
    </a>
</div>

<div class="card">
    <div class="table-responsive">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Kapal</th>
                    <th>Pelabuhan Asal ➔ Tujuan</th>
                    <th>Waktu Berangkat / Tiba</th>
                    <th>Hari Operasional</th>
                    <th>Tarif Tiket</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($schedules as $schedule)
                    <tr>
                        <td>
                            <strong style="color: white; font-size: 0.95rem;">{{ $schedule->ship->name ?? 'N/A' }}</strong>
                        </td>
                        <td>
                            <div style="font-weight: 600; color: white;">
                                {{ $schedule->origin_port }} ➔ {{ $schedule->destination_port }}
                            </div>
                        </td>
                        <td>
                            <div style="font-size: 0.85rem;">
                                <div><strong>Berangkat:</strong> {{ $schedule->departure_time }}</div>
                                <div style="color: var(--admin-muted);"><strong>Tiba:</strong> {{ $schedule->arrival_time }}</div>
                            </div>
                        </td>
                        <td>
                            <span class="days-pill">{{ $schedule->days_of_week }}</span>
                        </td>
                        <td>
                            <div class="price-list">
                                <div class="price-item"><span style="color: var(--admin-gold);">VIP:</span> Rp {{ number_format($schedule->price_vip, 0, ',', '.') }}</div>
                                <div class="price-item"><span style="color: var(--admin-accent);">Ekonomi:</span> Rp {{ number_format($schedule->price_economy, 0, ',', '.') }}</div>
                                @if($schedule->price_vehicle)
                                    <div class="price-item"><span style="color: #c084fc;">Kendaraan:</span> Rp {{ number_format($schedule->price_vehicle, 0, ',', '.') }}</div>
                                @endif
                            </div>
                        </td>
                        <td>
                            <div class="action-btns">
                                <a href="{{ route('admin.schedules.edit', $schedule->id) }}" class="btn btn-secondary btn-sm" title="Edit">
                                    <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                    Edit
                                </a>
                                <form action="{{ route('admin.schedules.destroy', $schedule->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus jadwal ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" title="Hapus">
                                        <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" style="text-align: center; color: var(--admin-muted); padding: 40px 0;">Tidak ada data jadwal pelayaran yang ditemukan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="pagination-wrapper">
        {{ $schedules->links() }}
    </div>
</div>
@endsection
