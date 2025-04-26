@extends('Shipper.share.master')
@section('content')

            <div class="bg-light text-center py-4">
                <!-- Logo -->
                <div class="mb-3">
                    <h2 class="fw-bold">📦 CallFood Shipper</h2>
                </div>

                @if($shipper->is_active)
                    <!-- Đang hoạt động -->
                    <div class="bg-white shadow-sm rounded p-4 mx-auto w-75" style="max-width: 400px;">
                        <p class="text-success fw-bold fs-5">🚗 Bạn đang hoạt động và sẵn sàng nhận đơn!</p>
                        <form id="deactivate-form">
                            <button type="submit" class="btn btn-danger mt-2">⏸️ Tạm nghỉ</button>
                        </form>
                    </div>
                @else
                    <!-- Tạm nghỉ -->
                    <p class="text-danger fw-bold fs-5">⏸️ Tạm nghỉ</p>
                    <div class="bg-white shadow-sm rounded p-4 mx-auto w-75" style="max-width: 400px;">
                        <p class="text-primary fw-bold fs-5">🔄 Bật trạng thái để nhận đơn hàng mới</p>
                        <form id="activate-form">
                            <button type="submit" class="btn btn-success mt-2">✅ Bắt đầu hoạt động</button>
                        </form>
                    </div>
                @endif
            </div>







@endsection
