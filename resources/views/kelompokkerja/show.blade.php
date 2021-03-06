@extends('template')
@section('title','Anggota Kelompok Kerja')
@section('content')

    @include('validation')
    @include('alert')
            <div class="card card-primary card-outline">
                <div class="card-header">
                  <h5 class="card-title m-0">Data Anggota Kelompok Kerja</h5>
                </div>
                <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <td>Nama Kelompok Kerja</td>
                    <td> : {{ $kelompokkerja->kelompok_kerja}}</td>
                </tr>
            </table>
        </div>
        <div class="col-md-12">
            {{ Form::open(['url'=>'tambah-kelompok-kerja'])}}
            {{ Form::hidden('id',$kelompokkerja->id)}}
                <table class="table table-bordered">
                    <tr>
                            <td width="500">{{ Form::text('nama',null,['list'=>'karyawan','class'=>'form-control','placeholder'=>'Cari Nama Karyawan'])}}</td>
                        <td><button type="submit" class="btn btn-info">Tambah Anggota</button> <a href="/kelompokKerja" class="btn btn-success">Kembali</a></td>

                    </tr>
                </table>
            {{ Form::close()}}
            <table class="table table-bordered"  id="example1">
                <thead>
                <tr>
                    <th>NIK</th>
                    <th>Nama Karyawan</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($anggota as $row)
                <tr>
                    <td>{{ $row->nik}}</td>
                    <td width ="700">{{ $row->nama}}</td>
                    <td width="150">
                            {{ Form::open(['url'=>'hapus-anggota-kelompok-kerja/'.$row->id,'method'=>'delete'])}}
                             <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash" aria-hidden="true"></i>
                                 Hapus</button>
                            {{ Form::close()}}
                        </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <datalist id="karyawan">
        @foreach($karyawan as $k)
            <option value="{{ $k->nama}}">
        @endforeach
    </datalist>
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