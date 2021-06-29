@extends('layouts.registrar')

@section('content')
    @livewire('registrar.view-requestor',[
    'id'=>$id
    ])
@endsection
