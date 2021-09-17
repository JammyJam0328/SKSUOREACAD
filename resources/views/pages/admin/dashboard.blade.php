@extends('layouts.admin')

@section('content')

    @livewire('admin.dashboard')
    <hr>
    <div>

        <div>
            <h1>{{ $chart1->options['chart_title'] }}</h1>
            {!! $chart1->renderHtml() !!}
        </div>

    </div>
@endsection

@section('script')
    {!! $chart1->renderChartJsLibrary() !!}
    {!! $chart1->renderJs() !!}
@endsection
