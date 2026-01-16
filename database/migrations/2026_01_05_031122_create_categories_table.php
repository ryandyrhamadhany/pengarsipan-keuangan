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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cabinet_id')->constrained()->cascadeOnDelete();
            $table->string('category_name');
<<<<<<< HEAD:database/migrations/2025_11_12_021737_create_categories_table.php
            $table->string('category_code')->unique();
=======
            $table->string('sub_category')->nullable();
            $table->string('year')->nullable();
>>>>>>> main:database/migrations/2026_01_05_031122_create_categories_table.php
            $table->string('url_icon')->nullable();
            $table->string('path_icon')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
