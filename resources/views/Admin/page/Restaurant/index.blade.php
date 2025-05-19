@extends('Admin.share.master')

@section('noi_dung')
    <div class="py-4 d-flex justify-content-center">
        <div class="col-lg-10 col-md-12">
            <div class="card shadow rounded-4">
                <div
                    class="card-header bg-primary text-white d-flex justify-content-between align-items-center rounded-top-4">
                    <h4 class="mb-0">Danh sách nhà hàng</h4>

                </div>

                <div class="card-body">
                    <!-- Tìm kiếm và lọc theo trạng thái -->
                    <div class="d-flex justify-content-between mb-3">

                        <div>
                            <label class="form-check-label me-2">Trạng thái</label>
                            <input type="radio" name="statusFilter" value="all" checked /> Tất cả
                            <input type="radio" name="statusFilter" value="open" /> Mở cửa
                            <input type="radio" name="statusFilter" value="closed" /> Đóng cửa
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table id="myTable" class="table table-bordered table-hover align-middle text-center">
                            <thead class="table-secondary">
                                <tr>
                                    <th>#</th>
                                    <th>Tên nhà hàng</th>
                                    <th>Logo</th>
                                    <th>Giấy phép kinh doanh</th>
                                    <th>Email</th>
                                    <th>Điện thoại</th>
                                    <th>Loại hình</th>
                                    <th>Địa chỉ</th>
                                    <th>Trạng thái</th>
                                    <th>Phê duyệt</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="restaurantTable">
                                @foreach($restaurants as $index => $restaurant)
                                    <tr data-status="{{ $restaurant->status ? 'open' : 'closed' }}">
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $restaurant->name }}</td>
                                        <td>
                                            @if($restaurant->logo)
                                                <img src="{{ asset('image/logo/' . $restaurant->logo) }}" alt="Logo" width="60"
                                                    height="60" class="rounded-circle shadow-sm">
                                            @else
                                                <span class="text-muted">Không có</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($restaurant->business_license)
                                                <img src="{{ asset('image/restaurant/' . $restaurant->business_license) }}"
                                                    alt="GPLK" width="60" height="60" class="rounded-circle shadow-sm">
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
                                                    <li>{{ $location->Address }}, {{ $location->Ward }}, {{ $location->District }},
                                                        {{ $location->City }}</li>
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
                                                <button class="btn btn-sm btn-outline-primary approve-btn"
                                                    data-id="{{ $restaurant->id }}">Phê duyệt</button>
                                            @endif
                                        </td>
                                        <td>
                                            <button class="btn btn-sm btn-info view-details-btn" data-id="{{ $restaurant->id }}">
                                                Xem chi tiết
                                            </button>
                                        </td>

                                    </tr>
                                @endforeach
                                @if($restaurants->isEmpty())
                                    <tr>
                                        <td colspan="10" class="text-muted">Chưa có nhà hàng nào.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal chi tiết nhà hàng -->
    <div class="modal fade" id="restaurantDetailModal" tabindex="-1" aria-labelledby="restaurantDetailModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Chi tiết nhà hàng</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Đóng"></button>
                </div>
            <div class="modal-body">
                <div class="row">
                    <!-- Cột bên trái -->
                    <div class="col-md-6">
                        <p><strong>Tên:</strong> <span id="modalName"></span></p>
                        <p><strong>Email:</strong> <span id="modalEmail"></span></p>
                        <p><strong>Số điện thoại:</strong> <span id="modalPhone"></span></p>
                        <p><strong>Loại hình kinh doanh:</strong> <span id="modalBusinessType"></span></p>
                    </div>

                    <!-- Cột bên phải -->
                    <div class="col-md-6">
                        <p><strong>Thời gian hoạt động:</strong> <span id="modalStartTime"></span> - <span id="modalEndTime"></span>
                        </p>
                        <p><strong>Mô tả:</strong> <span id="modalDescription"></span></p>
                        <p><strong>Trạng thái:</strong> <span id="modalStatus"></span></p>
                        <p><strong>Phê duyệt:</strong> <span id="modalApproved"></span></p>
                    </div>

                    <!-- Dòng mới cho địa điểm (full width) -->
                    <div class="col-12 mt-3">
                        <p><strong>Địa điểm:</strong></p>
                        <ul id="modalLocations"></ul>
                    </div>
                </div>
            </div>

            </div>
        </div>
    </div>



@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function () {
                // Lọc theo trạng thái
                $("input[name='statusFilter']").on("change", function () {
                    var selectedStatus = $("input[name='statusFilter']:checked").val();
                    filterTable(selectedStatus);
                });

                // Tìm kiếm theo tên nhà hàng
                $('#searchInput').on('input', function () {
                    var searchQuery = $(this).val().toLowerCase();
                    filterTable(null, searchQuery);
                });

                function filterTable(status = 'all', searchQuery = '') {
                    $('#restaurantTable tr').each(function () {
                        var statusMatch = $(this).data('status') === status || status === 'all';
                        var nameMatch = $(this).find('td:nth-child(2)').text().toLowerCase().includes(searchQuery);

                        if (statusMatch && nameMatch) {
                            $(this).show();
                        } else {
                            $(this).hide();
                        }
                    });
                }
            });

    </script>

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
                        _token: $('meta[name="csrf-token"]').attr('content')
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
                        if (response.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Phê duyệt thành công',
                                confirmButtonText: 'OK'
                            });
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
                    error: function () {
                        Swal.fire({
                            icon: 'error',
                            title: 'Lỗi',
                            text: 'Đã có lỗi xảy ra. Vui lòng thử lại.',
                            confirmButtonText: 'OK'
                        });
                    },
                    complete: function () {
                        Swal.close();
                    }
                });
            });

            // Filter based on radio button selection
            $('input[name="status"]').on('change', function () {
                var status = $(this).val();
                $('.restaurant-row').each(function () {
                    var rowStatus = $(this).data('status');
                    if (status === 'all' || status === rowStatus) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const modal = new bootstrap.Modal(document.getElementById('restaurantDetailModal'));

            document.querySelectorAll('.view-details-btn').forEach(button => {
                button.addEventListener('click', function () {
                    const id = this.getAttribute('data-id');

                    fetch(`/admin/restaurant/${id}`)
                        .then(response => response.json())
                        .then(restaurant => {
                            document.getElementById('modalName').textContent = restaurant.name;
                            document.getElementById('modalEmail').textContent = restaurant.email;
                            document.getElementById('modalPhone').textContent = restaurant.PhoneNumber;
                            document.getElementById('modalBusinessType').textContent = restaurant.business_type;
                            document.getElementById('modalDescription').textContent = restaurant.description || 'Không có';
                            document.getElementById('modalStartTime').textContent = restaurant.start_time || 'N/A';
                            document.getElementById('modalEndTime').textContent = restaurant.end_time || 'N/A';
                            document.getElementById('modalStatus').textContent = restaurant.status ? 'Mở cửa' : 'Đóng cửa';
                            document.getElementById('modalApproved').textContent = restaurant.approved ? 'Đã phê duyệt' : 'Chưa phê duyệt';

                            const locationList = document.getElementById('modalLocations');
                            locationList.innerHTML = '';
                            restaurant.locations.forEach(location => {
                                const li = document.createElement('li');
                                li.textContent = `${location.Address}, ${location.Ward}, ${location.District}, ${location.City}`;
                                locationList.appendChild(li);
                            });

                            modal.show();
                        })
                        .catch(error => {
                            alert("Lỗi khi tải dữ liệu nhà hàng.");
                            console.error(error);
                        });
                });
            });
        });
    </script>

@endsection
