@extends('layouts.requestor')

@section('content')
    @livewire('requestor.finalize',[
    'id'=>$id
    ])
@endsection
