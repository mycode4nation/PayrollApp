<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jabatan;

class JabatanController extends Controller
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
        $data['jabatan'] = Jabatan::all();
        return view ('jabatan.index',$data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('jabatan.inputdata');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jabatan = new Jabatan ();
        $request->validate([
            'kode_jabatan'=>'required|unique:jabatan|max:5|min:2',
            'nama_jabatan'=>'required|unique:jabatan|max:20',
            'tunjangan_jabatan'=>'required|max:20',
        ]);

            $tunjangan1 = preg_replace("/[^0-9]/", "", $request->tunjangan_jabatan);
        //  var_dump($gajiPokok1);
            $tunjangan_jabatan = (int)$tunjangan1;
          
    
        $jabatan->kode_jabatan = $request->kode_jabatan;
        $jabatan->nama_jabatan = $request->nama_jabatan;
        $jabatan->tunjangan_jabatan    = $tunjangan_jabatan ;
        $jabatan->save();
        
        return redirect('jabatan')->with('message','Data Berhasil disimpan');
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
        $data ['jabatan'] = Jabatan::find($id);
        return view ('jabatan.edit',$data);
        
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
            'nama_jabatan'      =>'required|min:5|max:30',
            'tunjangan_jabatan' =>'required',
            
        ]);
        $jabatan = Jabatan::find($id);
        $tunjangan1 = preg_replace("/[^0-9]/", "", $request->tunjangan_jabatan);
        //  var_dump($gajiPokok1);
            $tunjangan_jabatan = (int)$tunjangan1;
          
    
       
        $jabatan->nama_jabatan = $request->nama_jabatan;
        $jabatan->tunjangan_jabatan    = $tunjangan_jabatan ;
        $jabatan->update();
        return redirect('jabatan')->with('message','Data Berhasil diperbarui');
         
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jabatan = Jabatan::find($id);
        $jabatan->delete();

        return redirect('jabatan')->with('message','Data Berhasil dihapus');
        
    }
}
