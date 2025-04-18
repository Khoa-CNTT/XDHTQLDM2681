@extends('Restaurant.share.master')
@section('noi_dung')
    <div class="container my-5">
        <h2 class="mb-4">📋 Danh sách món ăn</h2>
        <a href="{{ route('menu_items.create') }}" class="btn btn-success mb-3">
            <i class="bi bi-plus-circle"></i> Thêm món ăn
        </a>

        <div class="table-responsive shadow-sm rounded">
            <table class="table table-hover align-middle table-bordered">
                <thead class="table-dark">
                    <tr class="text-center">
                        <th>Ảnh</th>
                        <th>Tên món ăn</th>
                        <th>Nhà hàng</th>
                        <th>Danh mục</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Trạng thái</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($menuItems as $menuItem)
                        <tr class="text-center">
                            <td>
                                @if($menuItem->Image)
                                    <img src="{{ asset('public/image/foods/' . $menuItem->Image) }}" alt="Ảnh món ăn" width="60" height="60"
                                        class="rounded-circle shadow-sm">
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
                                    <span class="badge bg-success">Còn hàng</span>
                                @else
                                    <span class="badge bg-danger">Hết hàng</span>
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
                            <td colspan="8" class="text-center text-muted">Chưa có món ăn nào.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

@endsection
