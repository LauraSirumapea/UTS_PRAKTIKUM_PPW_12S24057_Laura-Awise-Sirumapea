<x-layout title="Daftar Kategori">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold text-del mb-1">Daftar Kategori</h2>
            <p class="text-muted mb-0">
                Kelola kategori equipement di delLab.
            </p>
        </div>

        <a href="{{ route('kategori.create') }}" class="btn btn-del">
            + Tambah Kategori
        </a>
    </div>

    <div class="card">
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Kategori</th>
                            <th>Nama Kategori</th>
                            <th>Jumlah Equipment</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($kategoris as $kategori)
                            <tr>
                                <td>
                                    {{ $kategoris->firstItem() + $loop->index }}
                                </td>

                                <td>
                                    <strong>{{ $kategori->kode_kategori }}</strong>
                                </td>

                                <td>
                                    {{ $kategori->nama_kategori }}
                                </td>

                                <td>
                                    <span class="badge bg-secondary">
                                        {{ $kategori->equipments_count }}
                                    </span>
                                </td>

                                <td>
                                    <div class="d-flex gap-1">

                                        <a
                                            href="{{ route('kategori.show', $kategori) }}"
                                            class="btn btn-sm btn-outline-primary">
                                            Detail
                                        </a>

                                        <a
                                            href="{{ route('kategori.edit', $kategori) }}"
                                            class="btn btn-sm btn-outline-warning">
                                            Edit
                                        </a>

                                        <form
                                            action="{{ route('kategori.destroy', $kategori) }}"
                                            method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">

                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="btn btn-sm btn-outline-danger">
                                                Hapus
                                            </button>

                                        </form>

                                    </div>
                                </td>
                            </tr>

                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-4">
                                    <p class="text-muted mb-2">
                                        Belum ada kategori.
                                    </p>

                                    <a
                                        href="{{ route('kategori.create') }}"
                                        class="btn btn-del">
                                        Tambah Kategori
                                    </a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-3">
                {{ $kategoris->links() }}
            </div>

        </div>
    </div>

</x-layout>