@extends('Admin.share.master')

@section('noi_dung')
    <div class="container py-4 d-flex justify-content-center">
        <div class="col-lg-10 col-md-12">
            <div class="card shadow rounded-4">
                <div
                    class="card-header bg-primary text-white d-flex justify-content-between align-items-center rounded-top-4">
                    <h4 class="mb-0">Quản lý đánh giá</h4>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="myTable" class="table table-bordered table-hover align-middle text-center">
                            <thead class="table-secondary">
                                <tr>
                                    <th scope="col">Người dùng</th>
                                    <th scope="col">Món ăn</th>
                                    <th scope="col">Số sao</th>
                                    <th scope="col">Bình luận</th>
                                    <th scope="col">Ngày</th>
                                    <th scope="col">Hiển thị</th>
                                    <th scope="col">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($ratings as $rating)
                                    <tr>
                                        <td>
                                            @if($rating->order->user)
                                                {{ $rating->order->user->fullname }}
                                            @else
                                                Đang cập nhật
                                            @endif                                   </td>
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
                                            @if(!$rating->is_approved) <!-- Chỉ hiển thị nút duyệt khi is_approved = false -->
                                                <form action="{{ route('admin.ratings.approve', $rating) }}" method="POST"
                                                    style="display:inline" class="approve-rating-form">
                                                    @csrf
                                                    <button class="btn btn-success btn-sm">Duyệt</button>
                                                </form>
                                            @else
                                                <span class="text-success">Đã duyệt</span>
                                                <!-- Hiển thị "Đã duyệt" khi đã phê duyệt -->
                                            @endif
                                            <form action="{{ route('admin.ratings.destroy', $rating) }}" method="POST"
                                                style="display:inline" onsubmit="return confirm('Xóa đánh giá?')">
                                                @csrf @method('DELETE')
                                                <button class="btn btn-danger btn-sm">Xóa</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                                @if($ratings->isEmpty())
                                    <tr>
                                        <td colspan="7" class="text-muted">Chưa có đánh giá nào.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.1/dist/sweetalert2.all.min.js"></script>
    <script>
        // Nếu có thông báo duyệt thành công
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Đánh giá đã được duyệt!',
                showConfirmButton: false,
                timer: 1500
            });
        @endif

        // Xử lý duyệt đánh giá khi nhấn nút "Duyệt"
        document.querySelectorAll('.approve-rating-form').forEach(form => {
            form.addEventListener('submit', function (e) {
                e.preventDefault(); // Ngừng hành động mặc định
                Swal.fire({
                    title: 'Bạn chắc chắn muốn duyệt đánh giá này?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Duyệt',
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Gửi form nếu người dùng chọn "Duyệt"
                        this.submit();
                    }
                });
            });
        });
    </script>
@endpush
