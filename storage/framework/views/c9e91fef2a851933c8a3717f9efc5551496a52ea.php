<?php
    use Illuminate\Support\Facades\DB;
    if (! isset($products)){
        $products = App\Product::all()->random(21);
    }
?>
<section class="projects_area <?php echo e($pad_top); ?>">
    <div class="container">
        <?php if($project_area_title): ?>
            <div class="main_title">
                <h2><?php echo e($project_area_h2); ?></h2>
                <p><?php echo e($project_area_p); ?></p>
            </div>
        <?php endif; ?>
        <div class="row">
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <div class="projects_item col-md-3">
                    <img class="product-image" src="<?php echo e($product->image_url); ?>" alt="Boiau CORP Продукции <?php echo e($product->title); ?>">
                    <a href="<?php echo e($product->url); ?>">
                        <div class="product_in_category">
                            <h4><?php echo e($product->title); ?></h4>
                        </div>
                        <div class="hover">
                            <h6><?php echo e($product->title); ?></h6>
                            <p>
                                <?php
                                    $text = $product->mini_description;
                                    if(strlen($text)>120){
                                        $text =  substr($text, 0, 120)."...";
                                    }
                                    echo $text;
                                ?>
                            </p>
                        </div>
                    </a>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php /**PATH C:\xampp\htdocs\master-D\resources\views/includes/projects_area.blade.php ENDPATH**/ ?>