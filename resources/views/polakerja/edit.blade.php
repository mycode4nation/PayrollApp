@extends('template')
@section('title','Update Data')

@section('content')
    
@include('alert')
<div class="card card-primary card-outline">
    <div class="card-header">
      <h5 class="card-title m-0">Input Data Departemen</h5>
    </div>
    <div class="card-body">
        {{Form::model($polakerja,['url'=>'polaKerja/'.$polakerja->id,'method'=>'PUT'])}}
            @include('polakerja.form')
        {{Form::close()}}
    </div>
  </div>
</div>


@endsection