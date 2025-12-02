

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between mb-2">
    <h4>Khách hàng</h4>
    <a href="<?php echo e(route('khach_hangs.create')); ?>" class="btn btn-primary btn-sm">Thêm khách hàng</a>
</div>

<table class="table table-bordered table-sm align-middle">
    <thead>
    <tr>
        <th>Mã</th>
        <th>Tên</th>
        <th>SĐT</th>
        <th>Địa chỉ</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $khachHangs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kh): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($kh->ma_khach_hang); ?></td>
            <td><?php echo e($kh->ten_khach_hang); ?></td>
            <td><?php echo e($kh->so_dien_thoai); ?></td>
            <td><?php echo e($kh->dia_chi); ?></td>
            <td class="text-end">
                <a href="<?php echo e(route('khach_hangs.edit', $kh)); ?>" class="btn btn-warning btn-sm">Sửa</a>
                <form action="<?php echo e(route('khach_hangs.destroy', $kh)); ?>" method="POST" class="d-inline">
                    <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Xóa khách hàng?')">Xóa</button>
                </form>
            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>

<?php echo e($khachHangs->links()); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\taphoa\resources\views/khach_hangs/index.blade.php ENDPATH**/ ?>