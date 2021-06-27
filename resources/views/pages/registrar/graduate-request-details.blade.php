@extends('layouts.registrar')

@section('content')
    @livewire('registrar.graduated-request-details',[
        'id'=>$id
    ])
@endsection