<?php

namespace Tests\Feature;

use App\Models\Equipment;
use App\Models\Kategori;
use App\Models\Peminjaman;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class PeminjamanTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        User::create([
            'name' => 'Petugas Testing',
            'email' => 'petugas-test@example.com',
            'password' => Hash::make('password123'),
        ]);

        $this->actingAs(
            User::where('email', 'petugas-test@example.com')->first()
        );
    }

   
    private function buatEquipment(int $stok = 5): Equipment
{
    $kategori = Kategori::factory()->create();

    return Equipment::create([
        'nama' => 'Equipment Testing',
        'deskripsi' => 'Equipment untuk pengujian otomatis.',
        'stok' => $stok,
        'kategori_id' => $kategori->id,
    ]);
}


    private function dataPeminjaman(Equipment $equipment, string $nim = '12S24057'): array
    {
        return [
        'kategori_id' => $kategori->id,
        'stok' => $stok,
        'sinopsis' => 'Buku untuk pengujian otomatis.',
    ];
    }

    public function test_peminjaman_berhasil_dan_stok_berkurang(): void
    {
        $equipment = $this->buatEquipment(5);

        $response = $this->post(
            route('peminjaman.store'),
            $this->dataPeminjaman($equipment)
        );

        $response->assertRedirect(route('peminjaman.index'));
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('peminjamans', [
            'equipment_id' => $equipment->id,
            'nim_peminjam' => '12S24057',
            'status' => 'dipinjam',
        ]);

        $this->assertSame(4, $equipment->fresh()->stok);
    }

    public function test_peminjaman_ditolak_jika_stok_habis(): void
    {
        $equipment = $this->buatEquipment(0);

        $response = $this->from(route('peminjaman.create'))
            ->post(
                route('peminjaman.store'),
                $this->dataPeminjaman($equipment)
            );

        $response->assertSessionHasErrors('equipment_id');

        $this->assertDatabaseMissing('peminjamans', [
            'equipment_id' => $equipment->id,
            'nim_peminjam' => '12S24057',
        ]);

        $this->assertSame(0, $equipment->fresh()->stok);
    }

    public function test_peminjaman_aktif_ganda_ditolak(): void
    {
        $equipment = $this->buatEquipment(5);

        $this->post(
            route('peminjaman.store'),
            $this->dataPeminjaman($equipment)
        )->assertRedirect(route('peminjaman.index'));

        $stokSetelahPinjamPertama = $equipment->fresh()->stok;

        $response = $this->from(route('peminjaman.create'))
            ->post(
                route('peminjaman.store'),
                $this->dataPeminjaman($equipment)
            );

        $response->assertSessionHasErrors('equipment_id');

        $this->assertSame(
            1,
            Peminjaman::where('equipment_id', $equipment->id)
                ->where('nim_peminjam', '12S24057')
                ->where('status', 'dipinjam')
                ->count()
        );

        $this->assertSame(
            $stokSetelahPinjamPertama,
            $equipment->fresh()->stok
        );
    }

    public function test_pengembalian_berhasil_dan_stok_bertambah(): void
    {
        $equipment = $this->buatEquipment(5);

        $this->post(
            route('peminjaman.store'),
            $this->dataPeminjaman($equipment)
        );

        $peminjaman = Peminjaman::where('equipment_id', $equipment->id)->firstOrFail();

        $this->assertSame(4, $equipment->fresh()->stok);

        $response = $this->patch(
            route('peminjaman.kembalikan', $peminjaman)
        );

        $response->assertRedirect(route('peminjaman.index'));
        $response->assertSessionHas('success');


    $this->assertDatabaseHas('peminjamans', [
    'id' => $peminjaman->id,
    'status' => 'dikembalikan',
    ]);

    $this->assertNotNull($peminjaman->fresh()->tanggal_kembali);


        $this->assertSame(5, $equipment->fresh()->stok);
    }
}
