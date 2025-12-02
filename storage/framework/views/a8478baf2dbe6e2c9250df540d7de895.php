

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between mb-2">
    <h4>Phiếu nhập hàng</h4>
    <a href="<?php echo e(route('phieu_nhap_hangs.create')); ?>" class="btn btn-primary btn-sm">Tạo phiếu nhập</a>
</div>

<table class="table table-bordered table-sm">
    <thead>
    <tr>
        <th>Mã phiếu</th>
        <th>Nhà cung cấp</th>
        <th>Nhân viên</th>
        <th>Ngày nhập</th>
        <th>Tổng tiền</th>
    </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $phieuNhaps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($pn->ma_phieu_nhap); ?></td>
            <td><?php echo e($pn->nhaCungCap->ten_nha_cung_cap ?? ''); ?></td>
            <td><?php echo e($pn->nhanVien->ten_nhan_vien ?? ''); ?></td>
            <td><?php echo e($pn->ngay_nhap); ?></td>
            <td><?php echo e(number_format($pn->tong_tien, 0)); ?></td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>

<?php echo e($phieuNhaps->links()); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\taphoa\resources\views/phieu_nhap_hangs/index.blade.php ENDPATH**/ ?>