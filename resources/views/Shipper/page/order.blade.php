@extends('Shipper.share.master')

@section('content')
       <div class="bg-light">
      <div class="container" id="orders-container">
        <!-- Nút Chuyển Trang -->
        <div class="d-flex justify-content-center my-4">
            <button class="btn btn-outline-success mx-2" onclick="togglePages('order')">Thông tin Quán</button>
            <button class="btn btn-outline-success mx-2" onclick="togglePages('customer')">Thông tin Khách hàng</button>
        </div>
    </div>

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
                    ${od.menu_item.Title_items} - SL: ${od.quantity_ordered},
                    Giá: ${parseFloat(od.sell_price).toLocaleString()} VND,
                    <strong>Thành tiền:</strong> ${total.toLocaleString()} VND
                </li>`;
            }).join('');

            const totalAmount = orderDetails.reduce((sum, od) =>
                sum + (parseFloat(od.sell_price) * od.quantity_ordered), 0) + deliveryFee;

            const container = document.createElement("div");
            container.className = "card border-success mb-4 order-card";

            container.innerHTML = `
                <!-- Trang Thông tin Quán -->
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
                            <button class="btn btn-warning" onclick="acceptOrder(${order.id})">Nhận đơn</button>
                            <button class="btn btn-danger" onclick="cancelOrder(${order.id})">Từ chối đơn</button>
                        </div>
                    </div>
                </div>

                <!-- Trang Thông tin Khách hàng -->
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
                alert(data.message);
                // Cập nhật trạng thái đơn
            })
            .catch(err => console.error(err));
        }

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
                alert(data.message);
                // Cập nhật trạng thái đơn
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
                            alert("Không có đơn hàng gần bạn.");
                        }
                    })
                    .catch(err => console.error(err));
                });
            }
        });
    </script>

    </div>

@endsection

{{-- <!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin Đơn hàng</title>
</head>

<body>
    <h1>Thông tin đơn hàng và khách hàng</h1>

    <div id="order-info"></div> <!-- Đây là nơi hiển thị thông tin đơn hàng -->

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            console.log("📍 Đang kiểm tra hỗ trợ định vị...");

            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    function (position) {
                        const latitude = position.coords.latitude;
                        const longitude = position.coords.longitude;

                        console.log("✅ Lấy tọa độ thành công:");
                        console.log("Latitude:", latitude);
                        console.log("Longitude:", longitude);

                        const payload = {
                            lat: latitude,
                            lon: longitude
                        };

                        console.log("📦 Payload gửi lên server:", payload);

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
                                console.log("✅ Dữ liệu nhận được từ server:", data);
                                if (data.orders && data.orders.length > 0) {
                                    let ordersHtml = '<ul>';
                                    data.orders.forEach(order => {
                                        let restaurant = order.restaurant;
                                        let orderDetails = order.order_details;
                                        let user = order.user || {};
                                        let location = user.location || {};

                                        // Xử lý danh sách sản phẩm
                                        let productsHtml = '';
                                        let totalAmount = 0;
                                        orderDetails.forEach(detail => {
                                            let itemTotal = parseFloat(detail.sell_price) * detail.quantity_ordered;
                                            totalAmount += itemTotal;
                                            productsHtml += `
                                                <strong>Tên sản phẩm:</strong> ${detail.menu_item.Title_items}<br>
                                                <strong>Số lượng:</strong> ${detail.quantity_ordered}<br>
                                                <strong>Giá sản phẩm:</strong> ${detail.sell_price} VNĐ<br>
                                                <strong>Tạm tính:</strong> ${itemTotal.toFixed(2)} VNĐ<br><br>
                                            `;
                                        });

                                        totalAmount += order.delivery_fee;

                                        ordersHtml += `
                                            <li>
                                                <strong>Đơn hàng #${order.id}</strong><br>
                                                <strong>Nhà hàng:</strong> ${restaurant.name}<br>
                                                <strong>Địa chỉ nhà hàng:</strong> ${restaurant.locations[0].Address}, ${restaurant.locations[0].Ward}, ${restaurant.locations[0].District}, ${restaurant.locations[0].City}<br>
                                                <strong>Số điện thoại nhà hàng:</strong> ${restaurant.PhoneNumber}<br>
                                                <strong>Email nhà hàng:</strong> ${restaurant.email}<br><br>

                                                <strong>Danh sách sản phẩm:</strong><br>
                                                ${productsHtml}
                                                <strong>Phí ship:</strong> ${order.delivery_fee} VNĐ<br>
                                                <strong>Thành tiền:</strong> ${totalAmount.toFixed(2)} VNĐ<br>
                                                <strong>Ngày đặt:</strong> ${order.order_date}<br><br>

                                                <strong>Thông tin khách hàng:</strong><br>
                                                <strong>Tên khách hàng:</strong> ${user.username || 'Không có'}<br>
                                                <strong>Địa chỉ khách hàng:</strong> ${location.Address || ''}, ${location.Ward || ''}, ${location.District || ''}, ${location.City || ''}<br>
                                                <strong>Số điện thoại khách hàng:</strong> ${user.PhoneNumber || 'Không có'}<br>
                                                <strong>Email khách hàng:</strong> ${user.email || 'Không có'}<br>
                                            </li>
                                            <hr>
                                        `;
                                    });
                                    ordersHtml += '</ul>';
                                    document.getElementById("order-info").innerHTML = ordersHtml;
                                } else {
                                    document.getElementById("order-info").innerHTML = "Không có đơn hàng gần bạn.";
                                }
                            })
                            .catch(error => {
                                console.error("❌ Lỗi khi xử lý phản hồi JSON:", error);
                                alert("Đã xảy ra lỗi khi kết nối với server.");
                            });
                    },
                    function (error) {
                        alert('Không thể truy cập vị trí của bạn! Vui lòng cho phép trình duyệt.');
                        console.error("❌ Lỗi khi lấy vị trí:", error);
                    }
                );
            } else {
                alert("Trình duyệt của bạn không hỗ trợ định vị.");
                console.error("⚠️ Trình duyệt không hỗ trợ Geolocation API.");
            }
        });
    </script>
</body>

</html> --}}

