

<?php $__env->startSection('content'); ?>
<div class="row justify-content-center">
    <div class="col-md-4">
        <h4 class="mb-3">Đăng nhập hệ thống</h4>
        <form method="POST" action="<?php echo e(route('dang_nhap.submit')); ?>">
            <?php echo csrf_field(); ?>
            <div class="mb-3">
                <label class="form-label">Tên đăng nhập</label>
                <input type="text" name="ten_dang_nhap" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Mật khẩu</label>
                <input type="password" name="mat_khau" class="form-control" required>
            </div>
            <button class="btn btn-primary w-100">Đăng nhập</button>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\taphoa\resources\views/auth/dang_nhap.blade.php ENDPATH**/ ?>