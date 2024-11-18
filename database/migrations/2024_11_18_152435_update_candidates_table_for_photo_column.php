<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('candidates', function (Blueprint $table) {
            // Change the column type to LONGTEXT and make it nullable
            $table->longText('photo')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('candidates', function (Blueprint $table) {
            // Revert the column back to TEXT and make it nullable (if needed)
            $table->text('photo')->nullable()->change();
        });
    }
};
