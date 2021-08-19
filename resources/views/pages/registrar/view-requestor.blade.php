@extends('layouts.registrar')
@section('pageName')
    Requestor Details
@endsection
@section('content')
    @livewire('registrar.view-requestor',[
    'id'=>$id
    ])
@endsection
