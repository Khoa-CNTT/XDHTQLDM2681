@extends('Restaurant.share.master')

@section('noi_dung')
    <div class="container">
        <h1>Chỉnh sửa món ăn</h1>
        <form action="{{ route('menu_items.update', $menuItem->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- Nhà hàng --}}
            <div class="form-group">
                <label for="restaurant_id">Nhà hàng</label>
                <select name="restaurant_id" id="restaurant_id"
                    class="form-control @error('restaurant_id') is-invalid @enderror">
                    @foreach ($restaurants as $restaurant)
                        <option value="{{ $restaurant->id }}" {{ old('restaurant_id', $menuItem->restaurant_id) == $restaurant->id ? 'selected' : '' }}>
                            {{ $restaurant->name }}
                        </option>
                    @endforeach
                </select>
                @error('restaurant_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Danh mục --}}
            <div class="form-group">
                <label for="category_id">Danh mục</label>
                <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id', $menuItem->category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->title }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Tên món ăn --}}
            <div class="form-group">
                <label for="Title_items">Tên món ăn</label>
                <input type="text" name="Title_items" id="Title_items"
                    class="form-control @error('Title_items') is-invalid @enderror"
                    value="{{ old('Title_items', $menuItem->Title_items) }}" required>
                @error('Title_items')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Giá --}}
            <div class="form-group">
                <label for="Price">Giá mới</label>
                <input type="number" name="Price" id="Price" class="form-control @error('Price') is-invalid @enderror"
                    value="{{ old('Price', $menuItem->Price) }}" required>
                @error('Price')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="OldPrice" class="form-label">🏷️ Giá khuyến mãi</label>
                <input type="number" name="OldPrice" id="OldPrice" class="form-control" value="{{ old('OldPrice', $menuItem->OldPrice) }}">
                @error('OldPrice')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            {{-- Hình ảnh --}}
            <div class="form-group">
                <label for="Image">Hình ảnh</label>
                <input type="file" name="Image" id="Image" class="form-control-file @error('Image') is-invalid @enderror">
                @if ($menuItem->Image)
                    <p>Hiện tại:
                        <img src="{{ asset('public/public/image/foods/' . $menuItem->Image) }}" alt="Image"
                            style="max-width: 200px; max-height: 200px;">
                    </p>
                @endif
                @error('Image')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            {{-- Số lượng --}}
            <div class="form-group">
                <label for="Quantity">Số lượng</label>
                <input type="number" name="Quantity" id="Quantity"
                    class="form-control @error('Quantity') is-invalid @enderror"
                    value="{{ old('Quantity', $menuItem->Quantity) }}" required>
                @error('Quantity')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Trạng thái --}}
            <div class="form-group">
                <label for="Status">Trạng thái</label>
                <select name="Status" id="Status" class="form-control @error('Status') is-invalid @enderror" required>
                    <option value="1" {{ old('Status', $menuItem->Status) == 1 ? 'selected' : '' }}>Còn hàng</option>
                    <option value="0" {{ old('Status', $menuItem->Status) == 0 ? 'selected' : '' }}>Hết hàng</option>
                </select>
                @error('Status')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Mô tả --}}
            <div class="form-group">
                <label for="description">Mô tả</label>
                <textarea name="description" id="description"
                    class="form-control @error('description') is-invalid @enderror">{{ old('description', $menuItem->description) }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Nút submit --}}
            <button type="submit" class="btn btn-primary">Cập nhật món ăn</button>
        </form>
    </div>

@endsection
@section('js')
    <script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('description', {
            height: 300, // Chiều cao của trình soạn thảo
            removePlugins: 'elementspath', // Xóa thanh đường dẫn thẻ HTML
            resize_enabled: false, // Không cho phép thay đổi kích thước
            toolbar: [
                { name: 'document', items: ['Source', '-', 'NewPage', 'Preview', 'Print'] },
                { name: 'clipboard', items: ['Cut', 'Copy', 'Paste', 'Undo', 'Redo'] },
                { name: 'editing', items: ['Find', 'Replace', '-', 'SelectAll'] },
                { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline', 'Strike', '-', 'RemoveFormat'] },
                { name: 'paragraph', items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent'] },
                { name: 'insert', items: ['Image', 'Table', 'HorizontalRule'] },
                { name: 'styles', items: ['Format', 'Font', 'FontSize'] },
                { name: 'colors', items: ['TextColor', 'BGColor'] },
                { name: 'tools', items: ['Maximize'] }
            ]
        });
    </script>
@endsection
