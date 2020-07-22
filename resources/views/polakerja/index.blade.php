@extends('template')
@section('title','NAYFA Payroll')
    
@section('content')

<div class="card card-primary card-outline">
    <div class="card-header">
      <h5 class="card-title m-0">Data Pola Kerja Karyawan</h5>
    </div>
    <div class="card-body">
      
      {{link_to('polaKerja/create','Tambah Data',['class'=>'btn btn-success'])}}
      <hr>
        
      @include('alert')
        

        <table class="table table-bordered" id="example1">
          <thead>
            <tr>
              <th>Nama Pola Kerja Karyawan</th>
              <th>Jam Masuk</th>
              <th>Jam Pulang</th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach($pola_kerja as $row)
          <tr>
              <td>{{$row->pola_kerja}}</td>
              <td>{{$row->jam_masuk}}</td>
              <td>{{$row->jam_pulang}}</td>

          <td width = "100"><a href="/polaKerja/{{$row->id}}/edit" class="btn btn-info"><i class="far fa-edit"></i>  Edit</a></td>
          <td width = "120">
            {{Form::open(['url'=>'polaKerja/'.$row->id,'method'=>'Delete'])}}
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