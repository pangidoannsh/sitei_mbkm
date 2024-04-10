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
        Schema::create('mbkm', function (Blueprint $table) {
            $table->id();
            $table->string("mahasiswa_nim");
            $table->string("prodi_id");
            $table->string("periode_mbkm");
            $table->string("konsentrasi_id");
            $table->string("program_id");
            $table->string("perusahaan");
            $table->string("alamat");
            $table->string("bidang_usaha");
            $table->string("judul");
            $table->string("rincian");
            $table->date("mulai_kegiatan");
            $table->date("selesai_kegiatan");
            $table->string("batas");
            $table->enum("status", [
                "Usulan", "Disetujui", "Ditolak", "Usulan konversi nilai",
                "Konversi diterima", "Konversi ditolak", "Nilai sudah keluar",
            ])->default("Usulan");
            $table->string("catatan")->default("-");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mbkm');
    }
};
