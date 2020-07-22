<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Karyawan;
use App\StatusKehadiran;
use Redirect;

use App\Exports\KehadiranExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\KehadiranImport;

class KehadiranController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function index () {
       
        if (session('periode_kehadiran')!=null) {
            $periode = session('periode_kehadiran');
        }else{
            $periode = date('Y-m-d');
        }

        $data ['kehadiran'] = Karyawan::select('karyawan.nik','karyawan.nama','departemen.nama_departemen','kehadiran.id','kehadiran.tanggal_masuk','kehadiran.tanggal_pulang','kehadiran.kode_status_kehadiran','table_status_kehadiran.status_kehadiran')
                    //->leftJoin('kehadiran','kehadiran.nik','=','karyawan.nik')
                    ->leftJoin('kehadiran',function($join){
                        if (session('periode_kehadiran')!=null) {
                            $periode = session('periode_kehadiran');
                        }else{
                            $periode = date('Y-m-d');
                        }
                        
                        $join->on('kehadiran.nik','=','karyawan.nik')->whereRaw("date(kehadiran.tanggal_masuk)='$periode'");

                    })
                    ->join('departemen','karyawan.kode_departemen','=','departemen.kode_departemen')
                    ->leftJoin('table_status_kehadiran','table_status_kehadiran.kode_status_kehadiran','=','kehadiran.kode_status_kehadiran')
                    ->get();
                   
        
        return view ('kehadiran.index',$data);
    }

    function create(){
        $data['statuskehadiran'] = StatusKehadiran::pluck('status_kehadiran','kode_status_kehadiran');
        $data['nama_karyawan'] = Karyawan::select('nama')->get();
        return view ('kehadiran.inputdata',$data);
    }

    function store(request $request){

        $request->validate(
            ['nama'=>'required',
             'tanggal_masuk'=>'required',
             'tanggal_pulang'=>'required',
             'jam_masuk'=>'required',
             'jam_pulang'=>'required',
             'kode_status_kehadiran'=>'required',      
            ]);
        $nama = $request->nama;
        $karyawan = Karyawan::where('nama',$nama)->first();
        if($karyawan!=null){
            $data = [
                'nik'=>$karyawan->nik,
                'tanggal_masuk'=>$request->tanggal_masuk.' '.$request->jam_masuk,
                'tanggal_pulang'=>$request->tanggal_pulang.' '.$request->jam_pulang,
                'kode_status_kehadiran'=>$request->kode_status_kehadiran
            ];
    
            \DB::table('kehadiran')->insert($data);

            return redirect('kehadiran')->with('message','Data Kehadiran ' .$nama.'  Berhasil Disimpan');
        }else{
            return Redirect::back()->with('message','Data Karyawan dengan nama ',$request->nama.'Tidak ditemukan');
        }
        //$karyawan = \DB::table('karyawan')->where('nama',$nama)->first();    

                

    }

    function ubahperiode(Request $request){

        session(['periode_kehadiran'=>$request->periode_kehadiran]);
        return redirect('kehadiran')->with('message','Data Berdasarkan Periode Kehadiran '.$request->periode_kehadiran);

    }

    function excel(Request $request){

        return Excel::download(new KehadiranExport($request->tanggal_mulai,$request->tanggal_selesai),'laporan-kehadiran.xlsx');
    }
    
    function import(Request $request)
    {
        $file       = $request->file('file');
        $fileName   = $file->getClientOriginalName();

        $destinationPath = 'uploads';
        $file->move($destinationPath,$fileName);
        Excel::import(new KehadiranImport,public_path().'/uploads/'.$fileName);

        return redirect('kehadiran')->with('message','Data Berhasil diImport');
    }
}
