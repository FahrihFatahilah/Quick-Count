<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelurahanTable extends Migration
{
    public function up()
    {
        Schema::create('kelurahan', function (Blueprint $table) {
            $table->id();
            $table->string('name');  // Name of Kelurahan
            $table->unsignedBigInteger('kecamatan_id');  // Foreign key to Kecamatan
            $table->timestamps();
            $table->timestamps();
            // Foreign key constraint
            $table->foreign('kecamatan_id')->references('id')->on('kecamatan')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('kelurahan');
    }
}
