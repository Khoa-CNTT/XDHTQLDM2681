@extends('Admin.share.master')
@section('noi_dung')
                    @php
    use Carbon\Carbon;
    $today = Carbon::today()->format('d/m/Y');
    $thisMonth = Carbon::now()->format('m/Y');
    $thisYear = Carbon::now()->format('Y');
                    @endphp

    <form method="GET" action="{{ route('admin.dashboard') }}" class="row g-3 mb-4">
        <div class="col-auto">
            <label>Từ ngày:</label>
            <input type="date" name="from_date" class="form-control" value="{{ request('from_date') }}">
        </div>
        <div class="col-auto">
            <label>Đến ngày:</label>
            <input type="date" name="to_date" class="form-control" value="{{ request('to_date') }}">
        </div>
        <div class="col-auto align-self-end">
            <button type="submit" class="btn btn-primary">Thống kê</button>
        </div>
    </form>

    <div class="alert alert-info">
        Thống kê từ {{ $from->format('d/m/Y') }} đến {{ $to->format('d/m/Y') }}
    </div>
                            <div class="row text-white mb-4">
                                <div class="col-md-3">
                                    <div class="p-3 rounded bg-primary d-flex justify-content-between align-items-center">
                                        <div>
                                            <h4>{{ $totalOrders }}</h4>
                                            <p class="mb-0">Đơn (tổng)</p>
                                        </div>
                                        <i class="fas fa-file-invoice fa-2x"></i>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="p-3 rounded bg-success d-flex justify-content-between align-items-center">
                                        <div>
                                            <h4>{{ number_format($totalRevenue, 0, ',', '.') }} VNĐ</h4>
                                            <p class="mb-0">Doanh thu (tổng)</p>
                                        </div>
                                        <i class="fas fa-coins fa-2x"></i>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="p-3 rounded bg-info d-flex justify-content-between align-items-center">
                                        <div>
                                            <h4>{{ round($avgDeliveryTime, 2) }} phút</h4>
                                            <p class="mb-0">Thời gian giao trung bình</p>
                                        </div>
                                        <i class="fas fa-clock fa-2x"></i>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="p-3 rounded bg-warning d-flex justify-content-between align-items-center">
                                        <div>
                                            <h4>+{{ $repeatCustomers ?? 0 }}</h4>
                                            <p class="mb-0">Khách hàng quay lại</p>
                                        </div>
                                        <i class="fas fa-redo fa-2x"></i>
                                    </div>
                                </div>
                            </div>


                    <div class="row mb-4 ">
                        <!-- Biểu đồ 1 - Tỷ lệ đơn hàng theo thời gian (bên trái) -->
                        <div class="col-md-6">
                            <h5 class="">Tỷ lệ đơn hàng theo thời gian</h5>
                            <div style="height: 300px;">
                                <canvas id="orderPieChart" style="width: 100%; height: 100%; align-center"></canvas>
                            </div>
                        </div>

                        <!-- Biểu đồ 2 - Phân bố người dùng (bên phải) -->
                        <div class="col-md-6">
                            <h5 class="">Biểu đồ phân bố người dùng</h5>
                            <div style="height: 300px;">
                                <canvas id="userDistributionChart" style="width: 100%; height: 100%;"></canvas>
                            </div>
                        </div>
                    </div>







                                <div class="row mt-5">
                                    <div class="col-md-4">
                                        <div class="card shadow-sm">
                                            <div class="card-header bg-primary text-white d-flex align-items-center">
                                                <i class="fas fa-hamburger me-2"></i>
                                                <strong>Top 5 món ăn bán chạy nhất</strong>
                                            </div>
                                            <ul class="list-group list-group-flush">
                                                @foreach($topMenuItems as $item)
                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                        {{ $item->menuItem->Title_items }}
                                                        <span class="badge bg-primary rounded-pill">{{ $item->total }}</span>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="card shadow-sm">
                                            <div class="card-header bg-success text-white d-flex align-items-center">
                                                <i class="fas fa-store me-2"></i>
                                                <strong>Top 5 nhà hàng hoạt động nhiều nhất</strong>
                                            </div>
                                            <ul class="list-group list-group-flush">
                                                @foreach($topRestaurants as $r)
                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                        {{ $r->restaurant->name }}
                                                        <span class="badge bg-success rounded-pill">{{ $r->total }}</span>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="card shadow-sm">
                                            <div class="card-header bg-warning text-white d-flex align-items-center">
                                                <i class="fas fa-motorcycle me-2"></i>
                                                <strong>Top 5 tài xế giao nhiều đơn nhất</strong>
                                            </div>
                                            <ul class="list-group list-group-flush">
                                                @foreach($topDrivers as $d)
                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                        {{ $d->driver->name }}
                                                        <span class="badge bg-warning text-dark rounded-pill">{{ $d->total }}</span>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <canvas id="orderChart"></canvas>
@endsection


@section('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
         const ctx1 = document.getElementById('orderPieChart').getContext('2d');
            const orderPieChart = new Chart(ctx1, {
                type: 'pie',
                data: {
                    labels: ['{{ $today }}', 'Tháng {{ $thisMonth }}', 'Năm {{ $thisYear }}'],

                    datasets: [{
                        label: 'Đơn hàng',
                        data: [
                        {{ $dailyOrders }},
                        {{ $monthlyOrders }},
                            {{ $yearlyOrders }}
                        ],
                        backgroundColor: [
                            'rgba(54, 162, 235, 0.7)',
                            'rgba(255, 206, 86, 0.7)',
                            'rgba(75, 192, 192, 0.7)'
                        ],
                        borderColor: [
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'bottom',
                        },
                        tooltip: {
                            callbacks: {
                                label: function (context) {
                                    const label = context.label || '';
                                    const value = context.raw || 0;
                                    return `${label}: ${value} đơn`;
                                }
                            }
                        }
                    }
                }
            });
             const ctx2 = document.getElementById('userDistributionChart').getContext('2d');
                const userChart = new Chart(ctx2, {
                    type: 'pie',
                    data: {
                        labels: ['Khách hàng', 'Nhà hàng', 'Tài xế'],
                        datasets: [{
                            label: 'Tỷ lệ người dùng',
                            data: [{{ $totalCustomers }}, {{ $totalRestaurants }}, {{ $totalDrivers }}],
                            backgroundColor: [
                                'rgba(75, 192, 192, 0.6)',
                                'rgba(255, 159, 64, 0.6)',
                                'rgba(153, 102, 255, 0.6)'
                            ],
                            borderColor: [
                                'rgba(75, 192, 192, 1)',
                                'rgba(255, 159, 64, 1)',
                                'rgba(153, 102, 255, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                     options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'bottom',
                        },
                        tooltip: {
                            callbacks: {
                                label: function (context) {
                                    const label = context.label || '';
                                    const value = context.raw || 0;
                                    return `${label}: ${value} người phê duyệt`;
                                }
                            }
                        }
                    }
                }
                });


        const ctx = document.getElementById('orderChart').getContext('2d');
        const data = @json($chartData);
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: data.map(d => d.date),
                datasets: [
                    { label: 'Đơn hàng', data: data.map(d => d.orders), borderColor: 'blue', fill: false },
                    { label: 'Doanh thu', data: data.map(d => d.revenue), borderColor: 'green', fill: false }
                ]
            },
            options: { responsive: true }
        });
    </script>


@endsection

