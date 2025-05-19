@extends('Admin.share.master')

@section('noi_dung')
    <div class="container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-12">
                <div class="card shadow rounded-4">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center rounded-top-4">
                        <h4 class="mb-0">Danh sách khuyến mãi</h4>
                        <a href="{{ route('offers.create') }}" class="btn btn-light btn-sm">+ Thêm khuyến mãi</a>
                    </div>

                    <div class="card-body">
                        <div class="table">
                            <table class="table table-bordered table-hover align-middle text-center" id="myTable">
                                <thead class="table-secondary">
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
                                                <a href="{{ route('offers.edit', $offer) }}" class="btn btn-warning btn-sm me-1">
                                                    <i class="fa-solid fa-pen-to-square"></i> Sửa
                                                </a>
                                                <form action="{{ route('offers.destroy', $offer) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc muốn xoá khuyến mãi này không?')">
                                                        <i class="fa-solid fa-trash"></i> Xoá
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @if($offers->isEmpty())
                                        <tr>
                                            <td colspan="8" class="text-center text-muted">Chưa có khuyến mãi nào.</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card-footer">
                        {{ $offers->links() }} <!-- Pagination -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
