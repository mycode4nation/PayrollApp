<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PolaKerjaKaryawanKelompokKerja extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pola_kerja_karyawan_kelompok_kerja', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nik',30);
            $table ->date('tanggal');
            $table->integer('pola_kerja_id');
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
