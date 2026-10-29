<?php

namespace Database\Seeders;

use App\Models\Equipments;
use App\Models\Kategori;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Membuat akun petugas jika belum ada.
        User::firstOrCreate(
            ['email' => 'petugas@delLab.test'],
            [
                'name' => 'Petugas DelLab',
                'password' => Hash::make('PetugasDel2026!'),
            ]
        );

        // Membuat kategori hanya jika tabel masih kosong.
        if (Kategori::count() === 0) {
            Kategori::factory(5)->create();
        }

        // Membuat peralatan hanya jika tabel masih kosong.
        if (Equipment::count() === 0) {
            Equipment::factory(20)->create();
        }
    }
}
