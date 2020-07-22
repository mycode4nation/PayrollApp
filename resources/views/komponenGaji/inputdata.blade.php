@extends('template')
@section('title','Input Data')
    
@section('content')
    
@include('validation')
<div class="card card-primary card-outline">
    <div class="card-header">
        <h5 class="card-title m-0">Input Data Komponen Gaji</h5>
    </div>
    <div class="card-body">
        {{Form::open(['url'=>'komponen_gaji'])}}
            @include('komponenGaji.form')
        {{Form::close()}}    
    </div>
</div>


@endsection