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
            $table->string('no_sp2d')->after('jenis_spm')->nullable();
            $table->string('jenis_sp2d')->after('nilai_sp2d')->nullable();
            $table->date('tgl_sp2d')->after('jenis_sp2d')->nullable();
            $table->date('tgl_selesai_sp2d')->after('tgl_sp2d')->nullable();
            $table->string('no_invoice')->after('tgl_selesai_sp2d')->nullable();
            $table->string('tgl_invoice')->after('no_invoice')->nullable();
            $table->string('link_arsip')->after('keterangan')->nullable();
            $table->string('no_spby')->after('uraian')->nullable();
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
