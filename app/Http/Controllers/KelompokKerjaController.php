<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KelompokKerja;
use App\Karyawan;
use App\AnggotaKelompokKerja;
use App\PolaKerjaKaryawan;
class KelompokKerjaController extends Controller
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
        $data ['kelompokkerja'] = KelompokKerja::all();
        return view ('kelompokkerja.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('kelompokkerja.inputdata');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kelompokkerja = new KelompokKerja();
        $request->validate(['kelompok_kerja'=>'required|unique:kelompok_kerja|min:5']);
        $kelompokkerja->kelompok_kerja = $request->kelompok_kerja;
        $kelompokkerja->save();

        return redirect('kelompokKerja')->with('message','Data Tersimpan');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data ['karyawan']      = Karyawan::all();
        $data ['kelompokkerja'] = KelompokKerja::find($id);
        $data ['anggota']       = AnggotaKelompokKerja::join('karyawan','karyawan.nik','=','anggota_kelompok_kerja.nik')->where('anggota_kelompok_kerja.kelompok_kerja_id',$id)->get();
        return view('kelompokkerja.show',$data); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function tambahAnggota(Request $request){
        $polakerja = \DB::table('pola_kerja_kelompok_karyawan')->where('kelompok_kerja_id',$request->id)->get();
        
        $karyawan = Karyawan::where('nama',$request->nama)->first();
        $polakerjakaryawan  = \DB::table('pola_kerja_karyawan_kelompok_kerja')->where('nik',$karyawan->nik)->get();

        

         if ($karyawan!=null) {
            $data = ['nik' =>$karyawan->nik,'kelompok_kerja_id'=>$request->id];
            \DB::table('anggota_kelompok_kerja')->insert($data);
            
        //     $data2 = \DB::select("select a.nik,
        //     pkk.tanggal,pk.pola_kerja_id
        //     from anggota_kelompok_kerja a 
        //     JOIN pola_kerja_kelompok_karyawan pk ON  pk.kelompok_kerja_id = a.kelompok_kerja_id 
        //     JOIN pola_kerja_karyawan_kelompok_kerja pkk ON  
        //    pkk.pola_kerja_id = pk.pola_kerja_id where a.nik = '14650018' ");

           
         
           
        //    \DB::table('pola_kerja_karyawan_kelompok_kerja')->insert($data2);
            // dd($data2); 
           
            return Redirect('kelompokKerja/'.$request->id)->with('message','Data Anggota : '.$request->nama .' Berhasil Ditambahkan');


         }else{
            return Redirect('kelompokKerja/'.$request->id)->with('message','Data Karyawan : '.$request->nama .'Tidak Ditemukan');

        }
    }

    public function edit($id)
    {
        $data ['kelompokkerja'] = KelompokKerja::find($id);
        return view ('kelompokkerja.edit',$data);
    }

    public function hapusAnggotaKerja($id){

        $anggota = \DB::table('anggota_kelompok_kerja')
        ->select('anggota_kelompok_kerja.kelompok_kerja_id','karyawan.nama')
        ->join('karyawan','karyawan.nik','=','anggota_kelompok_kerja.nik')
        ->where('anggota_kelompok_kerja.id',$id)
        ->first();
        
        $anggota2 = AnggotaKelompokKerja::find($id);
        $anggota2->delete();
        // \DB::table('anggota_kelompok_kerja')
        // ->where('id',$id)
        // ->delete();
        return redirect('kelompokKerja/'.$anggota->kelompok_kerja_id)->with('message','Anggota Dengan Nama '.$anggota->nama.' Sudah Dihapus');


       
    }

    public function polaKerja($id){

        $data ['kelompokKerja'] = KelompokKerja::find($id);
        $data ['polaKerja'] = PolaKerjaKaryawan::pluck('pola_kerja','id');
        $data['polakerjaKelompok']  = \DB::table('pola_kerja_kelompok_karyawan')
                                    ->select('pola_kerja_kelompok_karyawan.tanggal','pola_kerja_kelompok_karyawan.id','pola_kerja_karyawan.pola_kerja','pola_kerja_karyawan.jam_masuk','pola_kerja_karyawan.jam_pulang')
                                    ->join('pola_kerja_karyawan','pola_kerja_karyawan.id','=','pola_kerja_kelompok_karyawan.pola_kerja_id')->where('kelompok_kerja_id',$id)
                                    ->paginate(7);

        return view ('kelompokkerja.polakerja',$data);

    }

    public function simpanPolaKeja(Request $request){

        $periode = new \DatePeriod(
                   new \DateTime($request->dari_tanggal),
                   new \DateInterval('P1D'),
                   new \DateTime(date('Y-m-d',strtotime('1 day',strtotime($request->sampai_tanggal)))),
        );

        foreach($periode as $key => $value){
            $dataPolaKerja[] =[
                'tanggal'        => $value->format('Y-m-d'),
                'pola_kerja_id'  => $request->pola_kerja,
                'kelompok_kerja_id' => $request->kelompok_kerja_id,
                'created_at'        =>  date('Y-m-d'),
                'updated_at'        =>  date('Y-m-d'),
            ];
        }

        \DB::table('pola_kerja_kelompok_karyawan')->insert($dataPolaKerja);
        $polaKerjaKaryawan = [];
        $karyawan = \DB::table('anggota_kelompok_kerja')->where('kelompok_kerja_id',$request->kelompok_kerja_id)->get();
        foreach ($karyawan as $k ) {
            foreach ($periode as $key ) {
                
                $polaKerjaKaryawan [] =[
                                'nik'           =>$k->nik,
                                'pola_kerja_id' =>$request->pola_kerja,
                                'tanggal'       =>$key->format('Y-m-d')
                ];
            }
        }
      //  dd( $karyawan);
       \DB::table('pola_kerja_karyawan_kelompok_kerja')->insert($polaKerjaKaryawan);
       return redirect('kelompokKerja/'.$request->kelompok_kerja_id.'/polakerja')->with('message','Data Kelompok Kerja Berhasil Disimpan');

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
        $kelompokkerja = KelompokKerja::find($id);
        $request->validate(['kelompok_kerja'=>'required|unique:kelompok_kerja|min:5']);
        $kelompokkerja->kelompok_kerja = $request->kelompok_kerja;
        $kelompokkerja->update();

        return redirect('kelompokKerja')->with('message','Data Tersimpan');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kelompokkerja = KelompokKerja::find($id);
        $kelompokkerja->delete();
        return redirect('kelompokKerja')->with('message','Data Terhapus');

    }

    function hapusPolaKerja($id)
    {
        $polaKerja = \DB::table('pola_kerja_kelompok_karyawan')->where('id',$id)->first();

        \DB::table('pola_kerja_kelompok_karyawan')->where('id',$id)->delete();
        
        return redirect('kelompokKerja/'.$polaKerja->kelompok_kerja_id.'/polakerja')->with('message','Data Kelompok Kerja Berhasil Dihapus');
    }
}
