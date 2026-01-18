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
        // 1. Rename tabel
        Schema::rename('pengajuans', 'budget_submissions');

        // 2. Rename kolom (PAKAI NAMA TABEL BARU)
        Schema::table('budget_submissions', function (Blueprint $table) {
            $table->renameColumn('pengajuan_name', 'budget_submission_name');
            $table->renameColumn('path_file_pengajuan', 'path_file_submission');
            $table->renameColumn('status_kelengkapan', 'requirements_status');
            $table->renameColumn('status_verifikasi', 'verification_status');
            $table->renameColumn('path_file_status_kelengkapan', 'path_file_requirements_status');
            $table->renameColumn('status_diarsipkan', 'is_archive');
            $table->renameColumn('status_dikembalikan', 'is_return');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // 1. Balikkan nama kolom
        Schema::table('budget_submissions', function (Blueprint $table) {
            $table->renameColumn('budget_submission_name', 'pengajuan_name');
            $table->renameColumn('path_file_submission', 'path_file_pengajuan');
            $table->renameColumn('requirements_status', 'status_kelengkapan');
            $table->renameColumn('verification_status', 'status_verifikasi');
            $table->renameColumn('path_file_requirements_status', 'path_file_status_kelengkapan');
            $table->renameColumn('is_archive', 'status_diarsipkan');
            $table->renameColumn('is_return', 'status_dikembalikan');
        });

        // 2. Balikkan nama tabel
        Schema::rename('budget_submissions', 'pengajuans');
    }
};
