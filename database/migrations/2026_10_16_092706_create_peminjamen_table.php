
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('peminjamans', function (Blueprint $table) {
            $table->id();
            $table->string('kode_pinjam')->unique();

            $table->foreignId('equipment_id')
                ->constrained('equipments')
                ->cascadeOnDelete();

            $table->string('nim_peminjam', 10);
            $table->string('nama_peminjam', 100);
            $table->string('email_peminjam', 100);
            $table->date('tanggal_pinjam');
            $table->date('tanggal_jatuh_tempo');
            $table->date('tanggal_kembali')->nullable();
            $table->text('purpose')->nullable();
            $table->enum('status', ['diajukan', 'disetujui', 'ditolak', 'selesai'])
                ->default('diajukan');
            $table->integer('total_biaya')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('peminjamans');
    }
};
