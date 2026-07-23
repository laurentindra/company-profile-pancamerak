@extends('admin.layouts.admin')

@section('title', 'Kelola Armada Kapal')
@section('header_title', 'Kelola Armada Kapal')

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

    .ship-img-thumb {
        width: 60px;
        height: 40px;
        object-fit: cover;
        border-radius: 6px;
        border: 1px solid var(--admin-card-border);
    }

    .action-btns {
        display: flex;
        gap: 8px;
    }

    .pagination-wrapper {
        margin-top: 20px;
        display: flex;
        justify-content: flex-end;
    }
</style>

<div class="filter-bar">
    <form action="{{ route('admin.ships.index') }}" method="GET" class="search-filter-group">
        <select name="type" class="form-control" style="width: auto;" onchange="this.form.submit()">
            <option value="">-- Semua Tipe Kapal --</option>
            <option value="passenger" {{ request('type') == 'passenger' ? 'selected' : '' }}>Kapal Penumpang</option>
            <option value="tugboat" {{ request('type') == 'tugboat' ? 'selected' : '' }}>Tugboat</option>
            <option value="barge" {{ request('type') == 'barge' ? 'selected' : '' }}>Tongkang (Barge)</option>
        </select>

        <input type="text" name="search" class="form-control" style="width: 220px;" placeholder="Cari nama kapal / rute..." value="{{ request('search') }}">
        <button type="submit" class="btn btn-secondary">Cari</button>
        @if(request('type') || request('search'))
            <a href="{{ route('admin.ships.index') }}" class="btn btn-secondary btn-sm">Reset</a>
        @endif
    </form>

    <a href="{{ route('admin.ships.create') }}" class="btn btn-primary">
        <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
        Tambah Kapal Baru
    </a>
</div>

<div class="card">
    <div class="table-responsive">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Gambar</th>
                    <th>Nama Kapal</th>
                    <th>Tipe Armada</th>
                    <th>Rute Utama</th>
                    <th>Spesifikasi (GT / NT / Kapasitas)</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($ships as $ship)
                    <tr>
                        <td>
                            @if($ship->first_image && file_exists(public_path($ship->first_image)))
                                <img src="{{ asset($ship->first_image) }}" alt="{{ $ship->name }}" class="ship-img-thumb">
                            @else
                                <div class="ship-img-thumb" style="background: #f1f5f9; display: flex; align-items: center; justify-content: center; color: #94a3b8; font-size: 0.7rem;">No Image</div>
                            @endif
                        </td>
                        <td>
                            <strong style="color: var(--admin-text-main); font-size: 0.92rem;">{{ $ship->name }}</strong>
                        </td>
                        <td>
                            <span class="badge badge-{{ $ship->type }}">
                                {{ $ship->type == 'passenger' ? 'Kapal Penumpang' : ($ship->type == 'tugboat' ? 'Tugboat' : 'Tongkang') }}
                            </span>
                        </td>
                        <td>
                            {{ $ship->route ?: '-' }}
                        </td>
                        <td>
                            <div style="font-size: 0.85rem;">
                                @if($ship->capacity) <div>Kapasitas: {{ $ship->capacity }}</div> @endif
                                @if($ship->gt || $ship->nt) <div>GT/NT: {{ $ship->gt ?: '-' }} / {{ $ship->nt ?: '-' }}</div> @endif
                                @if($ship->engine) <div>Mesin: {{ $ship->engine }}</div> @endif
                            </div>
                        </td>
                        <td>
                            <div class="action-btns">
                                <a href="{{ route('admin.ships.edit', $ship->id) }}" class="btn btn-secondary btn-sm" title="Edit">
                                    <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                    Edit
                                </a>
                                <form action="{{ route('admin.ships.destroy', $ship->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kapal ini?')">
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
                        <td colspan="6" style="text-align: center; color: var(--admin-muted); padding: 40px 0;">Tidak ada data kapal yang ditemukan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="pagination-wrapper">
        {{ $ships->links() }}
    </div>
</div>
@endsection
