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
            $table->foreignId('category_payment_id')->nullable()->after('id')->constrained('categories')->nullOnDelete();
            $table->foreignId('category_funding_id')->nullable()->after('category_payment_id')->constrained('categories')->nullOnDelete();
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
