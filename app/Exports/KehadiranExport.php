<?php

namespace App\Exports;

use App\Kehadiran;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class KehadiranExport implements FromView,ShouldAutoSize
{
    public $tanggal_awal;
    public $tanggal_akhir;

    function __construct($awal,$akhir){
        $this->tanggal_mulai = $awal;
        $this->tanggal_akhir = $akhir;
    }
 

    public function view(): View 
    {
        $sql = "select vk.*,k.nama
        from view_riwayat_kehadiran as vk
        join karyawan as k on k.nik=vk.nik
        where date(vk.tanggal_masuk) between '".$this->tanggal_mulai."' and '".$this->tanggal_akhir."'";

        
        $data['riwayat_kehadiran'] = //\DB::select($sql);
        \DB::select( \DB::raw($sql));

        // \DB::table('view_riwayat_kehadiran')
        //              ->select(DB::raw('count(*) as user_count, status'))
        //              ->where('status', '<>', 1)
        //              ->groupBy('status')
        //              ->get();


        // $data ['riwayat_kehadiran'] = \DB::table('view_riwayat_kehadiran')
        // ->join('karyawan','karyawan.nik','=','view_riwayat_kehadiran.nik')
        // ->whereBetween('view_riwayat_kehadiran.tanggal_masuk',[$this->tanggal_mulai,$this->tanggal_akhir])
        // ->get();
        return view('kehadiran.reportExcel',$data);
        

    }


}
