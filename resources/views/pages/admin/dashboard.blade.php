@extends('layouts.admin')

@section('content')

    @livewire('admin.dashboard')
    <hr>
    <div>
        @livewire('admin.chart')
    </div>
    <hr>
    <div class="bg-white px-4 py-5 border-b border-gray-200 sm:px-6 mt-4">
        <h3 class="text-lg leading-6 font-medium text-gray-900">
            Request Per Day
        </h3>
    </div>
    <div class="mt-4 bg-white p-2 rounded-md shadow-md">
        <h1>{{ $chart1->options['chart_title'] }}</h1>
        {!! $chart1->renderHtml() !!}
    </div>
@endsection

@section('script')
    {!! $chart1->renderChartJsLibrary() !!}
    {!! $chart1->renderJs() !!}
@endsection
