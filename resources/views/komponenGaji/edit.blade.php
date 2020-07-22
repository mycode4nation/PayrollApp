@extends('template')
@section('title','Update Data')

@section('content')
@include('validation')    
@include('alert')
<div class="card card-primary card-outline">
    <div class="card-header">
      <h5 class="card-title m-0">Input Data Komponen Gaji</h5>
    </div>
    <div class="card-body">
        {{Form::model($komponen_gaji,['url'=>'komponen_gaji/'.$komponen_gaji->kode_komponen,'method'=>'PUT'])}}
            @include('komponenGaji.form')
        {{Form::close()}}
    </div>
  </div>
</div>


@endsection