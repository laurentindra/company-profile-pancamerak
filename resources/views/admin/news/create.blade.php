@extends('admin.layouts.admin')

@section('title', 'Tambah Berita Baru')
@section('header_title', 'Tambah Berita Baru')

@section('content')
<div class="card" style="max-width: 800px; margin: 0 auto;">
    <div style="margin-bottom: 24px;">
        <h3 style="font-family: 'Montserrat', sans-serif; font-size: 1.1rem; color: var(--admin-text-main);">Formulir Tambah Berita & Informasi Korporasi</h3>
        <p style="font-size: 0.85rem; color: var(--admin-muted);">Isi informasi artikel berita yang akan ditampilkan pada halaman publik situs utama.</p>
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

    <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="title" class="form-label">Judul Berita *</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" placeholder="Masukkan judul berita..." required>
        </div>

        <div class="form-grid">
            <div class="form-group">
                <label for="category" class="form-label">Kategori Berita *</label>
                <select name="category" id="category" class="form-control" required>
                    <option value="KORPORASI" {{ old('category') == 'KORPORASI' ? 'selected' : '' }}>KORPORASI</option>
                    <option value="KESELAMATAN" {{ old('category') == 'KESELAMATAN' ? 'selected' : '' }}>KESELAMATAN</option>
                    <option value="LOGISTIK" {{ old('category') == 'LOGISTIK' ? 'selected' : '' }}>LOGISTIK</option>
                    <option value="OPERASIONAL" {{ old('category') == 'OPERASIONAL' ? 'selected' : '' }}>OPERASIONAL</option>
                </select>
            </div>

            <div class="form-group">
                <label for="published_date" class="form-label">Tanggal Publikasi *</label>
                <input type="date" name="published_date" id="published_date" class="form-control" value="{{ old('published_date', date('Y-m-d')) }}" required>
            </div>
        </div>

        <div class="form-group">
            <label for="summary" class="form-label">Ringkasan Singkat (Summary) *</label>
            <textarea name="summary" id="summary" class="form-control" rows="3" placeholder="Ringkasan 2-3 kalimat yang tampil pada kartu berita..." required>{{ old('summary') }}</textarea>
        </div>

        <div class="form-group">
            <label for="content" class="form-label">Isi Berita Lengkap</label>
            <textarea name="content" id="content" class="form-control" rows="6" placeholder="Isi berita atau pengumuman lengkap...">{{ old('content') }}</textarea>
        </div>

        <div class="form-group">
            <label for="image" class="form-label">Gambar Sampul / Header (Opsional)</label>
            <input type="file" name="image" id="image" class="form-control" accept="image/*">
        </div>

        <div style="display: flex; gap: 12px; margin-top: 30px;">
            <button type="submit" class="btn btn-primary">Terbitkan Berita</button>
            <a href="{{ route('admin.news.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection
