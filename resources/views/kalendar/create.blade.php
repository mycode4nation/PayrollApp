@extends('template')
@section('title','Input Kalendar')
@section('content')
    
@include('validation')

<div class="card card-primary card-outline">
    <div class="card-header">
      <h5 class="card-title m-0">Input Data Kalendar Kerja</h5>
    </div>
    <div class="card-body">
        {{Form::open(['url'=>'kalendar'])}}
        @include('kalendar.form')
        {{Form::close()}}
    </div>
  </div>
</div>


@endsection