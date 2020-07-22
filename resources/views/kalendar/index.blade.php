@extends('template')
@section('title','Kalendar')
@section('content')

<div class="card card-primary card-outline">
    <div class="card-header">
      <h5 class="card-title m-0">Data Jabatan</h5>
    </div>
    <div class="card-body">
      
      {{link_to('kalendar/create','Tambah Data',['class'=>'btn btn-success'])}}
      <hr>

      @include('alert')


        <table class="table table-bordered" id="example1">
          <thead>
            <tr>
            
              <th>Tanggal</th>
              <th>Keterangan</th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach($kalendar as $row)
          <tr>
              
              <td width="90">{{formatTanggal($row->tanggal)}}</td>
              <td width="100">{{$row->keterangan}}</td>
              <td width = "100"><a href="/kalendar/{{$row->id}}/edit" class="btn btn-info"><i class="far fa-edit"></i>  Edit</a></td>
              <td width = "120">
                {{Form::open(['url'=>'kalendar/'.$row->id,'method'=>'Delete'])}}
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
