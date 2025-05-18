<!-- resources/views/restaurant/profile/edit.blade.php -->
@extends('Restaurant.share.master')

@section('noi_dung')
    <div class="container mt-5">
        <div class="card shadow rounded">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Cập nhật thông tin nhà hàng</h4>
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form action="{{ route('restaurant.update.info') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name">Tên nhà hàng</label>
                            <input type="text" id="name" name="name" class="form-control"
                                value="{{ old('name', $restaurant->name) }}" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="PhoneNumber">Số điện thoại</label>
                            <input type="text" id="PhoneNumber" name="PhoneNumber" class="form-control"
                                value="{{ old('PhoneNumber', $restaurant->PhoneNumber) }}" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="status">Trạng thái</label>
                            <select id="status" name="status" class="form-control" required>
                                <option value="0" {{ old('status', $restaurant->status) == '0' ? 'selected' : '' }}>Mở cửa
                                </option>
                                <option value="1" {{ old('status', $restaurant->status) == '1' ? 'selected' : '' }}>Đóng cửa
                                </option>
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="business_type">Loại hình kinh doanh</label>
                            <input type="text" id="business_type" name="business_type" class="form-control"
                                value="{{ old('business_type', $restaurant->business_type) }}" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="start_time">Giờ mở cửa</label>
                            <input type="time" id="start_time" name="start_time" class="form-control"
                                value="{{ old('start_time', $restaurant->start_time) }}" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="end_time">Giờ đóng cửa</label>
                            <input type="time" id="end_time" name="end_time" class="form-control"
                                value="{{ old('end_time', $restaurant->end_time) }}" required>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="description">Mô tả</label>
                            <textarea id="description" name="description" class="form-control"
                                rows="3">{{ old('description', $restaurant->description) }}</textarea>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="logo">Logo</label>
                            <input type="file" id="logo" name="logo" class="form-control">
                            @if($restaurant->logo)
                                <img src="{{ asset('image/logo/' . $restaurant->logo) }}" alt="Logo" width="120"
                                    class="mt-2 rounded border">
                            @else
                                <p class="text-muted">Chưa có logo</p>
                            @endif
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="business_license">Giấy phép kinh doanh</label>
                            <input type="file" id="business_license" name="business_license" class="form-control">
                            @if($restaurant->logo)
                                <img src="{{ asset('image/logo/' . $restaurant->logo) }}" alt="Logo" width="120"
                                    class="mt-2 rounded border">
                            @else
                                <p class="text-muted">Chưa có giấy phép</p>
                            @endif
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="location_id">Vị trí hiện tại</label>
                            <div class="form-control">
                                @if($location)
                                    {{ $location->Address }}, {{ $location->Ward }}, {{ $location->District }},
                                    {{ $location->City }}
                                @else
                                    <span class="text-muted">Chưa có thông tin vị trí</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="city">Tỉnh/Thành phố <span class="text-danger">*</span></label>
                            <select id="city" name="City" class="form-select">
                                <option value="" disabled selected>-- Chọn Tỉnh/Thành phố --</option>
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="district">Quận/Huyện <span class="text-danger">*</span></label>
                            <select id="district" class="form-control" name="District">
                                <option value="">Chọn Quận/Huyện</option>
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="ward">Phường/Xã <span class="text-danger">*</span></label>
                            <select id="ward" class="form-control" name="Ward">
                                <option value="">Chọn Phường/Xã</option>
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="address">Địa chỉ cụ thể <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="Address" id="address" placeholder="Số nhà, tên đường..."
                            value="{{ old('Address', $location->Address ?? '') }}">

                        </div>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-success mt-3">Cập nhật</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@section("js")



    <script>
        $(document).ready(function () {
                const selectedCity = @json($location?->City);
                const selectedDistrict = @json($location?->District);
                const selectedWard = @json($location?->Ward);

                // Load danh sách tỉnh
                $.getJSON('https://esgoo.net/api-tinhthanh/1/0.htm', function (data_city) {
                    if (data_city.error === 0) {
                        $.each(data_city.data, function (key, val) {
                            const selected = (val.full_name === selectedCity) ? 'selected' : '';
                            $('#city').append('<option value="' + val.full_name + '" data-id="' + val.id + '" ' + selected + '>' + val.full_name + '</option>');
                        });

                        if (selectedCity) {
                            const cityId = $('#city option:selected').data('id');
                            // Load quận
                            $.getJSON('https://esgoo.net/api-tinhthanh/2/' + cityId + '.htm', function (data_district) {
                                if (data_district.error === 0) {
                                    $.each(data_district.data, function (key, val) {
                                        const selected = (val.full_name === selectedDistrict) ? 'selected' : '';
                                        $('#district').append('<option value="' + val.full_name + '" data-id="' + val.id + '" ' + selected + '>' + val.full_name + '</option>');
                                    });

                                    if (selectedDistrict) {
                                        const districtId = $('#district option:selected').data('id');
                                        // Load phường
                                        $.getJSON('https://esgoo.net/api-tinhthanh/3/' + districtId + '.htm', function (data_ward) {
                                            if (data_ward.error === 0) {
                                                $.each(data_ward.data, function (key, val) {
                                                    const selected = (val.full_name === selectedWard) ? 'selected' : '';
                                                    $('#ward').append('<option value="' + val.full_name + '" ' + selected + '>' + val.full_name + '</option>');
                                                });
                                            }
                                        });
                                    }
                                }
                            });
                        }
                    }
                });

                // Khi chọn tỉnh → load quận
                $('#city').change(function () {
                    const cityId = $('#city option:selected').data('id');
                    $('#district').html('<option value="">Chọn Quận/Huyện</option>');
                    $('#ward').html('<option value="">Chọn Phường/Xã</option>');

                    if (cityId) {
                        $.getJSON('https://esgoo.net/api-tinhthanh/2/' + cityId + '.htm', function (data_district) {
                            if (data_district.error === 0) {
                                $.each(data_district.data, function (key, val) {
                                    $('#district').append('<option value="' + val.full_name + '" data-id="' + val.id + '">' + val.full_name + '</option>');
                                });
                            }
                        });
                    }
                });

                // Khi chọn quận → load phường
                $('#district').change(function () {
                    const districtId = $('#district option:selected').data('id');
                    $('#ward').html('<option value="">Chọn Phường/Xã</option>');

                    if (districtId) {
                        $.getJSON('https://esgoo.net/api-tinhthanh/3/' + districtId + '.htm', function (data_ward) {
                            if (data_ward.error === 0) {
                                $.each(data_ward.data, function (key, val) {
                                    $('#ward').append('<option value="' + val.full_name + '">' + val.full_name + '</option>');
                                });
                            }
                        });
                    }
                });
            });
    </script>


@endsection
