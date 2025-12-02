@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between mb-2">
    <h4>Danh sách hóa đơn</h4>
    <a href="{{ route('hoa_dons.create') }}" class="btn btn-primary btn-sm">Lập hóa đơn</a>
</div>

<table class="table table-bordered table-sm">
    <thead>
    <tr>
        <th>Mã HĐ</th>
        <th>Khách hàng</th>
        <th>Nhân viên</th>
        <th>Ngày lập</th>
        <th>Thanh toán</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @foreach($hoaDons as $hd)
        <tr>
            <td>{{ $hd->ma_hoa_don }}</td>
            <td>{{ $hd->khachHang->ten_khach_hang ?? '' }}</td>
            <td>{{ $hd->nhanVien->ten_nhan_vien ?? '' }}</td>
            <td>{{ $hd->ngay_lap }}</td>
            <td>{{ number_format($hd->thanh_toan, 0) }}</td>
            <td><a href="{{ route('hoa_dons.show', $hd) }}" class="btn btn-info btn-sm">Xem</a></td>
        </tr>
    @endforeach
    </tbody>
</table>

{{ $hoaDons->links() }}
@endsection
