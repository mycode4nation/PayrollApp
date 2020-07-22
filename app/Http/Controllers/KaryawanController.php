<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Karyawan;
use App\Jabatan;
use App\StatusKawin;
use App\Departemen;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    { 
        $data['karyawan'] = karyawan::join('departemen','departemen.kode_departemen','=','karyawan.kode_departemen')
        ->join('jabatan','jabatan.kode_jabatan','=','karyawan.kode_jabatan')
        ->get();
        
        return view ('karyawan.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['status_kawin']   = StatusKawin::pluck('keterangan','kode_status_kawin');
        $data['departemen']     = Departemen::pluck('nama_departemen','kode_departemen');
        $data['jabatan']        = Jabatan::pluck('nama_jabatan','kode_jabatan');

        return view ('karyawan.inputdata',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $karyawan = new Karyawan();
        $request->validate([
            'nik' => 'required|unique:karyawan|max:20|min:5',
            'nama'=>'required|max:30|min:3',
            'tanggal_lahir'=>'required|max:30|min:3',
            'tanggal_masuk'=>'required|max:30|min:3',
            'kode_status_kawin'=>'required|max:100|min:2',
            'alamat'=>'required|max:100|min:3'            
            
        ]);
        $gajiPokok1 = preg_replace("/[^0-9]/", "", $request->gaji_pokok);
      //  var_dump($gajiPokok1);
        $gaji_integer = (int)$gajiPokok1;
        
        
        $karyawan->nik                  = $request->nik;
        $karyawan->nama                 = $request->nama;
        $karyawan->tanggal_lahir        = $request->tanggal_lahir;
        $karyawan->alamat               = $request->alamat;
        $karyawan->kode_status_kawin    = $request->kode_status_kawin;
        $karyawan->jenis_kelamin        = $request->jenis_kelamin;
        $karyawan->kode_departemen      = $request->kode_departemen;
        $karyawan->kode_jabatan         = $request->kode_jabatan;
        $karyawan->tanggal_masuk        = $request->tanggal_masuk;    
        $karyawan->gaji_pokok           = $gaji_integer;
        
      //  $karyawan->gaji_pokok           = $request->gaji_pokok

        if($request->hasFile('foto')){

            $file =$request->file('foto');
            $fileName = $file->getClientOriginalName();
            $destinationPath ='uploads';
            $file->move($destinationPath,$fileName);
            $karyawan->foto = $fileName;
        }else{
            return redirect('karyawan/create')->with('message','Anda Belum Upload Foto');

        }

        ;
        $karyawan->save();
        return redirect('karyawan')->with('message','Berhasil Menyimpan Data karyawan');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data ['karyawan']      = karyawan::find($id);
        $data['status_kawin']   = StatusKawin::pluck('keterangan','kode_status_kawin');
        $data['departemen']     = Departemen::pluck('nama_departemen','kode_departemen');
        $data['jabatan']        = Jabatan::pluck('nama_jabatan','kode_jabatan');
        return view ('karyawan.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama'=>'required|max:30|min:3',
            'tanggal_lahir'=>'required|max:30|min:3',
            'tanggal_masuk'=>'required|max:30|min:3',
            'kode_status_kawin'=>'required|max:100|min:3',
            'alamat'=>'required|max:100|min:3'            
            
        ]);

        $karyawan = karyawan::find($id);

        $gajiPokok1 = preg_replace("/[^0-9]/", "", $request->gaji_pokok);
      //  var_dump($gajiPokok1);
        $gaji_integer = (int)$gajiPokok1;
        
        
       
        $karyawan->nama                 = $request->nama;
        $karyawan->tanggal_lahir        = $request->tanggal_lahir;
        $karyawan->alamat               = $request->alamat;
        $karyawan->kode_status_kawin    = $request->kode_status_kawin;
        $karyawan->jenis_kelamin        = $request->jenis_kelamin;
        $karyawan->kode_departemen      = $request->kode_departemen;
        $karyawan->kode_jabatan         = $request->kode_jabatan;
        $karyawan->tanggal_masuk        = $request->tanggal_masuk;    
        $karyawan->gaji_pokok           = $gaji_integer;
           

        if($request->hasFile('foto')){

            $file =$request->file('foto');
            $fileName = $file->getClientOriginalName();
            $destinationPath ='uploads';
            $file->move($destinationPath,$fileName);
            $karyawan->foto= $fileName;
        }else{
            $karyawan->update();
            return redirect('karyawan')->with('message','Data Tersimpan');

        }
       


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $karyawan = karyawan::find($id);
        $karyawan->delete();

        return redirect('karyawan')->with('message','Data Berhasil dihapus');

    }

    public function polaKerja($nik){
        $data ['karyawan'] = \DB::table('karyawan')->where('nik',$nik)->first();
        $data ['polaKerjaKaryawan'] = \DB::table('pola_kerja_karyawan_kelompok_kerja')
                                       ->join('pola_kerja_karyawan','pola_kerja_karyawan.id','=','pola_kerja_karyawan_kelompok_kerja.pola_kerja_id')
                                       ->where('pola_kerja_karyawan_kelompok_kerja.nik',$nik)
                                       ->paginate(4);


        return view ('karyawan.polakerja',$data);
    }

    function kehadiran($nik){

        $data['karyawan']         = \DB::table('karyawan')->where('nik',$nik)->first();
        $data['riwayatKehadiran'] = \DB::table('view_riwayat_kehadiran')
                                    ->where('nik',$nik)
                                    ->orderBy('tanggal_masuk','ASC')->paginate(4);

        return view ('karyawan.kehadiran',$data);
    }


    
    function riwayatLemburKaryawan($nik){

        $data['karyawan']         = \DB::table('karyawan')->where('nik',$nik)->first();
        $data['riwayatLembur'] = \DB::table('lembur_karyawan')
                                    ->where('nik',$nik)
                                    ->orderBy('tanggal_masuk','ASC')->paginate(4);

        return view ('karyawan.lembur',$data);
    }
}
