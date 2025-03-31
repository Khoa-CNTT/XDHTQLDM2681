<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký Người Bán CallFood</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-success fixed-top shadow">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="logo-placeholder.png" height="60">
                Đăng ký Người Bán CallFood
            </a>
        </div>
    </nav>

    <div class="container mt-5 pt-5">
        <div class="card shadow-lg border-0">
            <div class="card-body">
                <form>
                    <div class="mb-3">
                        <label for="shopName" class="form-label fw-bold">Tên Shop</label>
                        <input type="text" class="form-control" id="shopName" placeholder="Nhập tên shop" required>
                    </div>

                    <div class="mb-3">
                        <label for="shopLogo" class="form-label fw-bold">Logo Shop</label>
                        <input type="file" class="form-control" id="shopLogo" accept="image/*">
                        <div class="mt-2">
                            <img id="logoPreview" src="logo-placeholder.png" alt="Xem trước logo" class="img-thumbnail"
                                style="max-width: 150px; display: none;">
                        </div>
                    </div>

                    <div class="mb-3">
                        <h5 class="fw-bold">Địa chỉ lấy hàng</h5>
                        <div class="card p-3 shadow-sm">
                            <p id="pickupAddressDisplay" class="mb-2 text-muted">
                                <strong>Họ tên:</strong> [chưa nhập] <br>
                                <strong>Số điện thoại:</strong> [chưa nhập] <br>
                                <strong>Tỉnh/Thành phố:</strong> [chưa nhập] <br>
                                <strong>Quận/Huyện:</strong> [chưa nhập] <br>
                                <strong>Xã/Phường:</strong> [chưa nhập] <br>
                                <strong>Địa chỉ chi tiết:</strong> [chưa nhập] <br>
                            </p>
                        </div>
                        <button type="button" class="btn btn-link p-0 mt-2" data-bs-toggle="modal"
                            data-bs-target="#editModal">Chỉnh sửa</button>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label fw-bold">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Nhập email" required>
                    </div>

                    <div class="mb-3">
                        <label for="phoneNumber" class="form-label fw-bold">Số Điện Thoại</label>
                        <input type="tel" class="form-control" id="phoneNumber" placeholder="Nhập số điện thoại"
                            required>
                    </div>

                    <div class="mb-3">
                        <label for="businessType" class="form-label fw-bold">Loại hình kinh doanh</label>
                        <select class="form-select" id="businessType">
                            <option selected>Chọn loại hình</option>
                            <option value="1">Thực phẩm</option>
                            <option value="2">Đồ uống</option>
                            <option value="3">Khác</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="productDescription" class="form-label fw-bold">Mô tả Shop</label>
                        <textarea class="form-control" id="productDescription" rows="4"
                            placeholder="Nhập mô tả sản phẩm"></textarea>
                    </div>

                    <button type="submit" class="btn btn-success w-100">Đăng Ký</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Chỉnh Sửa Địa Chỉ -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Chỉnh Sửa Địa Chỉ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Họ tên</label>
                        <input type="text" class="form-control" id="fullName">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Số điện thoại</label>
                        <input type="text" class="form-control" id="phone">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tỉnh/Thành phố</label>
                        <input type="text" class="form-control" id="province">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Quận/Huyện</label>
                        <input type="text" class="form-control" id="district">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Xã/Phường</label>
                        <input type="text" class="form-control" id="ward">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Địa chỉ chi tiết</label>
                        <input type="text" class="form-control" id="detailedAddress">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    <button type="button" class="btn btn-success" id="saveButton">Lưu</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('saveButton').addEventListener('click', function () {
            const fullName = document.getElementById('fullName').value || "[chưa nhập]";
            const phone = document.getElementById('phone').value || "[chưa nhập]";
            const province = document.getElementById('province').value || "[chưa nhập]";
            const district = document.getElementById('district').value || "[chưa nhập]";
            const ward = document.getElementById('ward').value || "[chưa nhập]";
            const detailedAddress = document.getElementById('detailedAddress').value || "[chưa nhập]";

            document.getElementById('pickupAddressDisplay').innerHTML = `
                <strong>Họ tên:</strong> ${fullName} <br>
                <strong>Số điện thoại:</strong> ${phone} <br>
                <strong>Tỉnh/Thành phố:</strong> ${province} <br>
                <strong>Quận/Huyện:</strong> ${district} <br>
                <strong>Xã/Phường:</strong> ${ward} <br>
                <strong>Địa chỉ chi tiết:</strong> ${detailedAddress} <br>
            `;

            var modal = bootstrap.Modal.getInstance(document.getElementById('editModal'));
            modal.hide();
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
