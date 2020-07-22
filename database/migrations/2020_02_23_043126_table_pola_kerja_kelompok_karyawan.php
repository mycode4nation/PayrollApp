<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TablePolaKerjaKelompokKaryawan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pola_kerja_kelompok_karyawan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table ->date('tanggal');
            $table->integer('pola_kerja_id');
            $table->integer('kelompok_kerja_id');
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
        //
    }
}
