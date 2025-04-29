@extends('Shipper.share.master')

@section('content')
                <!-- Leaflet CSS -->
                <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
                <!-- Leaflet JS -->
                <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

            <div class="bg-light">
                <div class="container" id="orders-container">
                    <!-- Nút Chuyển Trang -->
                    <div class="d-flex justify-content-center my-4">
                        <button class="btn btn-outline-success mx-2" onclick="togglePages('order')">Thông tin Quán</button>
                        <button class="btn btn-outline-success mx-2" onclick="togglePages('customer')">Thông tin Khách hàng</button>
                    </div>
                    <div id="map" style="height: 400px; display: none;"></div>
                </div>
            </div>








            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

                    <script>
                        let orders = [];

                        function togglePages(type, id = null) {
                            document.querySelectorAll(".order-card").forEach(card => {
                                const orderSection = card.querySelector(".orderPage");
                                const customerSection = card.querySelector(".customerPage");
                                if (type === 'order') {
                                    orderSection.classList.remove("d-none");
                                    customerSection.classList.add("d-none");
                                } else {
                                    orderSection.classList.add("d-none");
                                    customerSection.classList.remove("d-none");
                                }
                            });
                        }

                        function createOrderCard(order) {
                            const restaurant = order.restaurant;
                            const orderDetails = order.order_details;
                            const user = order.user || {};
                            const location = user.location || {};
                            const restaurantLocation = restaurant.locations[0];

                            const deliveryFee = order.delivery_fee;
                            const orderItemsHTML = orderDetails.map(od => {
                                const total = od.quantity_ordered * parseFloat(od.sell_price);
                                return `<li class="list-group-item">
                                            ${od.menu_item.Title_items} - Số lượng: ${od.quantity_ordered},
                                            Giá: ${parseFloat(od.sell_price).toLocaleString()} VND,
                                            <strong>Thành tiền:</strong> ${total.toLocaleString()} VND
                                        </li>`;
                            }).join('');

                            const totalAmount = orderDetails.reduce((sum, od) =>
                                sum + (parseFloat(od.sell_price) * od.quantity_ordered), 0) + deliveryFee;

                            const container = document.createElement("div");
                            container.className = "card border-success mb-4 order-card";

                            let actionButtons = ''; // Biến chứa các nút điều khiển tùy theo trạng thái
                            let status = order.status.trim(); // Bỏ khoảng trắng đầu cuối

                            if (status === "Chế biến xong ,chờ shipper đến nhận") {
                                actionButtons = `
                                <button class="btn btn-warning" id="acceptBtn" onclick="acceptOrder(${order.id})">Nhận đơn</button>
                                <button class="btn btn-danger" id="cancelBtn" onclick="cancelOrder(${order.id})">Từ chối đơn</button>
                            `;
                            } else if (status === "Đã nhận") {
                                actionButtons = `
                                <button class="btn btn-info" id="onTheWayBtn" style="display:inline-block;" onclick="onTheWay(${order.id})">Đang đến điểm lấy</button>
                            `;
                            } else if (status === "Đã đến điểm lấy, đang giao cho khách") {

                                    actionButtons = `
                                    <button class="btn btn-primary" id="paymentBtn" onclick="updatePaymentStatus(${order.id})">Cập nhật thanh toán</button>
                                `;
                           } else if (status === "Đã thanh toán") {
                             actionButtons = `<p class="btn btn-warning">Đã thanh toán thành công!</p>`;

                            } else if (status === "Đã từ chối") {
                                if (order.is_payment) {
                                    actionButtons = `<p class="text-success">Đã thanh toán thành công!</p>`;
                                } else {
                                    actionButtons = `<p class="btn btn-secondary" style="display:inline-block;">Đơn đã bị từ chối</p>`;
                                }
                            }




                            container.innerHTML = `
                                        <div class="orderPage card-header bg-success text-white text-center">
                                            <h4>Thông tin đơn hàng ${order.id} </h4>
                                            <ul class="list-group mb-3">
                                                <li class="list-group-item"><strong>Tên nhà hàng:</strong> ${restaurant.name}</li>
                                                <li class="list-group-item"><strong>Địa chỉ:</strong> ${restaurantLocation.Address}, ${restaurantLocation.Ward}, ${restaurantLocation.District}, ${restaurantLocation.City}</li>
                                                <li class="list-group-item"><strong>SĐT:</strong> ${restaurant.PhoneNumber}</li>
                                            </ul>
                                            <div class="card-body">
                                                <h5>Chi tiết đơn hàng</h5>
                                                <ul class="list-group mb-3">${orderItemsHTML}</ul>
                                                <li class="list-group-item"><strong>Phí vận chuyển:</strong> ${deliveryFee.toLocaleString()} VND</li>
                                                <h5 class="card-title">Tổng tiền trả: ${totalAmount.toLocaleString()} VND</h5>
                                                <div class="d-flex justify-content-center gap-2">
                                                    <a class="btn btn-primary" href="tel:${restaurant.PhoneNumber}">Gọi</a>
                                                    <button class="btn btn-success">Chat</button>
                                                    ${actionButtons}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="customerPage card-body d-none">
                                            <h4 class="card-title">Thông tin Khách hàng</h4>
                                            <p><strong>Địa chỉ:</strong> ${location.Address || ''}, ${location.Ward || ''}, ${location.District || ''}, ${location.City || ''}</p>
                                            <ul class="list-group mb-3">
                                                <li class="list-group-item">Tên: ${user.username || 'Không có'}</li>
                                                <li class="list-group-item">SĐT: ${user.PhoneNumber || 'Không có'}</li>
                                            </ul>
                                            <h5>Chi tiết đơn hàng</h5>
                                            <ul class="list-group mb-3">${orderItemsHTML}</ul>
                                            <h5>Tổng tiền thu: ${totalAmount.toLocaleString()} VND</h5>
                                            <div class="d-flex justify-content-center gap-2">
                                                <a class="btn btn-info" href="tel:${user.PhoneNumber || ''}">Gọi</a>
                                                <button class="btn btn-danger">Xóa thông tin</button>
                                                <button class="btn btn-secondary">Lưu thay đổi</button>
                                            </div>
                                        </div>
                                    `;

                            document.getElementById("orders-container").appendChild(container);
                        }


                     function acceptOrder(orderId) {
                            fetch(`/shipper/order/accept/${orderId}`, {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                }
                            })
                                .then(res => res.json())
                                .then(data => {
                                    Swal.fire({
                                        title: 'Thông báo',
                                        text: data.message,
                                        icon: 'info',
                                        confirmButtonText: 'OK'
                                    });
                                    if (data.restaurant_latitude && data.restaurant_longitude) {
                                        if (navigator.geolocation) {
                                            navigator.geolocation.getCurrentPosition(position => {
                                                const currentLat = position.coords.latitude;
                                                const currentLon = position.coords.longitude;

                                                // Lưu vị trí và nhà hàng vào localStorage
                                                localStorage.setItem('currentLat', currentLat);
                                                localStorage.setItem('currentLon', currentLon);
                                                localStorage.setItem('restaurantLat', data.restaurant_latitude);
                                                localStorage.setItem('restaurantLon', data.restaurant_longitude);

                                                // Gửi tọa độ cập nhật của shipper và nhà hàng đến server
                                                fetch(`/shipper/location/update/${data.order_id}`, {
                                                    method: 'POST',
                                                    headers: {
                                                        'Content-Type': 'application/json',
                                                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                                    },
                                                    body: JSON.stringify({
                                                        latitude: currentLat,
                                                        longitude: currentLon
                                                    })
                                                })
                                                    .then(response => response.json())
                                                    .then(updateData => {
                                                        console.log(updateData.message); // Xử lý kết quả từ việc cập nhật vị trí shipper
                                                    });

                                                // Hiển thị bản đồ
                                                initMapOSM(currentLat, currentLon, data.restaurant_latitude, data.restaurant_longitude);
                                                 window.location.reload();
                                                // Cập nhật vị trí của shipper mỗi giây
                                                const interval = setInterval(() => {
                                                    navigator.geolocation.getCurrentPosition(position => {
                                                        const newLat = position.coords.latitude;
                                                        const newLon = position.coords.longitude;

                                                        // Gửi lại vị trí mới của shipper
                                                        fetch(`/shipper/location/update/${data.order_id}`, {
                                                            method: 'POST',
                                                            headers: {
                                                                'Content-Type': 'application/json',
                                                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                                            },
                                                            body: JSON.stringify({
                                                                latitude: newLat,
                                                                longitude: newLon
                                                            })
                                                        })
                                                            .then(response => response.json())
                                                            .then(updateData => {
                                                                console.log(updateData.message);
                                                            });

                                                        // Cập nhật bản đồ với vị trí mới
                                                        updateMap(newLat, newLon, data.restaurant_latitude, data.restaurant_longitude);
                                                    }, error => {
                                                        alert('Không thể lấy vị trí hiện tại.');
                                                    });
                                                }, 1000); // Cập nhật mỗi giây
                                            }, error => {
                                                alert('Không thể lấy vị trí hiện tại.');
                                            });
                                        }
                                    }
                                })
                                .catch(err => console.error(err));
                        }

                        let mapOSM; // khai báo biến toàn cục

                        // Hàm cập nhật bản đồ
                        function updateMap(fromLat, fromLng, toLat, toLng) {
                            // Cập nhật vị trí trên bản đồ
                            if (mapOSM) {
                                mapOSM.remove(); // Xóa bản đồ cũ trước khi thêm bản đồ mới
                            }

                            mapOSM = L.map('map').setView([fromLat, fromLng], 13);

                            // Thêm layer OpenStreetMap
                            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                maxZoom: 19,
                                attribution: '&copy; OpenStreetMap'
                            }).addTo(mapOSM);

                            L.marker([fromLat, fromLng]).addTo(mapOSM)
                                .bindPopup('Vị trí hiện tại của bạn')
                                .openPopup();

                            L.marker([toLat, toLng]).addTo(mapOSM)
                                .bindPopup('Vị trí Nhà hàng')
                                .openPopup();

                            // Vẽ đường đi (sử dụng dịch vụ ORS hoặc OSRM)
                            fetch(`https://router.project-osrm.org/route/v1/driving/${fromLng},${fromLat};${toLng},${toLat}?overview=full&geometries=geojson`)
                                .then(response => response.json())
                                .then(data => {
                                    if (data.routes.length > 0) {
                                        const route = data.routes[0].geometry;
                                        L.geoJSON(route, {
                                            style: {
                                                color: 'blue',
                                                weight: 4
                                            }
                                        }).addTo(mapOSM);
                                    } else {
                                        alert('Không tìm thấy tuyến đường.');
                                    }
                                })
                                .catch(error => {
                                    console.error(error);
                                });
                        }

                        // Khi trang được tải lại, kiểm tra xem có dữ liệu trong localStorage không
                        window.onload = function () {
                            const currentLat = localStorage.getItem('currentLat');
                            const currentLon = localStorage.getItem('currentLon');
                            const restaurantLat = localStorage.getItem('restaurantLat');
                            const restaurantLon = localStorage.getItem('restaurantLon');

                            if (currentLat && currentLon && restaurantLat && restaurantLon) {
                                // Nếu có, khôi phục lại bản đồ
                                initMapOSM(parseFloat(currentLat), parseFloat(currentLon), parseFloat(restaurantLat), parseFloat(restaurantLon));
                            }
                        };




                        function cancelOrder(orderId) {
                            fetch(`/shipper/order/cancel/${orderId}`, {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                }
                            })
                                .then(res => res.json())
                                .then(data => {
                                   Swal.fire({
                                        title: 'Thông báo',
                                        text: data.message,
                                        icon: 'info',
                                        confirmButtonText: 'OK'
                                    });
                                    window.location.reload();
                                    // Cập nhật giao diện sau khi từ chối đơn
                                    document.getElementById('acceptBtn').style.display = 'none';
                                    document.getElementById('cancelBtn').style.display = 'none';
                                })
                                .catch(err => console.error(err));
                        }

                        function onTheWay(orderId) {
                            fetch(`/shipper/order/on-the-way/${orderId}`, {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                }
                            })
                                .then(res => res.json())
                                .then(data => {
                                    alert(data.message);
                                    document.getElementById('onTheWayBtn').style.display = 'none';
                                    window.location.reload();
                                })
                                .catch(err => console.error(err));
                        }

                        function updatePaymentStatus(orderId) {
                            fetch(`/shipper/order/update-payment/${orderId}`, {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                }
                            })
                                .then(res => res.json())
                                .then(data => {
                                    Swal.fire({
                                        title: 'Thông báo',
                                        text: data.message,
                                        icon: 'info',
                                        confirmButtonText: 'OK'
                                    });
                                    window.location.reload();
                                })
                                .catch(err => console.error(err));
                        }


                        document.addEventListener("DOMContentLoaded", () => {
                            if (navigator.geolocation) {
                                navigator.geolocation.getCurrentPosition(position => {
                                    const payload = {
                                        lat: position.coords.latitude,
                                        lon: position.coords.longitude
                                    };

                                    fetch("{{ route('shipper.nearby') }}", {
                                        method: 'POST',
                                        headers: {
                                            'Content-Type': 'application/json',
                                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                        },
                                        body: JSON.stringify(payload)
                                    })
                                        .then(res => res.json())
                                        .then(data => {
                                            if (data.orders && data.orders.length > 0) {
                                                orders = data.orders;
                                                orders.forEach(order => createOrderCard(order));
                                                togglePages('order');
                                            } else {
                                               Swal.fire({
                                                    title: 'Không có đơn hàng nào ở gần bạn!',
                                                    text: data.message,
                                                    icon: 'info',
                                                    confirmButtonText: 'OK'
                                                });
                                            }
                                        })
                                        .catch(err => console.error(err));
                                });
                            }
                        });
                    </script>


                </div>


@endsection
