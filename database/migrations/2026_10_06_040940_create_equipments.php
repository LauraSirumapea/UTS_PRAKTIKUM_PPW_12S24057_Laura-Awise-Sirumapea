<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('equipments', function (Blueprint $table) {
            $table->id();
            $table->varchar('asset_code', 20)->unique();
            $table->varchar('name', 150);
            $table->text('specification')->nullable();
            $table->integer('daily_rental_fee');
            $table->enum('condition', ['baik', 'rusak_ringan', 'rusak_berat'])->default('baik');
            $table->enum('status', ['tersedia', 'dipinjam', 'dalam_perbaikan'])->default('tersedia');
            $table->varchar('image_path', 255)->nullable();
            $table->foreignId('kategori_id')
                  ->constrained('kategoris')
                  ->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('equipments');
    }
};