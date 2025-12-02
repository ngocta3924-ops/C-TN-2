@extends('layouts.app')

@section('content')
<h4>Chi tiết hóa đơn {{ $hoaDon->ma_hoa_don }}</h4>

<p><strong>Khách hàng:</strong> {{ $hoaDon->khachHang->ten_khach_hang ?? 'Khách lẻ' }}</p>
<p><strong>Nhân viên:</strong> {{ $hoaDon->nhanVien->ten_nhan_vien ?? '' }}</p>
<p><strong>Ngày lập:</strong> {{ $hoaDon->ngay_lap }}</p>

<table class="table table-bordered table-sm">
    <thead>
    <tr>
        <th>Sản phẩm</th>
        <th>Số lượng</th>
        <th>Đơn giá</th>
        <th>Thành tiền</th>
    </tr>
    </thead>
    <tbody>
    @foreach($hoaDon->chiTietHoaDons as $ct)
        <tr>
            <td>{{ $ct->sanPham->ten_san_pham ?? '' }}</td>
            <td>{{ $ct->so_luong }}</td>
            <td>{{ number_format($ct->don_gia_ban, 0) }}</td>
            <td>{{ number_format($ct->thanh_tien, 0) }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

<p><strong>Tổng tiền:</strong> {{ number_format($hoaDon->tong_tien, 0) }} VNĐ</p>
<p><strong>Giảm giá:</strong> {{ number_format($hoaDon->giam_gia, 0) }} VNĐ</p>
<p><strong>Thanh toán:</strong> {{ number_format($hoaDon->thanh_toan, 0) }} VNĐ</p>

<a href="{{ route('hoa_dons.index') }}" class="btn btn-secondary btn-sm">Quay lại</a>
@endsection
