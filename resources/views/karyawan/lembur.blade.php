@extends('template')
@section('title','Riwayat Lembur')
@section('content')


<div class="card card-primary card-outline">
    <div class="card-header">
      <h5 class="card-title m-0">Data Riwayat Lembur karyawan</h5>
    </div>
    <div class="card-body">
    @include('validation')

    @include('alert')
    @include('karyawan.tab')    
    @include('karyawan.filter')

    <div class="row">
        <div class="col-md-3">
            
            <table class="table table-bordered">
                <tr>
                    <td><img src="{{ asset('uploads/'.$karyawan->foto)}}" width="220"></td>
                </tr>
                <tr>
                    <td>{{ $karyawan->nama}}</td>
                </tr>
            </table>
        </div>
        <div class="col-md-9">

            {{-- @include('karyawan.filter') --}}
                       
            <table class="table table-bordered">
                <tr>
                    <th>Tanggal Masuk</th>
                    <th>Tanggal Pulang</th>
                    <th>Durasi Lembur</th>

                </tr>
                @foreach($riwayatLembur as $row)
                <tr>
                    <td>{{ formatTanggalWaktu($row->tanggal_masuk)}} </td>
                    <td>{{ formatTanggalWaktu($row->tanggal_pulang)}} </td>
                    <td>{{ $row->durasi_lembur. " jam"}} </td>

                </tr>
                @endforeach
            </table>
            <div class="row">
                <div class="col-md-4">
                    <a href="/karyawan" class="btn btn-info">Kembali</a>
                </div>
            </div>
            <br>
            {{  $riwayatLembur->links()}}
          
           
            </div>
        </div>
    </div>
</div>

@endsection