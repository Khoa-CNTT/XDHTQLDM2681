<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký Người Bán CallFood</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
    <form id="registerForm">
@csrf
        <div class="container mt-5 pt-5">
            <div class="card shadow-lg border-0">
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <label for="shopName" class="form-label fw-bold">Tên Shop</label>
                            <input type="text" class="form-control" id="shopName" placeholder="Nhập tên shop">
                            <div id="shopNameFeedback" class="invalid-feedback"></div>
                        </div>

                        <!-- Logo Shop -->
                        <div class="mb-3">
                            <label for="shopLogo" class="form-label fw-bold">Logo Shop</label>
                            <input type="file" class="form-control" id="shopLogo" accept="image/*">
                            <div class="mt-2">
                                <img id="logoPreview" src="logo-placeholder.png" alt="Xem trước logo" class="img-thumbnail"
                                    style="max-width: 150px; display: none;">
                            </div>
                            <div id="shopLogoFeedback" class="invalid-feedback"></div>

                        </div>

                        <!-- Giấy phép kinh doanh -->
                        <div class="mb-3">
                            <label for="business_license" class="form-label fw-bold">Giấy phép kinh doanh</label>
                            <input type="file" class="form-control" id="business_license" accept="image/*">
                            <div class="mt-2">
                                <img id="businessLicensePreview" src="logo-placeholder.png" alt="Xem trước giấy phép" class="img-thumbnail"
                                    style="max-width: 150px; display: none;">
                            </div>

                        </div>
                        <div id="business_licenseFeedback" class="invalid-feedback"></div>


                        <div class="mb-3">
                            <h5 class="fw-bold">Địa chỉ lấy hàng</h5>
                            {{-- <div class="card p-3 shadow-sm">
                                <p id="pickupAddressDisplay" class="mb-2 text-muted">
                                    <strong>Họ tên:</strong> [chưa nhập] <br>
                                    <strong>Số điện thoại:</strong> [chưa nhập] <br>
                                    <strong>Tỉnh/Thành phố:</strong> [chưa nhập] <br>
                                    <strong>Quận/Huyện:</strong> [chưa nhập] <br>
                                    <strong>Xã/Phường:</strong> [chưa nhập] <br>
                                    <strong>Địa chỉ chi tiết:</strong> [chưa nhập] <br>
                                </p>
                            </div> --}}
                            <button type="button" class="btn btn-link p-0 mt-2" data-bs-toggle="modal"
                                data-bs-target="#editModal">Chọn</button>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label fw-bold">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Nhập email">

                        </div>
                         <div id="emailFeedback" class="invalid-feedback"></div>

                        <div class="mb-3">
                            <label for="phoneNumber" class="form-label fw-bold">Số Điện Thoại</label>
                            <input type="tel" class="form-control" id="phoneNumber" placeholder="Nhập số điện thoại">

                        </div>
                          <div id="phoneNumberFeedback" class="invalid-feedback"></div>



                        <div class="mb-3">
                            <label for="businessType" class="form-label fw-bold">Loại hình kinh doanh</label>
                            <select class="form-select @error('businessType') is-invalid @enderror" id="businessType" name="businessType">
                                <option value="">Chọn loại hình</option>
                                <option value="Thực phẩm" {{ old('businessType') == 'Thực phẩm' ? 'selected' : '' }}>Thực phẩm</option>
                                <option value="Đồ uống" {{ old('businessType') == 'Đồ uống' ? 'selected' : '' }}>Đồ uống</option>
                                <option value="Khác" {{ old('businessType') == 'Khác' ? 'selected' : '' }}>Khác</option>
                            </select>
                            @error('businessType')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div id="businessTypeFeedback" class="invalid-feedback"></div>

                        <div class="mb-3">
                            <label for="productDescription" class="form-label fw-bold">Mô tả Shop</label>
                            <textarea class="form-control" id="productDescription" rows="4"
                                placeholder="Nhập mô tả sản phẩm"></textarea>
                        </div>
                         <div id="productDescriptionFeedback" class="invalid-feedback"></div>


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
                          <div id="fullNameFeedback" class="invalid-feedback"></div>


                        <div class="mb-3">
                            <label for="tinh" class="form-label">Tỉnh/Thành Phố</label>
                            <select id="tinh" name="tinh" class="form-control">
                                <option value="">Chọn tỉnh thành</option>
                            </select>

                        </div>
                        <div id="tinhFeedback" class="invalid-feedback"></div>

                        <div class="mb-3">
                            <label for="quan" class="form-label">Quận/Huyện</label>
                            <select id="quan" name="quan" class="form-control">
                                <option value="0">Chọn quận huyện</option>
                            </select>
                            @error('quan')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                         <div id="quanFeedback" class="invalid-feedback"></div>

                        <div class="mb-3">
                            <label for="phuong" class="form-label">Phường/Xã</label>
                            <select id="phuong" name="phuong" class="form-control">
                                <option value="0">Chọn phường xã</option>
                            </select>
                            @error('phuong')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                         <div id="phuongFeedback" class="invalid-feedback"></div>
                        <div class="mb-3">
                            <label class="form-label">Địa chỉ chi tiết</label>
                            <input type="text" class="form-control" id="detailedAddress">
                        </div>
                         <div id="detailedAddressFeedback" class="invalid-feedback"></div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                        <button type="button" class="btn btn-success" id="saveButton">Lưu</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script>
        $(document).ready(function () {
            // Handle form submission
            $('#registerForm').submit(function (event) {
                event.preventDefault(); // Prevent the default form submission

                let formData = new FormData();

                // Get form field values and log them
                const shopName = $("#shopName").val();
                const email = $("#email").val();
                const phoneNumber = $("#phoneNumber").val();
                const businessType = $("#businessType").val();
                const productDescription = $("#productDescription").val();



                formData.append("shopName", shopName);
                formData.append("email", email);
                formData.append("phoneNumber", phoneNumber);
                formData.append("businessType", businessType);
                formData.append("productDescription", productDescription);

                // Get the logo file if any and log it
                let shopLogo = $("#shopLogo")[0].files[0];
                if (shopLogo) {
                    formData.append("logo", shopLogo);
                    console.log("Logo File:", shopLogo);
                }
                let BusinessLogo = $("#business_license")[0].files[0];
                if (BusinessLogo) {
                    formData.append("business_license", BusinessLogo);
                    // console.log("Logo File:", shopLogo);
                }

                // Get address details from the modal and log them
                const fullName = $("#fullName").val();
              const tinh = $("#tinh").find("option:selected").text();   // Lấy tên hiển thị của tỉnh
                const quan = $("#quan").find("option:selected").text();   // Lấy tên hiển thị của quận
                const phuong = $("#phuong").find("option:selected").text(); // Lấy tên hiển thị của xã

                const detailedAddress = $("#detailedAddress").val();

                // console.log("Address Data:", {
                //     fullName,
                //     tinh,
                //     quan,
                //     phuong,
                //     detailedAddress
                // });

                formData.append("fullName", fullName);
                formData.append("tinh", tinh);
                formData.append("quan", quan);
                formData.append("phuong", phuong);
                formData.append("detailedAddress", detailedAddress);

                // Log the full form data before sending it
                // console.log("Final Form Data to be sent:", formData);

                $.ajax({
                   url: '/restaurant/register-restaurant',  // Update with your backend endpoint
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    beforeSend: function () {
                        // Hiển thị thông báo "Đang xử lý..." khi bấm nút
                        Swal.fire({
                            icon: 'info',
                            title: 'Đang xử lý...',
                            text: 'Vui lòng chờ trong giây lát',
                            allowOutsideClick: false,
                            didOpen: () => {
                                Swal.showLoading(); // Hiển thị spinner
                            }
                        });
                    },
                    success: function (response) {
                        // Khi đăng ký thành công, thông báo thành công
                        Swal.fire({
                            icon: 'success',
                            title: 'Đăng ký thành công!',
                            text: 'Cảm ơn bạn đã đăng ký.',
                            confirmButtonText: 'OK'
                        });
                        // Có thể thực hiện thêm các hành động khác như chuyển hướng, làm mới trang, v.v.
                    },

                  error: function (xhr, status, error) {
    // Kiểm tra lỗi từ server (các lỗi validation)
    if (xhr.status === 422) {
        // Xử lý lỗi từ Laravel (validation errors)
        const errors = xhr.responseJSON.errors;
        let errorMessage = '';

        // Duyệt qua tất cả lỗi và hiển thị thông báo lỗi
        for (const [key, value] of Object.entries(errors)) {
            // Hiển thị lỗi ngay dưới các trường nhập liệu
            errorMessage += `${value.join(', ')}\n`; // Thêm các lỗi vào message

            // Gắn class is-invalid cho các trường có lỗi
            $(`#${key}`).addClass('is-invalid'); // Đánh dấu trường có lỗi

            // Hiển thị thông báo lỗi ngay dưới trường nhập liệu
            $(`#${key}Feedback`).text(value.join(', ')); // Hiển thị thông báo lỗi
        }

        // Nếu cần, bạn cũng có thể hiển thị lỗi chung (tổng hợp tất cả lỗi)
        Swal.fire({
            icon: 'error',
            title: 'Lỗi',
            text: errorMessage || 'Đã có lỗi xảy ra. Vui lòng thử lại.',
            confirmButtonText: 'OK'
        });
    }
    // Kiểm tra lỗi server khác (500, 400)
    else if (xhr.status === 400 || xhr.status === 500) {
        const errorMessage = xhr.responseJSON && xhr.responseJSON.message ? xhr.responseJSON.message : 'Đã có lỗi xảy ra. Vui lòng thử lại.';
        Swal.fire({
            icon: 'error',
            title: 'Lỗi',
            text: errorMessage,
            confirmButtonText: 'OK'
        });
    } else {
        // Nếu không phải lỗi từ server
        alert('Đã có lỗi xảy ra. Vui lòng thử lại.');
    }

    // Log lỗi để kiểm tra chi tiết
    console.error("Error response:", xhr, status, error);
}


                });
            });

            // Handle the modal "Lưu" button click
            $('#saveButton').click(function () {
                // Collect the modal address data
                const addressHtml = `
                    <strong>Họ tên:</strong> ${$('#fullName').val()} <br>
                    <strong>Số điện thoại:</strong> ${$('#phone').val()} <br>
                    <strong>Tỉnh/Thành phố:</strong> ${$('#tinh').val()} <br>
                    <strong>Quận/Huyện:</strong> ${$('#quan').val()} <br>
                    <strong>Xã/Phường:</strong> ${$('#phuong').val()} <br>
                    <strong>Địa chỉ chi tiết:</strong> ${$('#detailedAddress').val()} <br>
                `;
                $('#pickupAddressDisplay').html(addressHtml);
                $('#editModal').modal('hide'); // Close the modal after saving

                // Log modal data
                console.log("Modal address data:", addressHtml);
            });
        });
    </script>


    <script>
        $(document).ready(function () {
            //Lấy tỉnh thành
            $.getJSON('https://esgoo.net/api-tinhthanh/1/0.htm', function (data_tinh) {
                if (data_tinh.error == 0) {
                    $.each(data_tinh.data, function (key_tinh, val_tinh) {
                        $("#tinh").append('<option value="' + val_tinh.id + '">' + val_tinh.full_name + '</option>');
                    });
                    $("#tinh").change(function (e) {
                        var idtinh = $(this).val();
                        //Lấy quận huyện
                        $.getJSON('https://esgoo.net/api-tinhthanh/2/' + idtinh + '.htm', function (data_quan) {
                            if (data_quan.error == 0) {
                                $("#quan").html('<option value="0">Quận Huyện</option>');
                                $("#phuong").html('<option value="0">Phường Xã</option>');
                                $.each(data_quan.data, function (key_quan, val_quan) {
                                    $("#quan").append('<option value="' + val_quan.id + '">' + val_quan.full_name + '</option>');
                                });
                                //Lấy phường xã
                                $("#quan").change(function (e) {
                                    var idquan = $(this).val();
                                    $.getJSON('https://esgoo.net/api-tinhthanh/3/' + idquan + '.htm', function (data_phuong) {
                                        if (data_phuong.error == 0) {
                                            $("#phuong").html('<option value="0">Phường Xã</option>');
                                            $.each(data_phuong.data, function (key_phuong, val_phuong) {
                                                $("#phuong").append('<option value="' + val_phuong.id + '">' + val_phuong.full_name + '</option>');
                                            });
                                        }
                                    });
                                });

                            }
                        });
                    });

                }
            });
        });
    </script>
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
