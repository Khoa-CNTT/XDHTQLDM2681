@extends('Admin.share.master')

@section('noi_dung')
    <div class="container py-4 d-flex justify-content-center">
        <div class="col-lg-10 col-md-12">
            <div class="card shadow rounded-4">
                <div
                    class="card-header bg-primary text-white d-flex justify-content-between align-items-center rounded-top-4">
                    <h4 class="mb-0">Danh sách shipper cần phê duyệt</h4>
                </div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table id="myTable" class="table table-bordered table-hover align-middle text-center">
                            <thead class="table-secondary">
                                <tr>
                                    <th>Họ tên</th>
                                    <th>Email</th>
                                    <th>Số điện thoại</th>
                                    <th>CMND</th>
                                    <th>Biển số</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($drivers as $driver)
                                    <tr>
                                        <td>{{ $driver->fullname }}</td>
                                        <td>{{ $driver->email }}</td>
                                        <td>{{ $driver->phonenumber }}</td>
                                        <td>{{ $driver->id_card }}</td>
                                        <td>{{ $driver->license_plate }}</td>
                                    <td>
                                        @if($driver->is_active)
                                            <span class="text-success fw-bold">Đã phê duyệt</span>
                                        @else
                                            <form action="{{ route('admin.approve_shipper', $driver->id) }}" method="POST" class="d-inline approve-form">
                                                @csrf
                                                <button type="submit" class="btn btn-success btn-sm">Phê duyệt</button>
                                            </form>
                                        @endif
                                    </td>


                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-muted">Không có shipper nào cần phê duyệt.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.querySelectorAll('.approve-form').forEach(form => {
            form.addEventListener('submit', function (e) {
                e.preventDefault(); // Ngăn gửi form ngay

                Swal.fire({
                    title: 'Đang xử lý...',
                    text: 'Vui lòng đợi trong giây lát',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });

                // Gửi form sau khi hiển thị loading
                setTimeout(() => {
                    e.target.submit();
                }, 500); // delay nhẹ nếu cần, để đảm bảo loading hiển thị
            });
        });
    </script>

@endsection
