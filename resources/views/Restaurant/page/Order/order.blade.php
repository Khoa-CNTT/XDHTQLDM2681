<!-- resources/views/restaurant/orders.blade.php -->
@extends('Restaurant.share.master')

@section('noi_dung')

    <div class="container my-5">
        <h1 class="text-center text-primary mb-4">📦 Danh sách Đơn Hàng</h1>

        <div id="notifications" class="alert alert-info shadow-sm rounded">
            <h5 class="mb-2">🔔 Thông báo mới:</h5>
            <ul id="notification-list" class="mb-0 ps-3"></ul>
        </div>

        <!-- Bộ lọc trạng thái đơn hàng -->
        <div class="d-flex justify-content-between align-items-center mb-3">

            <div class="btn-group" role="group" aria-label="Filter Orders">
                <button type="button" class="btn btn-outline-primary active" onclick="filterOrders('all', event)">Tất
                    cả</button>
                <button type="button" class="btn btn-outline-success" onclick="filterOrders('Đã giao thành công', event)">Đã
                    giao</button>
                <button type="button" class="btn btn-outline-warning" onclick="filterOrders('Đang giao', event)">Đang
                    giao</button>
                <button type="button" class="btn btn-outline-secondary" onclick="filterOrders('Chưa xử lý', event)">Chưa xử
                    lý</button>
            </div>
        </div>

        <div class="table-responsive shadow-sm rounded">
            <table class="table table-bordered table-hover align-middle" id="myTable">
                <thead class="table-dark text-center">
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Món ăn</th>
                        <th class="text-center">Số lượng</th>
                        <th class="text-center">Trạng thái</th>
                        <th class="text-center">Chi tiết</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($orders as $order)
                        <tr>
                            <td class="text-center">{{ $order->id }}</td>
                            <td>
                                @foreach ($order->orderDetails as $detail)
                                    <div>- {{ $detail->menuItem->Title_items }}</div>
                                @endforeach
                            </td>
                            <td class="text-center align-middle">
                                @foreach ($order->orderDetails as $detail)
                                    <div>{{ $detail->quantity_ordered }}</div>
                                @endforeach
                            </td>
                            <td class="text-center">
                                @if ($order->status == 'Đã giao thành công')
                                    <span class="badge bg-success">Đã giao</span>
                                @elseif ($order->status == 'Đang giao')
                                    <span class="badge bg-warning text-dark">Đang giao</span>
                                @else
                                    <span class="badge bg-secondary">Chưa xử lý</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('orders.show', $order->id) }}" class="btn btn-sm btn-primary">
                                    <i class="bi bi-eye"></i> Xem chi tiết
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">Không có đơn hàng nào.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Thông báo đơn hàng mới -->
    <div class="modal fade" id="orderNotificationModal" tabindex="-1" aria-labelledby="orderNotificationModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-info text-white">
                    <h5 class="modal-title" id="orderNotificationModalLabel">Thông báo mới</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Đóng"></button>
                </div>
                <div class="modal-body">
                    <p id="orderNotificationMessage">Có đơn hàng mới!</p>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-primary" id="viewOrderBtn">Xem chi tiết</a>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Âm thanh thông báo -->
    <audio id="notificationSound" src="https://notificationsounds.com/storage/sounds/file-sounds-1155-pristine.mp3"
        preload="auto"></audio>

    <!-- Scripts -->
    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Lọc trạng thái đơn hàng
        function filterOrders(status, event) {
            const rows = document.querySelectorAll('tbody tr');
            rows.forEach(row => {
                const badge = row.querySelector('td:nth-child(4) span');
                const text = badge ? badge.textContent.trim() : '';
                if (status === 'all' || text === status.replace('Đã giao thành công', 'Đã giao')) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });

            // Cập nhật nút active
            document.querySelectorAll('.btn-group .btn').forEach(btn => btn.classList.remove('active'));
            event.target.classList.add('active');
        }

        // Pusher xử lý đơn hàng mới
        Pusher.logToConsole = true;

        const pusher = new Pusher('daffc7e94b204339825f', {
            cluster: 'ap1',
            forceTLS: true
        });

        const channel = pusher.subscribe('restaurant.{{ $restaurantId }}');

        channel.bind('OrderPlaced', function (data) {
            const list = document.getElementById("notification-list");
            const item = document.createElement("li");
            item.textContent = `Có đơn hàng mới! Mã đơn hàng: ${data.order.id}`;
            list.appendChild(item);

            document.getElementById("orderNotificationMessage").textContent = `Có đơn hàng mới! Mã đơn hàng: ${data.order.id}`;
            document.getElementById("viewOrderBtn").href = `/orders/${data.order.id}`;
            document.getElementById('notificationSound').play();

            const myModal = new bootstrap.Modal(document.getElementById('orderNotificationModal'));
            myModal.show();

            setTimeout(() => {
                myModal.hide();
                window.location.reload();
            }, 5000);
        });
    </script>

@endsection

