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
        Schema::table('digital_archives', function (Blueprint $table) {
            $table->string('kode_klasifikasi')->nullable();
            $table->string('indeks1')->nullable();
            $table->string('indeks2')->nullable();
            $table->integer('no_item')->nullable();
            $table->string('uraian')->nullable();
            $table->string('no_spm')->nullable();
            $table->string('jenis_spm')->nullable();
            $table->string('nilai_sp2d')->nullable();
            $table->date('tgl_terima')->nullable();
            $table->string('tingkat_pertimbangan')->nullable();
            $table->integer('jumlah_halaman')->nullable();
            $table->year('retensi_arsip_aktif')->nullable();
            $table->year('retensi_arsip_inaktif')->nullable();
            $table->string('nasib_akhir_arsip')->nullable();
            $table->string('klasifikasi_keamanan')->nullable();
            $table->string('status')->nullable();
            $table->string('keterangan')->nullable();
            $table->foreignId('jenis_rak')->nullable()->constrained('document_folders')->nullOnDelete();
            $table->foreignId('folder')->nullable()->constrained('document_folders')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('digital_archives', function (Blueprint $table) {
            //
        });
    }
};
