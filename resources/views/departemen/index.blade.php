@extends('template')
@section('title','NAYFA Payroll')
    
@section('content')

<div class="card card-primary card-outline">
    <div class="card-header">
      <h5 class="card-title m-0">Data Departemen</h5>
    </div>
    <div class="card-body">
      
      {{link_to('departemen/create','Tambah Data',['class'=>'btn btn-success'])}}
      <hr>
        
      @include('alert')
        

        <table class="table table-bordered" id="example1">
          <thead>
            <tr>
              <th width = "200">Kode Departemen</th>
              <th>Nama Departemen</th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach($departemen as $row)
          <tr>
              <td>{{$row->kode_departemen}}</td>
              <td>{{$row->nama_departemen}}</td>
          <td width = "100"><a href="/departemen/{{$row->kode_departemen}}/edit" class="btn btn-info"><i class="far fa-edit"></i>  Edit</a></td>
          <td width = "120">
            {{Form::open(['url'=>'departemen/'.$row->kode_departemen,'method'=>'Delete'])}}
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