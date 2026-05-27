<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Rumah Supplier') }}</title>
        <style>
            :root {
                color-scheme: light;
                --bg: #f6f7f2;
                --panel: #ffffff;
                --line: #d9dfcf;
                --text: #16301f;
                --muted: #5f6f62;
                --brand: #1f7a4d;
                --brand-soft: #e6f5ec;
                --accent: #f0a43b;
                --danger: #b93838;
            }

            * { box-sizing: border-box; }
            body {
                margin: 0;
                font-family: Arial, Helvetica, sans-serif;
                background: var(--bg);
                color: var(--text);
                line-height: 1.5;
            }
            a { color: inherit; }
            .page {
                max-width: 1120px;
                margin: 0 auto;
                padding: 1rem;
            }
            .hero, .panel, .request-card, .offer-card {
                background: var(--panel);
                border: 1px solid var(--line);
                border-radius: 20px;
                box-shadow: 0 10px 30px rgba(22, 48, 31, 0.06);
            }
            .hero {
                padding: 1.5rem;
                margin-bottom: 1rem;
                background: linear-gradient(145deg, #fefcf6 0%, #eef8f1 100%);
            }
            .hero h1 {
                margin: 0 0 0.75rem;
                font-size: 1.9rem;
            }
            .hero p, .meta, .empty, .hint {
                color: var(--muted);
            }
            .hero-grid, .content-grid, .offer-summary, .request-meta {
                display: grid;
                gap: 1rem;
            }
            .hero-stats {
                display: grid;
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 0.75rem;
                margin-top: 1rem;
            }
            .stat {
                background: rgba(255,255,255,0.72);
                border-radius: 16px;
                padding: 0.9rem;
                border: 1px solid rgba(31, 122, 77, 0.12);
            }
            .stat strong {
                display: block;
                font-size: 1.4rem;
            }
            .content-grid {
                grid-template-columns: 1fr;
                align-items: start;
            }
            .panel {
                padding: 1rem;
            }
            .panel h2 {
                margin-top: 0;
                font-size: 1.1rem;
            }
            .field {
                margin-bottom: 0.85rem;
            }
            .field label {
                display: block;
                font-weight: bold;
                margin-bottom: 0.35rem;
            }
            .field input,
            .field textarea {
                width: 100%;
                border: 1px solid var(--line);
                border-radius: 12px;
                padding: 0.8rem 0.9rem;
                font: inherit;
                background: #fff;
            }
            .field textarea {
                min-height: 96px;
                resize: vertical;
            }
            .field-row {
                display: grid;
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 0.75rem;
            }
            .checkbox {
                display: flex;
                align-items: center;
                gap: 0.5rem;
                margin-bottom: 1rem;
            }
            .checkbox input { width: auto; }
            .button {
                width: 100%;
                border: 0;
                border-radius: 999px;
                background: var(--brand);
                color: #fff;
                font: inherit;
                font-weight: bold;
                padding: 0.9rem 1rem;
                cursor: pointer;
            }
            .button.secondary {
                background: var(--accent);
                color: #2d1e08;
            }
            .alerts {
                margin-bottom: 1rem;
                display: grid;
                gap: 0.75rem;
            }
            .alert {
                padding: 0.9rem 1rem;
                border-radius: 14px;
                border: 1px solid;
            }
            .alert.success {
                background: var(--brand-soft);
                border-color: #9dd4b4;
            }
            .alert.error {
                background: #fff1f1;
                border-color: #efb7b7;
                color: var(--danger);
            }
            .request-list {
                display: grid;
                gap: 1rem;
            }
            .request-card {
                padding: 1rem;
            }
            .request-card h3 {
                margin: 0.2rem 0 0.5rem;
                font-size: 1.2rem;
            }
            .badge {
                display: inline-flex;
                align-items: center;
                gap: 0.35rem;
                padding: 0.3rem 0.65rem;
                border-radius: 999px;
                background: var(--brand-soft);
                color: var(--brand);
                font-size: 0.85rem;
                font-weight: bold;
            }
            .request-meta {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                margin: 0.8rem 0;
            }
            .meta strong {
                display: block;
                color: var(--text);
            }
            .offer-stack {
                display: grid;
                gap: 0.75rem;
                margin-top: 1rem;
            }
            .offer-card {
                padding: 0.85rem;
                background: #fcfdf9;
            }
            .offer-top {
                display: flex;
                justify-content: space-between;
                gap: 0.75rem;
                align-items: start;
            }
            .offer-top strong {
                display: block;
            }
            .offer-summary {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                margin-top: 0.65rem;
            }
            .verified {
                color: var(--brand);
                font-weight: bold;
            }
            .empty {
                text-align: center;
                padding: 2rem 1rem;
            }
            @media (min-width: 900px) {
                .page { padding: 1.5rem; }
                .hero-grid { grid-template-columns: 2fr 1fr; align-items: center; }
                .content-grid { grid-template-columns: minmax(0, 1.7fr) minmax(320px, 0.9fr); }
                .hero { padding: 2rem; }
            }
        </style>
    </head>
    <body>
        <div class="page">
            <section class="hero">
                <div class="hero-grid">
                    <div>
                        <span class="badge">Marketplace supplier ↔ UMKM</span>
                        <h1>Rumah Supplier untuk kebutuhan bisnis lokal berbasis bidding.</h1>
                        <p>
                            Pelaku bisnis dapat mempublikasikan kebutuhannya, lalu supplier terverifikasi mengajukan penawaran harga dan kualitas terbaik.
                            Tampilan dibuat mobile-first agar cepat dipakai dari lapangan maupun gudang.
                        </p>
                    </div>
                    <div class="hero-stats">
                        <div class="stat">
                            <strong>{{ $requests->count() }}</strong>
                            Permintaan aktif
                        </div>
                        <div class="stat">
                            <strong>{{ $requests->sum('offers_count') }}</strong>
                            Penawaran masuk
                        </div>
                    </div>
                </div>
            </section>

            <div class="alerts">
                @if (session('status'))
                    <div class="alert success">{{ session('status') }}</div>
                @endif

                @if ($errors->any())
                    <div class="alert error">
                        <strong>Data belum bisa disimpan.</strong>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>

            <div class="content-grid">
                <section>
                    <div class="request-list">
                        @forelse ($requests as $request)
                            <article class="request-card">
                                <span class="badge">{{ ucfirst($request->status) }}</span>
                                <h3>{{ $request->product_name }}</h3>
                                <p>
                                    <strong>{{ $request->requester_name }}</strong>
                                    @if ($request->business_name)
                                        · {{ $request->business_name }}
                                    @endif
                                </p>
                                <div class="request-meta">
                                    <div class="meta">
                                        <strong>Kebutuhan</strong>
                                        {{ rtrim(rtrim(number_format((float) $request->quantity, 2, ',', '.'), '0'), ',') }} {{ $request->unit }}
                                    </div>
                                    <div class="meta">
                                        <strong>Dibutuhkan</strong>
                                        {{ $request->needed_at->format('d M Y') }}
                                    </div>
                                    <div class="meta">
                                        <strong>Lokasi kirim</strong>
                                        {{ $request->delivery_location }}
                                    </div>
                                    <div class="meta">
                                        <strong>Bid terendah</strong>
                                        {{ $request->offers_min_price_per_unit ? 'Rp '.number_format((float) $request->offers_min_price_per_unit, 0, ',', '.') : 'Belum ada' }}
                                    </div>
                                </div>
                                @if ($request->notes)
                                    <p class="hint">{{ $request->notes }}</p>
                                @endif

                                <div class="offer-stack">
                                    @forelse ($request->offers as $offer)
                                        <article class="offer-card">
                                            <div class="offer-top">
                                                <div>
                                                    <strong>{{ $offer->supplier_name }}</strong>
                                                    <span>{{ $offer->company_name ?: 'Supplier independen' }}</span>
                                                    @if ($offer->supplier_verified)
                                                        <div class="verified">Supplier terverifikasi</div>
                                                    @endif
                                                </div>
                                                <strong>Rp {{ number_format((float) $offer->price_per_unit, 0, ',', '.') }}/{{ $request->unit }}</strong>
                                            </div>
                                            <div class="offer-summary">
                                                <div class="meta">
                                                    <strong>Jumlah siap kirim</strong>
                                                    {{ rtrim(rtrim(number_format((float) $offer->available_quantity, 2, ',', '.'), '0'), ',') }} {{ $request->unit }}
                                                </div>
                                                <div class="meta">
                                                    <strong>Kualitas</strong>
                                                    {{ $offer->quality_grade }}
                                                </div>
                                                <div class="meta">
                                                    <strong>Lead time</strong>
                                                    {{ $offer->lead_time_days !== null ? $offer->lead_time_days.' hari' : 'Siap nego' }}
                                                </div>
                                                <div class="meta">
                                                    <strong>Catatan</strong>
                                                    {{ $offer->message ?: 'Tidak ada catatan tambahan.' }}
                                                </div>
                                            </div>
                                        </article>
                                    @empty
                                        <div class="offer-card empty">Belum ada penawaran. Supplier bisa langsung mengisi formulir di bawah.</div>
                                    @endforelse
                                </div>

                                <form method="POST" action="{{ route('offers.store', $request) }}" style="margin-top: 1rem;">
                                    @csrf
                                    <h4>Ajukan penawaran untuk kebutuhan ini</h4>
                                    <div class="field-row">
                                        <div class="field">
                                            <label for="supplier_name_{{ $request->id }}">Nama supplier</label>
                                            <input id="supplier_name_{{ $request->id }}" name="supplier_name" type="text" value="{{ old('supplier_name') }}" required>
                                        </div>
                                        <div class="field">
                                            <label for="company_name_{{ $request->id }}">Nama perusahaan</label>
                                            <input id="company_name_{{ $request->id }}" name="company_name" type="text" value="{{ old('company_name') }}">
                                        </div>
                                    </div>
                                    <div class="field-row">
                                        <div class="field">
                                            <label for="price_per_unit_{{ $request->id }}">Harga per {{ $request->unit }}</label>
                                            <input id="price_per_unit_{{ $request->id }}" name="price_per_unit" type="number" min="0.01" step="0.01" value="{{ old('price_per_unit') }}" required>
                                        </div>
                                        <div class="field">
                                            <label for="available_quantity_{{ $request->id }}">Jumlah tersedia</label>
                                            <input id="available_quantity_{{ $request->id }}" name="available_quantity" type="number" min="0.01" step="0.01" value="{{ old('available_quantity') }}" required>
                                        </div>
                                    </div>
                                    <div class="field-row">
                                        <div class="field">
                                            <label for="quality_grade_{{ $request->id }}">Kualitas</label>
                                            <input id="quality_grade_{{ $request->id }}" name="quality_grade" type="text" value="{{ old('quality_grade') }}" placeholder="Grade A / Premium" required>
                                        </div>
                                        <div class="field">
                                            <label for="lead_time_days_{{ $request->id }}">Lead time (hari)</label>
                                            <input id="lead_time_days_{{ $request->id }}" name="lead_time_days" type="number" min="0" step="1" value="{{ old('lead_time_days') }}">
                                        </div>
                                    </div>
                                    <div class="field">
                                        <label for="message_{{ $request->id }}">Catatan penawaran</label>
                                        <textarea id="message_{{ $request->id }}" name="message">{{ old('message') }}</textarea>
                                    </div>
                                    <label class="checkbox" for="supplier_verified_{{ $request->id }}">
                                        <input id="supplier_verified_{{ $request->id }}" name="supplier_verified" type="checkbox" value="1" @checked(old('supplier_verified'))>
                                        Tandai sebagai supplier terverifikasi
                                    </label>
                                    <button class="button secondary" type="submit">Kirim penawaran</button>
                                </form>
                            </article>
                        @empty
                            <div class="request-card empty">
                                Belum ada kebutuhan aktif. Publikasikan kebutuhan pertama agar supplier mulai melakukan bidding.
                            </div>
                        @endforelse
                    </div>
                </section>

                <aside class="panel">
                    <h2>Publikasikan kebutuhan bisnis</h2>
                    <p class="hint">Cocok untuk UMKM, toko, restoran, maupun distributor yang mencari supplier dengan cepat.</p>
                    <form method="POST" action="{{ route('requests.store') }}">
                        @csrf
                        <div class="field">
                            <label for="requester_name">Nama pemesan</label>
                            <input id="requester_name" name="requester_name" type="text" value="{{ old('requester_name') }}" placeholder="Nama PIC / pemilik usaha" required>
                        </div>
                        <div class="field">
                            <label for="business_name">Nama bisnis</label>
                            <input id="business_name" name="business_name" type="text" value="{{ old('business_name') }}" placeholder="Opsional">
                        </div>
                        <div class="field">
                            <label for="product_name">Produk yang dibutuhkan</label>
                            <input id="product_name" name="product_name" type="text" value="{{ old('product_name') }}" placeholder="Contoh: Pisang Cavendish Segar" required>
                        </div>
                        <div class="field-row">
                            <div class="field">
                                <label for="quantity">Jumlah</label>
                                <input id="quantity" name="quantity" type="number" min="0.01" step="0.01" value="{{ old('quantity') }}" required>
                            </div>
                            <div class="field">
                                <label for="unit">Satuan</label>
                                <input id="unit" name="unit" type="text" value="{{ old('unit', 'kg') }}" required>
                            </div>
                        </div>
                        <div class="field">
                            <label for="delivery_location">Lokasi kirim</label>
                            <input id="delivery_location" name="delivery_location" type="text" value="{{ old('delivery_location') }}" placeholder="Kota / kecamatan tujuan" required>
                        </div>
                        <div class="field">
                            <label for="needed_at">Tanggal kebutuhan</label>
                            <input id="needed_at" name="needed_at" type="date" value="{{ old('needed_at') }}" required>
                        </div>
                        <div class="field">
                            <label for="notes">Detail tambahan</label>
                            <textarea id="notes" name="notes" placeholder="Jelaskan kualitas, kemasan, atau kebutuhan logistik lain">{{ old('notes') }}</textarea>
                        </div>
                        <button class="button" type="submit">Publikasikan kebutuhan</button>
                    </form>
                </aside>
            </div>
        </div>
    </body>
</html>
