@extends('Restaurant.share.master')
@section('noi_dung')
    <div class="container my-5">
        <h2 class="mb-4">📋 Danh sách món ăn</h2>

        <!-- Hiển thị số lượng món ăn -->
        <p><strong>Tổng số món ăn: </strong>{{ $menuItems->count() }}</p>

        <a href="{{ route('menu_items.create') }}" class="btn btn-success mb-3">
            <i class="bi bi-plus-circle"></i> Thêm món ăn
        </a>

        <!-- Bộ lọc trạng thái -->
        <div class="mb-3 d-flex align-items-center gap-3">
            <label class="fw-bold mb-0">Lọc theo trạng thái:</label>

            <div class="form-check form-check-inline">
                <input class="form-check-input status-filter" type="radio" name="status" id="all" value="all" checked>
                <label class="form-check-label" for="all">Tất cả</label>
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input status-filter" type="radio" name="status" id="in-stock" value="1">
                <label class="form-check-label" for="in-stock">Hiển thị</label>
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input status-filter" type="radio" name="status" id="out-of-stock" value="0">
                <label class="form-check-label" for="out-of-stock">Tạm tắt</label>
            </div>
        </div>

        <div class="table-responsive shadow-sm rounded">
            <table id="myTable" class="table table-hover align-middle table-bordered">
                <thead class="table-dark">
                    <tr class="text-center">
                        <th>Ảnh</th>
                        <th>Tên món ăn</th>
                        <th>Nhà hàng</th>
                        <th>Danh mục</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Trạng thái</th>
                        <th>Phê duyệt</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($menuItems as $menuItem)
                        <tr class="text-center" data-status="{{ $menuItem->Status }}">
                            <td>
                                @if($menuItem->Image)
                                    <img src="{{ asset('public/public/image/foods/' . $menuItem->Image) }}" alt="Ảnh món ăn"
                                        width="60" height="60" class="rounded-circle shadow-sm">
                                @else
                                    <span class="text-muted fst-italic">Không có</span>
                                @endif
                            </td>
                            <td class="fw-semibold">{{ $menuItem->Title_items }}</td>
                            <td>{{ $menuItem->restaurant?->name ?? 'Không rõ' }}</td>
                            <td>{{ $menuItem->category->title ?? 'Không rõ' }}</td>
                            <td>{{ number_format($menuItem->Price, 0, ',', '.') }} đ</td>
                            <td>{{ $menuItem->Quantity }}</td>
                            <td>
                                @if($menuItem->Status == 1)
                                    <span class="badge bg-success">Hiển thị</span>
                                @else
                                    <span class="badge bg-danger">Tạm tắt</span>
                                @endif
                            </td>
                            <td>
                                @if($menuItem->approved == 1)
                                    <span class="badge bg-success">Đã phê duyệt</span>
                                @else
                                    <span class="badge bg-warning text-dark">Chờ phê duyệt</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('menu_items.edit', $menuItem->id) }}" class="btn btn-warning btn-sm me-1">
                                    <i class="bi bi-pencil-square"></i> Sửa
                                </a>
                                <form action="{{ route('menu_items.destroy', $menuItem->id) }}" method="POST"
                                    style="display:inline;" onsubmit="return confirm('Bạn chắc chắn muốn xóa món này?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="bi bi-trash"></i> Xóa
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    @if($menuItems->isEmpty())
                        <tr>
                            <td colspan="9" class="text-center text-muted">Chưa có món ăn nào.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const radioButtons = document.querySelectorAll('.status-filter');

            radioButtons.forEach(radio => {
                radio.addEventListener('change', function () {
                    const selectedStatus = this.value;
                    const rows = document.querySelectorAll('#myTable tbody tr');

                    rows.forEach(row => {
                        const rowStatus = row.getAttribute('data-status');

                        if (selectedStatus === 'all' || rowStatus === selectedStatus) {
                            row.style.display = '';
                        } else {
                            row.style.display = 'none';
                        }
                    });
                });
            });
        });
    </script>
@endsection
