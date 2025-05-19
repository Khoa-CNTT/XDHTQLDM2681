@extends('Restaurant.share.master')

@section('noi_dung')
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
            <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />


            <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
            <div class="container">
                <h1>Chi tiết Đơn Hàng #{{ $order->id }}</h1>
                <p><strong>Nhà hàng:</strong> {{ $restaurantId }}</p>

                <div class="card mb-4">
                    <div class="card-header">
                        Thông tin đơn hàng
                    </div>
                    <div class="card-body">
                        <p><strong>Khách hàng:</strong> {{ $order->user->username }} ({{ $order->user->PhoneNumber }})</p>
                        <p><strong>Trạng thái:</strong> {{ $order->status }}</p>
                        <p><strong>Thời gian đặt:</strong> {{ \Carbon\Carbon::parse($order->created_at)->format('d/m/Y H:i:s') }}
                        </p>

                        <p><strong>Thanh toán:</strong> {{ $order->is_payment ? 'Đã thanh toán' : 'Chưa thanh toán' }}</p>

                    </div>
                </div>

                <h4>Danh sách các món ăn</h4>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Tên món</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                            <th>Thời gian chuẩn bị</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->orderDetails as $detail)
                            @php
    $thanhTien = $detail->menuItem->Price * $detail->quantity_ordered;
                            @endphp
                            <tr>
                                <td>{{ $detail->menuItem->Title_items }}</td>
                                <td>{{ number_format($detail->menuItem->Price, 0, ',', '.') }} đ</td>
                                <td>{{ $detail->quantity_ordered }}</td>
                                <td>{{ number_format($thanhTien, 0, ',', '.') }} đ</td>
                                <td>{{ $detail->menuItem->preparation_time }} phút</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <h5 class="text-end">Phí vận chuyển: <strong>{{ number_format($order->delivery_fee, 0, ',', '.') }} đ</strong></h5>
                <h5 class="text-end">Tổng cộng: <strong>{{ number_format($order->total_amount, 0, ',', '.') }} đ</strong></h5>
                <div class="mt-3">
                    @if ($order->status == 'xác nhận món')
                        <form action="{{ route('restaurant.order.accept', $order->id) }}" method="POST"
                            style="display:inline-block">
                            @csrf
                            <button class="btn btn-success">✔ Nhận đơn</button>
                        </form>
                        <form action="{{ route('restaurant.order.reject', $order->id) }}" method="POST"
                            style="display:inline-block">
                            @csrf
                            <button class="btn btn-danger">✖ Từ chối</button>
                        </form>
                    @elseif ($order->status == 'đang chuẩn bị')
                        <form action="{{ route('restaurant.order.ready', $order->id) }}" method="POST"
                            style="display:inline-block">
                            @csrf
                            <button class="btn btn-warning">✅ Đã chế biến xong và đang chờ shipper nhận đơn</button>
                        </form>
                    @elseif ($order->status == 'chờ shipper nhận')
                        <form action="{{ route('restaurant.order.shipping', $order->id) }}" method="POST"
                            style="display:inline-block">
                            @csrf
                            <button class="btn btn-info">🚚 Shipper đã nhận và đang giao</button>
                        </form>
                    @elseif ($order->status == 'đã từ chối')
                        <div class="alert alert-danger mt-3">Đơn hàng đã bị từ chối.</div>
                    @else
                        <div class="alert alert-secondary mt-3">Trạng thái hiện tại: {{ $order->status }}</div>
                    @endif
                </div>`

                <a href="{{ route('orders.index') }}" class="btn btn-primary mt-3">Quay lại</a>
            </div>


            <div id="map" style="height: 500px;"></div> <!-- Bản đồ sẽ hiển thị ở đây -->

            <!-- Âm thanh thông báo -->
            <audio id="notificationSound" src="https://notificationsounds.com/storage/sounds/file-sounds-1155-pristine.mp3"
                preload="auto"></audio>
            <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>




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
                            <p id="shipperInfo"></p> <!-- Thông tin shipper: Tên và số điện thoại -->
                        </div>
                        <div class="modal-footer">
                            <a href="#" class="btn btn-primary" id="viewOrderBtn">Xem chi tiết</a>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        </div>
                    </div>
                </div>
            </div>

       <script>
        Pusher.logToConsole = true;

        const pusher = new Pusher('daffc7e94b204339825f', {
            cluster: 'ap1',
            forceTLS: true
        });

        const orderId = @json($order->id);
        const restaurantId = @json($restaurantId);

        // Subscribe to order.<id> channel (the one for tracking shipper location)
        const orderChannel = pusher.subscribe('order.' + orderId);


        orderChannel.bind('ShipperLocationUpdated', function (data) {
            if (data.latitude === null || data.longitude === null) return;

            const latitude = data.latitude;
            const longitude = data.longitude;
            const restaurantLatitude = data.restaurantLatitude;
            const restaurantLongitude = data.restaurantLongitude;

            updateMap(latitude, longitude, restaurantLatitude, restaurantLongitude);
        });

        // Subscribe to restaurant.<id> channel (notifications)
        const restaurantChannel = pusher.subscribe(`restaurant.${restaurantId}`);

        //hủy đơn
       restaurantChannel.bind('OrderCanceledByCustomer', function (data) {
            Swal.fire({
                icon: 'info',
                title: data.message,
                text: data.message,
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true
            }).then(() => {
                window.location.reload();
            });
        });



        restaurantChannel.bind('order.paid', function (data) {
            Swal.fire({
                icon: 'info',
                title: 'Khách hàng đã thanh toán!',
                text: 'Đơn hàng #' + data.order.id + ' đã được thanh toán.',
                showConfirmButton: false,
                timer: 5000,
                timerProgressBar: true
            });
            window.location.reload();
        });

        restaurantChannel.bind('ShipperAcceptedOrder', function (data) {
            document.getElementById("orderNotificationMessage").textContent =
                `Shipper đã nhận đơn hàng #${data.order_id}`;
            document.getElementById("shipperInfo").textContent = `Shipper: ${data.message}`;
            document.getElementById("viewOrderBtn").href = `/restaurant/orders/${data.order_id}`;
            document.getElementById('notificationSound').play();

            const myModal = new bootstrap.Modal(document.getElementById('orderNotificationModal'));
            myModal.show();

            setTimeout(() => {
                myModal.hide();

            }, 15000);
        });

        let map;

        function updateMap(latitude, longitude, restaurantLatitude, restaurantLongitude) {
            if (!map) {
                map = L.map('map').setView([restaurantLatitude, restaurantLongitude], 13);
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                }).addTo(map);
            }

            L.marker([restaurantLatitude, restaurantLongitude]).addTo(map)
                .bindPopup('Nhà hàng').openPopup();

            L.marker([latitude, longitude]).addTo(map)
                .bindPopup('Shipper').openPopup();

            getRoute(restaurantLatitude, restaurantLongitude, latitude, longitude);
        }

        function getRoute(startLat, startLng, endLat, endLng) {
            const osrmUrl =
                `https://router.project-osrm.org/route/v1/driving/${startLng},${startLat};${endLng},${endLat}?alternatives=false&geometries=geojson&steps=true`;

            fetch(osrmUrl)
                .then(response => response.json())
                .then(data => {
                    if (data.routes && data.routes[0]) {
                        const routeGeoJson = data.routes[0].geometry;
                        L.geoJSON(routeGeoJson, {
                            style: {
                                color: 'blue',
                                weight: 5
                            }
                        }).addTo(map);

                        map.fitBounds(L.geoJSON(routeGeoJson).getBounds());
                    }
                })
                .catch(error => console.error('Lỗi khi lấy dữ liệu tuyến đường:', error));
        }
    </script>

@endsection
