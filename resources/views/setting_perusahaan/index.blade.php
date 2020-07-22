@extends('template')
@section('title','Setting')
@section('content')

@include('validation')

{{Form::model($setting,['url'=>'setting','files'=>true])}}

    @include('alert')
    @include('setting_perusahaan.input_data')

{{Form::close()}}

@endsection