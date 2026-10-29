
<x-layout title="Tambah Peminjaman">

<style>
    .form-page {
        max-width: 950px;
        margin: 0 auto;
        color: #49372B;
    }

    .form-hero {
        padding: 30px;
        margin-bottom: 24px;
        border: 1px solid #EAD8C8;
        border-radius: 20px;
        background: linear-gradient(120deg, #FFFCF7, #F3DCD0);
    }

    .form-hero .eyebrow {
        display: inline-block;
        padding: 7px 12px;
        margin-bottom: 12px;
        border: 1px solid #E7D0BC;
        border-radius: 30px;
        background: white;
        color: #4C1D95;
        font-size: 12px;
        font-weight: 700;
    }

    .form-hero h1 {
        margin: 0 0 10px;
        font-size: 30px;
        font-weight: 800;
    }

    .form-hero p {
        margin: 0;
        color: #887568;
        line-height: 1.7;
    }

    .form-card {
        padding: 28px;
        border: 1px solid #EADFD5;
        border-radius: 18px;
        background: white;
        box-shadow: 0 6px 24px rgba(73,55,43,.04);
    }

    .form-card h2 {
        margin: 0 0 6px;
        font-size: 19px;
        font-weight: 800;
    }

    .form-description {
        margin-bottom: 25px;
        color: #95857A;
        font-size: 13px;
    }

    .form-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 20px;
    }

    .field {
        margin-bottom: 20px;
    }

    .field.full {
        grid-column: 1 / -1;
    }

    .field label {
        display: block;
        margin-bottom: 8px;
        color: #594638;
        font-size: 13px;
        font-weight: 700;
    }

    .field label .required {
        color: #B45353;
    }

    .field input,
    .field select {
        display: block;
        width: 100%;
        min-height: 46px;
        padding: 11px 13px;
        border: 1px solid #E4D5C9;
        border-radius: 10px;
        background: #FFFEFC;
        color: #49372B;
        font-size: 13px;
        outline: none;
    }

    .field input:focus,
    .field select:focus {
        border-color: #8B5CC7;
        box-shadow: 0 0 0 3px rgba(76,29,149,.08);
    }

    .field small {
        display: block;
        margin-top: 7px;
        color: #95857A;
        font-size: 11px;
        line-height: 1.5;
    }

    .field .error {
        margin-top: 6px;
        color: #B42318;
        font-size: 12px;
    }

    .form-notice {
        padding: 14px 16px;
        margin-bottom: 24px;
        border: 1px solid #E7D8F5;
        border-radius: 12px;
        background: #F8F4FD;
        color: #5B3A82;
        font-size: 12px;
        line-height: 1.7;
    }

    .form-actions {
        display: flex;
        justify-content: flex-end;
        flex-wrap: wrap;
        gap: 12px;
        padding-top: 22px;
        margin-top: 8px;
        border-top: 1px solid #F0E8E1;
    }

    .btn-cancel,
    .btn-submit {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        padding: 12px 18px;
        border-radius: 10px;
        font-size: 13px;
        font-weight: 700;
        text-decoration: none;
        cursor: pointer;
    }

    .btn-cancel {
        border: 1px solid #E4D5C9;
        background: white;
        color: #79695E;
    }

    .btn-cancel:hover {
        background: #FFFCF9;
        color: #49372B;
    }

    .btn-submit {
        border: 0;
        background: #4C1D95;
        color: white;
    }

    .btn-submit:hover {
        background: #3B0764;
    }

    .empty-books {
        padding: 20px;
        border: 1px solid #F0D5D2;
        border-radius: 12px;
        background: #FFF7F6;
        color: #994B45;
        font-size: 13px;
        line-height: 1.7;
    }

    @media (max-width: 650px) {
        .form-grid {
            grid-template-columns: 1fr;
            gap: 0;
        }

        .form-card,
        .form-hero {
            padding: 22px;
        }

        .form-hero h1 {
            font-size: 25px;
        }

        .form-actions {
            flex-direction: column-reverse;
        }

        .btn-cancel,
        .btn-submit {
            width: 100%;
        }
    }
</style>

