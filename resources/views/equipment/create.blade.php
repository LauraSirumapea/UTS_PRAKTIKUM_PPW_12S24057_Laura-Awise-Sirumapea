<x-layout title="Tambah Equipment">

    <div class="mb-4">
        <h2 class="fw-bold text-del">Tambah Equipment</h2>
        <p class="text-muted">
            Tambahkan koleksi equipment baru ke delLab.
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

            <form action="{{ route('equipment.store') }}" method="POST">

                @csrf

                <div class="mb-3">
                    <label for="aset_code" class="form-label">
                        Aset Code
                    </label>

                    <input
                        type="text"
                        id="aset_code"
                        name="aset_code"
                        value="{{ old('aset_code') }}"
                        class="form-control @error('aset_code') is-invalid @enderror"
                        placeholder="Contoh: EQP-001"
                        required>

                    @error('aset_code')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">
                        Name Equipment
                    </label>

                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name') }}"
                        class="form-control @error('name') is-invalid @enderror"
                        required>

                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="spesification" class="form-label">
                        Spesification
                    </label>

                    <input
                        type="text"
                        id="spesification"
                        name="spesification"
                        value="{{ old('spesification') }}"
                        class="form-control @error('spesification') is-invalid @enderror"
                        required>

                    @error('spesification')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="condition" class="form-label">
                        Condition
                    </label>

                    <input
                        type="text"
                        id="condition"
                        name="condition"
                        value="{{ old('condition') }}"
                        class="form-control @error('condition') is-invalid @enderror"
                        required>

                    @error('condition')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="daily_rental_fee" class="form-label">
                        daily_rental_fee
                    </label>

                    <input
                        type="number"
                        id="daily_rental_fee"
                        name="daily_rental_fee"
                        value="{{ old('daily_rental_fee') }}"
                        class="form-control @error('daily_rental_fee') is-invalid @enderror"
                        min="0"
                        step="0.01"
                        required>

                    @error('daily_rental_fee')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="kategori_id" class="form-label">
                        Kategori
                    </label>

                    <select
                        id="kategori_id"
                        name="kategori_id"
                        class="form-select @error('kategori_id') is-invalid @enderror"
                        required>

                        <option value="">-- Pilih Kategori --</option>

                        @foreach ($kategoris as $kategori)
                            <option
                                value="{{ $kategori->id }}"
                                {{ old('kategori_id') == $kategori->id ? 'selected' : '' }}>
                                {{ $kategori->nama_kategori }}
                            </option>
                        @endforeach

                    </select>

                    @error('kategori_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="stok" class="form-label">
                        Stok
                    </label>

                    <input
                        type="number"
                        id="stok"
                        name="stok"
                        value="{{ old('stok', 0) }}"
                        class="form-control @error('stok') is-invalid @enderror"
                        min="0"
                        required>

                    @error('stok')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="image_path" class="form-label">
                        Image Path
                    </label>

                    <textarea
                        id="image_path"
                        name="image_path"
                        rows="5"
                        class="form-control @error('image_path') is-invalid @enderror">{{ old('image_path') }}</textarea>

                    @error('image_path')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="d-flex gap-2">
                    <a
                        href="{{ route('equipment.index') }}"
                        class="btn btn-secondary">
                        Kembali
                    </a>

                    <button
                        type="submit"
                        class="btn btn-del">
                        Simpan Equipment
                    </button>
                </div>

            </form>

        </div>
    </div>

</x-layout>
