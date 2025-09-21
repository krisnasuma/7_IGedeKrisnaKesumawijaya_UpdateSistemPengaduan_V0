<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pengajuan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('masyarakat_id')->constrained('masyarakat');
            $table->enum('jenis', ['izin', 'keluhan', 'permohonan', 'lainnya']);
            $table->string('judul');
            $table->text('deskripsi');
            $table->enum('status', ['menunggu', 'diproses', 'selesai', 'ditolak'])->default('menunggu');
            $table->text('keterangan')->nullable();
            $table->foreignId('admin_id')->nullable()->constrained('administrator');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan');
    }
};
