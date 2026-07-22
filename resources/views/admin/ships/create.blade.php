@extends('admin.layouts.admin')

@section('title', 'Tambah Armada Kapal Baru')
@section('header_title', 'Tambah Armada Kapal Baru')

@section('content')
<div class="card" style="max-width: 800px; margin: 0 auto;">
    <div style="margin-bottom: 24px;">
        <h3 style="font-family: 'Montserrat', sans-serif; font-size: 1.1rem; color: white;">Form Tambah Kapal</h3>
        <p style="font-size: 0.85rem; color: var(--admin-muted);">Isi detail spesifikasi teknis dan informasi armada kapal.</p>
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

    <form action="{{ route('admin.ships.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-grid">
            <div class="form-group">
                <label for="name" class="form-label">Nama Kapal *</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" placeholder="Contoh: Cattleya Express" required>
            </div>

            <div class="form-group">
                <label for="type" class="form-label">Tipe Armada *</label>
                <select name="type" id="type" class="form-control" required>
                    <option value="passenger" {{ old('type') == 'passenger' ? 'selected' : '' }}>Kapal Penumpang</option>
                    <option value="tugboat" {{ old('type') == 'tugboat' ? 'selected' : '' }}>Tugboat (Kapal Tunda)</option>
                    <option value="barge" {{ old('type') == 'barge' ? 'selected' : '' }}>Tongkang (Coal Barge)</option>
                </select>
            </div>
        </div>

        <div class="form-grid">
            <div class="form-group">
                <label for="route" class="form-label">Rute Utama</label>
                <input type="text" name="route" id="route" class="form-control" value="{{ old('route') }}" placeholder="Contoh: Pare-Pare - Nunukan">
            </div>

            <div class="form-group">
                <label for="capacity" class="form-label">Kapasitas</label>
                <input type="text" name="capacity" id="capacity" class="form-control" value="{{ old('capacity') }}" placeholder="Contoh: 1.400 Penumpang atau 300 Feet">
            </div>
        </div>

        <div class="form-grid">
            <div class="form-group">
                <label for="gt" class="form-label">Gross Tonnage (GT)</label>
                <input type="number" name="gt" id="gt" class="form-control" value="{{ old('gt') }}" placeholder="Contoh: 2000">
            </div>

            <div class="form-group">
                <label for="nt" class="form-label">Net Tonnage (NT)</label>
                <input type="number" name="nt" id="nt" class="form-control" value="{{ old('nt') }}" placeholder="Contoh: 600">
            </div>
        </div>

        <div class="form-grid">
            <div class="form-group">
                <label for="dimensions" class="form-label">Dimensi Kapal</label>
                <input type="text" name="dimensions" id="dimensions" class="form-control" value="{{ old('dimensions') }}" placeholder="Contoh: 87,84 x 24,40 x 5,50 m">
            </div>

            <div class="form-group">
                <label for="engine" class="form-label">Daya Mesin</label>
                <input type="text" name="engine" id="engine" class="form-control" value="{{ old('engine') }}" placeholder="Contoh: 2 x 823 HP">
            </div>
        </div>

        <div class="form-group">
            <label for="description" class="form-label">Deskripsi / Riwayat Kapal</label>
            <textarea name="description" id="description" class="form-control" rows="4" placeholder="Tuliskan deskripsi lengkap atau riwayat akuisisi kapal...">{{ old('description') }}</textarea>
        </div>

        <div class="form-group">
            <label for="image" class="form-label">Foto Kapal (JPG/PNG/WEBP, Max 5MB)</label>
            <input type="file" name="image" id="image" class="form-control" accept="image/*">
        </div>

        <div style="display: flex; gap: 12px; margin-top: 30px;">
            <button type="submit" class="btn btn-primary">Simpan Kapal</button>
            <a href="{{ route('admin.ships.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection
