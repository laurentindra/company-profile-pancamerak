@extends('admin.layouts.admin')

@section('title', 'Dashboard Overview')
@section('header_title', 'Dashboard Overview')

@section('content')
<style>
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 20px;
        margin-bottom: 30px;
    }

    .stat-card {
        background: var(--admin-card);
        border: 1px solid var(--admin-card-border);
        border-radius: 14px;
        padding: 20px;
        display: flex;
        align-items: center;
        gap: 16px;
        transition: transform 0.2s;
    }

    .stat-card:hover {
        transform: translateY(-2px);
    }

    .stat-icon {
        width: 52px;
        height: 52px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .stat-icon.accent {
        background: rgba(0, 210, 255, 0.15);
        color: var(--admin-accent);
    }

    .stat-icon.gold {
        background: rgba(255, 183, 3, 0.15);
        color: var(--admin-gold);
    }

    .stat-icon.purple {
        background: rgba(168, 85, 247, 0.15);
        color: #c084fc;
    }

    .stat-icon.success {
        background: rgba(16, 185, 129, 0.15);
        color: var(--admin-success);
    }

    .stat-info h3 {
        font-size: 1.6rem;
        font-family: 'Montserrat', sans-serif;
        font-weight: 800;
        color: white;
        line-height: 1;
    }

    .stat-info p {
        font-size: 0.8rem;
        color: var(--admin-muted);
        margin-top: 6px;
        font-weight: 500;
    }

    .quick-actions {
        display: flex;
        gap: 12px;
        margin-bottom: 30px;
        flex-wrap: wrap;
    }

    .grid-two-col {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 24px;
    }

    @media (max-width: 992px) {
        .grid-two-col {
            grid-template-columns: 1fr;
        }
    }

    .card-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 18px;
        padding-bottom: 12px;
        border-bottom: 1px solid var(--admin-card-border);
    }

    .card-header h3 {
        font-size: 1rem;
        font-family: 'Montserrat', sans-serif;
        font-weight: 700;
        color: white;
    }
</style>

<!-- Top Quick Actions -->
<div class="quick-actions">
    <a href="{{ route('admin.ships.create') }}" class="btn btn-primary">
        <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
        Tambah Armada Kapal
    </a>
    <a href="{{ route('admin.schedules.create') }}" class="btn btn-secondary">
        <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
        Tambah Jadwal Pelayaran
    </a>
</div>

<!-- Stats Grid -->
<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-icon accent">
            <svg width="26" height="26" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
        </div>
        <div class="stat-info">
            <h3>{{ $totalShips }}</h3>
            <p>Total Armada Kapal</p>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon accent">
            <svg width="26" height="26" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
        </div>
        <div class="stat-info">
            <h3>{{ $passengerShips }}</h3>
            <p>Kapal Penumpang</p>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon gold">
            <svg width="26" height="26" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
        </div>
        <div class="stat-info">
            <h3>{{ $tugboatShips }}</h3>
            <p>Tugboat (Hector)</p>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon purple">
            <svg width="26" height="26" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
        </div>
        <div class="stat-info">
            <h3>{{ $bargeShips }}</h3>
            <p>Tongkang Batubara</p>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon success">
            <svg width="26" height="26" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
        </div>
        <div class="stat-info">
            <h3>{{ $totalSchedules }}</h3>
            <p>Jadwal Aktif</p>
        </div>
    </div>
</div>

<!-- Two Columns Grid -->
<div class="grid-two-col">
    <!-- Recent Ships Card -->
    <div class="card">
        <div class="card-header">
            <h3>Armada Terintegrasi Terbaru</h3>
            <a href="{{ route('admin.ships.index') }}" class="btn btn-secondary btn-sm">Lihat Semua</a>
        </div>
        <div class="table-responsive">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Nama Kapal</th>
                        <th>Tipe</th>
                        <th>Kapasitas / GT</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentShips as $ship)
                        <tr>
                            <td>
                                <strong>{{ $ship->name }}</strong>
                            </td>
                            <td>
                                <span class="badge badge-{{ $ship->type }}">
                                    {{ $ship->type == 'passenger' ? 'Penumpang' : ($ship->type == 'tugboat' ? 'Tugboat' : 'Tongkang') }}
                                </span>
                            </td>
                            <td>
                                {{ $ship->capacity ?: ($ship->gt ? $ship->gt . ' GT' : '-') }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" style="text-align: center; color: var(--admin-muted);">Belum ada data kapal.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Recent Schedules Card -->
    <div class="card">
        <div class="card-header">
            <h3>Jadwal Pelayaran Aktif</h3>
            <a href="{{ route('admin.schedules.index') }}" class="btn btn-secondary btn-sm">Lihat Semua</a>
        </div>
        <div class="table-responsive">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Kapal</th>
                        <th>Rute</th>
                        <th>Hari</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentSchedules as $schedule)
                        <tr>
                            <td>
                                <strong>{{ $schedule->ship->name ?? 'N/A' }}</strong>
                            </td>
                            <td>
                                {{ $schedule->origin_port }} ➔ {{ $schedule->destination_port }}
                            </td>
                            <td>
                                <small style="color: var(--admin-accent);">{{ $schedule->days_of_week }}</small>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" style="text-align: center; color: var(--admin-muted);">Belum ada jadwal pelayaran.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
