@extends('Restaurant.share.master')
@section('noi_dung')
    <div class="container py-4">
    <div class="card shadow-lg rounded-4">
        <div class="card-header bg-primary text-white rounded-top-4">
            <h3 class="mb-0">🍽️ Thêm món ăn mới</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('menu_items.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="restaurant_id" class="form-label">🏠 Nhà hàng</label>
                        <select name="restaurant_id" id="restaurant_id" class="form-select">
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

                    <div class="col-md-6">
                        <label for="category_id" class="form-label">📂 Danh mục</label>
                        <select name="category_id" id="category_id" class="form-select">
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
                </div>

                <div class="mb-3">
                    <label for="Title_items" class="form-label">🍜 Tên món ăn</label>
                    <input type="text" name="Title_items" id="Title_items" class="form-control" value="{{ old('Title_items') }}">
                    @error('Title_items')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="Price" class="form-label">💰 Giá mới</label>
                        <input type="number" name="Price" id="Price" class="form-control" value="{{ old('Price') }}">
                        @error('Price')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="OldPrice" class="form-label">🏷️ Giá khuyến mãi</label>
                        <input type="number" name="OldPrice" id="OldPrice" class="form-control" value="{{ old('OldPrice') }}">
                        @error('OldPrice')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="Image" class="form-label">🖼️ Hình ảnh</label>
                    <input type="file" name="Image" id="Image" class="form-control">
                    @error('Image')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="Quantity" class="form-label">📦 Số lượng</label>
                        <input type="number" name="Quantity" id="Quantity" class="form-control" value="{{ old('Quantity') }}">
                        @error('Quantity')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="Status" class="form-label">🔘 Trạng thái</label>
                        <select name="Status" id="Status" class="form-select">
                            <option value="1" {{ old('Status') == '1' ? 'selected' : '' }}>Còn hàng</option>
                            <option value="0" {{ old('Status') == '0' ? 'selected' : '' }}>Hết hàng</option>
                        </select>
                        @error('Status')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">📝 Mô tả</label>
                    <textarea name="description" id="description" class="form-control" rows="3">{{ old('description') }}</textarea>
                    @error('description')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-success px-4">
                        <i class="bi bi-plus-circle"></i> Thêm món ăn
                    </button>
                </div>
            </form>
        </div>
    </div>
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
