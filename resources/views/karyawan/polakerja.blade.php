@extends('template')
@section('title','Pola Kerja Karyawan')
@section('content')

    @include('validation')

    @include('alert')

    {{-- @include('karyawan.tab') --}}

<div class="card card-primary card-outline">
    <div class="card-header">
        <h5 class="card-title m-0">Data Pola Kerja Karyawan</h5>
    </div>
     <div class="card-body"> 
        @include('karyawan.tab')  
        @include('karyawan.filter') 
       
    <div class="row">
        <div class="col-md-3">  
            <table class="table table-bordered">
                <tr>
                    <td>
                        @if (isset($karyawan->foto)!=null)
                        <img src="{{ asset('uploads/'.$karyawan->foto)}}" width="220"></td>
 
                        @else
                        <img src="{{ asset('uploads/default_logo.jpg')}}" width="220"></td>
    
                        @endif
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
                    <th>Tanggal</th>
                    <th>Pola Kerja</th>
                    <th>Jam Masuk</th>
                    <th>Jam Pulang</th>
                </tr>
                @foreach($polaKerjaKaryawan as $row)
                <tr>
                    <td>{{ date('l', strtotime($row->tanggal)) }},  {{ date_format(date_create($row->tanggal),"d-m-Y")  }} </td>
                    <td>{{ $row->pola_kerja}} </td>
                    <td>{{ $row->jam_masuk}} </td>
                    <td>{{ $row->jam_pulang}} </td>
                </tr>
                @endforeach
            </table>
            <div class="row">
                <div class="col-md-4">
                    <a href="/karyawan" class="btn btn-info">Kembali</a>
                </div>
            </div>
                <br>
            {{  $polaKerjaKaryawan->links()}}
           
            </div>
        </div>
    </div>
</div> 

@endsection