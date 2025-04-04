@extends('Admin.share.master')

@section('noi_dung')
    <div class="container">
        <h1>Chỉnh sửa món ăn</h1>
        <form action="{{ route('menu_items.update', $menuItem->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- Để Laravel biết đây là request UPDATE -->

            <div class="form-group">
                <label for="restaurant_id">Nhà hàng</label>
                <select name="restaurant_id" id="restaurant_id" class="form-control">
                    @foreach ($restaurants as $restaurant)
                        <option value="{{ $restaurant->id }}" {{ $restaurant->id == $menuItem->restaurant_id ? 'selected' : '' }}>
                            {{ $restaurant->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="category_id">Danh mục</label>
                <select name="category_id" id="category_id" class="form-control">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == $menuItem->category_id ? 'selected' : '' }}>
                            {{ $category->title }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="Title_items">Tên món ăn</label>
                <input type="text" name="Title_items" id="Title_items" class="form-control"
                    value="{{ old('Title_items', $menuItem->Title_items) }}" required>
            </div>

            <div class="form-group">
                <label for="Price">Giá</label>
                <input type="number" name="Price" id="Price" class="form-control"
                    value="{{ old('Price', $menuItem->Price) }}" required>
            </div>

            <div class="form-group">
                <label for="Image">Hình ảnh</label>
                <input type="file" name="Image" id="Image" class="form-control">
                <p>Hiện tại: <img src="{{ asset('public/image/foods/' . $menuItem->Image) }}" alt="Image"
                        style="max-width: 200px; max-height: 200px;"></p>
            </div>

            <div class="form-group">
                <label for="Quantity">Số lượng</label>
                <input type="number" name="Quantity" id="Quantity" class="form-control"
                    value="{{ old('Quantity', $menuItem->Quantity) }}" required>
            </div>

            <div class="form-group">
                <label for="Status">Trạng thái</label>
                <select name="Status" id="Status" class="form-control" required>
                    <option value="1" {{ $menuItem->Status == 1 ? 'selected' : '' }}>Còn hàng</option>
                    <option value="0" {{ $menuItem->Status == 0 ? 'selected' : '' }}>Hết hàng</option>
                </select>
            </div>

            <div class="form-group">
                <label for="description">Mô tả</label>
                <textarea name="description" id="description"
                    class="form-control">{{ old('description', $menuItem->description) }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Cập nhật món ăn</button>
        </form>
    </div>
@endsection
