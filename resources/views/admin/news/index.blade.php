@extends('admin.layouts.admin')

@section('title', 'Kelola Berita & Artikel')
@section('header_title', 'Kelola Berita & Informasi Korporasi')

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

    .news-thumb {
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
</style>

<div class="filter-bar">
    <form action="{{ route('admin.news.index') }}" method="GET" class="search-filter-group">
        <select name="category" class="form-control" style="width: auto;" onchange="this.form.submit()">
            <option value="">-- Semua Kategori --</option>
            <option value="KORPORASI" {{ request('category') == 'KORPORASI' ? 'selected' : '' }}>KORPORASI</option>
            <option value="KESELAMATAN" {{ request('category') == 'KESELAMATAN' ? 'selected' : '' }}>KESELAMATAN</option>
            <option value="LOGISTIK" {{ request('category') == 'LOGISTIK' ? 'selected' : '' }}>LOGISTIK</option>
            <option value="OPERASIONAL" {{ request('category') == 'OPERASIONAL' ? 'selected' : '' }}>OPERASIONAL</option>
        </select>

        <input type="text" name="search" class="form-control" style="width: 220px;" placeholder="Cari judul berita..." value="{{ request('search') }}">
        <button type="submit" class="btn btn-secondary">Cari</button>
        @if(request('category') || request('search'))
            <a href="{{ route('admin.news.index') }}" class="btn btn-secondary btn-sm">Reset</a>
        @endif
    </form>

    <a href="{{ route('admin.news.create') }}" class="btn btn-primary">
        <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
        Tambah Berita Baru
    </a>
</div>

<div class="card">
    <div class="table-responsive">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Cover</th>
                    <th>Judul Berita</th>
                    <th>Kategori</th>
                    <th>Tanggal Publikasi</th>
                    <th>Ringkasan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($news as $item)
                    <tr>
                        <td>
                            @if($item->image_path && file_exists(public_path($item->image_path)))
                                <img src="{{ asset($item->image_path) }}" alt="{{ $item->title }}" class="news-thumb">
                            @else
                                <div class="news-thumb" style="background: #f1f5f9; display: flex; align-items: center; justify-content: center; color: #94a3b8; font-size: 0.65rem;">No Cover</div>
                            @endif
                        </td>
                        <td style="max-width: 260px;">
                            <strong style="color: var(--admin-text-main); font-size: 0.92rem; display: block; line-height: 1.3;">{{ $item->title }}</strong>
                        </td>
                        <td>
                            <span class="badge" style="background: #eff6ff; color: #1d4ed8; border: 1px solid #bfdbfe; font-weight: 700;">
                                {{ $item->category }}
                            </span>
                        </td>
                        <td>
                            {{ $item->published_date ? \Carbon\Carbon::parse($item->published_date)->format('d M Y') : '-' }}
                        </td>
                        <td style="max-width: 300px; color: var(--admin-text-muted); font-size: 0.82rem; line-height: 1.4;">
                            {{ Str::limit($item->summary, 80) }}
                        </td>
                        <td>
                            <div class="action-btns">
                                <a href="{{ route('admin.news.edit', $item->id) }}" class="btn btn-secondary btn-sm" title="Edit">
                                    <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                    Edit
                                </a>
                                <form action="{{ route('admin.news.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus berita ini?')">
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
                        <td colspan="6" style="text-align: center; color: var(--admin-muted); padding: 40px 0;">Tidak ada data berita korporasi yang ditemukan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="pagination-wrapper">
        {{ $news->links() }}
    </div>
</div>
@endsection
