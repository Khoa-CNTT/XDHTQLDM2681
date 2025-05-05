@extends('Restaurant.share.master')

@section('noi_dung')
    @php
    use Carbon\Carbon;
    $today = Carbon::now()->locale('vi');
    @endphp
           <div class="container">
            <h1>Thống kê và báo cáo</h1>

            <!-- Thống kê tổng quan -->
            <div class="row">
                <div class="col-md-3">
                    <h3>Tổng đơn hàng hôm nay<br><small>{{ $today->translatedFormat('d \t\h\á\n\g m, Y') }}</small></h3>
                    <p>{{ $dailyOrders }} đơn</p>
                </div>
                <div class="col-md-3">
                    <h3>Doanh thu hôm nay<br><small>{{ $today->translatedFormat('d \t\h\á\n\g m, Y') }}</small></h3>
                    <p>{{ number_format($dailyRevenue, 0, ',', '.') }} VNĐ</p>
                </div>
                <div class="col-md-3">
                    <h3>Doanh thu tháng {{ $today->format('m') }}/{{ $today->year }}</h3>
                    <p>{{ number_format($monthlyRevenue, 0, ',', '.') }} VNĐ</p>
                </div>
                <div class="col-md-3">
                    <h3>Doanh thu năm {{ $today->year }}</h3>
                    <p>{{ number_format($yearlyRevenue, 0, ',', '.') }} VNĐ</p>
                </div>
            </div>

            <!-- Biểu đồ thống kê doanh thu -->


            <!-- Top món ăn bán chạy -->
            <h3 class="mt-4">Top món ăn bán chạy</h3>
            <ul>
                @foreach($topItems as $item)
                    <li>{{ $item->menuItem->name }} - {{ $item->total_sold }} sản phẩm</li>
                @endforeach
            </ul>

            <!-- Đánh giá từ khách hàng -->
            <h3 class="mt-4">Đánh giá gần đây</h3>
            <ul>
                @foreach($ratings as $rating)
                    <li>
                        <strong>Đơn hàng #{{ $rating->order->id }}:</strong>
                        {{ $rating->comment }} ({{ $rating->rating }} sao)
                    </li>
                @endforeach
            </ul>

            <!-- Thống kê tình trạng đơn hàng -->
            <h3 class="mt-4">Tình trạng đơn hàng</h3>
            <ul>
                @foreach($orderStatusCounts as $status)
                    <li>{{ $status->status }}: {{ $status->count }} đơn</li>
                @endforeach
            </ul>

            <!-- Form chọn ngày -->
            <form method="GET" action="{{ route('reports.chart') }}" class="mb-3">
                <div class="row">
                    <div class="col-md-3">
                        <label>Từ ngày</label>
                        <input type="date" name="from_date" class="form-control" value="{{ request('from_date') }}">
                    </div>
                    <div class="col-md-3">
                        <label>Đến ngày</label>
                        <input type="date" name="to_date" class="form-control" value="{{ request('to_date') }}">
                    </div>
                    <div class="col-md-3 d-flex align-items-end">
                        <button type="submit" class="btn btn-primary">Xem biểu đồ</button>
                    </div>
                </div>
            </form>
            @if($chartData)
                <canvas id="revenueChart" width="400" height="200"></canvas>
            @endif
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            @if($chartData)
                const ctx = document.getElementById('revenueChart').getContext('2d');
                const chart = new Chart(ctx, {
                    type: 'line',  // Biểu đồ dạng đường
                    data: {
                        labels: {!! json_encode(array_keys($chartData)) !!},  // Ngày
                        datasets: [{
                            label: 'Doanh thu (VNĐ)',
                            data: {!! json_encode(array_values($chartData)) !!},  // Doanh thu
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 2,
                            tension: 0.4,  // Bo cong đường
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
                                min: 0,
                                max: 1000000,
                                ticks: {
                                    stepSize: 100000,
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
        </script>


@endsection
