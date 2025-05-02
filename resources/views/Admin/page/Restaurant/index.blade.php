@extends('Admin.share.master')
@section('noi_dung')
    <div class="container py-4">
        <h1 class="mb-4">📋 Danh sách nhà hàng</h1>
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover align-middle text-center">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Tên nhà hàng</th>
                        <th>Logo</th>
                        <th>giấy phép kinh doanh</th>
                        <th>Email</th>
                        <th>Điện thoại</th>
                        <th>Loại hình</th>
                        <th>Địa chỉ</th>
                        <th>Trạng thái</th>
                        <th>Phê duyệt</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($restaurants as $index => $restaurant)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $restaurant->name }}</td>
                            <td>
                                @if($restaurant->logo)
                                    <img src="{{ asset('image/logo/' . $restaurant->logo) }}" alt="Logo" width="60" height="60"
                                        class="rounded-circle shadow-sm">
                                @else
                                    <span class="text-muted">Không có</span>
                                @endif
                            </td>
                            <td>
                                @if($restaurant->business_license)
                                    <img src="{{ asset('image/restaurant/' . $restaurant->business_license) }}" alt="GPLK"
                                        width="60" height="60" class="rounded-circle shadow-sm">
                                @else
                                    <span class="text-muted">Không có</span>
                                @endif
                            </td>
                            <td>{{ $restaurant->email }}</td>
                            <td>{{ $restaurant->PhoneNumber }}</td>
                            <td>{{ $restaurant->business_type }}</td>
                            <td>
                                <ul class="list-unstyled mb-0">
                                    @foreach($restaurant->locations as $location)
                                        <li>
                                            {{ $location->Address }},
                                            {{ $location->Ward }},
                                            {{ $location->District }},
                                            {{ $location->City }}
                                        </li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>
                                @if($restaurant->status)
                                    <span class="badge bg-success">Mở cửa</span>
                                @else
                                    <span class="badge bg-secondary">Đóng cửa</span>
                                @endif
                            </td>
                            <td>
                                @if($restaurant->approved)
                                    <span class="badge bg-success">Đã phê duyệt</span>
                                @else
                                    <button class="btn btn-sm btn-outline-primary approve-btn" data-id="{{ $restaurant->id }}">
                                        Phê duyệt
                                    </button>
                                @endif
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>

@endsection

@section('js')
    <!-- Thêm SweetAlert từ CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function () {
            // Bắt sự kiện click vào nút phê duyệt
            $('.approve-btn').on('click', function () {
                var restaurantId = $(this).data('id');
                console.log(restaurantId);
                // Gửi AJAX request để phê duyệt
               $.ajax({
                    url: '/admin/restaurant/approve/' + restaurantId,
                    type: 'PATCH',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content') // Thêm CSRF token vào dữ liệu gửi đi
                    },
                    beforeSend: function () {
                        // Hiển thị thông báo "Đang xử lý..." khi bấm nút
                        Swal.fire({
                            icon: 'info',
                            title: 'Đang xử lý...',
                            text: 'Vui lòng chờ trong giây lát',
                            allowOutsideClick: false,
                            didOpen: () => {
                                Swal.showLoading(); // Hiển thị spinner
                            }
                        });
                    },
                    success: function (response) {
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
                    error: function (xhr, status, error) {
                        // Nếu có lỗi từ server
                        Swal.fire({
                            icon: 'error',
                            title: 'Lỗi',
                            text: 'Đã có lỗi xảy ra. Vui lòng thử lại.',
                            confirmButtonText: 'OK'
                        });
                    },
                    complete: function () {
                        // Đóng thông báo "Đang xử lý..." khi hoàn tất xử lý
                        Swal.close();
                    }
                });

            });
        });
    </script>
@endsection
