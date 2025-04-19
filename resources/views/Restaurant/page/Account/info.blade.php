<!-- resources/views/restaurant/profile/edit.blade.php -->
@extends('Restaurant.share.master')

@section('noi_dung')
        <div class="container">
    <div class="mb-3 text-end">
        <button type="button" class="btn {{ $restaurant->status == 0 ? 'btn-success' : 'btn-danger' }}" id="toggleStatusBtn"
            data-id="{{ $restaurant->id }}" onclick="toggleStatus(this)">
            {{ $restaurant->status == 0 ? 'Đang mở cửa' : 'Đang đóng cửa' }}
        </button>
        <a href="{{ route('restaurant.edit') }}" class="btn {{ $restaurant->status == 0 ? 'btn-success' : 'btn-danger' }}">
            Thay đổi thông tin nhà hàng
        </a>

    </div>


        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th>Tên nhà hàng</th>
                    <td>{{ $restaurant->name }}</td>
                </tr>
                <tr>
                    <th>Số điện thoại</th>
                    <td>{{ $restaurant->PhoneNumber }}</td>
                </tr>
                <tr>
                    <th>Giờ mở cửa</th>
                    <td>{{ $restaurant->start_time }}</td>
                </tr>
                <tr>
                    <th>Giờ đóng cửa</th>
                    <td>{{ $restaurant->end_time }}</td>
                </tr>
                <tr>
                    <th>Loại hình kinh doanh</th>
                    <td>{{ $restaurant->business_type }}</td>
                </tr>

                <tr>
                    <th>Logo</th>
                    <td>
                        @if($restaurant->logo)
                            <img src="{{ asset('image/logo/' . $restaurant->logo) }}" alt="Logo" width="150">
                        @else
                            <p>Chưa có logo</p>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Giấy phép kinh doanh</th>
                    <td>
                        @if($restaurant->business_license)
                            <img src="{{ asset('image/restaurant/' . $restaurant->business_license) }}" alt="Giấy phép" width="150">
                        @else
                            <p>Chưa có giấy phép</p>
                        @endif
                    </td>
                </tr>
                <th>Vị trí</th>

                <td>
                    @if($location)
                        {{ $location->Address }}, {{ $location->Ward }}, {{ $location->District }}, {{ $location->City }}

                    @else
                        Chưa có thông tin vị trí
                    @endif
                </td>
                <tr>
                    <th>Mô tả</th>
                    <td>{{ $restaurant->description }}</td>
                </tr>
            </tbody>
        </table>

        </div>
@endsection
@section('js')
    <script>
        function toggleStatus(button) {
            const restaurantId = button.getAttribute('data-id');
            const currentStatus = button.classList.contains('btn-success') ? 0 : 1;
            const newStatus = currentStatus === 0 ? 1 : 0;

            fetch("{{ route('restaurant.toggle.status') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    restaurant_id: restaurantId,
                    status: newStatus
                })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Cập nhật giao diện nút
                        if (newStatus === 0) {
                            button.classList.remove('btn-danger');
                            button.classList.add('btn-success');
                            button.innerText = 'Đang mở cửa';
                        } else {
                            button.classList.remove('btn-success');
                            button.classList.add('btn-danger');
                            button.innerText = 'Đang đóng cửa';
                        }
                    } else {
                        alert('Có lỗi xảy ra khi cập nhật trạng thái.');
                    }
                })
                .catch(error => {
                    console.error('Lỗi:', error);
                    alert('Không thể kết nối đến máy chủ.');
                });
        }
    </script>

@endsection
