<x-layout title="Daftar Equipment">

    {{-- Bootstrap Icons --}}
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >

    <style>
        /* =====================================================
           del-Lab EQUIPMENT PAGE
        ===================================================== */

        .library-page {
            max-width: 1160px;
            margin: 0 auto;
        }

        /* =====================================================
           HERO
        ===================================================== */

        .library-hero {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 35px;

            padding: 30px 34px;
            margin-bottom: 22px;

            background:
                linear-gradient(
                    120deg,
                    #FFFDF9 0%,
                    #F8EDE1 58%,
                    #F2D7CC 100%
                );

            border: 1px solid #E8D8C9;
            border-radius: 20px;

            box-shadow:
                0 8px 28px rgba(73, 55, 43, 0.07);

            overflow: hidden;
            position: relative;
        }

        .library-hero::after {
            content: "";

            position: absolute;
            right: -55px;
            top: -70px;

            width: 210px;
            height: 210px;

            border-radius: 50%;

            background: rgba(76, 29, 149, 0.06);
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 7px;

            margin-bottom: 10px;
            padding: 5px 10px;

            border: 1px solid #E3CDBB;
            border-radius: 20px;

            background: rgba(255, 255, 255, 0.72);

            color: #8B6248;

            font-size: 0.72rem;
            font-weight: 700;

            letter-spacing: 0.04em;
            text-transform: uppercase;
        }

        .hero-eyebrow i {
            color: #4C1D95;
        }

        .library-hero h1 {
            margin: 0 0 7px;

            color: #49372B;

            font-size: 2rem;
            font-weight: 750;

            letter-spacing: -0.7px;
        }

        .library-hero p {
            max-width: 620px;

            margin: 0;

            color: #76685E;

            font-size: 0.91rem;
            line-height: 1.65;
        }

        .hero-illustration {
            position: relative;
            z-index: 2;

            display: flex;
            align-items: center;
            justify-content: center;

            width: 115px;
            height: 115px;

            flex-shrink: 0;

            border-radius: 50%;

            background: rgba(255, 255, 255, 0.62);

            border: 1px solid rgba(184, 111, 82, 0.18);
        }

        .hero-illustration i {
            color: #4C1D95;

            font-size: 3rem;
        }

        /* =====================================================
           STATISTICS
        ===================================================== */

        .stats-grid {
            display: grid;

            grid-template-columns: repeat(3, 1fr);

            gap: 14px;

            margin-bottom: 22px;
        }

        .stat-card {
            display: flex;
            align-items: center;

            gap: 14px;

            padding: 17px 18px;

            background: #FFFFFF;

            border: 1px solid #E9DED4;
            border-radius: 14px;

            box-shadow:
                0 5px 18px rgba(73, 55, 43, 0.045);
        }

        .stat-icon {
            display: flex;
            align-items: center;
            justify-content: center;

            width: 42px;
            height: 42px;

            flex-shrink: 0;

            border-radius: 11px;

            font-size: 1.05rem;
        }

        .stat-icon.brown {
            color: #8B6248;
            background: #F3E5D0;
        }

        .stat-icon.rose {
            color: #A6675D;
            background: #F5E4E1;
        }

        .stat-icon.green {
            color: #64805D;
            background: #E7F0E4;
        }

        .stat-label {
            color: #8C8078;

            font-size: 0.72rem;

            margin-bottom: 2px;
        }

        .stat-value {
            color: #49372B;

            font-size: 1.25rem;
            font-weight: 750;

            line-height: 1.1;
        }

        /* =====================================================
           COLLECTION CONTAINER
        ===================================================== */

        .collection-container {
            background: #FFFFFF;

            border: 1px solid #E7DED7;
            border-radius: 18px;

            box-shadow:
                0 8px 25px rgba(73, 55, 43, 0.055);

            overflow: hidden;
        }

        /* =====================================================
           COLLECTION HEADER
        ===================================================== */

        .collection-header {
            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 20px;

            padding: 19px 22px;

            border-bottom: 1px solid #EEE7E1;
        }

        .collection-heading {
            display: flex;
            align-items: center;

            gap: 11px;
        }

        .collection-icon {
            display: flex;
            align-items: center;
            justify-content: center;

            width: 39px;
            height: 39px;

            border-radius: 10px;

            color: #4C1D95;
            background: #EEE7FA;
        }

        .collection-heading h2 {
            margin: 0;

            color: #49372B;

            font-size: 1rem;
            font-weight: 750;
        }

        .collection-heading p {
            margin: 2px 0 0;

            color: #968A82;

            font-size: 0.72rem;
        }

        /* =====================================================
           ADD BUTTON
        ===================================================== */

        .btn-add {
            display: inline-flex;
            align-items: center;

            gap: 7px;

            padding: 9px 14px;

            border-radius: 9px;

            color: #FFFFFF;

            background:
                linear-gradient(
                    135deg,
                    #4C1D95,
                    #6D3BC1
                );

            text-decoration: none;

            font-size: 0.78rem;
            font-weight: 700;

            box-shadow:
                0 5px 13px rgba(76, 29, 149, 0.20);

            transition: all 0.2s ease;
        }

        .btn-add:hover {
            color: #FFFFFF;

            transform: translateY(-1px);

            box-shadow:
                0 7px 16px rgba(76, 29, 149, 0.28);
        }

        /* =====================================================
           SEARCH & FILTER
        ===================================================== */

        .search-filter {
            padding: 16px 20px;

            background: #FCFAF8;

            border-bottom: 1px solid #EEE7E1;
        }

        .search-filter-form {
            display: flex;
            align-items: center;

            gap: 9px;

            width: 100%;
        }

        .search-box {
            position: relative;

            flex: 1;
        }

        .search-box i {
            position: absolute;

            left: 13px;
            top: 50%;

            transform: translateY(-50%);

            color: #9B8A7E;

            font-size: 0.85rem;

            pointer-events: none;
        }

        .search-box input {
            width: 100%;
            height: 38px;

            padding: 0 13px 0 36px;

            border: 1px solid #DDD1C7;

            border-radius: 8px;

            outline: none;

            background: #FFFFFF;

            color: #49372B;

            font-size: 0.76rem;

            transition: all 0.2s ease;
        }

        .search-box input::placeholder {
            color: #A89B92;
        }

        .search-box input:focus {
            border-color: #4C1D95;

            box-shadow:
                0 0 0 3px rgba(76, 29, 149, 0.09);
        }

        .category-filter {
            position: relative;

            display: flex;
            align-items: center;
        }

        .category-filter i {
            position: absolute;

            left: 12px;

            color: #4C1D95;

            font-size: 0.78rem;

            pointer-events: none;
        }

        .category-filter select {
            height: 38px;

            min-width: 175px;

            padding: 0 30px 0 32px;

            border: 1px solid #DDD1C7;

            border-radius: 8px;

            outline: none;

            background: #FFFFFF;

            color: #5F5046;

            font-size: 0.76rem;

            cursor: pointer;
        }

        .category-filter select:focus {
            border-color: #4C1D95;

            box-shadow:
                0 0 0 3px rgba(76, 29, 149, 0.09);
        }

        .btn-search {
            height: 38px;

            padding: 0 15px;

            border: none;

            border-radius: 8px;

            background: #4C1D95;

            color: #FFFFFF;

            font-size: 0.75rem;

            font-weight: 700;

            cursor: pointer;

            transition: all 0.2s ease;
        }

        .btn-search:hover {
            background: #3B1478;

            transform: translateY(-1px);
        }

        .btn-reset {
            display: inline-flex;

            align-items: center;
            justify-content: center;

            gap: 5px;

            height: 38px;

            padding: 0 12px;

            border: 1px solid #D9CCC1;

            border-radius: 8px;

            background: #FFFFFF;

            color: #75685E;

            text-decoration: none;

            font-size: 0.73rem;

            font-weight: 650;

            white-space: nowrap;
        }

        .btn-reset:hover {
            color: #4C1D95;

            background: #F8F3FB;

            border-color: #C9B8DF;
        }

        /* =====================================================
           TABLE
        ===================================================== */

        .table-scroll {
            overflow-x: auto;
        }

        .library-table {
            width: 100%;

            margin: 0;

            border-collapse: collapse;
        }

        .library-table thead th {
            padding: 12px 16px;

            background: #FBF7F2;

            color: #796454;

            border-bottom: 1px solid #E9DED4;

            font-size: 0.68rem;

            font-weight: 750;

            text-transform: uppercase;

            letter-spacing: 0.055em;

            white-space: nowrap;
        }

        .library-table tbody td {
            padding: 14px 16px;

            color: #655950;

            border-bottom: 1px solid #F2ECE7;

            font-size: 0.8rem;

            vertical-align: middle;
        }

        .library-table tbody tr {
            transition: background 0.15s ease;
        }

        .library-table tbody tr:hover {
            background: #FFFCF8;
        }

        .library-table tbody tr:last-child td {
            border-bottom: none;
        }

        /* =====================================================
           NUMBER
        ===================================================== */

        .equipment-number {
            width: 48px;

            color: #AA9B90 !important;

            font-size: 0.72rem !important;

            font-weight: 650;
        }

        /* =====================================================
           EQUIPMENT INFORMATION
        ===================================================== */

        .equipment-info {
            min-width: 220px;
        }

        .equipment-title {
            color: #45372E;

            font-size: 0.83rem;

            font-weight: 700;

            line-height: 1.35;
        }

        .equipment-isbn {
            margin-top: 3px;

            color: #A09288;

            font-size: 0.68rem;
        }

        .equipment-author {
            color: #62564E;

            font-weight: 500;
        }

        /* =====================================================
           CATEGORY
        ===================================================== */

        .category-pill {
            display: inline-flex;
            align-items: center;

            gap: 5px;

            padding: 5px 8px;

            border-radius: 7px;

            color: #8E5D55;

            background: #F6E7E4;

            font-size: 0.68rem;

            font-weight: 700;

            white-space: nowrap;
        }

        .category-pill i {
            font-size: 0.62rem;
        }

        /* =====================================================
           STOCK
        ===================================================== */

        .stock-pill {
            display: inline-flex;
            align-items: center;
            justify-content: center;

            min-width: 32px;

            padding: 5px 8px;

            border-radius: 7px;

            color: #166534;

            background: #DCFCE7;

            font-size: 0.68rem;

            font-weight: 750;
        }

        .stock-pill.borrowed {
            color: #854D0E,;

            background: #FEF9C3,;
        }

        .stock-pill.repaired {
            color: #991B1B;

            background: #FEE2E2;
        }

        /* =====================================================
           ACTIONS
        ===================================================== */

        .actions {
            display: flex;
            align-items: center;

            gap: 5px;

            white-space: nowrap;
        }

        .action {
            display: inline-flex;
            align-items: center;
            justify-content: center;

            gap: 4px;

            padding: 6px 8px;

            border-radius: 7px;

            background: #FFFFFF;

            font-size: 0.67rem;

            font-weight: 650;

            transition: all 0.15s ease;
        }

        .action-detail {
            color: #75685E;

            border: 1px solid #DCCFC4;
        }

        .action-detail:hover {
            color: #49372B;

            background: #F8F0E8;
        }

        .action-edit {
            color: #A2694E;

            border: 1px solid #E2BEAA;
        }

        .action-edit:hover {
            color: #8F593F;

            background: #FFF1E9;
        }

        .action-delete {
            color: #A15C55;

            border: 1px solid #E3B9B4;
        }

        .action-delete:hover {
            color: #8D4B45;

            background: #FBEAE8;
        }

        /* =====================================================
           PAGINATION
        ===================================================== */

        .collection-footer {
            display: flex;

            align-items: center;
            justify-content: space-between;

            gap: 20px;

            padding: 14px 20px;

            background: #FFFCF9;

            border-top: 1px solid #F0E9E3;
        }

        .result-info {
            color: #968A82;

            font-size: 0.7rem;
        }

        /* =====================================================
           EMPTY STATE
        ===================================================== */

        .empty-state {
            padding: 55px 20px;

            text-align: center;
        }

        .empty-icon {
            display: flex;

            align-items: center;
            justify-content: center;

            width: 58px;
            height: 58px;

            margin: 0 auto 13px;

            border-radius: 15px;

            color: #4C1D95;

            background: #EEE7FA;

            font-size: 1.4rem;
        }

        .empty-state h3 {
            margin-bottom: 5px;

            color: #49372B;

            font-size: 0.98rem;
        }

        .empty-state p {
            margin-bottom: 17px;

            color: #91847B;

            font-size: 0.78rem;
        }

        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media (max-width: 800px) {

            .library-hero {
                padding: 25px;
            }

            .hero-illustration {
                display: none;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .collection-header {
                align-items: flex-start;

                flex-direction: column;
            }

            .btn-add {
                width: 100%;

                justify-content: center;
            }

            .search-filter-form {
                align-items: stretch;

                flex-direction: column;
            }

            .search-box {
                width: 100%;
            }

            .category-filter select {
                width: 100%;
            }

            .btn-search,
            .btn-reset {
                width: 100%;
            }

            .collection-footer {
                align-items: flex-start;

                flex-direction: column;
            }
        }
    </style>


    <div class="library-page">

        {{-- =================================================
             HERO
        ================================================== --}}

        <section class="library-hero">

            <div class="hero-content">

                <div class="hero-eyebrow">
                    <i class="bi bi-book-half"></i>
                    SIPUS-Del Library
                </div>

                <h1>
                    Koleksi Buku
                </h1>

                <p>
                    Kelola koleksi perpustakaan Kampus Del
                    secara terorganisir, sederhana, dan mudah
                    dipantau.
                </p>

            </div>


            <div class="hero-illustration">
                <i class="bi bi-bookshelf"></i>
            </div>

        </section>


        {{-- =================================================
             STATISTICS
        ================================================== --}}

        <section class="stats-grid">

            <article class="stat-card">

                <div class="stat-icon brown">
                    <i class="bi bi-book"></i>
                </div>

                <div>

                    <div class="stat-label">
                        Total Buku
                    </div>

                    <div class="stat-value">
                        {{ $totalBuku }}
                    </div>

                </div>

            </article>


            <article class="stat-card">

                <div class="stat-icon rose">
                    <i class="bi bi-tags"></i>
                </div>

                <div>

                    <div class="stat-label">
                        Total Kategori
                    </div>

                    <div class="stat-value">
                        {{ $totalKategori }}
                    </div>

                </div>

            </article>


            <article class="stat-card">

                <div class="stat-icon green">
                    <i class="bi bi-box-seam"></i>
                </div>

                <div>

                    <div class="stat-label">
                        Total Stok
                    </div>

                    <div class="stat-value">
                        {{ $totalStok }}
                    </div>

                </div>

            </article>

        </section>


        {{-- =================================================
             COLLECTION
        ================================================== --}}

        <section class="collection-container">

            {{-- COLLECTION HEADER --}}

            <header class="collection-header">

                <div class="collection-heading">

                    <div class="collection-icon">
                        <i class="bi bi-journals"></i>
                    </div>

                    <div>

                        <h2>
                            Daftar Koleksi
                        </h2>

                        <p>
                            Koleksi buku yang tersimpan di SIPUS-Del
                        </p>

                    </div>

                </div>


                <a
                    href="{{ route('buku.create') }}"
                    class="btn-add"
                >
                    <i class="bi bi-plus-lg"></i>
                    Tambah Buku
                </a>

            </header>


            {{-- =================================================
                 SEARCH & FILTER
            ================================================== --}}

            <div class="search-filter">

                <form
                    action="{{ route('buku.index') }}"
                    method="GET"
                    class="search-filter-form"
                >

                    {{-- SEARCH --}}

                    <div class="search-box">

                        <i class="bi bi-search"></i>

                        <input
                            type="text"
                            name="search"
                            value="{{ $search }}"
                            placeholder="Cari judul, ISBN, atau penulis..."
                            autocomplete="off"
                        >

                    </div>


                    {{-- CATEGORY FILTER --}}

                    <div class="category-filter">

                        <i class="bi bi-funnel"></i>

                        <select name="kategori_id">

                            <option value="">
                                Semua Kategori
                            </option>

                            @foreach ($kategoris as $kategori)

                                <option
                                    value="{{ $kategori->id }}"
                                    {{ (string) $kategoriId === (string) $kategori->id ? 'selected' : '' }}
                                >
                                    {{ $kategori->nama_kategori }}
                                </option>

                            @endforeach

                        </select>

                    </div>


                    {{-- SEARCH BUTTON --}}

                    <button
                        type="submit"
                        class="btn-search"
                    >
                        <i class="bi bi-search"></i>
                        Cari
                    </button>


                    {{-- RESET --}}

                    @if ($search || $kategoriId)

                        <a
                            href="{{ route('buku.index') }}"
                            class="btn-reset"
                        >
                            <i class="bi bi-arrow-counterclockwise"></i>
                            Reset
                        </a>

                    @endif

                </form>

            </div>


            {{-- =================================================
                 TABLE
            ================================================== --}}

            <div class="table-scroll">

                @forelse ($equipments as $index => $equipment)

                    @if ($loop->first)

                        <table class="library-table">

                            <thead>

                                <tr>

                                    <th>
                                        No
                                    </th>

                                    <th>
                                        Ases_code
                                    </th>

                                    <th>
                                        Nama_Equipment
                                    </th>

                                    <th>
                                        Kategori
                                    </th>

                                    <th>
                                        Spesification
                                    </th>

                                    <th>
                                        Condition
                                    </th>

                                    <th>
                                        Stock
                                    </th>
                                    
                                    <th>
                                        Daily_Rental_Fee
                                    </th>

                                    <th>
                                        Image_Path
                                    </th>

                                </tr>

                            </thead>

                            <tbody>

                    @endif


                                <tr>

                                    {{-- NUMBER --}}

                                    <td class="equipment-number">
                                        {{ $equipments->firstItem() + $index }}
                                    </td>


                                    {{-- EQUIPMENT --}}

                                    <td class="equipment-info">

                                        <div class="equipment-title">
                                            {{ $equipment->nama_equipment }}
                                        </div>

                                        <div class="equipment-isbn">
                                            ISBN {{ $equipment->asset_code }}
                                        </div>

                                    </td>

                                    {{-- CATEGORY --}}

                                    <td>

                                        <span class="category-pill">

                                            <i class="bi bi-bookmark-fill"></i>

                                            {{ $equipment->kategori->nama_kategori ?? 'Tanpa kategori' }}

                                        </span>

                                    </td>


                                    {{-- DAILY RENTAL FEE--}}

                                    <td>
                                        {{ $equipment->daily_rental_fee }}
                                    </td>


                                    {{-- STOCK --}}

                                    <td>

                                        <span
                                            class="stock-pill {{ $equipment->stok == 0 ? 'empty' : '' }}"
                                        >
                                            {{ $equipment->stok }}
                                        </span>

                                    </td>


                                    {{-- ACTIONS --}}

                                    <td>

                                        <div class="actions">

                                            <a
                                                href="{{ route('equipment.show', $equipment) }}"
                                                class="action action-detail"
                                                title="Lihat detail equipment"
                                            >
                                                <i class="bi bi-eye"></i>
                                                Detail
                                            </a>


                                            <a
                                                href="{{ route('equipment.edit', $equipment) }}"
                                                class="action action-edit"
                                                title="Edit equipment"
                                            >
                                                <i class="bi bi-pencil"></i>
                                                Edit
                                            </a>


                                            <form
                                                action="{{ route('equipment.destroy', $equipment) }}"
                                                method="POST"
                                                class="d-inline"
                                                onsubmit="return confirm('Yakin ingin menghapus equipment ini?')"
                                            >

                                                @csrf

                                                @method('DELETE')

                                                <button
                                                    type="submit"
                                                    class="action action-delete"
                                                    title="Hapus equipment"
                                                >
                                                    <i class="bi bi-trash3"></i>
                                                    Hapus
                                                </button>

                                            </form>

                                        </div>

                                    </td>

                                </tr>


                    @if ($loop->last)

                            </tbody>

                        </table>

                    @endif

                @empty

                    {{-- =================================================
                         EMPTY / NO SEARCH RESULT
                    ================================================== --}}

                    <div class="empty-state">

                        <div class="empty-icon">

                            <i class="bi bi-journal-x"></i>

                        </div>


                        @if ($search || $kategoriId)

                            <h3>
                                Equipment tidak ditemukan
                            </h3>

                            <p>
                                Tidak ada equipment yang sesuai dengan
                                pencarian atau kategori yang dipilih.
                            </p>

                            <a
                                href="{{ route('equipment.index') }}"
                                class="btn-add"
                            >
                                <i class="bi bi-arrow-counterclockwise"></i>
                                Tampilkan Semua Equipment
                            </a>

                        @else

                            <h3>
                                Belum ada koleksi Equipment
                            </h3>

                            <p>
                                Tambahkan Equipment pertama untuk mulai
                                membangun koleksi del-Lab.
                            </p>

                            <a
                                href="{{ route('equipment.create') }}"
                                class="btn-add"
                            >
                                <i class="bi bi-plus-lg"></i>
                                Tambah Equipment
                            </a>

                        @endif

                    </div>

                @endforelse

            </div>


            {{-- =================================================
                 PAGINATION
            ================================================== --}}

            @if ($equipments->hasPages())

                <footer class="collection-footer">

                    <div class="result-info">

                        Menampilkan
                        {{ $equipments->firstItem() }}
                        –
                        {{ $equipments->lastItem() }}
                        dari
                        {{ $equipments->total() }}
                        peralatan

                    </div>

                    <div>

                        {{ $equipments->links() }}

                    </div>

                </footer>

            @endif

        </section>

    </div>

</x-layout>