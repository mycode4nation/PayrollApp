@extends('template')
@section('title','Input Data')
@section('content')

@include('validation')
<div class="card card-primary card-outline">
    <div class="card-header">
      <h5 class="card-title m-0">Input Data Kelompok Kerja</h5>
    </div>
    <div class="card-body">
        {{Form::open(['url'=>'kelompokKerja'])}}
        @include('kelompokkerja.form')
        {{Form::close()}}
    </div>
  </div>
</div>

@endsection