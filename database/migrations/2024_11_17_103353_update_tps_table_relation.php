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
        Schema::table('tps', function (Blueprint $table) {
            // Add foreign key relations
            $table->unsignedBigInteger('kelurahan_id')->nullable();  // Relation to Desa

            // Foreign key constraint
            $table->foreign('kelurahan_id')->references('id')->on('kelurahan')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tps', function (Blueprint $table) {
            // Drop foreign keys and columns
            $table->dropForeign(['kelurahan_id']);
            $table->dropColumn(['kelurahan_id']);
        });
    }
};
