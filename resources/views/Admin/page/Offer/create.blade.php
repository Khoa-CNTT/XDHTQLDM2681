@extends('Admin.share.master')
@section('noi_dung')
    <h1>Thêm khuyến mãi</h1>
    <form action="{{ route('offers.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('Admin.page.Offer.form')
        <button type="submit" class="btn btn-success">Lưu</button>
    </form>
@endsection
