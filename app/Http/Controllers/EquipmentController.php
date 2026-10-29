<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class EquipmentController extends Controller
{
    /**
     * Menampilkan daftar peralatan, pencarian, filter,
     * jumlah peminjaman, pagination, dan statistik.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $kategoriId = $request->input('kategori_id');

        $query = Equipment::with('kategori')
            ->withCount('peminjamans')
            ->when($request->filled('search'), function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                        ->orWhere('asset_code', 'like', "%{$search}%");
                });
            })
            ->when($request->filled('kategori_id'), function ($query) use ($kategoriId) {
                $query->where('kategori_id', $kategoriId);
            });

        $equipments = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        // Statistik menggunakan Query Builder.
        $statistik = DB::table('equipments')
            ->selectRaw('COUNT(*) AS total_equipment')
            ->selectRaw('COALESCE(SUM(stok), 0) AS total_stok')
            ->first();

        $totalEquipment = (int) ($statistik->total_equipment ?? 0);
        $totalStok = (int) ($statistik->total_stok ?? 0);
        $totalKategori = (int) DB::table('kategoris')->count();

        $totalPeminjaman = (int) DB::table('peminjamans')->count();

        $totalPeminjamanAktif = (int) DB::table('peminjamans')
            ->where('status', 'dipinjam')
            ->count();

        $kategoris = Kategori::orderBy('nama_kategori')->get();

        return view('buku.index', compact(
            'equipments',
            'totalEquipment',
            'totalKategori',
            'totalStok',
            'totalPeminjaman',
            'totalPeminjamanAktif',
            'kategoris',
            'search',
            'kategoriId'
        ));
    }

    /**
     * Menampilkan formulir tambah peralatan.
     */
    public function create()
    {
        $kategoris = Kategori::orderBy('nama_kategori')->get();

        return view('equipment.create', compact('kategoris'));
    }

    /**
     * Menyimpan peralatan baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'asset_code' => ['required', 'string', 'max:20', 'unique:equipments,asset_code'],
            'name' => ['required', 'string', 'min:5', 'max:200'],
            'specification' => ['required', 'string'],
            'daily_rental_fee' => ['required', 'numeric', 'min:0'],
            'condition' => ['required', 'string', 'in:baik,rusak'],
            'status' => ['required', 'string', 'in:tersedia,dipinjam,diperbaiki'],
            'kategori_id' => ['required', 'exists:kategoris,id'],
            'stok' => ['required', 'integer', 'min:0'],
            'sinopsis' => ['nullable', 'string'],
        ]);

        Equipment::create($validated);

        return redirect()
            ->route('equipment.index')
            ->with('success', 'Peralatan berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail peralatan.
     */
    public function show(Equipment $equipment)
    {
        $equipment->load('kategori');

        return view('equipment.show', compact('equipment'));
    }

    /**
     * Menampilkan formulir edit peralatan.
     */
    public function edit(Equipment $equipment)
    {
        $kategoris = Kategori::orderBy('nama_kategori')->get();

        return view('equipment.edit', compact('equipment', 'kategoris'));
    }

    /**
     * Memperbarui data peralatan.
     */
    public function update(Request $request, Equipment $equipment)
    {
        $validated = $request->validate([
            'asset_code' => [
                'required',
                'string',
                'max:20',
                Rule::unique('equipments', 'asset_code')->ignore($equipment->id),
            ],
            'name' => ['required', 'string', 'min:5', 'max:200'],
            'specification' => ['required', 'string'],
            'daily_rental_fee' => ['required', 'numeric', 'min:0'],
            'condition' => ['required', 'string', 'in:baik,rusak'],
            'status' => ['required', 'string', 'in:tersedia,dipinjam,diperbaiki'],
            'kategori_id' => ['required', 'exists:kategoris,id'],
            'stok' => ['required', 'integer', 'min:0'],
            'sinopsis' => ['nullable', 'string'],
        ]);

        $equipment->update($validated);

        return redirect()
            ->route('equipment.index')
            ->with('success', 'Peralatan berhasil diperbarui.');
    }

    /**
     * Menghapus peralatan.
     */
    public function destroy(Equipment $equipment)
    {
        $equipment->delete();

        return redirect()
            ->route('equipment.index')
            ->with('success', 'Peralatan berhasil dihapus.');
    }
}
