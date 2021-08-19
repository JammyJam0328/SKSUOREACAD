@extends('layouts.registrar')
@section('pageName')
    Request Details
@endsection
@section('content')
    @livewire('registrar.graduated-request-details',[
    'id'=>$id
    ])
@endsection
