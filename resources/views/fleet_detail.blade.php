@extends('layouts.app')

@section('content')

<!-- Page Header Breadcrumb -->
<section class="page-header" style="background: linear-gradient(135deg, #1e40af 0%, #1d4ed8 100%); padding: 50px 0; border-bottom: 1px solid var(--border-dark); color: #ffffff;">
    <div class="container" style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 20px;">
        <div>
            <span class="modal-badge" style="margin-bottom: 8px; display: inline-block;">
                {{ $ship->type === 'passenger' ? 'Kapal Penumpang' : ($ship->type === 'tugboat' ? 'Kapal Tunda' : 'Tongkang') }}
            </span>
            <h1 style="font-size: 2.2rem; margin: 0;">{{ $ship->name }}</h1>
        </div>
        <a href="{{ route('fleets') }}" class="btn btn-secondary btn-sm">&larr; Kembali ke Semua Armada</a>
    </div>
</section>

<!-- Detail Specifications Sheet -->
<section class="fleet-detail-section" style="padding: 80px 0; background-color: #ffffff;">
    <div class="container">
        <div style="display: grid; grid-template-columns: 1fr 1.2fr; gap: 60px; align-items: flex-start; margin-bottom: 60px;">
            
            <!-- Graphic Illustration and Description -->
            <div>
                <div style="background-color: var(--primary-navy); border-radius: var(--radius-md); text-align: center; color: var(--accent-cyan-light); margin-bottom: 30px; border: 1px solid var(--border-dark); min-height: 250px; display: flex; align-items: center; justify-content: center; overflow: hidden;">
                    @if($ship->image_path && file_exists(public_path($ship->image_path)))
                        <img src="{{ asset($ship->image_path) }}" alt="{{ $ship->name }}" style="width: 100%; height: 100%; object-fit: cover; max-height: 350px;">
                    @else
                        <div style="padding: 50px;">
                            @if($ship->type === 'passenger')
                                <svg viewBox="0 0 24 24" width="150" height="150" fill="currentColor"><path d="M19.4 11.2a16 16 0 0 0-14.8 0L2 13v3c0 .6.4 1 1 1h18c.6 0 1-.4 1-1v-3l-2.6-1.8zM12 2v10M12 2L8 6M12 2l4 4"/></svg>
                            @elseif($ship->type === 'tugboat')
                                <svg viewBox="0 0 24 24" width="150" height="150" fill="currentColor"><path d="M20 21c0-2.5-3.58-4.14-5.5-5 .56-1.24.88-2.6.88-4 0-4.42-3.58-8-8-8s-8 3.58-8 8 3.58 8 8 8c1.4 0 2.76-.32 4-.88.86 1.92 2.5 5.5 5 5h3.62z"/></svg>
                            @else
                                <svg viewBox="0 0 24 24" width="150" height="150" fill="currentColor"><path d="M22 13H2v5a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-5zM2 11h20V8H2v3z"/></svg>
                            @endif
                        </div>
                    @endif
                </div>
                
                <h3 style="color: var(--primary-navy); margin-bottom: 15px;">Deskripsi Operasional</h3>
                <p style="color: var(--text-light-muted); font-size: 0.95rem; line-height: 1.7; margin-bottom: 20px;">
                    {{ $ship->description }}
                </p>
                <p style="color: var(--text-light-muted); font-size: 0.95rem; line-height: 1.7;">
                    Sebagai bagian dari standar kualitas PT PANCA MERAK SAMUDERA, unit armada **{{ $ship->name }}** senantiasa dipantau secara ketat melalui audit manajemen keselamatan maritim. Seluruh sertifikasi keselamatan serta klasifikasi badan perkapalan (BKI) berada dalam kondisi terbit dan aktif.
                </p>
            </div>
            
            <!-- Tech Specs Tables -->
            <div style="background-color: var(--bg-light); border: 1px solid var(--border-light); padding: 40px; border-radius: var(--radius-lg);">
                <h3 style="color: var(--primary-navy); margin-bottom: 20px; border-bottom: 2px solid var(--accent-cyan); padding-bottom: 10px;">Spesifikasi Teknis</h3>
                <table class="modal-specs-table" style="width: 100%;">
                    <tbody>
                        <tr>
                            <td style="padding: 12px 0; border-bottom: 1px solid #cbd5e1; font-weight: 600; color: var(--text-light-muted);">Tipe Armada</td>
                            <td style="padding: 12px 0; border-bottom: 1px solid #cbd5e1; font-weight: 700; color: var(--primary-navy); text-align: right;">
                                {{ $ship->type === 'passenger' ? 'Kapal Penumpang Niaga' : ($ship->type === 'tugboat' ? 'Kapal Tunda (Tugboat)' : 'Tongkang Besi (Barge)') }}
                            </td>
                        </tr>
                        <tr>
                            <td style="padding: 12px 0; border-bottom: 1px solid #cbd5e1; font-weight: 600; color: var(--text-light-muted);">Rute Operasi / Layanan</td>
                            <td style="padding: 12px 0; border-bottom: 1px solid #cbd5e1; font-weight: 700; color: var(--primary-navy); text-align: right;">
                                {{ $ship->route ? $ship->route : 'Charter Kontrak (Logistik Batubara)' }}
                            </td>
                        </tr>
                        <tr>
                            <td style="padding: 12px 0; border-bottom: 1px solid #cbd5e1; font-weight: 600; color: var(--text-light-muted);">Kapasitas Angkut</td>
                            <td style="padding: 12px 0; border-bottom: 1px solid #cbd5e1; font-weight: 700; color: var(--primary-navy); text-align: right;">
                                {{ $ship->capacity ? $ship->capacity : '-' }}
                            </td>
                        </tr>
                        <tr>
                            <td style="padding: 12px 0; border-bottom: 1px solid #cbd5e1; font-weight: 600; color: var(--text-light-muted);">Gross Tonnage (GT)</td>
                            <td style="padding: 12px 0; border-bottom: 1px solid #cbd5e1; font-weight: 700; color: var(--primary-navy); text-align: right;">
                                {{ $ship->gt ? $ship->gt . ' Register Tons' : '-' }}
                            </td>
                        </tr>
                        <tr>
                            <td style="padding: 12px 0; border-bottom: 1px solid #cbd5e1; font-weight: 600; color: var(--text-light-muted);">Net Tonnage (NT)</td>
                            <td style="padding: 12px 0; border-bottom: 1px solid #cbd5e1; font-weight: 700; color: var(--primary-navy); text-align: right;">
                                {{ $ship->nt ? $ship->nt . ' Register Tons' : '-' }}
                            </td>
                        </tr>
                        <tr>
                            <td style="padding: 12px 0; border-bottom: 1px solid #cbd5e1; font-weight: 600; color: var(--text-light-muted);">Dimensi Kapal (L x B x D)</td>
                            <td style="padding: 12px 0; border-bottom: 1px solid #cbd5e1; font-weight: 700; color: var(--primary-navy); text-align: right;">
                                {{ $ship->dimensions ? $ship->dimensions : '-' }}
                            </td>
                        </tr>
                        <tr>
                            <td style="padding: 12px 0; border-bottom: 1px solid #cbd5e1; font-weight: 600; color: var(--text-light-muted);">Kekuatan Mesin Penggerak</td>
                            <td style="padding: 12px 0; border-bottom: 1px solid #cbd5e1; font-weight: 700; color: var(--primary-navy); text-align: right;">
                                {{ $ship->engine ? $ship->engine : '-' }}
                            </td>
                        </tr>
                        <tr>
                            <td style="padding: 12px 0; font-weight: 600; color: var(--text-light-muted);">Badan Sertifikasi Klas</td>
                            <td style="padding: 12px 0; font-weight: 700; color: var(--primary-navy); text-align: right;">BKI (Biro Klasifikasi Indonesia)</td>
                        </tr>
                    </tbody>
                </table>
                
                <!-- Inquiry Form inside detail page -->
                <div style="margin-top: 40px; border-top: 2px dashed #cbd5e1; padding-top: 30px;">
                    <h4 style="color: var(--primary-navy); margin-bottom: 15px;">Form Keagenan & Sewa Khusus: {{ $ship->name }}</h4>
                    <form id="contact-form" class="inquiry-form" style="gap: 12px;">
                        @csrf
                        <input type="hidden" name="ship_id" value="{{ $ship->id }}">
                        
                        <div>
                            <label for="c_name" style="font-size: 0.8rem;">Nama Kontak Utama</label>
                            <input type="text" id="c_name" required placeholder="Bapak/Ibu..." style="padding: 10px; font-size: 0.85rem;">
                        </div>
                        <div>
                            <label for="c_interest" style="font-size: 0.8rem;">Keperluan</label>
                            <select id="c_interest" style="padding: 10px; font-size: 0.85rem;">
                                @if($ship->type === 'passenger')
                                    <option value="tiket_reguler">Pemesanan Tiket Penumpang & Roda 4</option>
                                    <option value="kerjasama_kargo">Kerjasama Distribusi Kargo Kapal</option>
                                @else
                                    <option value="sewa_tongkang">Time Charter (Sewa Berjangka)</option>
                                    <option value="sewa_tongkang">Freight Charter (Sewa per Ton batubara)</option>
                                @endif
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block btn-sm" style="margin-top: 10px;">Kirim Permintaan Kuotasi Tarif</button>
                    </form>
                </div>
            </div>
        </div>
        
        <!-- Related / Suggested Fleets -->
        @if(count($relatedShips) > 0)
            <div style="border-top: 1px solid var(--border-light); padding-top: 60px;">
                <h3 style="color: var(--primary-navy); text-align: center; margin-bottom: 40px;">Armada Sejenis Lainnya</h3>
                <div class="fleets-grid">
                    @foreach($relatedShips as $rShip)
                        @php
                            $rTypeLabel = $rShip->type === 'passenger' ? 'Kapal Penumpang' : ($rShip->type === 'tugboat' ? 'Kapal Tunda' : 'Tongkang');
                            $rBgClass = $rShip->type === 'passenger' ? 'passenger-bg' : ($rShip->type === 'tugboat' ? 'tugboat-bg' : 'barge-bg');
                        @endphp
                        <div class="fleet-card" style="background-color: var(--bg-light); border: 1px solid var(--border-light); color: var(--text-light-main);">
                            <div class="fleet-img-container">
                                @if($rShip->image_path && file_exists(public_path($rShip->image_path)))
                                    <img src="{{ asset($rShip->image_path) }}" alt="{{ $rShip->name }}" class="fleet-img" style="width: 100%; height: 200px; object-fit: cover;">
                                @else
                                    <div class="fleet-placeholder {{ $rBgClass }}" style="color: rgba(255,255,255,0.4);">
                                        @if($rShip->type === 'passenger')
                                            <svg viewBox="0 0 24 24" width="48" height="48" fill="currentColor"><path d="M19.4 11.2a16 16 0 0 0-14.8 0L2 13v3c0 .6.4 1 1 1h18c.6 0 1-.4 1-1v-3l-2.6-1.8zM12 2v10M12 2L8 6M12 2l4 4"/></svg>
                                        @elseif($rShip->type === 'tugboat')
                                            <svg viewBox="0 0 24 24" width="48" height="48" fill="currentColor"><path d="M20 21c0-2.5-3.58-4.14-5.5-5 .56-1.24.88-2.6.88-4 0-4.42-3.58-8-8-8s-8 3.58-8 8 3.58 8 8 8c1.4 0 2.76-.32 4-.88.86 1.92 2.5 5.5 5 5h3.62z"/></svg>
                                        @else
                                            <svg viewBox="0 0 24 24" width="48" height="48" fill="currentColor"><path d="M22 13H2v5a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-5zM2 11h20V8H2v3z"/></svg>
                                        @endif
                                    </div>
                                @endif
                                <span class="fleet-badge" style="background-color: var(--primary-navy); color: #ffffff;">{{ $rTypeLabel }}</span>
                            </div>
                            <div class="fleet-info" style="padding: 20px;">
                                <h3 style="color: var(--primary-navy); font-size: 1.15rem; margin-bottom: 10px;">{{ $rShip->name }}</h3>
                                <p class="fleet-short-desc" style="color: var(--text-light-muted); font-size: 0.8rem; margin-bottom: 15px;">
                                    {{ Str::limit($rShip->description, 80) }}
                                </p>
                                <a href="{{ route('fleets.detail', $rShip->id) }}" class="btn btn-outline btn-sm btn-block">Lihat Detail</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</section>

@endsection

