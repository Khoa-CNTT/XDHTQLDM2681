@extends('Admin.share.master')

@section('noi_dung')
    <div class="container py-4 d-flex justify-content-center">
        <div class="col-lg-6 col-md-8 col-sm-12">
            <div class="card shadow rounded-4">
                <div class="card-header bg-success text-white rounded-top-4">
                    <h4 class="mb-0">Tạo quyền mới</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('roles.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Tên quyền</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Nhập tên quyền..."
                                required>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-success">Tạo quyền</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
