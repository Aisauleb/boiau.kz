
<?php if(isset($banner)): ?>
<?php $__env->startSection('custom-css'); ?>
    <style>
        .banner_area .banner_inner .overlay {
            
position: absolute;
            left: 0;
            right: 0;
            top: 0;
            height: 125%;
            bottom: 0;
            z-index: -1;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php endif; ?>

<section class="banner_area" >
    <div class="banner_inner d-flex align-items-center" style="background-color: #030F27">
        <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
        <div class="container">
            <div class="banner_content text-center">
                <h1><?php echo e($h2); ?></h1>
                <div class="page_link">
                    <?php $__currentLoopData = $nav_links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nav_link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href=<?php echo e($nav_link['url']); ?> ><?php echo e($nav_link['text']); ?></a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php /**PATH C:\xampp\htdocs\boiau.kz\resources\views/includes/banner.blade.php ENDPATH**/ ?>