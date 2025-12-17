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
        Schema::create('pengajuans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('finance_officers_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('pengajuan_name');
            $table->string('path_file_pengajuan')->nullable();
            $table->string('status_kelengkapan');
            $table->boolean('status_verifikasi');
            $table->string('path_file_status_kelengkapan')->nullable();
            $table->boolean('status_diarsipkan')->nullable();
            $table->boolean('status_dikembalikan')->nullable();
            $table->string('message')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuans');
    }
};
