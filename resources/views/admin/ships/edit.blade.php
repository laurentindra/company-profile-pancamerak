@extends('admin.layouts.admin')

@section('title', 'Edit Armada Kapal')
@section('header_title', 'Edit Armada Kapal: ' . $ship->name)

@section('content')
<div class="card" style="max-width: 800px; margin: 0 auto;">
    <div style="margin-bottom: 24px;">
        <h3 style="font-family: 'Montserrat', sans-serif; font-size: 1.1rem; color: white;">Edit Detail Armada Kapal</h3>
        <p style="font-size: 0.85rem; color: var(--admin-muted);">Perbarui spesifikasi atau foto dari kapal {{ $ship->name }}.</p>
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

    <form action="{{ route('admin.ships.update', $ship->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-grid">
            <div class="form-group">
                <label for="name" class="form-label">Nama Kapal *</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $ship->name) }}" required>
            </div>

            <div class="form-group">
                <label for="type" class="form-label">Tipe Armada *</label>
                <select name="type" id="type" class="form-control" required>
                    <option value="passenger" {{ old('type', $ship->type) == 'passenger' ? 'selected' : '' }}>Kapal Penumpang</option>
                    <option value="tugboat" {{ old('type', $ship->type) == 'tugboat' ? 'selected' : '' }}>Tugboat (Kapal Tunda)</option>
                    <option value="barge" {{ old('type', $ship->type) == 'barge' ? 'selected' : '' }}>Tongkang (Coal Barge)</option>
                </select>
            </div>
        </div>

        <div class="form-grid">
            <div class="form-group">
                <label for="route" class="form-label">Rute Utama</label>
                <input type="text" name="route" id="route" class="form-control" value="{{ old('route', $ship->route) }}">
            </div>

            <div class="form-group">
                <label for="capacity" class="form-label">Kapasitas</label>
                <input type="text" name="capacity" id="capacity" class="form-control" value="{{ old('capacity', $ship->capacity) }}">
            </div>
        </div>

        <div class="form-grid">
            <div class="form-group">
                <label for="gt" class="form-label">Gross Tonnage (GT)</label>
                <input type="number" name="gt" id="gt" class="form-control" value="{{ old('gt', $ship->gt) }}">
            </div>

            <div class="form-group">
                <label for="nt" class="form-label">Net Tonnage (NT)</label>
                <input type="number" name="nt" id="nt" class="form-control" value="{{ old('nt', $ship->nt) }}">
            </div>
        </div>

        <div class="form-grid">
            <div class="form-group">
                <label for="dimensions" class="form-label">Dimensi Kapal</label>
                <input type="text" name="dimensions" id="dimensions" class="form-control" value="{{ old('dimensions', $ship->dimensions) }}">
            </div>

            <div class="form-group">
                <label for="engine" class="form-label">Daya Mesin</label>
                <input type="text" name="engine" id="engine" class="form-control" value="{{ old('engine', $ship->engine) }}">
            </div>
        </div>

        <div class="form-group">
            <label for="description" class="form-label">Deskripsi / Riwayat Kapal</label>
            <textarea name="description" id="description" class="form-control" rows="4">{{ old('description', $ship->description) }}</textarea>
        </div>

        <div class="form-group">
            <label for="image" class="form-label">Foto Kapal Baru (Biarkan kosong jika tidak diganti)</label>
            @if($ship->image_path)
                <div style="margin-bottom: 10px;">
                    <img src="{{ asset($ship->image_path) }}" alt="{{ $ship->name }}" style="max-height: 100px; border-radius: 8px; border: 1px solid var(--admin-card-border);">
                </div>
            @endif
            <input type="file" name="image" id="image" class="form-control" accept="image/*">
        </div>

        <div style="display: flex; gap: 12px; margin-top: 30px;">
            <button type="submit" class="btn btn-primary">Perbarui Kapal</button>
            <a href="{{ route('admin.ships.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection
