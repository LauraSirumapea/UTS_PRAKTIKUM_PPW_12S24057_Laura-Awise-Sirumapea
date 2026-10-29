<x-layout title="Tambah Kategori">

    <div class="mb-4">
        <h2 class="fw-bold text-del">Tambah Kategori</h2>
        <p class="text-muted">
            Tambahkan kategori buku baru ke SIPUS-Del.
        </p>
    </div>

    <div class="card">
        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Periksa kembali data berikut:</strong>

                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('kategori.store') }}" method="POST">

                @csrf

                <div class="mb-3">
                    <label for="kode_kategori" class="form-label">
                        Kode Kategori
                    </label>

                    <input
                        type="text"
                        id="kode_kategori"
                        name="kode_kategori"
                        value="{{ old('kode_kategori') }}"
                        class="form-control @error('kode_kategori') is-invalid @enderror"
                        placeholder="Contoh: KAT-001"
                        required>

                    @error('kode_kategori')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="nama_kategori" class="form-label">
                        Nama Kategori
                    </label>

                    <input
                        type="text"
                        id="nama_kategori"
                        name="nama_kategori"
                        value="{{ old('nama_kategori') }}"
                        class="form-control @error('nama_kategori') is-invalid @enderror"
                        placeholder="Contoh: Teknologi"
                        required>

                    @error('nama_kategori')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="d-flex gap-2">
                    <a
                        href="{{ route('kategori.index') }}"
                        class="btn btn-secondary">
                        Kembali
                    </a>

                    <button
                        type="submit"
                        class="btn btn-del">
                        Simpan Kategori
                    </button>
                </div>

            </form>

        </div>
    </div>

</x-layout>