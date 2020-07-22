<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KalendarKerja;

class KalendarKerjaController extends Controller
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
        $data ['kalendar'] = KalendarKerja::all();
        return view('kalendar.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kalendar.create');
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
            'tanggal'    => 'required',
            'keterangan' => 'required|min:5'
        ]);
        $kalendar = new KalendarKerja();
        
        $kalendar->tanggal      = $request->tanggal;
        $kalendar->keterangan   = $request->keterangan;

        $kalendar->save();

        return redirect('kalendar')->with('message','Data Tersimpan');
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
        $data ['kalendar'] = KalendarKerja::find($id);
        return view ('kalendar.edit',$data);
     
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
            'tanggal'=>'required',
            'keterangan'=>'required|min:5'
        ]);

        $kalendar = KalendarKerja::find($id);

        $kalendar->tanggal   = $request->tanggal;
        $kalendar->keterangan = $request->keterangan;

        $kalendar->update();

        return redirect('kalendar')->with('message','Data Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kalendar = KalendarKerja::find($id);
        $kalendar->delete();
        return redirect('kalendar')->with('message','Data Berhasil Terhapus');

    }
}
