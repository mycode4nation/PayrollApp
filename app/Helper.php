<?php



function hitungJmlKehadiran($nik,$periode)
{
    $sql = "select count(*) as jml_kehadiran from kehadiran where nik='$nik' and left(cast(tanggal_masuk as text),7)='$periode'";
    $jmlKehadiran = \DB::select($sql);
    return $jmlKehadiran[0]->jml_kehadiran;
}


function checkKehadiran($nik,$tanggal)
{
    $kehadiran = \DB::table('kehadiran')->where('nik',$nik)
    ->whereRaw("cast(tanggal_masuk as date)='".$tanggal."'")
    ->first();
   
    if (isset($kehadiran)) {
        return $kehadiran->kode_status_kehadiran;
    } else {
        return "-";
    }
    
}

function  checkLembur($nik,$tanggal){
    $lembur = \DB::table('lembur_karyawan')->where('nik',$nik)
    ->whereRaw("cast(tanggal_masuk as date)='".$tanggal."'")
    ->first();
   
    if (isset($lembur)) {
        return $lembur->durasi_lembur." jam";
    } else {
        return "-";
    }
}

function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,0,',','.');
	return $hasil_rupiah;
 
}
function formatTanggal($tanggal)
{
    return date_format(date_create($tanggal),"d-m-Y");
}

function formatTanggalWaktu($value)
{
    $tanggal      = substr($value,0,10);
    $waktu1       = substr($value,11,5); 
    $tanggal2     = DateTime::createFromFormat('Y-m-d',$tanggal);
    $tanggal3     = $tanggal2->format('d-m-Y'); 
    $tanggalWaktu = $tanggal3." - ".$waktu1;   
    return  $tanggalWaktu;
    //gettype($conversi);
}
?>