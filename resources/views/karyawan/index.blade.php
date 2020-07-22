@extends('template')
@section ('title','karyawan')

@section('content')
<div class="card card-primary card-outline">
    <div class="card-header">
      <h5 class="card-title m-0">Data karyawan</h5>
    </div>
    <div class="card-body">
      
      <a href="karyawan/create" class="btn btn-danger"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Tambah Data</a>
      <hr>

      @include('alert')


      <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th width = "20">Kode karyawan</th>
              <th>Nama karyawan</th>
              <th>Departemen</th>
              <th>Jabatan</th>
              <th>Tanggal Masuk</th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach($karyawan as $row)
          <tr>
              <td width = "150">{{$row->nik}}</td>
              <td width = "180">{{$row->nama}}</td>
              <td>{{$row->nama_departemen}}</td>             
              <td>{{$row->nama_jabatan}}</td>
              <td width = "130">{{formatTanggal($row->tanggal_masuk)}}</td>
              <td width = "90"><a href="/karyawan/{{$row->nik}}/edit" class="btn btn-info"><i class="far fa-eye"></i> Detail</a></td>
              <td width = "90">
            {{Form::open(['url'=>'karyawan/'.$row->nik,'method'=>'Delete'])}}
            <button type="submit" class=" btn btn-danger"><i class="far fa-trash-alt"></i> Hapus</button>
            {{Form::close()}}
          </td>
         </tr>
          @endforeach
          </tbody>
          
          
         
        </table>
      
    </div>
  </div>
</div>
@endsection

