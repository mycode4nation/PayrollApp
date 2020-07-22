<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KomponenGaji;

class KomponenGajiController extends Controller
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
        $data ['komponen_gaji'] = KomponenGaji::all();

        return view ('komponenGaji.index',$data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('komponenGaji.inputdata');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
           $request->validate([
               'kode_komponen' =>'required|min:3|max:10',
               'nama_komponen' =>'required|unique:komponen_gaji|min:5',
               'nilai'         =>'required'
           ]);

           $komponen = new KomponenGaji();
           $komponen1 = preg_replace("/[^0-9]/", "", $request->nilai);
           //  var_dump($gajiPokok1);
           $komponen2 = (int)$komponen1;
             
       
           $komponen->kode_komponen = $request->kode_komponen;
           $komponen->nama_komponen = $request->nama_komponen;
           $komponen->jenis         = $request->jenis;
           $komponen->nilai         = $komponen2;

           $komponen->save();

           return redirect('komponen_gaji')->with('message','Data Tersimpan');

        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $data['komponen_gaji'] = KomponenGaji::find($id);

        return view('komponenGaji.edit',$data);
        
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
            'jenis'         =>'required',
            'nilai'         =>'required'
        ]);

            $komponen  = KomponenGaji::find($id);
            $komponen = new KomponenGaji();
            $komponen1 = preg_replace("/[^0-9]/", "", $request->nilai);
           //  var_dump($gajiPokok1);
           $komponen2 = (int)$komponen1;
             
       
         
           $komponen->nama_komponen = $request->nama_komponen;
           $komponen->jenis         = $request->jenis;
           $komponen->nilai         = $komponen2;
        $komponen->update();

        return redirect('komponen_gaji')->with('message','Data Tersimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $komponen = KomponenGaji::find($id);
        $komponen->delete();

        return redirect('komponen_gaji')->with('message','Data Berhasil Dihapus');
    }
}
