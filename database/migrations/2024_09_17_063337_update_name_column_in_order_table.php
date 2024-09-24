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
        Schema::table('order', function (Blueprint $table) {
            // Mengubah kolom 'name' menjadi tidak nullable dan menambahkan nilai default
            $table->string('name')->default('Default Name')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('order', function (Blueprint $table) {
            // Mengembalikan kolom 'name' menjadi nullable jika perlu
            $table->string('name')->nullable()->change();
        });
    }
};
