@extends('Admin.share.master')
@section('noi_dung')
    <div class="container">
        <h1>Danh sách món ăn</h1>
        <a href="{{ route('menu_items.create') }}" class="btn btn-success mb-3">Thêm món ăn</a>
        <table class="table table-bordered">
            <thead>
                <tr>
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
                    <tr>
                        <td>{{ $menuItem->Title_items }}</td>
<<<<<<< HEAD
                        <td>{{ $menuItem->restaurant->name }}</td>
=======
                        <td>{{ $menuItem->restaurant?->name }}</td>
>>>>>>> origin/main
                        <td>{{ $menuItem->category->title }}</td>
                        <td>{{ $menuItem->Price }}</td>
                        <td>{{ $menuItem->Quantity }}</td>
                        <td>{{ $menuItem->Status == 1 ? 'Còn hàng' : 'Hết hàng' }}</td>
                        <td>
                            <a href="{{ route('menu_items.edit', $menuItem->id) }}" class="btn btn-warning">Sửa</a>
                            <form action="{{ route('menu_items.destroy', $menuItem->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
