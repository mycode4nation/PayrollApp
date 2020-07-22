@extends('template')
@section('title','Update Data')

@section('content')
@include('validation')   
@include('alert')
<div class="card card-primary card-outline">
    <div class="card-header">
      <h5 class="card-title m-0">Input Data Departemen</h5>
    </div>
    <div class="card-body">
      @include('karyawan.tab')
        {{Form::model($karyawan,['url'=>'karyawan/'.$karyawan->nik,'method'=>'PUT','files'=>true])}}
            @include('karyawan.form')
        {{Form::close()}}
    </div>
  </div>
</div>


@endsection