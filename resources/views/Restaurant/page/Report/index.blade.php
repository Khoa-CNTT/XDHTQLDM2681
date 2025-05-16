@extends('Restaurant.share.master')

@section('noi_dung')
                        @php
    use Carbon\Carbon;
    $today = Carbon::now()->locale('vi');
                        @endphp

                    <div class="container">
                        <h1 class="mb-4">Thống kê và báo cáo</h1>

                        <!-- Thống kê tổng quan -->
                        <div class="row text-white mb-4">
                            <div class="col-12 col-sm-6 col-md-3 mb-3">
                                <div class="card bg-primary h-100">
                                    <div class="card-body">
                                        <h5 class="card-title">Tổng đơn hôm nay</h5>
                                        <p class="card-text">{{ $dailyOrders }} đơn</p>
                                        <small>{{ $today->translatedFormat('d \t\h\á\n\g m, Y') }}</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-3 mb-3">
                                <div class="card bg-success h-100">
                                    <div class="card-body">
                                        <h5 class="card-title">Doanh thu hôm nay</h5>
                                        <p class="card-text">{{ number_format($dailyRevenue, 0, ',', '.') }} VNĐ</p>
                                        <small>{{ $today->translatedFormat('d \t\h\á\n\g m, Y') }}</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-3 mb-3">
                                <div class="card bg-warning h-100">
                                    <div class="card-body">
                                        <h5 class="card-title">Doanh thu tháng {{ $today->format('m') }}/{{ $today->year }}</h5>
                                        <p class="card-text">{{ number_format($monthlyRevenue, 0, ',', '.') }} VNĐ</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-3 mb-3">
                                <div class="card bg-danger h-100">
                                    <div class="card-body">
                                        <h5 class="card-title">Doanh thu năm {{ $today->year }}</h5>
                                        <p class="card-text">{{ number_format($yearlyRevenue, 0, ',', '.') }} VNĐ</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Biểu đồ thống kê doanh thu -->
                        <form method="GET" action="{{ route('reports.chart') }}" class="mb-3">
                            <div class="row">
                                <div class="col-12 col-sm-6 col-md-3 mb-2">
                                    <label>Từ ngày</label>
                                    <input type="date" name="from_date" class="form-control" value="{{ request('from_date') }}">
                                </div>
                                <div class="col-12 col-sm-6 col-md-3 mb-2">
                                    <label>Đến ngày</label>
                                    <input type="date" name="to_date" class="form-control" value="{{ request('to_date') }}">
                                </div>
                                <div class="col-12 col-md-3 d-flex align-items-end mb-2">
                                    <button type="submit" class="btn btn-primary w-100">Xem biểu đồ</button>
                                </div>
                            </div>
                        </form>

                        @if($chartData)
                            <canvas id="revenueChart" style="width: 100%; height: auto;"></canvas>
                        @endif

                        <!-- Top món ăn bán chạy -->
                        <h3 class="mt-5 text-success">🔥 Top món ăn bán chạy</h3>
                        <ul class="list-group mb-4">
                            @foreach($topItems as $item)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    🍽️ {{ $item->menuItem->Title_items }}
                                    <span class="badge bg-primary rounded-pill">{{ $item->total_sold }} đã bán</span>
                                </li>
                            @endforeach
                        </ul>

                        <!-- Đánh giá từ khách hàng -->
                        <h3 class="mt-4 text-info">⭐ Đánh giá gần đây</h3>
                        <ul class="list-group">
                            @foreach($ratings as $rating)
                                <li class="list-group-item">
                                    <strong>Đơn hàng #{{ $rating->order->id }}:</strong>
                                    <span class="text-muted">{{ $rating->comment }}</span>
                                    <span
                                        class="float-end text-warning">{{ str_repeat('★', $rating->rating) }}{{ str_repeat('☆', 5 - $rating->rating) }}</span>
                                </li>
                            @endforeach
                        </ul>

                        <!-- Tình trạng đơn hàng -->
                        <div class="text-center my-4">
                            <h3 class="mt-4">📦 Tình trạng đơn hàng</h3>
                            <div class="chart-container mx-auto" style="max-width: 300px;">
                                <canvas id="statusChart" style="width: 100%; height: auto;"></canvas>
                            </div>
                        </div>
                    </div>



@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        @if($chartData)
            const ctx = document.getElementById('revenueChart').getContext('2d');
            const chart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: {!! json_encode(array_keys($chartData)) !!},
                    datasets: [{
                        label: 'Doanh thu (VNĐ)',
                        data: {!! json_encode(array_values($chartData)) !!},
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 2,
                        tension: 0.4,
                        fill: false,
                        pointRadius: 4,
                        pointBackgroundColor: 'rgba(75, 192, 192, 1)',
                        pointBorderColor: '#fff'
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        tooltip: {
                            callbacks: {
                                label: function (context) {
                                    return context.dataset.label + ': ' + context.parsed.y.toLocaleString('vi-VN') + ' đ';
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: function (value) {
                                    return value.toLocaleString('vi-VN') + ' đ';
                                }
                            }
                        },
                        x: {
                            ticks: {
                                maxRotation: 45,
                                minRotation: 45
                            }
                        }
                    }
                }
            });
        @endif

                            // Chart tình trạng đơn hàng (hình tròn)
                            const statusData = {
            labels: {!! json_encode($orderStatusCounts->pluck('status')) !!},
            datasets: [{
                label: 'Tình trạng đơn hàng',
                data: {!! json_encode($orderStatusCounts->pluck('count')) !!},
                backgroundColor: ['#007bff', '#28a745', '#ffc107', '#dc3545', '#17a2b8'],
                hoverOffset: 10
            }]
        };

        const statusConfig = {
            type: 'doughnut',
            data: statusData,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        };

        new Chart(document.getElementById('statusChart'), statusConfig);
    </script>
@endsection

