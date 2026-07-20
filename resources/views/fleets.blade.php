@extends('layouts.app')

@section('content')

<!-- Page Header Banner -->
<section class="page-header" style="background: linear-gradient(135deg, #1e40af 0%, #1d4ed8 100%); padding: 60px 0; border-bottom: 1px solid var(--border-dark); text-align: center; color: #ffffff;">
    <div class="container">
        <span class="sub-title">Daftar Armada</span>
        <h1 style="font-size: 2.5rem; margin-top: 10px;">Armada Perkapalan</h1>
        <p style="color: var(--text-dark-muted); max-width: 600px; margin: 10px auto 0;">Menampilkan seluruh unit kapal penumpang, kapal tunda (tugboat), dan tongkang batubara PT PANCA MERAK SAMUDERA.</p>
    </div>
</section>

<!-- Fleets Directory Section -->
<section class="fleets-section" style="padding: 80px 0; background-color: var(--primary-navy);">
    <div class="container">
        <!-- Filter Tabs -->
        <div class="filter-wrapper">
            <button class="filter-btn active" data-filter="all">Semua Armada ({{ count($ships) }})</button>
            <button class="filter-btn" data-filter="passenger">Kapal Penumpang</button>
            <button class="filter-btn" data-filter="tugboat">Kapal Tunda (Tugboat)</button>
            <button class="filter-btn" data-filter="barge">Tongkang (Barge)</button>
        </div>
        
        <!-- Fleets Grid -->
        <div class="fleets-grid">
            @foreach($ships as $ship)
                @php
                    $typeLabel = $ship->type === 'passenger' ? 'Kapal Penumpang' : ($ship->type === 'tugboat' ? 'Kapal Tunda' : 'Tongkang');
                    $bgClass = $ship->type === 'passenger' ? 'passenger-bg' : ($ship->type === 'tugboat' ? 'tugboat-bg' : 'barge-bg');
                @endphp
                <div class="fleet-card" data-category="{{ $ship->type }}">
                    <div class="fleet-img-container">
                        @if($ship->image_path && file_exists(public_path($ship->image_path)))
                            <img src="{{ asset($ship->image_path) }}" alt="{{ $ship->name }}" class="fleet-img" style="width: 100%; height: 200px; object-fit: cover;">
                        @else
                            <div class="fleet-placeholder {{ $bgClass }}">
                                @if($ship->type === 'passenger')
                                    <svg viewBox="0 0 24 24" width="48" height="48" fill="currentColor"><path d="M19.4 11.2a16 16 0 0 0-14.8 0L2 13v3c0 .6.4 1 1 1h18c.6 0 1-.4 1-1v-3l-2.6-1.8zM12 2v10M12 2L8 6M12 2l4 4"/></svg>
                                @elseif($ship->type === 'tugboat')
                                    <svg viewBox="0 0 24 24" width="48" height="48" fill="currentColor"><path d="M20 21c0-2.5-3.58-4.14-5.5-5 .56-1.24.88-2.6.88-4 0-4.42-3.58-8-8-8s-8 3.58-8 8 3.58 8 8 8c1.4 0 2.76-.32 4-.88.86 1.92 2.5 5.5 5 5h3.62z"/></svg>
                                @else
                                    <svg viewBox="0 0 24 24" width="48" height="48" fill="currentColor"><path d="M22 13H2v5a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-5zM2 11h20V8H2v3z"/></svg>
                                @endif
                            </div>
                        @endif
                        <span class="fleet-badge">{{ $typeLabel }}</span>
                    </div>
                    <div class="fleet-info">
                        <h3>{{ $ship->name }}</h3>
                        <p class="fleet-short-desc">{{ Str::limit($ship->description, 95) }}</p>
                        <div class="fleet-meta-specs">
                            <span><strong>GT:</strong> {{ $ship->gt ? $ship->gt : '-' }}</span>
                            <span><strong>Kekuatan:</strong> {{ $ship->engine ? Str::limit($ship->engine, 15) : '-' }}</span>
                        </div>
                        <a href="{{ route('fleets.detail', $ship->id) }}" class="btn btn-outline btn-sm btn-block">Lihat Detail Spesifikasi</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@endsection

