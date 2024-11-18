<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTpsTable extends Migration
{
    public function up()
    {
        Schema::table('tps', function (Blueprint $table) {
            // Add foreign key relations
            $table->unsignedBigInteger('desa_id')->nullable();  // Relation to Desa

            // Foreign key constraint
            $table->foreign('desa_id')->references('id')->on('desa')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('tps', function (Blueprint $table) {
            // Drop foreign keys and columns
            $table->dropForeign(['desa_id']);
            $table->dropColumn(['desa_id']);
        });
    }
}
