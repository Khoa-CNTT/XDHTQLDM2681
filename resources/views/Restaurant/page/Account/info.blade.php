<!-- resources/views/restaurant/profile/edit.blade.php -->
@extends('Restaurant.share.master')

@section('noi_dung')
    <div class="container my-5">
        <div class="card shadow rounded-4">
            <div class="card-header d-flex justify-content-end gap-2 bg-light">
                <button type="button" class="btn {{ $restaurant->status == 0 ? 'btn-success' : 'btn-danger' }}"
                    id="toggleStatusBtn" data-id="{{ $restaurant->id }}" onclick="toggleStatus(this)">
                    {{ $restaurant->status == 0 ? 'Đang mở cửa' : 'Đang đóng cửa' }}
                </button>
                <a href="{{ route('restaurant.edit') }}"
                    class="btn {{ $restaurant->status == 0 ? 'btn-success' : 'btn-danger' }}">
                    Thay đổi thông tin nhà hàng
                </a>
            </div>

            <div class="card-body">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>Tên nhà hàng</th>
                            <td>{{ $restaurant->name }}</td>
                        </tr>
                        <tr>
                            <th>Số điện thoại</th>
                            <td>{{ $restaurant->PhoneNumber }}</td>
                        </tr>
                        <tr>
                            <th>Giờ mở cửa</th>
                            <td>{{ $restaurant->start_time }}</td>
                        </tr>
                        <tr>
                            <th>Giờ đóng cửa</th>
                            <td>{{ $restaurant->end_time }}</td>
                        </tr>
                        <tr>
                            <th>Loại hình kinh doanh</th>
                            <td>{{ $restaurant->business_type }}</td>
                        </tr>
                        <tr>
                            <th>Logo</th>
                            <td>
                                @if($restaurant->logo)
                                    <img src="{{ asset('image/logo/' . $restaurant->logo) }}" alt="Logo" width="150">
                                @else
                                    <p>Chưa có logo</p>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Giấy phép kinh doanh</th>
                            <td>
                                @if($restaurant->business_license)
                                    <img src="{{ asset('image/restaurant/' . $restaurant->business_license) }}" alt="Giấy phép"
                                        width="150">
                                @else
                                    <p>Chưa có giấy phép</p>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Vị trí</th>
                            <td>
                                @if($location)
                                    {{ $location->Address }}, {{ $location->Ward }}, {{ $location->District }},
                                    {{ $location->City }}
                                @else
                                    Chưa có thông tin vị trí
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Mô tả</th>
                            <td>{{ $restaurant->description }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
