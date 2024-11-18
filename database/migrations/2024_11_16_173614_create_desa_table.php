<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesaTable extends Migration
{
    public function up()
    {
        Schema::create('desa', function (Blueprint $table) {
            $table->id();
            $table->string('name');  // Name of Desa
            $table->unsignedBigInteger('kelurahan_id');  // Foreign key to Kelurahan
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('kelurahan_id')->references('id')->on('kelurahan')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('desa');
    }
}
