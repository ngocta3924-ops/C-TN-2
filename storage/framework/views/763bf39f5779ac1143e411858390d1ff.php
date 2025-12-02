

<?php $__env->startSection('content'); ?>
<h4>Tạo phiếu nhập hàng</h4>
<form method="POST" action="<?php echo e(route('phieu_nhap_hangs.store')); ?>">
    <?php echo csrf_field(); ?>
    <div class="row mb-3">
        <div class="col-md-4">
            <label class="form-label">Mã phiếu nhập</label>
            <input name="ma_phieu_nhap" class="form-control" required value="PN<?php echo e(time()); ?>">
        </div>
        <div class="col-md-4">
            <label class="form-label">Nhà cung cấp</label>
            <select name="nha_cung_cap_id" class="form-select" required>
                <?php $__currentLoopData = $nhaCungCaps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ncc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($ncc->id); ?>"><?php echo e($ncc->ten_nha_cung_cap); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="col-md-4">
            <label class="form-label">Nhân viên</label>
            <select name="nhan_vien_id" class="form-select" required>
                <?php $__currentLoopData = $nhanViens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($nv->id); ?>"><?php echo e($nv->ten_nhan_vien); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-4">
            <label class="form-label">Kho</label>
            <select name="kho_id" class="form-select">
                <?php $__currentLoopData = $khos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kho): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($kho->id); ?>"><?php echo e($kho->ten_kho); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="col-md-4">
            <label class="form-label">Ngày nhập</label>
            <input type="datetime-local" name="ngay_nhap" class="form-control" required>
        </div>
    </div>

    <h5>Chi tiết sản phẩm</h5>
    <table class="table table-bordered table-sm" id="ct-table">
        <thead>
        <tr>
            <th>Sản phẩm</th>
            <th>Số lượng</th>
            <th>Đơn giá nhập</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>
                <select name="san_pham_id[]" class="form-select">
                    <?php $__currentLoopData = $sanPhams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($sp->id); ?>"><?php echo e($sp->ma_san_pham); ?> - <?php echo e($sp->ten_san_pham); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </td>
            <td><input name="so_luong[]" type="number" class="form-control" value="10"></td>
            <td><input name="don_gia_nhap[]" type="number" class="form-control" value="1000"></td>
            <td><button type="button" class="btn btn-danger btn-sm remove-row">X</button></td>
        </tr>
        </tbody>
    </table>
    <button type="button" class="btn btn-secondary btn-sm mb-3" id="add-row">Thêm dòng</button>
    <br>
    <button class="btn btn-primary">Lưu phiếu nhập</button>
    <a href="<?php echo e(route('phieu_nhap_hangs.index')); ?>" class="btn btn-secondary">Hủy</a>
</form>

<script>
document.getElementById('add-row').addEventListener('click', function () {
    const tbody = document.querySelector('#ct-table tbody');
    const tr = tbody.children[0].cloneNode(true);
    tr.querySelectorAll('input').forEach(i => i.value = '');
    tbody.appendChild(tr);
});
document.addEventListener('click', function (e) {
    if (e.target.classList.contains('remove-row')) {
        const tbody = document.querySelector('#ct-table tbody');
        if (tbody.children.length > 1) {
            e.target.closest('tr').remove();
        }
    }
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\taphoa\resources\views/phieu_nhap_hangs/create.blade.php ENDPATH**/ ?>