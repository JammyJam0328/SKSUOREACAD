@extends('layouts.requestor')

@section('content')
    @livewire('requestor.view-request-details',[
        'id'=>$id
    ])
@endsection