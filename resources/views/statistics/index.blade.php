@extends('layouts.app')

@section('title') Statistics @endsection

@section('content')
    <div class="page-content-wrapper">
        <div class="page-content-inner">

            <!--Personal Dashboard V1-->
            <div class="personal-dashboard personal-dashboard-v1">

                <!--Header-->
                <div class="dashboard-header">
                    <div class="start">
                        <h3>{{ __('Weekly statistics') }}</h3>
                    </div>
                </div>

                <!--Body-->
                <div class="dashboard-body">

                    <div id="customers-chart"></div>

                    <div class="columns is-multiline">
                        @forelse($statistics as $statistic)
                            <!--Card-->
                            <div class="column is-12">
                                <div class="dashboard-card">
                                    <h4 class="dark-inverted">{{ __('Weekly statistics') }}</h4>

                                    <div class="columns is-multiline">
                                        <div class="column is-12">
                                            <div class="columns is-multiline">
                                                <div class="column is-6">
                                                    <div class="quick-stats">
                                                        <div class="quick-stats-inner">
                                                            <!--Stat-->
                                                            <div class="quick-stat">
                                                                <div class="media-flex-center">
                                                                    <div class="h-icon is-purple is-rounded">
                                                                        <i class="far fa-calendar-alt"></i>
                                                                    </div>
                                                                    <div class="flex-meta">
                                                                        <span>{{ $statistic->created_at->format('Y-m-d') ?? __('Unknown') }}</span>
                                                                        <span>{{ __('Statistic generated') }}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--Stat-->
                                                            <div class="quick-stat">
                                                                <div class="media-flex-center">
                                                                    <div class="h-icon is-info is-rounded">
                                                                        <i class="fas fa-money-bill-wave"></i>
                                                                    </div>
                                                                    <div class="flex-meta">
                                                                        <span>{{ \App\Tools::displayPrice($statistic->total_income) }}</span>
                                                                        <span>{{ __('Income') }}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="column is-6">
                                                    <div class="quick-stats">
                                                        <div class="quick-stats-inner">
                                                            <!--Stat-->
                                                            <div class="quick-stat">
                                                                <div class="media-flex-center">
                                                                    <div class="h-icon is-green is-rounded">
                                                                        <i class="fas fa-suitcase-rolling"></i>
                                                                    </div>
                                                                    <div class="flex-meta">
                                                                        <span>{{ $statistic->bookings_count }}</span>
                                                                        <span>{{ __('New bookings') }}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--Stat-->
                                                            <div class="quick-stat">
                                                                <div class="media-flex-center">
                                                                    <div class="h-icon is-info is-rounded">
                                                                        <i class="fas fa-users"></i>
                                                                    </div>
                                                                    <div class="flex-meta">
                                                                        <span>{{ $statistic->new_clients_count }}</span>
                                                                        <span>{{ __('New clients') }}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="column is-12">
                                <div class="dashboard-card">
                                    <h3 class="dark-inverted">{{ __('There is no generated statistics') }}</h3>
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

@push('scripts')
    <script>
        "use strict";

        $(document).ready(function () {
            let newBookings = {{ $statistics->pluck('bookings_count') }};
            let newClients = {{ $statistics->pluck('new_clients_count') }};
            let totalIncome = {{ $statistics->pluck('total_income') }};
            let dates = {!! $statistics->pluck('created_at') !!};

            var customersOptions = {
                series: [{
                    name: 'New bookings',
                    data: newBookings
                }, {
                    name: 'New clients',
                    data: newClients
                }, {
                    name: 'Income',
                    data: totalIncome
                }],
                chart: {
                    height: 295,
                    type: 'area',
                    toolbar: {
                        show: false
                    }
                },
                colors: [themeColors.accent, themeColors.info, themeColors.orange],
                title: {
                    text: 'Statistics',
                    align: 'left'
                },
                legend: {
                    position: 'top'
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    width: [2, 2, 2],
                    curve: 'smooth'
                },
                xaxis: {
                    type: 'datetime',
                    categories: dates
                },
                tooltip: {
                    x: {
                        format: 'dd/MM/yy HH:mm'
                    }
                }
            };
            var customersChart = new ApexCharts(document.querySelector("#customers-chart"), customersOptions);
            customersChart.render();
        });
    </script>
@endpush
