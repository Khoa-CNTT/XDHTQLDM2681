<!-- resources/views/restaurant/profile/edit.blade.php -->
@extends('Restaurant.share.master')

@section('noi_dung')
    <div class="container">
        <h2>Cập nhật thông tin nhà hàng</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('restaurant.update.info') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <!-- Các trường form khác -->



            <div class="form-group">
                <label for="name">Tên nhà hàng</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $restaurant->name) }}"
                    required>
            </div>

            <div class="form-group">
                <label for="PhoneNumber">Số điện thoại</label>
                <input type="text" id="PhoneNumber" name="PhoneNumber" class="form-control"
                    value="{{ old('PhoneNumber', $restaurant->PhoneNumber) }}" required>
            </div>

            <div class="form-group">
                <label for="status">Trạng thái</label>
                <select id="status" name="status" class="form-control" required>
                    <option value="0" {{ old('status', $restaurant->status) == '0' ? 'selected' : '' }}>Mở cửa</option>
                    <option value="1" {{ old('status', $restaurant->status) == '1' ? 'selected' : '' }}>Đóng cửa</option>
                </select>
            </div>


            <div class="form-group">
                <label for="start_time">Giờ mở cửa</label>
                <input type="time" id="start_time" name="start_time" class="form-control"
                    value="{{ old('start_time', $restaurant->start_time) }}" required>
            </div>

            <div class="form-group">
                <label for="end_time">Giờ đóng cửa</label>
                <input type="time" id="end_time" name="end_time" class="form-control"
                    value="{{ old('end_time', $restaurant->end_time) }}" required>
            </div>

            <div class="form-group">
                <label for="business_type">Loại hình kinh doanh</label>
                <input type="text" id="business_type" name="business_type" class="form-control"
                    value="{{ old('business_type', $restaurant->business_type) }}" required>
            </div>

            <div class="form-group">
                <label for="description">Mô tả</label>
                <textarea id="description" name="description"
                    class="form-control">{{ old('description', $restaurant->description) }}</textarea>
            </div>

            <div class="form-group">
                <label for="logo">Logo</label>
                <input type="file" id="logo" name="logo" class="form-control">
                @if($restaurant->logo)
                    <img src="{{ asset('image/logo/' . $restaurant->logo) }}" alt="Logo" width="150">
                @else
                    Chưa có logo
                @endif
            </div>

            <div class="form-group">
                <label for="business_license">Giấy phép kinh doanh</label>
                <input type="file" id="business_license" name="business_license" class="form-control">
                @if($restaurant->logo)
                    <img src="{{ asset('image/logo/' . $restaurant->logo) }}" alt="Logo" width="150">
                @else
                    Chưa có logo
                @endif
            </div>

            {{-- <div class="form-group">
                <label for="location_id">Vị trí</label>
                <select id="location_id" name="location_id" class="form-control" required>
                    @foreach($locations as $location)
                    <option value="{{ $location->id }}" {{ $restaurant->location_id == $location->id ? 'selected' : '' }}>
                        {{ $location->Address }}
                    </option>
                    @endforeach
                </select>
            </div> --}}

            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </form>
    </div>
@endsection
