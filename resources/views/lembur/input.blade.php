@extends('template')
@section('title','Input Data')
    
@section('content')
    
@include('validation')
@include('alert_lembur')
<div class="card card-primary card-outline">
    <div class="card-header">
        <h5 class="card-title m-0">Input Data Lembur</h5>
    </div>
    <div class="card-body">
        {{Form::open(['url'=>'lembur'])}}
            @include('lembur.form')
        {{Form::close()}}    
    </div>
</div>


@endsection