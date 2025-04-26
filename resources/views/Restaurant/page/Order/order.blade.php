<!-- resources/views/restaurant/orders.blade.php -->
@extends('Restaurant.share.master')

@section('noi_dung')

    <div class="container">
        <h1>Danh sách Đơn Hàng</h1>

        <!-- Bảng Thông Báo -->
        <div id="notifications" class="alert alert-info">
            <h3>Thông báo mới:</h3>
            <ul id="notification-list">
                <!-- Các thông báo sẽ được thêm vào đây bằng JavaScript -->
            </ul>
        </div>

        <!-- Bảng Đơn Hàng -->
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Món ăn</th>
                    <th>Số lượng</th>
                    <th>Trạng thái</th>
                    <th>Chi tiết đơn hàng</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>
                            @foreach ($order->orderDetails as $orderDetail)
                                <div>{{ $orderDetail->menuItem->Title_items }}</div>
                            @endforeach
                        </td>
                        <td>
                            @foreach ($order->orderDetails as $orderDetail)
                                <div>{{ $orderDetail->quantity_ordered }}</div>
                            @endforeach
                        </td>
                        <td>{{ $order->status }}</td>
                        <td>
                            <a href="{{ route('orders.show', $order->id) }}" class="btn btn-info">Xem chi tiết</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
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
        Pusher.logToConsole = true;

        const pusher = new Pusher('daffc7e94b204339825f', {
            cluster: 'ap1',
            forceTLS: true
        });

        const channel = pusher.subscribe('restaurant.{{ $restaurantId }}');

        channel.bind('OrderPlaced', function (data) {
            console.log('Có đơn hàng mới:', data.order);

            // Thêm vào danh sách thông báo
            const list = document.getElementById("notification-list");
            const item = document.createElement("li");
            item.textContent = `Có đơn hàng mới! Mã đơn hàng: ${data.order.id}`;
            list.appendChild(item);

            // Cập nhật modal
            document.getElementById("orderNotificationMessage").textContent =
                `Có đơn hàng mới! Mã đơn hàng: ${data.order.id}`;
            document.getElementById("viewOrderBtn").href = `/orders/${data.order.id}`;

            // Phát âm thanh
            document.getElementById('notificationSound').play();

            // Hiển thị modal
            const myModal = new bootstrap.Modal(document.getElementById('orderNotificationModal'));
            myModal.show();

            // Tự động ẩn sau 5 giây
            setTimeout(() => {
                myModal.hide();
            }, 5000);
        });
    </script>

@endsection
