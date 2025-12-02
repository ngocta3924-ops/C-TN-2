

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between mb-2">
    <h4>Danh sách hóa đơn</h4>
    <a href="<?php echo e(route('hoa_dons.create')); ?>" class="btn btn-primary btn-sm">Lập hóa đơn</a>
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
    <?php $__currentLoopData = $hoaDons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($hd->ma_hoa_don); ?></td>
            <td><?php echo e($hd->khachHang->ten_khach_hang ?? ''); ?></td>
            <td><?php echo e($hd->nhanVien->ten_nhan_vien ?? ''); ?></td>
            <td><?php echo e($hd->ngay_lap); ?></td>
            <td><?php echo e(number_format($hd->thanh_toan, 0)); ?></td>
            <td><a href="<?php echo e(route('hoa_dons.show', $hd)); ?>" class="btn btn-info btn-sm">Xem</a></td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>

<?php echo e($hoaDons->links()); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\taphoa\resources\views/hoa_dons/index.blade.php ENDPATH**/ ?>