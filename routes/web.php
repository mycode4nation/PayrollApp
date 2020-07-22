<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::get('/{any}','dashboardcontroller@index')->where('any','.*');

Route::get('/',function() {
    return redirect('login');
});

// Route::get('/departemen',function() {
//     return view('departemen.index');
// });

Route::get('setting','SettingPerusahaanController@index');
Route::get('dashboard','dashboardcontroller@index');
Route::get('kehadiran','KehadiranController@index');
Route::get('kehadiran/create','KehadiranController@create');
Route::get('kelompokKerja/{id}/polakerja','KelompokKerjaController@polaKerja');
Route::get('karyawan/{nik}/polakerja','KaryawanController@polaKerja');
Route::get('karyawan/{nik}/kehadiran','KaryawanController@kehadiran');
Route::get('karyawan/{nik}/lembur','KaryawanController@riwayatLemburKaryawan');
Route::get('lembur','LemburController@index'); 
Route::get('lembur/create','LemburController@create');
Route::get('gaji/{id}/pdf','GajiController@cetakLaporanpdf'); 
Route::post('simpan-pola-kerja-kelompok-karyawan','KelompokKerjaController@simpanPolaKeja');
Route::post('kehadiran','KehadiranController@store');
Route::post('setting','SettingPerusahaanController@simpan');
Route::post('ubah-periode-kehadiran','KehadiranController@ubahperiode');
Route::post('tambah-kelompok-kerja','KelompokKerjaController@tambahAnggota');
Route::post('lembur','LemburController@simpanLembur');
Route::post('ubah-periode-lembur','LemburController@periodeLembur');
Route::post('export-laporan-kehadiran','KehadiranController@excel');
Route::post('upload_excel_kehadiran','KehadiranController@import');
Route::delete('hapus-anggota-kelompok-kerja/{id}','KelompokKerjaController@hapusAnggotaKerja');
Route::delete('hapus-pola-kerja-kelompok-karyawan/{id}','KelompokKerjaController@hapusPolaKerja');
Route::delete('hapus-komponen-gaji/{id}','GajiController@hapusKomponenGaji');
Route::resource('polaKerja','PolaKerjaController');
Route::resource('departemen','DepartemenController');
Route::resource('karyawan','KaryawanController');
Route::resource('jabatan','JabatanController');
Route::resource('kalendar','KalendarKerjaController');
Route::resource('kelompokKerja','KelompokKerjaController');
Route::resource('komponen_gaji','KomponenGajiController');
Route::resource('gaji','GajiController');
Route::post('ubah-periode-gaji','GajiController@ubahPeriodeGaji');
Route::post('tambah_komponen_gaji','GajiController@tambahKomponenDetail');





Auth::routes();

Route::get('/karyawan', 'KaryawanController@index')->name('home');


