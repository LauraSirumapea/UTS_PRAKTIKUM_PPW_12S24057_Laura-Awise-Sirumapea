<x-layout title="Edit Kategori">

    <div class="mb-4">
        <h2 class="fw-bold text-del">Edit Kategori</h2>
        <p class="text-muted">
            Perbarui informasi kategori buku.
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

            <form
                action="{{ route('kategori.update', $kategori) }}"
                method="POST">

                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="kode_kategori" class="form-label">
                        Kode Kategori
                    </label>

                    <input
                        type="text"
                        id="kode_kategori"
                        name="kode_kategori"
                        value="{{ old('kode_kategori', $kategori->kode_kategori) }}"
                        class="form-control @error('kode_kategori') is-invalid @enderror"
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
                        value="{{ old('nama_kategori', $kategori->nama_kategori) }}"
                        class="form-control @error('nama_kategori') is-invalid @enderror"
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
                        Batal
                    </a>

                    <button
                        type="submit"
                        class="btn btn-del">
                        Simpan Perubahan
                    </button>
                </div>

            </form>

        </div>
    </div>

</x-layout>