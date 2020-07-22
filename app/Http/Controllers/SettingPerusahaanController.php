<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SettingPerusahaan;

class SettingPerusahaanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function index(){
        $data['setting'] = SettingPerusahaan::find(1);
        return view  ('setting_perusahaan.index',$data);
    }

    function simpan(request $r){

      $setting = SettingPerusahaan::find(1);
      
      $setting->nama_perusahaan      = $r->nama_perusahaan;
      $setting->alamat_perusahaan    = $r->alamat_perusahaan;
      $setting->no_telpon            = $r->no_telpon;
      $setting->email                = $r->email;
      $setting->deskripsi_perusahaan = $r->deskripsi_perusahaan;
      $setting->jenis_perusahaan     = $r->jenis_perusahaan;
      $setting->bentuk_perusahaan    = $r->bentuk_perusahaan;



      
      
      if($r->hasFile('logo')){
          $file = $r->file('logo');
          $fileName = $file->getClientOriginalName();
          $destinationPath = 'uploads';
          $file->move($destinationPath,$fileName);
          $setting->logo = $fileName;

      }else{
        $setting->update();
        return redirect('setting')->with('message','Berhasil Menyimpan Perubahan');      }
      
     


    }
}