<div class="form-page">

    <section class="form-hero">
        <div class="eyebrow">
            <i class="bi bi-journal-plus me-1"></i>
            SIPUS-Del Library
        </div>

        <h1>Tambah Peminjaman</h1>

        <p>
            Catat transaksi peminjaman buku dengan memasukkan
            informasi buku dan identitas mahasiswa.
        </p>
    </section>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Data belum dapat disimpan.</strong>
            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <section class="form-card">
        <h2>
            <i class="bi bi-pencil-square me-2" style="color:#4C1D95"></i>
            Informasi Peminjaman
        </h2>

        <p class="form-description">
            Isi seluruh kolom bertanda bintang (*) dengan benar.
        </p>

        @if ($bukus->isEmpty())
            <div class="empty-books">
                <strong><i class="bi bi-exclamation-circle me-1"></i> Tidak ada buku tersedia.</strong>
                <br>
                Semua buku mungkin sedang habis. Tambahkan stok buku terlebih dahulu melalui menu Buku.
                <div class="mt-3">
                    <a href="{{ route('buku.index') }}" class="btn-cancel">
                        <i class="bi bi-book"></i>
                        Kembali ke Daftar Buku
                    </a>
                </div>
            </div>
        @else
            <div class="form-notice">
                <i class="bi bi-info-circle-fill me-1"></i>
                Stok buku akan berkurang satu setelah peminjaman berhasil disimpan.
                Sistem menolak peminjaman apabila stok habis atau mahasiswa masih memiliki
                peminjaman aktif untuk buku yang sama.
            </div>

            <form action="{{ route('peminjaman.store') }}" method="POST">
                @csrf

                <div class="form-grid">

                    <div class="field full">
                        <label for="buku_id">
                            Pilih Buku <span class="required">*</span>
                        </label>

                        <select id="buku_id" name="buku_id" required>
                            <option value="">-- Pilih buku yang tersedia --</option>

                            @foreach ($bukus as $buku)
                                <option
                                    value="{{ $buku->id }}"
                                    @selected((string) old('buku_id') === (string) $buku->id)
                                >
                                    {{ $buku->judul }} — Stok: {{ $buku->stok }}
                                </option>
                            @endforeach
                        </select>

                        <small>Hanya buku dengan stok lebih dari nol yang ditampilkan.</small>

                        @error('buku_id')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="nim_peminjam">
                            NIM Mahasiswa <span class="required">*</span>
                        </label>

                        <input
                            type="text"
                            id="nim_peminjam"
                            name="nim_peminjam"
                            value="{{ old('nim_peminjam') }}"
                            maxlength="20"
                            placeholder="Contoh: 12S24057"
                            autocomplete="off"
                            required
                        >

                        @error('nim_peminjam')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="nama_peminjam">
                            Nama Mahasiswa <span class="required">*</span>
                        </label>

                        <input
                            type="text"
                            id="nama_peminjam"
                            name="nama_peminjam"
                            value="{{ old('nama_peminjam') }}"
                            maxlength="100"
                            placeholder="Masukkan nama mahasiswa"
                            required
                        >

                        @error('nama_peminjam')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="tanggal_pinjam">
                            Tanggal Peminjaman <span class="required">*</span>
                        </label>

                        <input
                            type="date"
                            id="tanggal_pinjam"
                            name="tanggal_pinjam"
                            value="{{ old('tanggal_pinjam', now()->format('Y-m-d')) }}"
                            required
                        >

                        @error('tanggal_pinjam')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="tanggal_jatuh_tempo">
                            Tanggal Jatuh Tempo <span class="required">*</span>
                        </label>

                        <input
                            type="date"
                            id="tanggal_jatuh_tempo"
                            name="tanggal_jatuh_tempo"
                            value="{{ old('tanggal_jatuh_tempo', now()->addDays(7)->format('Y-m-d')) }}"
                            required
                        >

                        <small>Tanggal pengembalian yang direncanakan.</small>

                        @error('tanggal_jatuh_tempo')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

                <div class="form-actions">
                    <a href="{{ route('peminjaman.index') }}" class="btn-cancel">
                        <i class="bi bi-arrow-left"></i>
                        Batal
                    </a>

                    <button type="submit" class="btn-submit">
                        <i class="bi bi-check2-circle"></i>
                        Simpan Peminjaman
                    </button>
                </div>
            </form>
        @endif
    </section>

</div>

</x-layout>
