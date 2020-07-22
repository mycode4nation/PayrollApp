<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PolaKerjaKaryawan;

class PolaKerjaController extends Controller
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
        $data ['pola_kerja'] = PolaKerjaKaryawan::all();
        return view ('polakerja.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('polakerja.inputdata');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['pola_kerja'=>'required|unique:pola_kerja_karyawan|min:5']);

        $polaKerja = new PolaKerjaKaryawan();
        $request->validate([
            'pola_kerja'=>'required|min:5',
            'jam_masuk'=>'required|min:2',
            'jam_pulang'=>'required|min:2',
            
            
            ]);
            $polaKerja->pola_kerja = $request->pola_kerja;
            $polaKerja->jam_masuk = $request->jam_masuk;
            $polaKerja->jam_pulang = $request->jam_pulang;
            $polaKerja->save();

        return redirect('polaKerja')->with('message','Data Tersimpan');
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
        $data ['polakerja'] =PolaKerjaKaryawan::find($id);
        return view ('polakerja.edit',$data);
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

        $polaKerja = PolaKerjaKaryawan::find($id);
        $request->validate([
            'pola_kerja'=>'required|min:5',
            'jam_masuk'=>'required|min:2',
            'jam_pulang'=>'required|min:2',
            
            
            ]);
            $polaKerja->pola_kerja = $request->pola_kerja;
            $polaKerja->jam_masuk = $request->jam_masuk;
            $polaKerja->jam_pulang = $request->jam_pulang;        $polaKerja->update();

        return redirect('polaKerja')->with('message','Data Tersimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $polakerja = PolaKerjaKaryawan::find($id);
        $polakerja->delete();
        return redirect('polaKerja')->with('message','Data Terhapus');

    }
}
