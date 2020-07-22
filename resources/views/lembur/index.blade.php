@extends('template')
@section('title','NAYFA Payroll')
    
@section('content')

<div class="card card-primary card-outline">
    <div class="card-header">
      <h5 class="card-title m-0">Data kehadiran</h5>
    </div>
    <div class="card-body">

      <div class="row">
        <div class="col-md-8">
          {{Form::open(['url'=>'ubah-periode-lembur'])}}
          <table class="table table-bordered">
            <tr>
              <td>Filter Laporan</td>
              <td>{{Form::date('durasi_lembur',null,['class'=>'form-control'])}}</td>
            </tr>
            <tr>
              <td></td>
              <td>
                <button type="submit" class="btn btn-info">Filter Laporan</button>
                {{link_to('lembur/create','Input Data Lembur',['class'=>'btn btn-success'])}}
              </td>
            </tr>
          </table>
        </div>
        <div class="col-md-8">

        </div>
      </div>
      
      <hr>
        
      @include('alert')
        

        <table class="table table-bordered" id="example1">
          <thead>
            <tr>
                <th width="100">NIK</th>
                <th>Nama Karyawan</th>
                <th>Waktu Masuk</th>
                <th>Waktu Pulang</th>
                <th>Durasi Lembur</th>
               
              
            </tr>
          </thead>
          <tbody>
            @foreach($riwayatLembur as $row)
          <tr>
              <td>{{$row->nik}}</td>
              <td>{{$row->nama}}</td>
              <td>{{$row->tanggal_masuk}}</td>
              <td>{{$row->tanggal_pulang}}</td>
              <td>{{$row->durasi_lembur." jam"}}</td>
         </tr>
          @endforeach
          </tbody>
          
          
         
        </table>
      
    </div>
  </div>
</div>

@endsection