@extends('layouts.registrar')
@section('pageName')
    Request Details
@endsection
@section('content')
    @livewire('registrar.view-request',[
    'id'=>$id
    ])
@endsection
