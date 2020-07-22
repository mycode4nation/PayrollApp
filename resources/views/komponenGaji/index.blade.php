@extends('template')
@section ('title','Komponen Gaji')

@section('content')

<div class="card card-primary card-outline">
    <div class="card-header">
      <h5 class="card-title m-0">Data Komponen Gaji</h5>
    </div>
    <div class="card-body">
      
      
      {{link_to('komponen_gaji/create','Tambah Data',['class'=>'btn btn-success'])}}
      <hr>
      
      @include('alert')


        <table class="table table-bordered" id="example1">
          <thead>
            <tr>
              <th width = "200">Kode Komponen Gaji</th>
              <th>Komponen Gaji</th>
              <th>Jenis</th>
              <th>Nilai</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach($komponen_gaji as $row)
          <tr>
              <td>{{$row->kode_komponen}}</td>
              <td>{{$row->nama_komponen}}</td>
              <td>{{$row->jenis}}</td>
              <td>{{rupiah($row->nilai)}}</td>
          <td width = "100"><a href="/komponen_gaji/{{$row->kode_komponen}}/edit" class="btn btn-info"><i class="far fa-edit"></i>  Edit</a></td>
          <td width = "120">
            {{Form::open(['url'=>'komponen_gaji/'.$row->kode_komponen,'method'=>'Delete'])}}
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