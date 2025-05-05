@extends('Admin.share.master')
@section('noi_dung')
<h1>Quản lý Đánh giá</h1>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Người dùng</th>
            <th>Món ăn</th>
            <th>Số sao</th>
            <th>Bình luận</th>
            <th>Ngày</th>
            <th>Hiển thị</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach($ratings as $rating)
        <tr>
            <td>{{ $rating->order->user->username }}</td>
            <td>
                @foreach($rating->order->menu_items as $item)
                    {{ $item->Title_items }}<br>
                @endforeach
            </td>
            <td>{{ str_repeat('⭐', $rating->rating) }}</td>
            <td>{{ $rating->comment }}</td>
            <td>{{ $rating->created_at->format('d/m/Y') }}</td>
            <td>{!! $rating->is_approved ? '✅' : '❌' !!}</td>
            <td>
                @if(!$rating->is_approved)
                <form action="{{ route('admin.ratings.approve', $rating) }}" method="POST" style="display:inline">
                    @csrf
                    <button class="btn btn-success btn-sm">Duyệt</button>
                </form>
                @else
                <form action="{{ route('admin.ratings.hide', $rating) }}" method="POST" style="display:inline">
                    @csrf
                    <button class="btn btn-warning btn-sm">Ẩn</button>
                </form>
                @endif
                <form action="{{ route('admin.ratings.destroy', $rating) }}" method="POST" style="display:inline" onsubmit="return confirm('Xóa đánh giá?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm">Xóa</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $ratings->links() }}
@endsection
