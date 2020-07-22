@extends('template')
@section('title','Input Data')
@section('content')

@include('validation')
<div class="card card-primary card-outline">
    <div class="card-header">
      <h5 class="card-title m-0">Input Data Pola Kerja</h5>
    </div>
    <div class="card-body">
        {{Form::open(['url'=>'polaKerja'])}}
        @include('polakerja.form')
        {{Form::close()}}
    </div>
  </div>
</div>

@endsection