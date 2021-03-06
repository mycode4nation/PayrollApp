<?php

namespace App\Imports;

use App\Kehadiaran;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Kehadiran;

class KehadiranImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Kehadiran([
            'nik'                   => $row[0],
            'tanggal_masuk'         => $row[1],
            'tanggal_pulang'        => $row[2],
            'kode_status_kehadiran' => $row[3]

        ]);
    }
}
