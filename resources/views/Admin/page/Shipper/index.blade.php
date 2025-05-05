@extends('Admin.share.master')

@section('noi_dung')
    <div class="container my-4">
        <h1 class="text-center mb-4">Danh Sách Shipper Cần Phê Duyệt</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card shadow-sm">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="myTable" class="table table-bordered table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>Họ Tên</th>
                                <th>Email</th>
                                <th>Số điện thoại</th>
                                <th>CMND</th>
                                <th>Biển số</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($drivers as $driver)
                                <tr>
                                    <td>{{ $driver->fullname }}</td>
                                    <td>{{ $driver->email }}</td>
                                    <td>{{ $driver->phonenumber }}</td>
                                    <td>{{ $driver->id_card }}</td>
                                    <td>{{ $driver->license_plate }}</td>
                                    <td>
                                        <form action="{{ route('admin.approve_shipper', $driver->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-success btn-sm">Phê Duyệt</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            @if($drivers->isEmpty())
                                <tr>
                                    <td colspan="6" class="text-center">Không có shipper nào cần phê duyệt.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
