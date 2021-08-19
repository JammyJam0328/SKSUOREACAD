@extends('layouts.registrar')
@section('pageName')
    Request Details
@endsection
@section('content')
    @livewire('registrar.requestdetails',[
    'id'=>$id
    ])
@endsection
