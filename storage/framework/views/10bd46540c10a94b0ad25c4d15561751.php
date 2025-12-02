

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between mb-2">
    <h4>Nhà cung cấp</h4>
    <a href="<?php echo e(route('nha_cung_caps.create')); ?>" class="btn btn-primary btn-sm">Thêm NCC</a>
</div>

<table class="table table-bordered table-sm">
    <thead>
    <tr>
        <th>Mã</th>
        <th>Tên</th>
        <th>SĐT</th>
        <th>Email</th>
        <th>Địa chỉ</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $nhaCungCaps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ncc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($ncc->ma_nha_cung_cap); ?></td>
            <td><?php echo e($ncc->ten_nha_cung_cap); ?></td>
            <td><?php echo e($ncc->so_dien_thoai); ?></td>
            <td><?php echo e($ncc->email); ?></td>
            <td><?php echo e($ncc->dia_chi); ?></td>
            <td class="text-end">
                <a href="<?php echo e(route('nha_cung_caps.edit', $ncc)); ?>" class="btn btn-warning btn-sm">Sửa</a>
                <form action="<?php echo e(route('nha_cung_caps.destroy', $ncc)); ?>" method="POST" class="d-inline">
                    <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Xóa NCC?')">Xóa</button>
                </form>
            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>

<?php echo e($nhaCungCaps->links()); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\taphoa\resources\views/nha_cung_caps/index.blade.php ENDPATH**/ ?>