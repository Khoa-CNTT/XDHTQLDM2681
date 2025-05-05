@extends('Admin.share.master')
@section('noi_dung')
    <h1>Sửa khuyến mãi</h1>
    <form action="{{ route('offers.update', $offer) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        @include('Admin.page.Offer.form')
        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
@endsection


