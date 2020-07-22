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
          {{Form::open(['url'=>'ubah-periode-kehadiran'])}}
          <table class="table table-bordered">
            <tr>
              <td>Filter Laporan</td>
              <td>{{Form::date('periode_kehadiran',null,['class'=>'form-control'])}}</td>
            </tr>
            <tr>
              <td></td>
              <td>
                <button type="submit" class="btn btn-info">Filter Laporan</button>
                {{link_to('kehadiran/create','Input Data Kehadiran',['class'=>'btn btn-success'])}}
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-default">
                  Export Laporan
                </button>
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#ModalImport">
                  Import Laporan
                </button>
              </td>
            </tr>
          </table>
          {{Form::close()}}
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
                <th>Departemen</th>
                <th>Waktu Masuk</th>
                <th>Waktu Pulang</th>
                <th>Status Kehadiran</th>
               
              
            </tr>
          </thead>
          <tbody>
            @foreach($kehadiran as $row)
          <tr>
              <td>{{$row->nik}}</td>
              <td>{{$row->nama}}</td>
              <td>{{$row->nama_departemen}}</td>
              <td>{{$row->tanggal_masuk}}</td>
              <td>{{$row->tanggal_pulang}}</td>
              <td>{{$row->status_kehadiran}}</td>
         </tr>
          @endforeach
          </tbody>
          
          
         
        </table>
      
    </div>
  </div>
</div>

<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content bg-default">
      <div class="modal-header">
        <h4 class="modal-title">Export Laporan kehadiran</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">

        {{Form::open(['url'=>'export-laporan-kehadiran'])}}

        <table class="table tabtle-bordered">
          <tr>
            <td>Dari Tanggal</td>
            <td>{{Form::date('tanggal_mulai',null,['class'=>'form-control','placeholder'=>'Dari Muali'])}}</td>
          </tr>
          <tr>
            <td>Sampai Tanggal</td>
            <td>{{Form::date('tanggal_selesai',null,['class'=>'form-control','placeholder'=>'Tanggal Selesai'])}}</td>
          </tr>
        </table>

      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Export Laporan</button>
      </div>
      {{Form::close()}}
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<div class="modal fade" id="ModalImport">
  <div class="modal-dialog">
    <div class="modal-content bg-default">
      <div class="modal-header">
        <h4 class="modal-title">Import Laporan kehadiran</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">

        {{Form::open(['url'=>'upload_excel_kehadiran','files'=>true])}}

        <table class="table table-bordered">
          <tr>
            <td>Pilih File</td>
            <td>{{Form::file('file')}}</td>
          </tr>
        </table>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Import Laporan</button>
      </div>
      {{Form::close()}}
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endsection