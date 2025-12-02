

<?php $__env->startSection('content'); ?>
<h4>Thêm sản phẩm</h4>
<form method="POST" action="<?php echo e(route('san_phams.store')); ?>">
    <?php echo csrf_field(); ?>
    <div class="row mb-3">
        <div class="col-md-4">
            <label class="form-label">Mã sản phẩm</label>
            <input name="ma_san_pham" class="form-control" required>
        </div>
        <div class="col-md-8">
            <label class="form-label">Tên sản phẩm</label>
            <input name="ten_san_pham" class="form-control" required>
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label">Nhà cung cấp</label>
        <select name="nha_cung_cap_id" class="form-select">
            <option value="">-- Chọn --</option>
            <?php $__currentLoopData = $nhaCungCaps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ncc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($ncc->id); ?>"><?php echo e($ncc->ten_nha_cung_cap); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
    <div class="row mb-3">
        <div class="col-md-3">
           <label class="form-label">Đơn vị tính</label>
           <input name="don_vi_tinh" class="form-control" value="cái">
        </div>
        <div class="col-md-3">
           <label class="form-label">Tồn kho</label>
           <input name="so_luong_ton" type="number" class="form-control" value="0">
        </div>
        <div class="col-md-3">
           <label class="form-label">Giá nhập</label>
           <input name="gia_nhap" type="number" class="form-control" value="0">
        </div>
        <div class="col-md-3">
           <label class="form-label">Giá bán</label>
           <input name="gia_ban" type="number" class="form-control" value="0">
        </div>
    </div>
    <button class="btn btn-primary">Lưu</button>
    <a href="<?php echo e(route('san_phams.index')); ?>" class="btn btn-secondary">Hủy</a>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\taphoa\resources\views/san_phams/create.blade.php ENDPATH**/ ?>