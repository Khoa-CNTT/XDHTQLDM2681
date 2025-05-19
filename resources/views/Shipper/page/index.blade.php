@extends('Shipper.share.master')
@section('content')
        <div class="bg-light text-center py-4">
            <!-- Logo -->
            <div class="mb-3">
                <h2 class="fw-bold">📦 CallFood Shipper</h2>
            </div>

            @if($shipper->is_active)
                <!-- Đang hoạt động -->
                <div class="bg-white shadow-sm rounded p-4 mx-auto w-75" style="max-width: 400px;">
                    <p class="text-success fw-bold fs-5">🚗 Bạn đang hoạt động và sẵn sàng nhận đơn!</p>
                    <form id="deactivate-form">
                        <button type="submit" class="btn btn-danger mt-2">⏸️ Tạm nghỉ</button>
                    </form>
                </div>
            @else
                <!-- Tạm nghỉ -->
                <p class="text-danger fw-bold fs-5">⏸️ Tạm nghỉ</p>
                <div class="bg-white shadow-sm rounded p-4 mx-auto w-75" style="max-width: 400px;">
                    <p class="text-primary fw-bold fs-5">🔄 Bật trạng thái để nhận đơn hàng mới</p>
                    <form id="activate-form">
                        <button type="submit" class="btn btn-success mt-2">✅ Bắt đầu hoạt động</button>
                    </form>
                </div>

            @endif
        </div><div class="container py-4">
    <h3 class="text-center mb-4">Thống kê đơn hàng</h3>

    <div class="row">
        @foreach ($statistics as $period => $data)
            <div class="col-md-4 mb-3">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title">
                            @switch($period)
    @case('1_day')
        Hôm nay ({{ \Carbon\Carbon::now()->format('d/m/Y') }})
    @break

    @case('3_days')
        3 Ngày gần nhất
    @break

    @case('1_week')
        1 Tuần gần nhất
    @break

    @case('1_month')
        1 Tháng gần nhất
    @break

    @case('1_year')
        1 Năm gần nhất
    @break
@endswitch

                        </h5>
                        <p class="card-text">Số đơn: <strong>{{ $data['total_orders'] }}</strong></p>
                        <p class="card-text">Thu nhập: <strong>{{ number_format($data['total_income'], 0, ',', '.') }} VND</strong></p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>


        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const deactivateForm = document.getElementById('deactivate-form');
                const activateForm = document.getElementById('activate-form');

                if (deactivateForm) {
                    deactivateForm.addEventListener('submit', function (event) {
                        event.preventDefault(); // Ngừng việc submit form thông thường

                        // Gửi yêu cầu AJAX để cập nhật trạng thái
                        axios.post('{{ route('shipper.updateStatus') }}', { is_active: false })
                            .then(response => {
                                Swal.fire({
                                    title: 'Thông báo',
                                    text: response.data.message,
                                    icon: 'info',
                                    confirmButtonText: 'OK',
                                    timer: 5000,
                                    timerProgressBar: true,
                                    didOpen: () => {
                                        // Bạn có thể thêm hành động nếu cần khi cửa sổ thông báo mở
                                    },
                                    willClose: () => {
                                        // Sau khi thông báo tự động đóng, reload trang
                                        location.reload();
                                    }
                                });
                            })
                            .catch(error => {
                                alert('Có lỗi xảy ra');
                            });

                    });
                }

                if (activateForm) {
                    activateForm.addEventListener('submit', function (event) {
                        event.preventDefault(); // Ngừng việc submit form thông thường

                        // Gửi yêu cầu AJAX để cập nhật trạng thái
                       axios.post('{{ route('shipper.updateStatus') }}', { is_active: true })
                            .then(response => {
                                Swal.fire({
                                    title: 'Thông báo',
                                    text: response.data.message,
                                    icon: 'info',
                                    confirmButtonText: 'OK',
                                    timer: 5000,
                                    timerProgressBar: true,
                                    didOpen: () => {
                                        // Bạn có thể thêm hành động nếu cần khi cửa sổ thông báo mở
                                    },
                                    willClose: () => {
                                        // Sau khi thông báo tự động đóng, reload trang
                                        window.location.href = '/shipper/order';
                                    }
                                });
                            })
                            .catch(error => {
                                alert('Có lỗi xảy ra');
                            });

                    });
                }
            });
        </script>
@endsection
