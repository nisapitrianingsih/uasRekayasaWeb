@extends('layouts.app')
@section('title', ' | Dashboard')
@section('content')
    <div class="container">
        <h1>Dashboard</h1>
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-6 col-md-4 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center mr-2 ml-2">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Earnings (Monthly)</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    Rp {{ number_format($totalSalePrice, 2) }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-fw fa-wallet fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-6 col-md-4 mb-4">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center ml-2 mr-2">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                    Expends (Monthly)</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Rp
                                    {{ number_format($totalPurchasePrice, 2) }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-4">
                <canvas id="salesChart"></canvas>
            </div>
            <div class="col-md-4">
                <canvas id="stockChart"></canvas>
            </div>
            <div class="col-md-4">
                <canvas id="stockChartMin"></canvas>
            </div>
        </div>
    </div>

    {{-- slide product geser --}}
    <div class="container mt-5">
        <div class="row">
            <h2>Products</h2>
            <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @php
                        $chunks = $products->chunk(5);
                    @endphp
                    @foreach ($chunks as $index => $chunk)
                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                            <div class="row">
                                @foreach ($chunk as $product)
                                    <div class="col-md-2">
                                        <div class="card h-100">
                                            <!-- Menggunakan kelas h-100 untuk memastikan tinggi maksimal -->
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $product->name }}</h5>
                                                <p class="card-text">Stock: {{ $product->stock }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Sales Chart
            var ctx = document.getElementById('salesChart').getContext('2d');
            var salesData = @json($sales);
            var salesLabels = salesData.map(function(sale) {
                return sale.date;
            });
            var salesAmounts = salesData.map(function(sale) {
                return sale.total_sales;
            });

            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: salesLabels,
                    datasets: [{
                        label: 'Sales',
                        data: salesAmounts,
                        borderColor: 'rgba(75, 192, 192, 1)',
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // Stock Chart
            var stockCtx = document.getElementById('stockChart').getContext('2d');
            var stockData = @json($products);
            var stockLabels = stockData.map(function(product) {
                return product.name;
            });
            var stockAmounts = stockData.map(function(product) {
                return product.stock;
            });

            new Chart(stockCtx, {
                type: 'bar',
                data: {
                    labels: stockLabels,
                    datasets: [{
                        label: 'Stock',
                        data: stockAmounts,
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
        // stockchart min
        document.addEventListener('DOMContentLoaded', function() {
            var ctx = document.getElementById('stockChartMin').getContext('2d');
            var stockLabels = @json($products->pluck('name'));
            var stockData = @json($products->pluck('stock'));
            var minStockData = @json($products->pluck('min_stock'));

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: stockLabels,
                    datasets: [{
                            label: 'Stock',
                            data: stockData,
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 1
                        },
                        {
                            label: 'Minimum Stock',
                            data: minStockData,
                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
                            borderColor: 'rgba(255, 99, 132, 1)',
                            borderWidth: 1
                        }
                    ]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
@endsection
