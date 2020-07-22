@extends('template')
@section ('title','Jabatan')

@section('content')
<div class="card card-primary card-outline">
    <div class="card-header">
      <h5 class="card-title m-0">Data Jabatan</h5>
    </div>
    <div class="card-body">
      
      {{link_to('jabatan/create','Tambah Data',['class'=>'btn btn-success'])}}
      <hr>

      @include('alert')


        <table class="table table-bordered" id="example1">
          <thead>
            <tr>
              <th width = "200">Kode Jabatan</th>
              <th>Nama Jabatan</th>
              <th>Tunjangan</th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach($jabatan as $row)
          <tr>
              <td>{{$row->kode_jabatan}}</td>
              <td>{{$row->nama_jabatan}}</td>
              <td>{{rupiah($row->tunjangan_jabatan)}}</td>
          <td width = "100"><a href="/jabatan/{{$row->kode_jabatan}}/edit" class="btn btn-info"><i class="far fa-edit"></i>  Edit</a></td>
          <td width = "120">
            {{Form::open(['url'=>'jabatan/'.$row->kode_jabatan,'method'=>'Delete'])}}
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