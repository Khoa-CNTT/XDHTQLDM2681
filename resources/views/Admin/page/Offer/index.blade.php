@extends('Admin.share.master')
@section('noi_dung')
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<div class="row">
    <!-- Cột trái: Nút mở modal -->
    <div class="col-sm-2">
        <div class="d-grid gap-2">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createOfferModal">
                + Thêm Khuyến mãi
            </button>
        </div>
    </div>

    <!-- Cột phải: Danh sách khuyến mãi -->
    <div class="col-sm-10">
        <div class="card border-primary border-bottom border-3 border-0">
            <div class="card-header">
                <h4>Danh sách Khuyến mãi</h4>
            </div>
            <div class="card-body">
                <table class="table table-hover align-middle">
                    <thead class="">
                        <tr>
                            <th>#</th>
                            <th>Tiêu đề</th>
                            <th>Ảnh</th>
                            <th>Giảm giá (%)</th>
                            <th>Ngày bắt đầu</th>
                            <th>Ngày kết thúc</th>
                            <th>Trạng thái</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($offers as $offer )                                     
                        <tr>
                            <td>{{$offer->id}}</td>
                            <td>{{ $offer->title }}</td>
                            <td><img src="{{ asset('storage/' . $offer->image) }}" width="80"></td>
                            <td>{{ $offer->discount_value }}%</td>
                            <td>{{ \Carbon\Carbon::parse($offer->start_date)->format('Y-m-d H:i') }}</td>
                            <td>{{ \Carbon\Carbon::parse($offer->end_date)->format('Y-m-d H:i') }}</td>
                            <td>
                                <button 
                                 class="btn {{ $offer->status ? 'btn-primary' : 'btn-danger' }} btn-sm toggle-status-btn"
                                  data-id="{{ $offer->id }}">
                                   {{ $offer->status ? 'Hiển thị' : 'Tạm tắt' }}
                                </button>

                            </td>
                            <td>
                                <a href="#" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editOfferModal" 
                                     onclick="editOffer({{ $offer->id }})">Sửa</a>
                                     <form action="{{ route('offer.delete', $offer->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa khuyến mãi này không?')">Xoá</button>
                                    </form>
                                    
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal thêm khuyến mãi -->
    <div class="modal fade" id="createOfferModal" tabindex="-1" aria-labelledby="createOfferModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-header">
                    <h5 class="modal-title" id="createOfferModalLabel">Thêm Khuyến mãi</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Đóng"></button>
                </div>
                <form action="{{ route('offer.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="title" class="form-label">Tiêu đề</label>
                            <input type="text" class="form-control" name="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="discount_value" class="form-label">Giá trị giảm (%)</label>
                            <input type="number" class="form-control" name="discount_value" required>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Ngày bắt đầu</label>
                                <input type="datetime-local" class="form-control" name="start_date" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Ngày kết thúc</label>
                                <input type="datetime-local" class="form-control" name="end_date" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Hình ảnh</label>
                            <input type="file" class="form-control" name="image">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Mô tả</label>
                            <textarea class="form-control" name="description" rows="3"></textarea>
                        </div>
                        <div class="form-check form-switch mb-3">
                            <input type="hidden" name="status" value="0"> {{-- Nếu không check, sẽ gửi 0 --}}
                            <input class="form-check-input" type="checkbox" name="status" value="1" checked>
                            <label class="form-check-label">Kích hoạt</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Lưu</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@include('Admin.page.Offer.edit')
<script>
    // Hàm để mở modal và đổ dữ liệu vào modal
function editOffer(offerId) {
    // Gửi yêu cầu đến backend để lấy thông tin của khuyến mãi
    fetch(`/admin/offer/edit/${offerId}`)  // Đảm bảo route này tồn tại và trả về dữ liệu cần thiết
        .then(response => response.json())
        .then(data => {
            // Điền dữ liệu vào form modal
            document.getElementById('offer_id').value = data.id;
            document.getElementById('title').value = data.title;
            document.getElementById('discount_value').value = data.discount_value;
            document.getElementById('start_date').value = data.start_date.substring(0, 16); // Chuyển đổi datetime-local
            document.getElementById('end_date').value = data.end_date.substring(0, 16); // Chuyển đổi datetime-local
            document.getElementById('description').value = data.description;
            document.getElementById('status').checked = data.status == 1;
        })
        .catch(error => {
            console.error('Error fetching offer data:', error);
        });
}
document.querySelectorAll('.toggle-status-btn').forEach(button => {
    button.addEventListener('click', function () {
        const offerId = this.getAttribute('data-id');
        fetch(`/admin/offer/change-status/${offerId}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.status) {
                this.classList.remove('btn-danger');
                this.classList.add('btn-primary');
                this.innerText = 'Hiển thị';
            } else {
                this.classList.remove('btn-primary');
                this.classList.add('btn-danger');
                this.innerText = 'Tạm tắt';
            }
        })
        .catch(error => console.error('Lỗi khi thay đổi trạng thái:', error));
    });
});
</script>
@endsection
