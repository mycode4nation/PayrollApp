@extends('template')
@section('title','Kehadiran')
@section('content')

@include('validation')
@include('alert')
<div class="card card-primary card-outline">
    <div class="card-header">
      <h5 class="card-title m-0">Input Data Departemen</h5>
    </div>
    <div class="card-body">
        {{Form::open(['url'=>'kehadiran'])}}
        @include('kehadiran.form')
        {{Form::close()}}
    </div>
  </div>
</div>

@endsection