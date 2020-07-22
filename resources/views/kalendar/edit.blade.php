@extends('template')
@section('title','Input Kalendar')
@section('content')
    
@include('validation')

<div class="card card-primary card-outline">
    <div class="card-header">
      <h5 class="card-title m-0">Edit Data Kalendar Kerja</h5>
    </div>
    <div class="card-body">
        {{Form::model($kalendar,['url'=>'kalendar/'.$kalendar->id.'','method'=>'PUT'])}}
        @include('kalendar.form')
        {{Form::close()}}
    </div>
  </div>
</div>


@endsection