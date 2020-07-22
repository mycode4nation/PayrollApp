<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KalendarKerja extends Model
{
    protected $table = "kalendar_kerja";

    // function getTanggalAttribute($value){
    //     return date_format(date_create($value),"d-m-Y");
    // }
}
