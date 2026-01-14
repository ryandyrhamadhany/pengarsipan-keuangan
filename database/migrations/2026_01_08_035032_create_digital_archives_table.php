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
        Schema::create('digital_archives', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete();
            $table->string('archive_name');
            $table->string('submiter_name');
            $table->string('finance_officer_name');
            $table->string('revenue_officer_name');
            $table->string('file_path_archive');
            $table->string('archive_code');
            $table->integer('nominal');
            $table->string('archive_by');
            $table->date('disposal_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('digital_archives');
    }
};
