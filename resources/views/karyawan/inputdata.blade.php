@extends('template')
@section('title','Input Data')
    
@section('content')
    
@include('validation')
@include('alert')
<div class="card card-primary card-outline">
    <div class="card-header">
        <h5 class="card-title m-0">Input Data Jabatan</h5>
    </div>
    <div class="card-body">
        {{Form::open(['url'=>'karyawan','files'=>true])}}
            @include('karyawan.form')
        {{Form::close()}}    
    </div>
</div>


@endsection