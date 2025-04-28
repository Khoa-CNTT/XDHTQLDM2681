@extends('Admin.share.master')
@section('noi_dung')
<div class="container">
    <div class="row">
        <!-- Danh sách nhà hàng -->
        <aside class="col-md-3 mb-4">
            <h4 class="text-primary mb-3">Danh sách nhà hàng</h4>
            <ul class="list-group">
                @foreach ($restaurants as $restaurant)
                    <li class="list-group-item list-group-item-action" onclick="hienThiMonAn({{ $restaurant->id }}, this)">
                        {{ $restaurant->name }}
                    </li>
                @endforeach
            </ul>
        </aside>

        <!-- Danh sách món ăn -->
        <main class="col-md-9">
            <h4 class="text-primary mb-3">Danh sách món ăn</h4>
            <div class="table-responsive">
                <table id="danhSachMonAn" class="table table-bordered text-center align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Mã món</th>
                            <th>Tên món</th>
                            <th>Hình ảnh</th>
                            <th>Tình trạng</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="5" class="text-muted">Chọn nhà hàng để xem món ăn</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>
<!-- Modal Chi tiết món ăn -->
<div class="modal fade" id="modalChiTiet" tabindex="-1" aria-labelledby="modalChiTietLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content rounded-3 shadow">
            <!-- Modal Header -->
            <div class="modal-header text-white">
                <h5 class="modal-title" id="modalChiTietLabel">Chi tiết món ăn</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body p-4">
                <div id="chiTietMonAnContent">
                    <!-- Thông tin chi tiết sẽ được thêm vào đây -->
                </div>
            </div>
        </div>
    </div>
</div>
<script>
const danhSachMon = @json($allMenuItems);

function hienThiMonAn(restaurantId, element) {
    document.querySelectorAll('.list-group-item').forEach(item => item.classList.remove('active'));
    element.classList.add('active');

    const tbody = document.getElementById('danhSachMonAn').querySelector('tbody');
    tbody.innerHTML = '';

    const monAn = danhSachMon.filter(mon => mon.restaurant_id == restaurantId);

    if (monAn.length === 0) {
        tbody.innerHTML = '<tr><td colspan="5" class="text-muted">Không có món ăn</td></tr>';
    } else {
        monAn.forEach(mon => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${mon.id}</td>
                <td>${mon.Title_items}</td>
                <td><img src="/public/image/foods/${mon.Image}" alt="${mon.Title_items}" 
                    style="width:70px; height:50px; object-fit:cover; border-radius:10px;"></td>
                <td>
                    <span class="badge ${mon.approved == 1 ? 'bg-success' : 'bg-warning text-dark'}">
                        ${mon.approved == 1 ? 'Đã phê duyệt' : 'Chờ phê duyệt'}
                    </span>
                </td>
                <td>
                    <button class="btn btn-sm btn-info me-1" onclick="chiTiet('${mon.id}')">Chi tiết</button>
                    <button class="btn btn-sm btn-danger me-1" onclick="xoaMon('${mon.id}')">Xóa</button>
                    ${mon.approved == 0 
                        ? `<button class="btn btn-sm btn-success" onclick="pheDuyetMon('${mon.id}', this)">Phê duyệt</button>`
                        : ''
                    }
                </td>
            `;
            tbody.appendChild(row);
        });
    }
}

function chiTiet(maMon) {
    // Lọc món ăn từ danh sách món
    const monAn = danhSachMon.find(mon => mon.id == maMon);

    if (!monAn) {
        alert('Không tìm thấy món ăn!');
        return;
    }

    // Hiển thị thông tin chi tiết vào trong modal
    const chiTietContent = `
        <p><strong>Mã món:</strong> ${monAn.id}</p>
        <p><strong>Tên món:</strong> ${monAn.Title_items}</p>
        <p><strong>Giá:</strong> ${monAn.Price ? monAn.Price : 'Chưa có giá'}</p>
        <p><strong>Mô tả:</strong> ${monAn.description ? monAn.description : 'Chưa có mô tả'}</p>
        <p><strong>Trạng thái:</strong> 
            <span class="badge ${monAn.approved == 1 ? 'bg-success' : 'bg-warning text-dark'}">
                ${monAn.approved == 1 ? 'Đã phê duyệt' : 'Chờ phê duyệt'}
            </span>
        </p>
        <p><strong>Hình ảnh:</strong><br><img src="/public/image/foods/${monAn.Image}" alt="${monAn.Title_items}" style="width:200px; height:auto; object-fit:cover; border-radius:10px;"></p>
    `;
    
    // Đưa nội dung vào modal
    document.getElementById('chiTietMonAnContent').innerHTML = chiTietContent;
    
    // Hiển thị modal
    const modal = new bootstrap.Modal(document.getElementById('modalChiTiet'));
    modal.show();
}

function xoaMon(maMon) {
    if (confirm(`Bạn có chắc chắn muốn xóa món: ${maMon}?`)) {
        alert(`Đã xóa món: ${maMon}`);
    }
}

// ✅ Hàm PHÊ DUYỆT
function pheDuyetMon(id, button) {
    // Xác nhận người dùng trước khi thực hiện phê duyệt
    if (confirm("Bạn có chắc chắn muốn phê duyệt món này?")) {
        fetch(`/admin/food/approve-menu-item/${id}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',  // Đảm bảo gửi CSRF token
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({id: id}) // Gửi ID món ăn
        })
        .then(response => {
            if (!response.ok) {
                // Nếu response không ok, trả về lỗi và in ra status
                console.error('Lỗi server:', response.status, response.statusText);
                return response.json(); // Tiếp tục đọc phản hồi JSON để lấy thông báo lỗi từ server
            }
            return response.json();  // Nếu thành công, tiếp tục giải mã phản hồi
        })
        .then(data => {
            if (data.message === 'Món ăn đã được phê duyệt!') {
                // Cập nhật giao diện khi món ăn được phê duyệt thành công
                alert('✅ Món ăn đã được phê duyệt!');
                const badge = button.closest('tr').querySelector('.badge');
                badge.className = 'badge bg-success';
                badge.innerText = 'Đã phê duyệt';
                button.remove(); // Xóa nút phê duyệt
            } else {
                // Nếu server trả về thông báo lỗi
                alert('❌ Lỗi khi phê duyệt, thử lại sau!');
                console.error('Lỗi từ server:', data.message);  // Log lỗi từ server
            }
        })
        .catch(error => {
            // Xử lý khi có lỗi mạng hoặc lỗi trong fetch
            console.error('Lỗi:', error);
            alert('❌ Đã xảy ra lỗi!');  // Thông báo lỗi chung
        });
    }
}


</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection
