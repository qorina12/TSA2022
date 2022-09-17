<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatingPegawaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rating_pegawai', function (Blueprint $table) {
            $table->id();
            $table->string('indikator', 30);
            $table->integer('nilai');
            $table->integer('jam_kerja');
            $table->string('masa_dinas',25);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rating_pegawai');
    }
}
