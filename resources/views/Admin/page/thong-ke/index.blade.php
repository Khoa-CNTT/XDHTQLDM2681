@extends('Admin.share.master')
@section('noi_dung')

        <div class="row mb-4">
            <div class="col-md-4">
                <h5>Đơn (tổng):</h5>
                <p>{{ $totalOrders }} đơn</p>
            </div>
            <div class="col-md-4">
                <h5>Doanh thu (tổng):</h5>
                <p>{{ number_format($totalRevenue, 0, ',', '.') }} VNĐ</p>
            </div>
            <div class="col-md-4">
                <h5>Thời gian giao trung bình:</h5>
                <p>{{ round($avgDeliveryTime, 2) }} phút</p>
            </div>
        </div>

    <div class="row mb-4">
        <div class="col-md-3"><strong>Ngày <small>{{ \Carbon\Carbon::today()->format('d/m/Y') }}</small>:</strong> {{ $dailyOrders }} đơn /
            {{ number_format($dailyRevenue, 0, ',', '.') }} VNĐ <br>

        </div>
        <div class="col-md-3"><strong>Tháng <small>{{ \Carbon\Carbon::now()->format('m/Y') }}</small>:</strong> {{ $monthlyOrders }} đơn /
            {{ number_format($monthlyRevenue, 0, ',', '.') }} VNĐ <br>

        </div>
        <div class="col-md-3"><strong>Năm <small>{{ \Carbon\Carbon::now()->format('Y') }}</small>:</strong> {{ $yearlyOrders }} đơn /
            {{ number_format($yearlyRevenue, 0, ',', '.') }} VNĐ <br>

        </div>
        <div class="col-md-3"><strong>Tỷ lệ huỷ:</strong> {{ $cancelRate }}%</div>
    </div>


        <div class="row mb-4">
            <div class="col-md-4">
                <h6>Tổng số Khách hàng:</h6>{{ $totalCustomers }}
            </div>
            <div class="col-md-4">
                <h6>Tổng số Nhà hàng được phê duyệt:</h6>{{ $totalRestaurants }}
            </div>
            <div class="col-md-4">
                <h6>Tổng số Tài xế đc phê duyệt:</h6>{{ $totalDrivers }}
            </div>
        </div>



        <div class="row mt-5">
            <div class="col-md-4">
                <h5>Top 5 món ăn bán chạy nhất</h5>
                <ul>@foreach($topMenuItems as $item)<li>{{ $item->menuItem->Title_items }} ({{ $item->total }})</li>@endforeach
                </ul>
            </div>
            <div class="col-md-4">
                <h5>Top 5 nhà hàng hoạt động nhiều nhất</h5>
                <ul>@foreach($topRestaurants as $r)<li>{{ $r->restaurant->name }} ({{ $r->total }})</li>@endforeach</ul>
            </div>
            <div class="col-md-4">
                <h5>Top 5 tài xế giao nhiều đơn nhất</h5>
                <ul>@foreach($topDrivers as $d)<li>{{ $d->driver->name }} ({{ $d->total }})</li>@endforeach</ul>
            </div>
        </div>
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
        <canvas id="orderChart"></canvas>
@endsection


@section('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
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

