
<x-layout title="Daftar Peminjaman">

<style>
    .loan-page {
        max-width: 1200px;
        margin: 0 auto;
        color: #49372B;
    }

    .loan-hero {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 24px;
        padding: 35px;
        margin-bottom: 24px;
        border: 1px solid #EAD8C8;
        border-radius: 22px;
        background: linear-gradient(120deg, #FFFCF7, #F3DCD0);
    }

    .loan-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        padding: 7px 12px;
        margin-bottom: 12px;
        border: 1px solid #E7D0BC;
        border-radius: 30px;
        background: white;
        color: #4C1D95;
        font-size: 12px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: .5px;
    }

    .loan-hero h1 {
        margin: 0 0 10px;
        font-size: clamp(26px, 4vw, 36px);
        font-weight: 800;
        color: #49372B;
    }

    .loan-hero p {
        max-width: 650px;
        margin: 0;
        color: #887568;
        line-height: 1.7;
    }

    .loan-hero-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        width: 105px;
        height: 105px;
        border-radius: 50%;
        background: rgba(255,255,255,.75);
        color: #4C1D95;
        font-size: 45px;
    }

    .loan-stats {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 16px;
        margin-bottom: 24px;
    }

    .loan-stat {
        display: flex;
        align-items: center;
        gap: 15px;
        padding: 21px;
        border: 1px solid #EADFD5;
        border-radius: 16px;
        background: white;
        box-shadow: 0 5px 18px rgba(73,55,43,.035);
    }

    .loan-stat-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 48px;
        height: 48px;
        flex-shrink: 0;
        border-radius: 13px;
        font-size: 21px;
    }

    .icon-purple { background: #EEE7FA; color: #4C1D95; }
    .icon-peach { background: #F8E7E3; color: #A45C55; }
    .icon-green { background: #E7F0E5; color: #527B50; }

    .loan-stat-label {
        margin-bottom: 5px;
        color: #95857A;
        font-size: 12px;
    }

    .loan-stat-value {
        font-size: 25px;
        font-weight: 800;
        line-height: 1.1;
    }

    .loan-card {
        overflow: hidden;
        border: 1px solid #EADFD5;
        border-radius: 18px;
        background: white;
        box-shadow: 0 6px 24px rgba(73,55,43,.04);
    }

    .loan-card-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 15px;
        padding: 22px 24px;
        border-bottom: 1px solid #F0E8E1;
    }

    .loan-card-header h2 {
        margin: 0 0 5px;
        font-size: 18px;
        font-weight: 800;
    }

    .loan-card-header p {
        margin: 0;
        color: #95857A;
        font-size: 12px;
    }

    .loan-primary-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        padding: 12px 17px;
        border: 0;
        border-radius: 10px;
        background: #4C1D95;
        color: white;
        text-decoration: none;
        font-size: 13px;
        font-weight: 700;
        white-space: nowrap;
        transition: background .2s, transform .2s;
    }

    .loan-primary-btn:hover {
        background: #3B0764;
        color: white;
        transform: translateY(-1px);
    }

    .loan-filter {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 16px 20px;
        background: #FFFCF9;
        border-bottom: 1px solid #F0E8E1;
    }

    .loan-filter input,
    .loan-filter select {
        min-width: 0;
        width: 100%;
        padding: 11px 13px;
        border: 1px solid #E4D5C9;
        border-radius: 9px;
        background: white;
        color: #49372B;
        font-size: 13px;
        outline: none;
    }

    .loan-filter input:focus,
    .loan-filter select:focus {
        border-color: #8B5CC7;
        box-shadow: 0 0 0 3px rgba(76,29,149,.08);
    }

    .loan-search {
        flex: 1;
    }

    .loan-filter .loan-primary-btn {
        cursor: pointer;
    }

    .loan-reset {
        padding: 10px 12px;
        border: 1px solid #E4D5C9;
        border-radius: 9px;
        color: #79695E;
        background: white;
        text-decoration: none;
        font-size: 13px;
        white-space: nowrap;
    }

    .loan-table-wrap {
        overflow-x: auto;
    }

    .loan-table {
        width: 100%;
        min-width: 1000px;
        border-collapse: collapse;
    }

    .loan-table thead th {
        padding: 15px 14px;
        background: #FBF7F2;
        color: #806D60;
        font-size: 11px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: .4px;
        text-align: left;
        white-space: nowrap;
    }

    .loan-table tbody td {
        padding: 17px 14px;
        border-top: 1px solid #F1EAE4;
        font-size: 12px;
        vertical-align: middle;
    }

    .loan-table tbody tr:hover {
        background: #FFFCF9;
    }

    .loan-code {
        color: #4C1D95;
        font-size: 12px;
        font-weight: 800;
        white-space: nowrap;
    }

    .loan-book-title {
        max-width: 200px;
        font-weight: 700;
        line-height: 1.5;
    }

    .loan-muted {
        display: block;
        margin-top: 4px;
        color: #9B8C81;
        font-size: 11px;
    }

    .loan-status {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 6px 9px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 700;
        white-space: nowrap;
    }

    .status-active {
        background: #FFF1D9;
        color: #95651C;
    }

    .status-returned {
        background: #E6F3E6;
        color: #427849;
    }

    .loan-return-btn {
        padding: 8px 10px;
        border: 1px solid #D8C5ED;
        border-radius: 8px;
        background: white;
        color: #4C1D95;
        font-size: 11px;
        font-weight: 700;
        cursor: pointer;
        white-space: nowrap;
    }

    .loan-return-btn:hover {
        background: #F3EDFC;
    }

    .loan-done {
        color: #527B50;
        font-size: 11px;
        font-weight: 700;
        white-space: nowrap;
    }

    .loan-empty {
        padding: 55px 20px;
        text-align: center;
    }

    .loan-empty-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 64px;
        height: 64px;
        margin: 0 auto 15px;
        border-radius: 18px;
        background: #EEE7FA;
        color: #4C1D95;
        font-size: 27px;
    }

    .loan-empty h3 {
        margin-bottom: 8px;
        font-size: 17px;
        font-weight: 800;
    }

    .loan-empty p {
        margin-bottom: 18px;
        color: #95857A;
        font-size: 13px;
    }

    .loan-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 15px;
        padding: 16px 22px;
        border-top: 1px solid #F0E8E1;
        background: #FFFCF9;
        color: #95857A;
        font-size: 12px;
    }

    .loan-footer nav p {
        margin: 0;
    }

    .loan-footer nav span,
    .loan-footer nav a {
        font-size: 12px;
    }

    .loan-alert {
        margin-bottom: 20px;
        padding: 13px 16px;
        border-radius: 10px;
        font-size: 13px;
    }

    @media (max-width: 760px) {
        .loan-hero {
            padding: 24px;
        }

        .loan-hero-icon {
            display: none;
        }

        .loan-stats {
            grid-template-columns: 1fr;
        }

        .loan-card-header {
            align-items: flex-start;
            flex-direction: column;
        }

        .loan-filter {
            align-items: stretch;
            flex-direction: column;
        }

        .loan-footer {
            align-items: flex-start;
            flex-direction: column;
        }
    }
