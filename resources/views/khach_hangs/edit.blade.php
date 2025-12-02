@extends('layouts.app')

@section('content')
<h4>Sửa khách hàng</h4>
<form method="POST" action="{{ route('khach_hangs.update', $khachHang) }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Mã khách hàng</label>
        <input class="form-control" value="{{ $khachHang->ma_khach_hang }}" disabled>
    </div>
    <div class="mb-3">
        <label class="form-label">Tên khách hàng</label>
        <input name="ten_khach_hang" class="form-control"
               value="{{ old('ten_khach_hang', $khachHang->ten_khach_hang) }}" required>
    </div>
    <div class="mb-3">
        <label class="form-label">SĐT</label>
        <input name="so_dien_thoai" class="form-control"
               value="{{ old('so_dien_thoai', $khachHang->so_dien_thoai) }}">
    </div>
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input name="email" type="email" class="form-control"
               value="{{ old('email', $khachHang->email) }}">
    </div>
    <div class="mb-3">
        <label class="form-label">Địa chỉ</label>
        <input name="dia_chi" class="form-control"
               value="{{ old('dia_chi', $khachHang->dia_chi) }}">
    </div>

    <button class="btn btn-primary">Cập nhật</button>
    <a href="{{ route('khach_hangs.index') }}" class="btn btn-secondary">Quay lại</a>
</form>
@endsection
