<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setting_perusahaan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_perusahaan',50);
            $table->string('alamat_perusahaan',100);
            $table->string('no_telpon');
            $table->string('logo');
            $table->string('email');
            $table->string('deskripsi_perusahaan');
            $table->string('jenis_perusahaan');
            $table->string('bentuk_perusahaan');
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
        Schema::dropIfExists('setting');
    }
}