</style>

<div class="loan-page">

    {{-- HERO --}}
    <section class="loan-hero">
        <div>
            <div class="loan-eyebrow">
                <i class="bi bi-journal-bookmark-fill"></i>
                SIPUS-Del Library
            </div>

            <h1>Data Peminjaman</h1>

            <p>
                Pantau sirkulasi buku perpustakaan Kampus Del,
                cari data peminjam, dan kelola pengembalian buku
                dalam satu halaman.
            </p>
        </div>

        <div class="loan-hero-icon">
            <i class="bi bi-journal-arrow-up"></i>
        </div>
    </section>

    {{-- NOTIFIKASI --}}
    @if (session('success'))
        <div class="alert alert-success loan-alert">
            <i class="bi bi-check-circle-fill me-2"></i>
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger loan-alert">
            <i class="bi bi-exclamation-circle-fill me-2"></i>
            {{ session('error') }}
        </div>
    @endif

   {{-- STATISTIK --}}
<section class="loan-stats">
    <article class="loan-stat">
        <div class="loan-stat-icon icon-purple">
            <i class="bi bi-journal-text"></i>
        </div>
        <div>
            <div class="loan-stat-label">Total Peminjaman</div>
            <div class="loan-stat-value">
                {{ $totalPeminjaman }}
            </div>
        </div>
    </article>

    <article class="loan-stat">
        <div class="loan-stat-icon icon-peach">
            <i class="bi bi-hourglass-split"></i>
        </div>
        <div>
            <div class="loan-stat-label">Dipinjam</div>
            <div class="loan-stat-value">
                {{ $totalDipinjam }}
            </div>
        </div>
    </article>

    <article class="loan-stat">
        <div class="loan-stat-icon icon-green">
            <i class="bi bi-check2-circle"></i>
        </div>
        <div>
            <div class="loan-stat-label">Sudah Dikembalikan</div>
            <div class="loan-stat-value">
                {{ $totalDikembalikan }}
            </div>
        </div>
    </article>
