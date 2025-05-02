@extends('Client.Share.master')

@section('content')
            <div class="container">
                <h2 class="my-4">Theo dõi đơn hàng của bạn</h2>

                @if($orders->isEmpty())
                    <p>Chưa có đơn hàng nào để theo dõi.</p>
                @else
                    @foreach($orders as $order)
                        <div class="card mb-3" data-order-id="{{ $order->id }}">
                            <div class="card-header">
                                <strong>Đơn hàng #{{ $order->id }}</strong> - Tại nhà hàng: {{ $order->restaurant->name }}
                            </div>
                            <div class="card-body">
                                <p><strong>Trạng thái:</strong> <span class="order-status text-success">{{ $order->status }}</span></p>
                                <p><strong>Ngày đặt:</strong> {{ $order->created_at->format('d/m/Y H:i') }}</p>
                                <p><strong>Phí giao hàng:</strong> {{ number_format($order->delivery_fee) }} đ</p>
                                <p><strong>Tổng tiền:</strong> {{ number_format($order->total_amount) }} đ</p>
                                <h5 class="mt-3">Chi tiết đơn hàng:</h5>
                                <ul class="list-group">
                                    @foreach($order->orderDetails as $detail)
                                        <li class="list-group-item">
                                            {{ $detail->menuItem->Title_items }} ({{ $detail->quantity_ordered }} x
                                            {{ number_format($detail->sell_price) }} đ)
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
       <script>
        //console.log("Pusher script loaded ✅");

        const pusher = new Pusher('daffc7e94b204339825f', {
            cluster: 'ap1',
            forceTLS: true
        });

        var user_id = {{ auth()->user()->id }};
        //console.log("User ID đang theo dõi:", user_id);

        var channel = pusher.subscribe('order.' + user_id);

        // Nhận đơn
        channel.bind('order.accepted', function (data) {
            Swal.fire({
                icon: 'info',
                title: 'Đơn hàng đã được nhận!',
                text: 'Nhà hàng đang chuẩn bị món của bạn.',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                willClose: () => {
                    location.reload();
                }
            });

        });

       channel.bind('order.rejected', function (data) {
            Swal.fire({
                icon: 'error',
                title: 'Đơn hàng của bạn đã bị nhà hàng từ chối!',
                text: 'Vui lòng chọn món khác.',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                willClose: () => {
                    window.location.reload();
                }
            });
        });
        channel.bind('order.on_the_way', function (data) {
                Swal.fire({
                    icon: 'info',
                    title: 'Đơn hàng đang trên đường giao!',
                    text: 'Shipper đang giao đơn hàng của bạn.',
                    showConfirmButton: false,
                    timer: 3000,  // Thời gian hiển thị thông báo
                    timerProgressBar: true,
                    willClose: () => {
                        location.reload();  // Reload trang sau khi thông báo ẩn đi
                    }
                });
            });




                channel.bind('order.paid', function (data) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Cảm ơn bạn!',
                        text: 'Đơn hàng đã được thanh toán thành công.',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        willClose: () => {
                            location.reload();  // Reload trang sau khi thông báo ẩn đi
                        }
                    });
                });





    </script>



@endsection



