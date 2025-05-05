@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="form-group">
    <label>Tiêu đề</label>
    <input type="text" name="title" class="form-control" value="{{ old('title', $offer->title ?? '') }}">
    @error('title')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <label>Loại giảm</label>
    <select name="discount_type" class="form-control">
        <option value="percent" {{ old('discount_type', $offer->discount_type ?? '') == 'percent' ? 'selected' : '' }}>
            Phần trăm</option>
        <option value="fixed" {{ old('discount_type', $offer->discount_type ?? '') == 'fixed' ? 'selected' : '' }}>Số tiền
            cố định</option>
    </select>
    @error('discount_type')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <label>Giá trị giảm</label>
    <input type="number" step="0.01" name="discount_value" class="form-control"
        value="{{ old('discount_value', $offer->discount_value ?? '') }}">
    @error('discount_value')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <label>Thời gian bắt đầu</label>
    <input type="date" name="start_date" class="form-control"
        value="{{ old('start_date', isset($offer->start_date) ? \Carbon\Carbon::parse($offer->start_date)->format('Y-m-d') : '') }}">
    @error('start_date')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <label>Thời gian kết thúc</label>
    <input type="date" name="end_date" class="form-control"
        value="{{ old('end_date', isset($offer->end_date) ? \Carbon\Carbon::parse($offer->end_date)->format('Y-m-d') : '') }}">
    @error('end_date')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <label>Trạng thái</label>
    <select name="status" class="form-control">
        <option value="1" {{ old('status', $offer->status ?? 1) == 1 ? 'selected' : '' }}>Hiện</option>
        <option value="0" {{ old('status', $offer->status ?? 0) == 0 ? 'selected' : '' }}>Ẩn</option>
    </select>
    @error('status')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <label>Ảnh</label>
    <input type="file" name="image" class="form-control">
    @error('image')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <label>Mô tả</label>
    <textarea name="description" class="form-control">{{ old('description', $offer->description ?? '') }}</textarea>
    @error('description')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <label>Áp dụng toàn hệ thống?</label>
    <select name="is_global" class="form-control">
        <option value="1" {{ old('is_global', $offer->is_global ?? 0) == 1 ? 'selected' : '' }}>Có</option>
        <option value="0" {{ old('is_global', $offer->is_global ?? 0) == 0 ? 'selected' : '' }}>Không</option>
    </select>
    @error('is_global')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group" id="restaurant-select"
    style="display: {{ old('is_global', $offer->is_global ?? 0) ? 'none' : 'block' }};">
    <label>Chọn nhà hàng áp dụng</label>
    <div class="form-check">
        @foreach ($restaurants as $restaurant)
            <div class="form-check">
                <input type="checkbox" name="restaurant_ids[]" value="{{ $restaurant->id }}" class="form-check-input"
                    id="restaurant_{{ $restaurant->id }}" {{ in_array($restaurant->id, old('restaurant_ids', $selectedRestaurants ?? [])) ? 'checked' : '' }}>
                <label class="form-check-label" for="restaurant_{{ $restaurant->id }}">
                    {{ $restaurant->name }}
                </label>
            </div>
        @endforeach
    </div>
    @error('restaurant_ids')
        <small class="text-danger d-block">{{ $message }}</small>
    @enderror
    @error('restaurant_ids.*')
        <small class="text-danger d-block">{{ $message }}</small>
    @enderror
</div>

<script>
    document.querySelector('[name="is_global"]').addEventListener('change', function () {
        document.getElementById('restaurant-select').style.display = this.value == 1 ? 'none' : 'block';
    });
</script>
