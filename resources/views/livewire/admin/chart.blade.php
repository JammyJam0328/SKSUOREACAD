<div class="space-y-4">
    <div class="bg-white px-4 py-5 border-b border-gray-200 sm:px-6">
        <h3 class="text-lg leading-6 font-medium text-gray-900">
            Request Status
        </h3>
    </div>
    <div class="h-96  bg-white shadow-md p-4 rounded-md">

        <livewire:livewire-column-chart :column-chart-model="$columnChartModel1" />
    </div>
    <hr>
    <div class="bg-white px-4 py-5 border-b border-gray-200 sm:px-6">
        <h3 class="text-lg leading-6 font-medium text-gray-900">
            Request By Campus
        </h3>
    </div>

    <div class="h-96 bg-white shadow-md p-4 rounded-md">
        <livewire:livewire-column-chart :column-chart-model="$columnChartModel2" />
    </div>

</div>
