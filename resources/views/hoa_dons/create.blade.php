@extends('layouts.app')

@section('content')
<h4>Lập hóa đơn bán hàng</h4>
<form method="POST" action="{{ route('hoa_dons.store') }}">
    @csrf
    <div class="row mb-3">
        <div class="col-md-3">
            <label class="form-label">Mã hóa đơn</label>
            <input name="ma_hoa_don" class="form-control" required value="HD{{ time() }}">
        </div>
        <div class="col-md-3">
            <label class="form-label">Khách hàng</label>
            <select name="khach_hang_id" class="form-select">
                <option value="">Khách lẻ</option>
                @foreach($khachHangs as $kh)
                    <option value="{{ $kh->id }}">{{ $kh->ma_khach_hang }} - {{ $kh->ten_khach_hang }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3">
            <label class="form-label">Nhân viên</label>
            <select name="nhan_vien_id" class="form-select" required>
                @foreach($nhanViens as $nv)
                    <option value="{{ $nv->id }}">{{ $nv->ten_nhan_vien }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3">
            <label class="form-label">Ngày lập</label>
            <input type="datetime-local" name="ngay_lap" class="form-control" required>
        </div>
    </div>

    <h5>Chi tiết hóa đơn</h5>
    <table class="table table-bordered table-sm" id="ct-hd">
        <thead>
        <tr>
            <th>Sản phẩm</th>
            <th>Số lượng</th>
            <th>Đơn giá bán</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>
                <select name="san_pham_id[]" class="form-select sp-select">
                    @foreach($sanPhams as $sp)
                        <option value="{{ $sp->id }}"
                                data-gia="{{ $sp->gia_ban }}">
                            {{ $sp->ma_san_pham }} - {{ $sp->ten_san_pham }} (Tồn: {{ $sp->so_luong_ton }})
                        </option>
                    @endforeach
                </select>
            </td>
            <td><input name="so_luong[]" type="number" class="form-control" value="1"></td>
            <td><input name="don_gia_ban[]" type="number" class="form-control gia-ban-input" value=""></td>
            <td><button type="button" class="btn btn-danger btn-sm remove-row">X</button></td>
        </tr>
        </tbody>
    </table>
    <button type="button" class="btn btn-secondary btn-sm mb-3" id="add-row-hd">Thêm dòng</button>

    <div class="mb-3">
        <label class="form-label">Giảm giá (VNĐ)</label>
        <input type="number" name="giam_gia" class="form-control" value="0">
    </div>

    <button class="btn btn-primary">Lưu hóa đơn</button>
    <a href="{{ route('hoa_dons.index') }}" class="btn btn-secondary">Hủy</a>
</form>

<script>
function updateGiaBan(row) {
    const select = row.querySelector('.sp-select');
    const gia = select.options[select.selectedIndex].dataset.gia || 0;
    row.querySelector('.gia-ban-input').value = gia;
}

document.querySelectorAll('#ct-hd tbody tr').forEach(updateGiaBan);

document.getElementById('add-row-hd').addEventListener('click', function () {
    const tbody = document.querySelector('#ct-hd tbody');
    const tr = tbody.children[0].cloneNode(true);
    tr.querySelectorAll('input').forEach(i => i.value = '');
    tbody.appendChild(tr);
    updateGiaBan(tr);
});

document.addEventListener('change', function (e) {
    if (e.target.classList.contains('sp-select')) {
        updateGiaBan(e.target.closest('tr'));
    }
});

document.addEventListener('click', function (e) {
    if (e.target.classList.contains('remove-row')) {
        const tbody = document.querySelector('#ct-hd tbody');
        if (tbody.children.length > 1) {
            e.target.closest('tr').remove();
        }
    }
});
</script>
@endsection
