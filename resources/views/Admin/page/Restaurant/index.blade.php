@extends('Admin.share.master')
@section('noi_dung')
    <div class="container">
        <h1>Danh sách nhà hàng</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Tên nhà hàng</th>
                    <th>Địa chỉ</th>
                    <th>Trạng thái</th>
                    <th>Phê duyệt</th>
                </tr>
            </thead>
            <tbody>
                @foreach($restaurants as $restaurant)
                    <tr>
                        <td>{{ $restaurant->name }}</td>
                        <td>{{ $restaurant->location->City . ', ' . $restaurant->location->District . ', ' . $restaurant->location->Ward . ', ' . $restaurant->location->Address }}</td>
                        <td>{{ $restaurant->status ? 'Đang hoạt động' : 'Không hoạt động' }}</td>
                        <td>
                            @if($restaurant->approved)
                                <span class="badge bg-success">Đã phê duyệt</span>
                            @else
                                <button class="btn btn-primary approve-btn" data-id="{{ $restaurant->id }}">Phê duyệt</button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('js')
    <!-- Thêm SweetAlert từ CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
            $(document).ready(function() {
                // Bắt sự kiện click vào nút phê duyệt
                $('.approve-btn').on('click', function() {
                    var restaurantId = $(this).data('id');
                     console.log(restaurantId);
                    // Gửi AJAX request để phê duyệt
                    $.ajax({
                        url: '/admin/restaurant/approve/' + restaurantId,
                        type: 'PATCH',
                         data: {
                            _token: $('meta[name="csrf-token"]').attr('content') // Thêm CSRF token vào dữ liệu gửi đi
                        },
                        success: function(response) {
                            // Nếu thành công, cập nhật giao diện
                            if (response.success) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Phê duyệt thành công',
                                    confirmButtonText: 'OK'
                                });
                                // Cập nhật lại trạng thái phê duyệt
                                location.reload();
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Lỗi',
                                    text: 'Đã có lỗi xảy ra. Vui lòng thử lại.',
                                    confirmButtonText: 'OK'
                                });
                            }
                        },
                        error: function(xhr, status, error) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Lỗi',
                                text: 'Đã có lỗi xảy ra. Vui lòng thử lại.',
                                confirmButtonText: 'OK'
                            });
                        }
                    });
                });
            });
        </script>
@endsection
