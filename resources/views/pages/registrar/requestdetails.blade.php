@extends('layouts.registrar')

@section('content')
    @livewire('registrar.requestdetails',[
        'id'=>$id
    ])
@endsection