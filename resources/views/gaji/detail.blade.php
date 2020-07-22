@extends('template')
@section('title','Detail Gaji')
@section('content') 

@include('validation')




<div class="card card-primary card-outline">
    <div class="card-header">
      <h5 class="card-title m-0">Data Detail Slip Gaji</h5>
    </div>
    @include('alert')
    <div class="card-body">
      
        <div class="row">
            <div class="col-md-3">
                <table class="table table-bordered">
                    <tr>
                        <td>
                            @if (isset($karyawan->foto)!=null)
                            <img src="{{ asset('uploads/'.$karyawan->foto)}}" width="220"></td>
     
                            @else
                            <img src="{{ asset('uploads/default_logo.jpg')}}" width="220"></td>
        
                            @endif
                    </tr>
                    <tr>
                        <td>{{ $karyawan->nama}}</td>
                    </tr>
                </table>
            </div>
            <div class="col-md-8">

                {{Form::open(['url'=>'tambah_komponen_gaji'])}}
                {{Form::hidden('gaji_id',$detail_gaji->id)}}
                <table class="table table-bordered">
                    <tr>
                            <td>{{Form::select('kode_komponen',$komponen_gaji,null,['class','=','form-control'])}}</td>
                            <td><button type="submit" class="btn btn-info">Tambah Komponen</button></td>
                        </td>
                    </tr>
                </table>
                 {{Form::close()}}       
                <table class="table table-bordered">
                        <tr>
                            <th>Komponen Gaji</th>
                            <th>Nominal</th>
                            <th>Jenis</th>
                            
                        <tr>
                        <tr>
                           <td>Gaji Pokok</td>
                           <td>{{'Rp. '.number_format($karyawan->gaji_pokok,2,',','.')}}</td>
                           <td>Tetap</td>
                        <tr>
                            <td>Tunjangan Jabatan</td>
                            <td>{{'Rp. '.number_format($karyawan->tunjangan_jabatan,2,',','.')}}</td>
                            <td>Tunjangan</td>
                        </tr>

                        <?php
                                $pendapatan_tambahan = 0;
                        ?>
                        @if(isset($gajiDetail))
                        @foreach ($gajiDetail as $g)
                            <tr>
                                <td>{{$g->nama_komponen}}</td>
                                <td>{{"Rp. ".number_format($g->nilai,2,',','.')}}</td>
                                <td>{{$g->jenis}}</td>
                                <td>
                                    {{Form::open(['url'=>'hapus-komponen-gaji/'.$g->id,'method'=>'delete'])}}
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    {{Form::close()}}
                                </td>
                            </tr>

                            <?php 
                                if($g->jenis =='Tunjangan'){
                                    $pendapatan_tambahan = $pendapatan_tambahan + $g->nilai;
                                }else{
                                    $pendapatan_tambahan = $pendapatan_tambahan - $g->nilai;
                                }
                            ?>
                        @endforeach
                        @endif
                        <?php
                            $durasiLembur =$hitung_lembur[0]->durasi_lembur;
                            $upahLembur = $durasiLembur*20000;
                            $total =  $karyawan->gaji_pokok + $karyawan->tunjangan_jabatan +$pendapatan_tambahan+$upahLembur;
                        ?>

                        <tr>
                            <td>Lembur</td>
                            <td>Detail Durasi Lembur : <br>{{$durasiLembur."Jam x Rp 20.000/jam"}}<br>{{"Rp ".number_format($upahLembur,2,',','.')}}</td>
                            <td>Upah Tambahan</td>
                        </tr>
                        <tr>
                            <td>Total Pendapatan</td>
                            <td>{{"Rp ".number_format($total,2,',','.')}}</td>
                        </tr>
                        
                    </table>
            </div>
        </div>
    </div>
  </div>
</div>








<div class="card card-primary card-outline">
    <div class="card-header">
      <h5 class="card-title m-0">Riwayat Kehadiran dan Lembur</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered">
                        <tr>
                            <th>Tanggal</th>
                             <?php 
                                $bulan = substr($periode,5,2);
                                $tahun = substr($periode,0,4);
        
                                for ($i=1; $i <= 31; $i++) { 
                                    
                                    $waktu = mktime(12,0,0,$bulan,$i,$tahun);
                                    if(date('m',$waktu)==$bulan){
                                        //$list[]=date('Y-m-d-D',$waktu); 
        
                                        echo "<td>".date('d',$waktu)."</td>";
                                    }
                                }
        
                             ?>
                        </tr>

                        <tr>
                            <td>Kehadiran</td>
                            <?php 
                                $bulan = substr($periode,5,2);
                                $tahun = substr($periode,0,4);
        
                                for ($i=1; $i <= 31; $i++) { 
                                    
                                    $waktu = mktime(12,0,0,$bulan,$i,$tahun);
                                    if(date('m',$waktu)==$bulan){
                                        //$list[]=date('Y-m-d-D',$waktu); 
        
                                        echo "<td>".checkKehadiran($karyawan->nik,date('yy-m-d',$waktu))."</td>";
                                    }
                                }
        
                             ?>
                        </tr>

                        <tr>
                            <td>Lembur</td>
                            <?php 
                                $bulan = 3;
                                $tahun = 2020;
        
                                for ($i=1; $i <= 31; $i++) { 
                                    
                                    $waktu = mktime(12,0,0,$bulan,$i,$tahun);
                                    if(date('m',$waktu)==$bulan){
                                        //$list[]=date('Y-m-d-D',$waktu); 
        
                                        echo "<td>".checkLembur($karyawan->nik,date('yy-m-d',$waktu))."</td>";
                                    }
                                }
        
                             ?>
                        </tr>
                </table>
            </div>
        </div>
        
    </div>
  </div>
</div>


@endsection