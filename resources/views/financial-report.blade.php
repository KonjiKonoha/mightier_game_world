<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Game Control') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <header>
                        <h2 class="text-4xl font-extrabold dark:text-white mb-4">Financial Report</h2>
                    </header>

                    <div class="p-4">
                        <div class="bg-white rounded-lg shadow-md p-4">
                            <div class="text-xl font-bold">Profit and Lost</div>
                            <div class="text-gray-700 mt-2">
                                <canvas id="sales-chart"></canvas>
                            </div>
                        </div>
                    </div>

                    <!-- Widgets -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
                        <!-- Other widgets -->
                        <div class="flex p-4">
                            <div class="bg-white rounded-lg shadow-md p-4 w-full text-center">
                                <div class="text-xl font-bold dark:text-gray-700">Total Deposit</div>
                                <div class="text-gray-700 mt-2">
                                    $ {{ number_format($total_deposit, 2, '.', ',') }}
                                </div>
                            </div>
                        </div>

                        <div class="flex p-4">
                            <div class="bg-white rounded-lg shadow-md p-4 w-full text-center">
                                <div class="text-xl font-bold dark:text-gray-700">Total Withdraw</div>
                                <div class="text-gray-700 mt-2">
                                    $ {{ number_format($total_withdrawal, 2, '.', ',') }}
                                </div>
                            </div>
                        </div>

                        <div class="flex p-4">
                            <div class="bg-white rounded-lg shadow-md p-4 w-full text-center">
                                <div class="text-xl font-bold dark:text-gray-700">Total Credit</div>
                                <div class="text-gray-700 mt-2">
                                    $ {{ number_format($total_credit, 2, '.', ',') }}
                                </div>
                            </div>
                        </div>

                        <div class="flex p-4">
                            <div class="bg-white rounded-lg shadow-md p-4 w-full text-center">
                                <div class="text-xl font-bold dark:text-gray-700">Profit/Lost</div>
                                <div class="text-gray-700 mt-2">
                                    $ {{ number_format($pnl, 2, '.', ',') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- include the jQuery library from a CDN -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
        <script>
            $(function() {
                $.ajax({
                    url: '{{ route('sales.report') }}',
                    method: 'GET',
                    success: function(response) {
                        console.log(response.data);
                        var ctx = document.getElementById('sales-chart').getContext('2d');
                        var chart = new Chart(ctx, {
                            type: 'line',
                            data: {
                                labels: response.data.map(function(sale) {
                                    return sale.date;
                                }),
                                datasets: [{
                                        label: 'Deposit',
                                        data: response.data.map(function(sale) {
                                            return sale.deposit;
                                        }),
                                        fill: false,
                                        borderColor: 'rgba(54, 162, 235, 1)',
                                        borderWidth: 1
                                    },
                                    {
                                        label: 'Withdrawal',
                                        data: response.data.map(function(sale) {
                                            return sale.withdrawal;
                                        }),
                                        fill: false,
                                        borderColor: 'rgba(255, 99, 132, 1)',
                                        borderWidth: 1
                                    },
                                ]
                            },
                            options: {
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                            beginAtZero: true
                                        }
                                    }]
                                }
                            }
                        });
                    }
                });
            });
        </script>
</x-app-layout>
