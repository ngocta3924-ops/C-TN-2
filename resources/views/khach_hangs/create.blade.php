@extends('layouts.app')

@section('content')
<h4>Thêm khách hàng</h4>
<form method="POST" action="{{ route('khach_hangs.store') }}">
    @csrf
    <div class="row mb-3">
        <div class="col-md-4">
            <label class="form-label">Mã khách hàng</label>
            <input name="ma_khach_hang" class="form-control" required value="KH{{ time() }}">
        </div>
        <div class="col-md-8">
            <label class="form-label">Tên khách hàng</label>
            <input name="ten_khach_hang" class="form-control" required>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-4">
            <label class="form-label">SĐT</label>
            <input name="so_dien_thoai" class="form-control">
        </div>
        <div class="col-md-4">
            <label class="form-label">Email</label>
            <input name="email" type="email" class="form-control">
        </div>
        <div class="col-md-4">
            <label class="form-label">Địa chỉ</label>
            <input name="dia_chi" class="form-control">
        </div>
    </div>
    <button class="btn btn-primary">Lưu</button>
    <a href="{{ route('khach_hangs.index') }}" class="btn btn-secondary">Hủy</a>
</form>
@endsection
