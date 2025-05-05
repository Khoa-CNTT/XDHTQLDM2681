@extends('Admin.share.master')
@section('noi_dung')
    <h1>Danh sách khuyến mãi</h1>
    <a href="{{ route('offers.create') }}" class="btn btn-primary">Thêm khuyến mãi</a>
    <table id="myTable" class="table">
        <thead>
            <tr>
                <th>Hình ảnh</th>
                <th>Tiêu đề</th>
                <th>Loại</th>
                <th>Giá trị</th>
                <th>Toàn hệ thống</th>
                <th>Thời gian</th>
                <th>Áp dụng cho nhà hàng</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($offers as $offer)
                    <tr>
                        <td>
                            @if ($offer->image)
                                <img src="{{ asset('storage/' . $offer->image) }}" alt="Hình ảnh" width="80">
                            @else
                                Không có
                            @endif
                        </td>
                        <td>{{ $offer->title }}</td>
                        <td>
                            {{ $offer->discount_type === 'percent' ? 'Phần trăm giảm' : 'Số tiền cố định' }}
                        </td>

                        <td>{{ $offer->discount_value }}</td>
                        <td>{{ $offer->is_global ? '✅' : '❌' }}</td>
                <td>{{ \Carbon\Carbon::parse($offer->start_date)->format('d/m/Y') }} -
                    {{ \Carbon\Carbon::parse($offer->end_date)->format('d/m/Y') }}</td>


                        <td>
                            @if ($offer->is_global)
                                Tất cả nhà hàng
                            @else
                                <ul>
                                    @foreach ($offer->restaurants as $restaurant)
                                        <li>{{ $restaurant->name }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('offers.edit', $offer) }}">Sửa</a>
                            <form action="{{ route('offers.destroy', $offer) }}" method="POST" style="display:inline;">
                                @csrf @method('DELETE')
                                <button onclick="return confirm('Xoá?')">Xoá</button>
                            </form>
                        </td>
                    </tr>
            @endforeach
        </tbody>
    </table>
    {{ $offers->links() }}
@endsection
