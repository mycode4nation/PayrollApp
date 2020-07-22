<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departemen;

class DepartemenController extends Controller
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
        $data['departemen'] = Departemen::all();

        return view ('departemen.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('departemen.inputdata');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $departemen = new Departemen();
        $request->validate([
            'kode_departemen' => 'required|unique:departemen|max:8|min:1',
            'nama_departemen' => 'required|min:5',
        ]);
        $departemen->kode_departemen = $request->kode_departemen;
        $departemen->nama_departemen = $request->nama_departemen;
        $departemen->save();

        return redirect('departemen')->with('message','Data Berhasil ditambahkan');
    
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
        $data ['departemen'] = Departemen::find($id);
        return view ('departemen.edit',$data);
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
        
            'nama_departemen' => 'required|min:5',
        ]);
        $departemen = Departemen::find($id);
       
        $departemen->nama_departemen = $request->nama_departemen;
        $departemen->update();

        return redirect('departemen')->with('message','Data Berhasil diperbaruhi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $departemen = Departemen::find($id);
        $departemen->delete();

        return redirect('departemen')->with('message','Data Berhasil Terhapus');
    }
}