</section>

    {{-- DAFTAR PEMINJAMAN --}}
    <section class="loan-card">

        <header class="loan-card-header">
            <div>
                <h2>
                    <i class="bi bi-list-ul me-2" style="color:#4C1D95"></i>
                    Daftar Peminjaman
                </h2>
                <p>Data transaksi peminjaman dan pengembalian buku.</p>
            </div>

            <a href="{{ route('peminjaman.create') }}" class="loan-primary-btn">
                <i class="bi bi-plus-lg"></i>
                Tambah Peminjaman
            </a>
        </header>

        {{-- PENCARIAN DAN FILTER --}}
        <form action="{{ route('peminjaman.index') }}" method="GET" class="loan-filter">
            <div class="loan-search">
                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Cari kode pinjam, NIM, atau nama peminjam..."
                >
            </div>

            <div style="min-width:160px">
                <select name="status">
                    <option value="">Semua Status</option>
                    <option value="dipinjam" @selected(request('status') === 'dipinjam')>
                        Sedang Dipinjam
                    </option>
                    <option value="dikembalikan" @selected(request('status') === 'dikembalikan')>
                        Dikembalikan
                    </option>
                </select>
            </div>

            <button type="submit" class="loan-primary-btn">
                <i class="bi bi-search"></i>
                Cari
            </button>

            @if (request()->filled('search') || request()->filled('status'))
                <a href="{{ route('peminjaman.index') }}" class="loan-reset">
                    Reset
                </a>
            @endif
        </form>

        {{-- TABEL --}}
        <div class="loan-table-wrap">
            <table class="loan-table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Kode Pinjam</th>
                        <th>Informasi Buku</th>
                        <th>Peminjam</th>
                        <th>Tanggal Pinjam</th>
                        <th>Jatuh Tempo</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($peminjamans as $index => $peminjaman)
                        <tr>
                            <td>
                                {{ $peminjamans->firstItem() + $index }}
                            </td>

                            <td>
                                <span class="loan-code">
                                    {{ $peminjaman->kode_pinjam }}
                                </span>
                            </td>

                            <td>
                                <div class="loan-book-title">
                                    {{ $peminjaman->buku?->judul ?? 'Buku tidak ditemukan' }}
                                </div>
                                <span class="loan-muted">
                                    ID Buku: {{ $peminjaman->buku_id }}
                                </span>
                            </td>

                            <td>
                                <strong>{{ $peminjaman->nama_peminjam }}</strong>
                                <span class="loan-muted">
                                    NIM: {{ $peminjaman->nim_peminjam }}
                                </span>
                            </td>

                            <td>
                                {{ $peminjaman->tanggal_pinjam?->format('d/m/Y') ?? '-' }}
                            </td>

                            <td>
                                {{ $peminjaman->tanggal_jatuh_tempo?->format('d/m/Y') ?? '-' }}
                            </td>

                            <td>
                                @if ($peminjaman->status === 'dipinjam')
                                    <span class="loan-status status-active">
                                        <i class="bi bi-clock"></i>
                                        Dipinjam
                                    </span>
                                @else
                                    <span class="loan-status status-returned">
                                        <i class="bi bi-check-circle"></i>
                                        Dikembalikan
                                    </span>

                                    @if ($peminjaman->tanggal_kembali)
                                        <span class="loan-muted">
                                            {{ $peminjaman->tanggal_kembali->format('d/m/Y') }}
                                        </span>
                                    @endif
                                @endif
                            </td>

                            <td>
                                @if ($peminjaman->status === 'dipinjam')
                                    <form
                                        action="{{ route('peminjaman.kembalikan', $peminjaman) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin buku ini sudah dikembalikan?')"
                                    >
                                        @csrf
                                        @method('PATCH')

                                        <button type="submit" class="loan-return-btn">
                                            <i class="bi bi-arrow-return-left me-1"></i>
                                            Kembalikan
                                        </button>
                                    </form>
                                @else
                                    <span class="loan-done">
                                        <i class="bi bi-check-circle-fill me-1"></i>
                                        Selesai
                                    </span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8">
                                <div class="loan-empty">
                                    <div class="loan-empty-icon">
                                        <i class="bi bi-journal-x"></i>
                                    </div>

                                    <h3>
                                        @if (request()->filled('search') || request()->filled('status'))
                                            Data tidak ditemukan
                                        @else
                                            Belum Ada Peminjaman
                                        @endif
                                    </h3>

                                    <p>
                                        @if (request()->filled('search') || request()->filled('status'))
                                            Coba ubah kata pencarian atau filter status.
                                        @else
                                            Belum ada transaksi peminjaman yang tercatat.
                                            Tambahkan peminjaman pertama untuk memulai.
                                        @endif
                                    </p>

                                    @if (request()->filled('search') || request()->filled('status'))
                                        <a href="{{ route('peminjaman.index') }}" class="loan-primary-btn">
                                            Tampilkan Semua Data
                                        </a>
                                    @else
                                        <a href="{{ route('peminjaman.create') }}" class="loan-primary-btn">
                                            <i class="bi bi-plus-lg"></i>
                                            Tambah Peminjaman
                                        </a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- PAGINATION --}}
        @if ($peminjamans->hasPages())
            <footer class="loan-footer">
                <div>
                    Menampilkan {{ $peminjamans->firstItem() }}
                   – {{ $peminjamans->lastItem() }}
                    dari {{ $peminjamans->total() }} data
                </div>

                <div>
                    {{ $peminjamans->links() }}
                </div>
            </footer>
        @endif

    </section>
</div>

</x-layout>
