<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLemburKaryawansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lembur_karyawan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nik',10);
            $table->datetime('tanggal_masuk');
            $table->datetime('tanggal_pulang');
            $table->integer('durasi_lembur');
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
        Schema::dropIfExists('lembur_karyawans');
    }
}
