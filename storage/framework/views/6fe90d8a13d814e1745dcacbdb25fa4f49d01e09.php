<?php
    if (! isset($categories)){
        $categories = App\Category::all()->random(1);
    }
?>
<section class="projects_area <?php echo e($pad_top); ?> p_60">
    <div class="container">
    <?php if($project_area_title): ?>
        <div class="main_title">
            <h2><?php echo e($project_area_h2); ?></h2>
            <p><?php echo e($project_area_p); ?></p>
        </div>
    <?php endif; ?>
    <div class="row m0">
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="projects_item col-md-4">
                <img src="<?php echo e($category->image); ?>" alt="Boiau CORP <?php echo e($category->name); ?>">
                <a href="<?php echo e($category->url); ?>">
                    <div class="product_category">
                        <h4><?php echo e($category->name); ?></h4>
                        <p><?php echo e($category->mini_description); ?></p>
                    </div>
                </a>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    </div>
</section>
<?php /**PATH C:\xampp\htdocs\master-D\resources\views/includes/categories_area.blade.php ENDPATH**/ ?>