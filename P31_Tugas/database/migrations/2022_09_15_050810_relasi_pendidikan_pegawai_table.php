<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RelasiPendidikanPegawaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pegawai', function (Blueprint $table) {
            //Menghapus kolom pendidikan
            $table->dropColumn('pendidikan'); 
            //menambahkan kolom pendidikan_id
            $table->unsignedBigInteger('pendidikan_id')->nullable(); 
            // menambahkan foreign key di kolom pendidikan_id
            $table->foreign('pendidikan_id')->references('id')->on('pendidikan'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pegawai', function (Blueprint $table) {
            $table->string('pendidikan');
            $table->dropForeign(['pendidikan_id']);
        });
    }
}
