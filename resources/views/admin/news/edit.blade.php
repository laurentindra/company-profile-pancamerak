@extends('admin.layouts.admin')

@section('title', 'Edit Berita')
@section('header_title', 'Edit Berita: ' . $article->title)

@section('content')
<div class="card" style="max-width: 800px; margin: 0 auto;">
    <div style="margin-bottom: 24px;">
        <h3 style="font-family: 'Montserrat', sans-serif; font-size: 1.1rem; color: var(--admin-text-main);">Edit Berita & Informasi Korporasi</h3>
        <p style="font-size: 0.85rem; color: var(--admin-muted);">Perbarui isi atau gambar dari artikel berita {{ $article->title }}.</p>
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

    <form action="{{ route('admin.news.update', $article->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title" class="form-label">Judul Berita *</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $article->title) }}" required>
        </div>

        <div class="form-grid">
            <div class="form-group">
                <label for="category" class="form-label">Kategori Berita *</label>
                <select name="category" id="category" class="form-control" required>
                    <option value="KORPORASI" {{ old('category', $article->category) == 'KORPORASI' ? 'selected' : '' }}>KORPORASI</option>
                    <option value="KESELAMATAN" {{ old('category', $article->category) == 'KESELAMATAN' ? 'selected' : '' }}>KESELAMATAN</option>
                    <option value="LOGISTIK" {{ old('category', $article->category) == 'LOGISTIK' ? 'selected' : '' }}>LOGISTIK</option>
                    <option value="OPERASIONAL" {{ old('category', $article->category) == 'OPERASIONAL' ? 'selected' : '' }}>OPERASIONAL</option>
                </select>
            </div>

            <div class="form-group">
                <label for="published_date" class="form-label">Tanggal Publikasi *</label>
                <input type="date" name="published_date" id="published_date" class="form-control" value="{{ old('published_date', $article->published_date ? \Carbon\Carbon::parse($article->published_date)->format('Y-m-d') : date('Y-m-d')) }}" required>
            </div>
        </div>

        <div class="form-group">
            <label for="summary" class="form-label">Ringkasan Singkat (Summary) *</label>
            <textarea name="summary" id="summary" class="form-control" rows="3" required>{{ old('summary', $article->summary) }}</textarea>
        </div>

        <div class="form-group">
            <label for="content" class="form-label">Isi Berita Lengkap</label>
            <textarea name="content" id="content" class="form-control" rows="6">{{ old('content', $article->content) }}</textarea>
        </div>

        <div class="form-group">
            <label for="image" class="form-label">Gambar Sampul / Header (Biarkan kosong jika tidak diganti)</label>
            @if($article->image_path && file_exists(public_path($article->image_path)))
                <div style="margin-bottom: 10px;">
                    <img src="{{ asset($article->image_path) }}" alt="{{ $article->title }}" style="max-height: 100px; border-radius: 8px; border: 1px solid var(--admin-card-border);">
                </div>
            @endif
            <input type="file" name="image" id="image" class="form-control" accept="image/*">
        </div>

        <div style="display: flex; gap: 12px; margin-top: 30px;">
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="{{ route('admin.news.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection
