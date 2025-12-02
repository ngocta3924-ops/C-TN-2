

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between mb-2">
    <h4>Danh sách sản phẩm</h4>
    <a href="<?php echo e(route('san_phams.create')); ?>" class="btn btn-primary btn-sm">Thêm sản phẩm</a>
</div>

<table class="table table-bordered table-sm align-middle">
    <thead>
    <tr>
        <th>Mã</th>
        <th>Tên</th>
        <th>Nhà cung cấp</th>
        <th>Tồn</th>
        <th>Giá bán</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $sanPhams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($sp->ma_san_pham); ?></td>
            <td><?php echo e($sp->ten_san_pham); ?></td>
            <td><?php echo e($sp->nhaCungCap->ten_nha_cung_cap ?? ''); ?></td>
            <td><?php echo e($sp->so_luong_ton); ?></td>
            <td><?php echo e(number_format($sp->gia_ban, 0)); ?></td>
            <td class="text-end">
                <a href="<?php echo e(route('san_phams.edit', $sp)); ?>" class="btn btn-warning btn-sm">Sửa</a>
                <form action="<?php echo e(route('san_phams.destroy', $sp)); ?>" method="POST" class="d-inline">
                    <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Xóa sản phẩm?')">Xóa</button>
                </form>
            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>

<?php echo e($sanPhams->links()); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\taphoa\resources\views/san_phams/index.blade.php ENDPATH**/ ?>