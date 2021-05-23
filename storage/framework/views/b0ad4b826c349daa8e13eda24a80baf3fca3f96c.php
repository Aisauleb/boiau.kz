<?php $__env->startSection('content'); ?>
    <!--================Home Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container">
                <div class="banner_content text-center">
                    <h2><?php echo e($product->title); ?></h2>
                    <div class="page_link">
                        <a href="/">Главная</a>
                        <a href="<?php echo e($product->slug); ?>_<?php echo e($product->id); ?>"><?php echo e($product->short_description); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================Portfolio Details Area =================-->
    <section class="portfolio_details_area p_120">
        <div class="container">
            <div class="portfolio_details_inner">
                <div class="row">
                    <div class="col-md-6">
                        <div class="left_img">
                            <img class="img-fluid" src="/<?php echo e($product->image); ?>" alt="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="portfolio_right_text">
                            <h4><?php echo e($product->title); ?></h4>
                            <p><?php echo e($product->short_description); ?>.</p>
                        </div>
                    </div>
                </div>
                <p><?php echo e($product->description); ?></p>
            </div>
        </div>
    </section>
    <!--================End Portfolio Details Area =================-->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\master-D\resources\views/pages/service_detail_page.blade.php ENDPATH**/ ?>
