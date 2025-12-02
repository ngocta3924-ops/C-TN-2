

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between mb-2">
    <h4>Kho</h4>
    <a href="<?php echo e(route('khos.create')); ?>" class="btn btn-primary btn-sm">Thêm kho</a>
</div>

<table class="table table-bordered table-sm">
    <thead>
    <tr>
        <th>Tên kho</th>
        <th>Địa chỉ</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $khos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kho): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($kho->ten_kho); ?></td>
            <td><?php echo e($kho->dia_chi); ?></td>
            <td class="text-end">
                <a href="<?php echo e(route('khos.edit', $kho)); ?>" class="btn btn-warning btn-sm">Sửa</a>
                <form action="<?php echo e(route('khos.destroy', $kho)); ?>" method="POST" class="d-inline">
                    <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Xóa kho?')">Xóa</button>
                </form>
            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>

<?php echo e($khos->links()); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\taphoa\resources\views/khos/index.blade.php ENDPATH**/ ?>