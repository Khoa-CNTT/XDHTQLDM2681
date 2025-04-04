@extends('Admin.share.master')
@section('noi_dung')
    <div class="container">
        <h1>Thêm món ăn mới</h1>
    <form action="{{ route('menu_items.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="restaurant_id">Nhà hàng</label>
            <select name="restaurant_id" id="restaurant_id" class="form-control">
                @foreach ($restaurants as $restaurant)
                    <option value="{{ $restaurant->id }}" {{ old('restaurant_id') == $restaurant->id ? 'selected' : '' }}>
                        {{ $restaurant->name }}
                    </option>
                @endforeach
            </select>
            @error('restaurant_id')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="category_id">Danh mục</label>
            <select name="category_id" id="category_id" class="form-control">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->title }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="Title_items">Tên món ăn</label>
            <input type="text" name="Title_items" id="Title_items" class="form-control" value="{{ old('Title_items') }}">
            @error('Title_items')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="Price">Giá</label>
            <input type="number" name="Price" id="Price" class="form-control" value="{{ old('Price') }}">
            @error('Price')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="Image">Hình ảnh</label>
            <input type="file" name="Image" id="Image" class="form-control">
            @error('Image')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="Quantity">Số lượng</label>
            <input type="number" name="Quantity" id="Quantity" class="form-control" value="{{ old('Quantity') }}">
            @error('Quantity')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="Status">Trạng thái</label>
            <select name="Status" id="Status" class="form-control">
                <option value="1" {{ old('Status') == '1' ? 'selected' : '' }}>Còn hàng</option>
                <option value="0" {{ old('Status') == '0' ? 'selected' : '' }}>Hết hàng</option>
            </select>
            @error('Status')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Mô tả</label>
            <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
            @error('description')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Thêm món ăn</button>
    </form>

    </div>
@endsection
