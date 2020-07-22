@extends('template')
@section('title','NAYFA Payroll')
    
@section('content')

<div class="card card-primary card-outline">
    <div class="card-header">
      <h5 class="card-title m-0">Data Kelompok Kerja</h5>
    </div>
    <div class="card-body">
      
      {{link_to('kelompokKerja/create','Tambah Data',['class'=>'btn btn-success'])}}
      <hr>
        
      @include('alert')
        

        <table class="table table-bordered" id="example1">
          <thead>
            <tr>
              <th>kelompok Kerja</th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach($kelompokkerja as $row)
            <tr>
              <td width="350">{{ $row->kelompok_kerja }}</td>
              <td width="90"><a href="/kelompokKerja/{{ $row->id}}/polakerja" class="btn btn-success "><i class="fa fa-calendar" aria-hidden="true"></i>
                  Pola Kerja</a></td>
              <td width="90"><a href="/kelompokKerja/{{ $row->id}}" class="btn btn-success"><i class="fa fa-users" aria-hidden="true"></i>
                  Anggota</a></td>
              <td width="50"><a href="/kelompokKerja/{{ $row->id}}/edit" class="btn btn-success"><i class="far fa-edit" aria-hidden="true"></i>
                   Edit</a></td>
              <td width="50">
                  {{ Form::open(['url'=>'kelompokKerja/'.$row->id,'method'=>'delete'])}}
                   <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt" aria-hidden="true"></i>
                       Hapus</button>
                  {{ Form::close()}}
              </td>
          </tr>
          @endforeach
          </tbody>
          
          
         
        </table>
      
    </div>
  </div>
</div>

@endsection
@push('scipts')
<!-- DataTables -->
<script src="https://adminlte.io/themes/AdminLTE/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="https://adminlte.io/themes/AdminLTE/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<!-- page script -->
<script>
        $(function () {
          $('#example1').DataTable()
          $('#example2').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
          })
        })
      </script>
@endpush