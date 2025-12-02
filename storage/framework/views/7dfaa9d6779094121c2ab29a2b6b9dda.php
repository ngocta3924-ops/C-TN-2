

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between mb-2">
    <h4>Chương trình khuyến mãi</h4>
    <a href="<?php echo e(route('khuyen_mais.create')); ?>" class="btn btn-primary btn-sm">Thêm khuyến mãi</a>
</div>

<table class="table table-bordered table-sm">
    <thead>
    <tr>
        <th>Mã</th>
        <th>Tên</th>
        <th>Mức (%)</th>
        <th>Hiệu lực</th>
        <th>Đang áp dụng</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $khuyenMais; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $km): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($km->ma_khuyen_mai); ?></td>
            <td><?php echo e($km->ten_khuyen_mai); ?></td>
            <td><?php echo e($km->muc_khuyen_mai); ?></td>
            <td><?php echo e($km->ngay_bat_dau); ?> - <?php echo e($km->ngay_ket_thuc); ?></td>
            <td><?php echo e($km->dang_ap_dung ? 'Có' : 'Không'); ?></td>
            <td class="text-end">
                <a href="<?php echo e(route('khuyen_mais.edit', $km)); ?>" class="btn btn-warning btn-sm">Sửa</a>
                <form action="<?php echo e(route('khuyen_mais.destroy', $km)); ?>" method="POST" class="d-inline">
                    <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Xóa?')">Xóa</button>
                </form>
            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>

<?php echo e($khuyenMais->links()); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\taphoa\resources\views/khuyen_mais/index.blade.php ENDPATH**/ ?>