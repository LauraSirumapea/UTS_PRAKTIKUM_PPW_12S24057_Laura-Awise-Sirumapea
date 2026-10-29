<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Database\QueryException;
use Illuminate\Validation\ValidationException;

class PeminjamanController extends Controller
{
    /**
     * Menampilkan daftar peminjaman, pencarian,
     * filter status, statistik, dan pagination.
     */
    public function index(Request $request)
    {
        $query = Peminjaman::with('equipment')
            ->when($request->filled('search'), function ($query) use ($request) {
                $search = trim($request->input('search'));

                $query->where(function ($q) use ($search) {
                    $q->where('kode_pinjam', 'like', "%{$search}%")
                        ->orWhere('nim_peminjam', 'like', "%{$search}%")
                        ->orWhere('nama_peminjam', 'like', "%{$search}%");
                });
            })
            ->when($request->filled('status'), function ($query) use ($request) {
                $status = $request->input('status');

                if (in_array($status, ['dipinjam', 'dikembalikan'], true)) {
                    $query->where('status', $status);
                }
            })
            ->latest();

        $peminjamans = $query->paginate(10)->withQueryString();

        $statistik = DB::table('peminjamans')
            ->selectRaw('COUNT(*) AS total')
            ->selectRaw(
                "SUM(CASE WHEN status = 'dipinjam' THEN 1 ELSE 0 END) AS dipinjam"
            )
            ->selectRaw(
                "SUM(CASE WHEN status = 'dikembalikan' THEN 1 ELSE 0 END) AS dikembalikan"
            )
            ->first();

        $totalPeminjaman = (int) ($statistik->total ?? 0);
        $totalDipinjam = (int) ($statistik->dipinjam ?? 0);
        $totalDikembalikan = (int) ($statistik->dikembalikan ?? 0);

        return view('peminjaman.index', compact(
            'peminjamans',
            'totalPeminjaman',
            'totalDipinjam',
            'totalDikembalikan'
        ));
    }

    public function create()
    {
        $equipments = Equipment::where('stok', '>', 0)
            ->orderBy('name')
            ->get();

        return view('peminjaman.create', compact('equipments'));
    }

    /**
     * Menyimpan peminjaman dan mengurangi stok
     * dalam satu transaksi database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'equipment_id' => ['required', 'integer', 'exists:equipments,id'],
            'nim_peminjam' => ['required', 'string', 'max:20'],
            'nama_peminjam' => ['required', 'string', 'max:100'],
            'tanggal_pinjam' => ['required', 'date'],
            'tanggal_jatuh_tempo' => [
                'required',
                'date',
                'after_or_equal:tanggal_pinjam',
            ],
        ]);

        try {
            DB::transaction(function () use ($validated) {
                $equipment = Equipment::where('id', $validated['equipment_id'])
                    ->lockForUpdate()
                    ->firstOrFail();

                if ($equipment->stok < 1) {
                    throw ValidationException::withMessages([
                        'equipment_id' => 'Stok peralatan habis. Silakan pilih peralatan lain.',
                    ]);
                }

                $nim = trim($validated['nim_peminjam']);

                $peminjamanAktif = Peminjaman::where('equipment_id', $equipment->id)
                    ->where('nim_peminjam', $nim)
                    ->where('status', 'dipinjam')
                    ->exists();

                if ($peminjamanAktif) {
                    throw ValidationException::withMessages([
                        'equipment_id' => 'Mahasiswa ini masih memiliki peminjaman aktif untuk peralatan tersebut.',
                    ]);
                }

                Peminjaman::create([
                    'kode_pinjam' => 'PJM-' . strtoupper(Str::random(8)),
                    'equipment_id' => $equipment->id,
                    'nim_peminjam' => $nim,
                    'nama_peminjam' => trim($validated['nama_peminjam']),
                    'tanggal_pinjam' => $validated['tanggal_pinjam'],
                    'tanggal_jatuh_tempo' => $validated['tanggal_jatuh_tempo'],
                    'tanggal_kembali' => null,
                    'status' => 'dipinjam',
                ]);

                $equipment->decrement('stok');
            }, 3);

            return redirect()
                ->route('peminjaman.index')
                ->with('success', 'Peminjaman berhasil ditambahkan.');
        } catch (ValidationException $e) {
            throw $e;
        } catch (QueryException $e) {
            Log::error('Gagal menyimpan peminjaman.', [
                'message' => $e->getMessage(),
                'equipment_id' => $validated['equipment_id'],
            ]);

            return back()
                ->withInput()
                ->with('error', 'Peminjaman gagal disimpan karena masalah database.');
        }
    }

    public function kembalikan(Peminjaman $peminjaman)
    {
        try {
            DB::transaction(function () use ($peminjaman) {
                $data = Peminjaman::where('id', $peminjaman->id)
                    ->lockForUpdate()
                    ->firstOrFail();

                if ($data->status === 'dikembalikan') {
                    throw ValidationException::withMessages([
                        'peminjaman' => 'Peralatan ini sudah dikembalikan sebelumnya.',
                    ]);
                }

                $equipment = Equipment::where('id', $data->equipment_id)
                    ->lockForUpdate()
                    ->firstOrFail();

                $data->update([
                    'status' => 'dikembalikan',
                    'tanggal_kembali' => now()->toDateString(),
                ]);

                $equipment->increment('stok');
            }, 3);

            return redirect()
                ->route('peminjaman.index')
                ->with('success', 'Peralatan berhasil dikembalikan.');
        } catch (ValidationException $e) {
            return redirect()
                ->route('peminjaman.index')
                ->with('error', $e->validator->errors()->first());
        } catch (QueryException $e) {
            Log::error('Gagal memproses pengembalian peralatan.', [
                'peminjaman_id' => $peminjaman->id,
                'message' => $e->getMessage(),
            ]);

            return redirect()
                ->route('peminjaman.index')
                ->with('error', 'Pengembalian gagal diproses karena masalah database.');
        }
    }
}
