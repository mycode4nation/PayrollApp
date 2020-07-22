<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Karyawan;

class LemburController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {  
        if (session('periode_lembur')!=null) {
            $periode = session('periode_lembur');
        }else{
            $periode = date('Y-m-d');
        }
        

        $data['riwayatLembur'] = \DB::table('lembur_karyawan')->select('lembur_karyawan.*','karyawan.nama')->join('karyawan','karyawan.nik','=','lembur_karyawan.nik' )
                                ->whereRaw("date(lembur_karyawan.tanggal_masuk)='$periode'")
                                ->get();
        return view ('lembur.index',$data);
    }

    public function create()
    {   
        $data['nama_karyawan'] = Karyawan::select('nama')->get();

        return view ('lembur.input',$data);
    }

    public function simpanLembur(Request $request)
    {
        $request->validate(
            ['nama'=>'required',
             'tanggal_masuk'=>'required',
             'tanggal_pulang'=>'required',
             'jam_masuk'=>'required',
             'jam_pulang'=>'required',
                   
            ]);
        $nama = $request->nama;
        $karyawan = Karyawan::where('nama',$nama)->first();
        if($karyawan!=null){
            $waktu1 = $request->tanggal_masuk.' '.$request->jam_masuk;
            $waktu2 = $request->tanggal_pulang.' '.$request->jam_pulang;
            $x = new \DateTime($waktu1);
            $y = new \DateTime($waktu2);

            $selisih1 = date_diff($y,$x);
            if($selisih1->h == 8){
                return redirect('lembur/create')->with('lembur','Karyawan ' .$nama.'  Tidak Terhitung Lembur karena durasi kerja '.$selisih1->h.' jam');
 
            }else{
                $durasi = $selisih1->h - 8;
                $data = [
                    'nik'=>$karyawan->nik,
                    'tanggal_masuk'=>$request->tanggal_masuk.' '.$request->jam_masuk,
                    'tanggal_pulang'=>$request->tanggal_pulang.' '.$request->jam_pulang,
                    'durasi_lembur'=>$durasi
                ];
        
                \DB::table('lembur_karyawan')->insert($data);
    
                return redirect('lembur')->with('message','Data Kehadiran ' .$nama.'  Berhasil Disimpan');
            }


        }else{
            return Redirect::back()->with('message','Data Karyawan dengan nama ',$request->nama.'Tidak ditemukan');
        }
    }

    function periodeLembur(Request $request){

        session(['periode_lembur'=>$request->durasi_lembur]);
        return redirect('lembur')->with('message','Data Berdasarkan Periode Lembur '.$request->durasi_lembur);

    }
}
