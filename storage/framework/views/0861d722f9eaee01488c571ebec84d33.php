

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between mb-2">
    <h4>Nhân viên</h4>
    <a href="<?php echo e(route('nhan_viens.create')); ?>" class="btn btn-primary btn-sm">Thêm nhân viên</a>
</div>

<table class="table table-bordered table-sm">
    <thead>
    <tr>
        <th>Mã</th>
        <th>Tên</th>
        <th>Chức vụ</th>
        <th>Tài khoản</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $nhanViens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($nv->ma_nhan_vien); ?></td>
            <td><?php echo e($nv->ten_nhan_vien); ?></td>
            <td><?php echo e($nv->chuc_vu); ?></td>
            <td><?php echo e($nv->taiKhoan->ten_dang_nhap ?? ''); ?> (<?php echo e($nv->taiKhoan->vai_tro ?? ''); ?>)</td>
            <td class="text-end">
                <a href="<?php echo e(route('nhan_viens.edit', $nv)); ?>" class="btn btn-warning btn-sm">Sửa</a>
                <form action="<?php echo e(route('nhan_viens.destroy', $nv)); ?>" method="POST" class="d-inline">
                    <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Xóa nhân viên?')">Xóa</button>
                </form>
            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>

<?php echo e($nhanViens->links()); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\taphoa\resources\views/nhan_viens/index.blade.php ENDPATH**/ ?>