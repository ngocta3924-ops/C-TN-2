<!doctype html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <title>Quản lý cửa hàng tạp hóa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?php echo e(route('dashboard')); ?>">Tạp hóa</a>

        <?php if(session('tai_khoan_id')): ?>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">

                    
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(request()->routeIs('san_phams.*') ? 'active' : ''); ?>"
                           href="<?php echo e(route('san_phams.index')); ?>">
                            Sản phẩm
                        </a>
                    </li>

                    
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(request()->routeIs('khach_hangs.*') ? 'active' : ''); ?>"
                           href="<?php echo e(route('khach_hangs.index')); ?>">
                            Khách hàng
                        </a>
                    </li>

                    
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(request()->routeIs('nha_cung_caps.*') ? 'active' : ''); ?>"
                           href="<?php echo e(route('nha_cung_caps.index')); ?>">
                            Nhà cung cấp
                        </a>
                    </li>

                    
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(request()->routeIs('nhan_viens.*') ? 'active' : ''); ?>"
                           href="<?php echo e(route('nhan_viens.index')); ?>">
                            Nhân viên
                        </a>
                    </li>

                    
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(request()->routeIs('khos.*') ? 'active' : ''); ?>"
                           href="<?php echo e(route('khos.index')); ?>">
                            Kho
                        </a>
                    </li>

                    
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(request()->routeIs('phieu_nhap_hangs.*') ? 'active' : ''); ?>"
                           href="<?php echo e(route('phieu_nhap_hangs.index')); ?>">
                            Phiếu nhập
                        </a>
                    </li>

                    
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(request()->routeIs('hoa_dons.*') ? 'active' : ''); ?>"
                           href="<?php echo e(route('hoa_dons.index')); ?>">
                            Hóa đơn
                        </a>
                    </li>

                    
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(request()->routeIs('khuyen_mais.*') ? 'active' : ''); ?>"
                           href="<?php echo e(route('khuyen_mais.index')); ?>">
                            Khuyến mãi
                        </a>
                    </li>

                </ul>

                <div class="d-flex">
                    <form method="POST" action="<?php echo e(route('dang_xuat')); ?>">
                        <?php echo csrf_field(); ?>
                        <button class="btn btn-outline-light btn-sm">Đăng xuất</button>
                    </form>
                </div>
            </div>
        <?php else: ?>
            <div class="d-flex">
                <a href="<?php echo e(route('dang_nhap.form')); ?>" class="btn btn-outline-light btn-sm">
                    Đăng nhập
                </a>
            </div>
        <?php endif; ?>
    </div>
</nav>

<div class="container">
    <?php if($errors->any()): ?>
        <div class="alert alert-danger py-2">
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div><?php echo e($e); ?></div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php endif; ?>

    <?php if(session('status')): ?>
        <div class="alert alert-success py-2">
            <?php echo e(session('status')); ?>

        </div>
    <?php endif; ?>

    <?php echo $__env->yieldContent('content'); ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php /**PATH C:\laragon\www\taphoa\resources\views/layouts/app.blade.php ENDPATH**/ ?>