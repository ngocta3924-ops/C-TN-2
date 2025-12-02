@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-4">
        <h4 class="mb-3">Đăng nhập hệ thống</h4>
        <form method="POST" action="{{ route('dang_nhap.submit') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label">Tên đăng nhập</label>
                <input type="text" name="ten_dang_nhap" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Mật khẩu</label>
                <input type="password" name="mat_khau" class="form-control" required>
            </div>
            <button class="btn btn-primary w-100">Đăng nhập</button>
        </form>
    </div>
</div>
@endsection
