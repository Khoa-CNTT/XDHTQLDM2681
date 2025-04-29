@extends('Admin.share.master')

@section('noi_dung')
    <div class="container">
        <h1 class="text-center my-4">Danh Sách Shipper Cần Phê Duyệt</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
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
                                @method('POST')
                                <button type="submit" class="btn btn-success">Phê Duyệt</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
