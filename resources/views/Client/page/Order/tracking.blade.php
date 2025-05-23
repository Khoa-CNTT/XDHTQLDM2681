@extends('Client.Share.master')

@section('content')
        <div class="container">
            <h2 class="my-4">Theo dõi đơn hàng của bạn</h2>

            @if($orders->isEmpty())
                <p>Chưa có đơn hàng nào để theo dõi.</p>
            @else
                @foreach($orders as $order)
                            <div class="card mb-3" id="order-{{ $order->id }}">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <strong>Đơn hàng #{{ $order->id }}</strong>
                                    {{-- Hiển thị nút Hủy khi status cho phép --}}
                                    @if(
            in_array($order->status, [
                'xác nhận món',
            ])
        )
                                                            <form id="cancel-order-{{ $order->id }}" action="{{ route('order.cancel', $order) }}" method="POST"
                                                                style="display:inline;">
                                                                @csrf
                                                                @method('PATCH')
                                                                <button type="button" onclick="cancelConfirm({{ $order->id }})" class="btn btn-outline-danger btn-sm">Hủy
                                                                    đơn</button>
                                                            </form>

                                    @endif
                                </div>
                                <div class="card-body">
                                    <p>
                                        <strong>Trạng thái:</strong>
                                        <span class="order-status
                                                    {{ $order->status == 'Đã nhận' || $order->status == 'Đã đến điểm lấy, đang giao cho khách'
            ? 'text-primary' : 'text-success' }}">
                                            {{ $order->status }}
                                        </span>
                                    </p>
                                    <p><strong>Ngày đặt:</strong> {{ $order->created_at->format('d/m/Y H:i') }}</p>
                                    <p><strong>Phí giao hàng:</strong> {{ number_format($order->delivery_fee) }} đ</p>
                                    <p><strong>Tổng tiền:</strong> {{ number_format($order->total_amount) }} đ</p>
                                    <h5 class="mt-3">Chi tiết đơn hàng:</h5>
                                    <ul class="list-group">
                                        @foreach($order->orderDetails as $detail)
                                            <li class="list-group-item">
                                                {{ $detail->menuItem->Title_items }}
                                                ({{ $detail->quantity_ordered }} x {{ number_format($detail->sell_price) }} đ)
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                @endforeach
            @endif
        </div>





@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    <script>
        function cancelConfirm(id) {
            Swal.fire({
                title: 'Hủy đơn hàng?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Hủy đơn',
                cancelButtonText: 'Không'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('cancel-order-' + id).submit();
                }
            });
        }

        @if(session('success'))
            window.addEventListener('load', () => {
                Swal.fire({
                    icon: 'success',
                    title: 'Đã hủy đơn hàng thành công',
                    text: '{{ session('success') }}',
                    timer: 2000,
                    showConfirmButton: false
                });
            });
        @endif

        @if(session('error'))
            window.addEventListener('load', () => {
                Swal.fire({
                    icon: 'error',
                    title: 'Lỗi!',
                    text: '{{ session('error') }}',
                    timer: 2000,
                    showConfirmButton: false
                });
            });
        @endif
    </script>

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Thành công!',
                text: '{{ session('success') }}',
                timer: 3000,
                showConfirmButton: false,
                timerProgressBar: true,
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Lỗi!',
                text: '{{ session('error') }}',
                timer: 3000,
                showConfirmButton: false,
                timerProgressBar: true,
            });
        </script>
    @endif

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
                    window.location.href = "{{ route('order.history') }}";
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
            console.log(data);
            Swal.fire({
                icon: 'success',
                title: 'Cảm ơn bạn!',
                text: 'Đơn hàng đã được thanh toán thành công.',
                showConfirmButton: false,
                timer: 5000,
                timerProgressBar: true,
                willClose: () => {
                    window.location.reload();  // Reload trang sau khi thông báo ẩn đi
                }
            });


            showReviewModal(data.order.id);  // Hiển thị modal đánh giá ngay khi thanh toán thành công
        });

        function showReviewModal(orderId) {
            Swal.fire({
                title: 'Đánh giá đơn hàng',
                html: `
                <style>
                    .swal2-popup.custom-wide {
                        width: 66vw !important;
                        max-width: 66vw !important;
                    }
                    #star-rating span {
                        cursor: pointer;
                        font-size: 2.5rem;
                        transition: color 0.2s;
                    }
                    #star-rating span:hover,
                    #star-rating span:hover ~ span {
                        color: #ffc107;
                    }
                </style>
                <div id="star-rating" style="color: #ccc; text-align: center;">
                    <span data-value="1">&#9733;</span>
                    <span data-value="2">&#9733;</span>
                    <span data-value="3">&#9733;</span>
                    <span data-value="4">&#9733;</span>
                    <span data-value="5">&#9733;</span>
                </div>
                <textarea id="comment" class="form-control mt-3" placeholder="Nhận xét (tuỳ chọn)"></textarea>
            `,
                customClass: {
                    popup: 'custom-wide'
                },
                confirmButtonText: 'Gửi đánh giá',
                didOpen: () => {
                    const stars = document.querySelectorAll('#star-rating span');
                    stars.forEach(star => {
                        star.addEventListener('click', () => {
                            const value = parseInt(star.getAttribute('data-value'));
                            stars.forEach(s => {
                                s.style.color = parseInt(s.getAttribute('data-value')) <= value ? '#ffc107' : '#ccc';
                            });
                            document.getElementById('star-rating').setAttribute('data-selected', value);
                        });
                    });
                },
                preConfirm: () => {
                    const rating = document.getElementById('star-rating').getAttribute('data-selected');
                    const comment = document.getElementById('comment').value;
                    if (!rating) {
                        Swal.showValidationMessage('Vui lòng chọn số sao đánh giá.');
                        return false;
                    }
                    return { rating, comment };
                }
            }).then(result => {
                if (result.isConfirmed) {
                    fetch('/client/review/submit', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({
                            order_id: orderId,
                            rating: result.value.rating,
                            comment: result.value.comment
                        })
                    })
                        .then(res => res.json())
                        .then(response => {
                            Swal.fire('Cảm ơn!', 'Đánh giá của bạn đã được gửi.', 'success').then(() => {
                                window.location.href = "{{ route('order.history') }}"; // Reload nếu cần
                            });
                        })
                        .catch(err => {
                            Swal.fire('Lỗi', 'Không thể gửi đánh giá. Vui lòng thử lại sau.', 'error');
                        });
                }
            });
        }

    </script>
@endsection



