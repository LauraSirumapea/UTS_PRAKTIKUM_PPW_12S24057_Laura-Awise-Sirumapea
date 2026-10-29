<x-layout title="Detail Equipment">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold text-del mb-1">Detail Equipment</h2>
            <p class="text-muted mb-0">
                Informasi lengkap equipment
            </p>
        </div>

        <div class="d-flex gap-2">
            <a
                href="{{ route('equipment.edit', $equipment) }}"
                class="btn btn-warning">
                Edit
            </a>

            <a
                href="{{ route('equipment.index') }}"
                class="btn btn-secondary">
                Kembali
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">

            <div class="row mb-3">
                <div class="col-md-3 fw-bold">Asset Code</div>
                <div class="col-md-9">{{ $equipment->asset_code }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-md-3 fw-bold">Nama Equipment</div>
                <div class="col-md-9">{{ $equipment->nama_equipment }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-md-3 fw-bold">Kategori</div>
                <div class="col-md-9">
                    {{ $equipment->kategori->nama_kategori }}
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-3 fw-bold">Spesifikasi</div>
                <div class="col-md-9">{{ $equipment->spesification }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-md-3 fw-bold">Kondisi</div>
                <div class="col-md-9">{{ $equipment->condition }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-md-3 fw-bold">Kategori</div>
                <div class="col-md-9">
                    {{ $equipment->kategori->nama_kategori }}
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-3 fw-bold">Stok</div>
                <div class="col-md-9">
                    <span class="badge bg-secondary">
                        {{ $equipment->stok }}
                    </span>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3 fw-bold">Sinopsis</div>
                <div class="col-md-9">
                    {{ $equipment->sinopsis ?: '-' }}
                </div>
            </div>

        </div>
    </div>

</x-layout>