@extends('template')
@section('title','Laporan Gaji')

@section('content')
@include('validation')
@include('alert') 

<div class="card card-primary card-outline">
    <div class="card-header">
      <h5 class="card-title m-0">Laporan Gaji Karyawan</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-5">
                {{Form::open(['url'=>'ubah-periode-gaji'])}}
                <table class="table table-bordered">
                    <tr>
                        <td width="205">Periode Laporan</td>
                        <td width=240>{{ Form::select('periode',$periode_gaji,null,['class'=>'form-control'])}}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><button type="submit" class="btn btn-danger">Tampilkan</button></td>
                    </tr>
                </table>
                {{Form::close()}}

                {{Form::open(['url'=>'gaji'])}}
                <table class="table table-bordered">

                    <h4>Input Periode Gaji</h4>
                    <hr>
                    <tr>
                        <td width="205">Periode Gaji</td>
                        <hr>
                        <td>{{Form::text('periode',null,['class'=>'form-control','placeholder'=>'EX 20194'])}}</td>

                    </tr>
                    
                  
                    <tr>
                        <td></td>
                        <td><button type="submit" class="btn btn-danger">Buat Laporan</button></td>
                    </tr>
                </table>
                {{Form::close()}}
            </div>
            <div class="col-md-7">
                <table class="table table-bordered">
                    <tr>
                        <th>NIK</th>
                        <th>Nama Karyawan</th>
                        <th>Periode Gaji</th>
                        <th>Detail</th>
                        <th>Cetak</th>
                    </tr>

                    @foreach ($riwayat_gaji as $g)
                        <tr>
                        <td>{{$g->nik}}</td>
                        <td>{{$g->nama}}</td>
                        <td>{{$g->periode}}</td>
                        <td>
                        <a href="gaji/{{$g->id}}" class="btn btn-success">Detail</a>
                        </td>
                        <td>
                        <a href="/gaji/{{$g->id}}/pdf" class="btn btn-info">Cetak</a>  
                        </td>
                           
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
  </div>
</div>

@endsection