@extends('Client.page.Account.settingmaster')
@section('settingaccount_content')
                        <div class="account__wrapper">
                            <div class="account__content">
                                <h2 class="account__content--title h3 mb-20">Địa chỉ giao hàng</h2>
                                {{-- <button class="new__address--btn btn mb-25" type="button">Thêm một địa chỉ mới</button> --}}
                                <!-- user/address.blade.php -->
                                <div class="account__details two">
                                    <h3 class="account__details--title h4">Mặc định</h3>
                                    <p class="account__details--desc">
                                    {{ $location?->Address }} --{{ $location?->Ward }}--{{ $location?->District }}-- {{ $location?->City }}



                                    </p>
                                </div>

                                <div class="account__details--footer d-flex">
                            <button onclick="enableEdit()" type="button">Sửa</button>


                                </div>
                            </div>
                            <div id="editForm" style="display: {{ $errors->any() ? 'block' : 'none' }};" class="mt-3">
                        <form action="{{ route('location.update') }}" method="POST">
                            @csrf

                            {{-- Hiển thị lỗi tổng --}}
                            @if ($errors->any())
                                <div class="alert alert-danger mt-2">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="mb-3">
                                <label for="city" class="form-label">Tỉnh/Thành phố <span class="text-danger">*</span></label>
                                <select id="city" name="City" class="form-select rounded-3" >
                                    <option value="" disabled selected>-- Chọn Tỉnh/Thành phố --</option>
                                    {{-- Option sẽ được đổ bằng JavaScript hoặc từ backend --}}
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="district">Quận/Huyện <span class="text-danger">*</span></label>
                                <select id="district" class="form-control" name="District" >
                                    <option value="">Chọn Quận/Huyện</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="ward">Phường/Xã <span class="text-danger">*</span></label>
                                <select id="ward" class="form-control" name="Ward" >
                                    <option value="">Chọn Phường/Xã</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="address">Địa chỉ cụ thể <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="Address" id="address" placeholder="Số nhà, tên đường..."
                                    value="{{ old('Address') }}">
                            </div>

                            <button class="btn btn-primary mt-3" type="submit">Cập nhật địa chỉ</button>
                            <button type="button" class="btn btn-secondary mt-3" onclick="cancelEdit()">Huỷ</button>
                        </form>


                            </div>
                        </div>

    {{-- Modal Cập nhật địa chỉ --}}





@endsection
@section('js')
                <!-- Bootstrap CSS (bỏ vào <head>) -->
       <script>
        function enableEdit() {
            document.getElementById('editForm').style.display = 'block';
        }

        function cancelEdit() {
            document.getElementById('editForm').style.display = 'none';
        }
    </script>



              <script>
    $(document).ready(function () {

        // Lấy danh sách tỉnh
        $.getJSON('https://esgoo.net/api-tinhthanh/1/0.htm', function (data_city) {
            console.log(data_city); // Kiểm tra dữ liệu tỉnh
            if (data_city.error === 0) {
                $.each(data_city.data, function (key, val) {
                    $('#city').append('<option value="' + val.full_name + '" data-id="' + val.id + '">' + val.full_name + '</option>');
                });
            } else {
                alert('Không thể lấy danh sách tỉnh!');
            }
        });

        // Khi chọn tỉnh → load quận
        $('#city').change(function () {
            var cityId = $('#city option:selected').data('id');
            console.log('ID Tỉnh: ' + cityId); // Kiểm tra ID tỉnh

            // Reset quận và phường
            $('#district').html('<option value="">Chọn Quận/Huyện</option>');
            $('#ward').html('<option value="">Chọn Phường/Xã</option>');

            if (cityId) {
                $.getJSON('https://esgoo.net/api-tinhthanh/2/' + cityId + '.htm', function (data_district) {
                    console.log(data_district); // Kiểm tra dữ liệu quận
                    if (data_district.error === 0) {
                        $.each(data_district.data, function (key, val) {
                            $('#district').append('<option value="' + val.full_name + '" data-id="' + val.id + '">' + val.full_name + '</option>');
                        });
                    } else {
                        alert('Không thể lấy danh sách quận!');
                    }
                });
            }
        });

        // Khi chọn quận → load phường
        $('#district').change(function () {
            var districtId = $('#district option:selected').data('id');
            console.log('ID Quận: ' + districtId); // Kiểm tra ID quận

            // Reset phường
            $('#ward').html('<option value="">Chọn Phường/Xã</option>');

            if (districtId) {
                $.getJSON('https://esgoo.net/api-tinhthanh/3/' + districtId + '.htm', function (data_ward) {
                    console.log(data_ward); // Kiểm tra dữ liệu phường
                    if (data_ward.error === 0) {
                        $.each(data_ward.data, function (key, val) {
                            $('#ward').append('<option value="' + val.full_name + '">' + val.full_name + '</option>');
                        });
                    } else {
                        alert('Không thể lấy danh sách phường!');
                    }
                });
            }
        });
    });
</script>


@endsection
