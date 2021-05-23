<?php
    # Home Banner
    $h2 = "Строительные материалы в ЮКО \"Boiau CORP\"  ";
    $nav_links=[
        [
            'url'=>'/',
            'text'=>'Главная'
        ]
        ];
    array_push($nav_links,
    [
        'url'=>'/svetilniki',
        'text'=>'Продукции'
    ]);
    # project Area
    if(isset($product)){
        $title = $product->title;
        $description = $product->mini_description;
        $h2 = $product->title;
        $parent_category = $product->category()->first();
        if($parent_category){
            array_push($nav_links,
            [
                'url'=>$parent_category->url,
                'text'=>$parent_category->name
            ]);
        }
        array_push($nav_links,
        [
            'url'=>$product->url,
            'text'=>$product->title
        ]);
        // For Banner
        $banner =$product->image_url;
    }
    $cat_id = 1;
?>
<?php if(isset($canonical)): ?>
<?php $__env->startSection('canonical'); ?><?php echo e($canonical); ?><?php $__env->stopSection(); ?>
<?php endif; ?>

<?php $__env->startSection('custom-css'); ?>
    <style>
    .product_in_category {
    position: absolute;
    left: 0px;
    bottom: 0;
    background: #ffffff7a;
    width: 100%;
    color: black;
    padding: 30px;
    transition: all 400ms ease;
    text-transform: uppercase;
    font-size: 18px;
    }
    .product-image {
         width: 100%;
         min-height: 350px!important;
     }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?><?php echo e($title); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('description'); ?><?php echo e($description); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <section class="top_menu_section"></section>
    <!--================ Product Area =================-->
    <section class="portfolio_details_area ">
        <div class="col" style="padding: 0;">
            <div class="portfolio_details_inner">
                <div class="row" style="margin: 0;">
                    <div id="categories_menu" class="col-md-3 sidebar left ">
                        <ul class="list-sidebar bg-defoult">
                            <li>
                                <h3 style="color:white;text-align: center;padding: 5px;">
                                    Категории продукции
                                </h3>
                            </li>
                            <?php $__currentLoopData = $menuCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <a href="<?php echo e($category->url); ?>" data-toggle="collapse" data-target="#<?php echo e("clps".strval($cat_id)); ?>" class="collapsed active" >

                                        <span class="nav-label">
                                        <?php echo e($category->name); ?>

                                    </span>
                                        <span class="fa fa-chevron-left pull-right"></span>
                                    </a>
                                    <ul class="sub-menu collapse" id="<?php echo e("clps".strval($cat_id)); ?>">
                                        <?php $__currentLoopData = $category->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li class=""><a href="<?php echo e($subcategory->url); ?>"><?php echo e($subcategory->name); ?></a></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </li>
                                <?php
                                    $cat_id = $cat_id + 1;
                                ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                    <div class="col-md-9 p-3 order-first container order-md-last">
                        <div class="row">
                            <div class="col-md-12 banner_content text-left p-4">
                                <div class="page_link">
                                    <?php $__currentLoopData = $nav_links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nav_link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <a class="product-nav-link" href=<?php echo e($nav_link['url']); ?> ><?php echo e($nav_link['text']); ?></a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="left_img">
                                    <img class="img-fluid" src="<?php echo e($product->image_url); ?>" alt="<?php echo e($product->title); ?>">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="portfolio_right_text">
                                    <h1><?php echo e($product->title); ?></h1>
                                    <p><?php echo e($product->mini_description); ?></p>
                                    <ul class="list">
                                        <li><span>Райтинг </span>: <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></li>

                                        <li><span>Степень защиты </span> : <?php echo e($product->protection); ?> </li>
                                        <li><span>Грантия </span> : <?php echo e($product->warranty); ?> месяцев</li>

                                        <li><span>Производитель</span>: <?php echo e($product->manufacturer); ?></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <p><?php echo nl2br(e(str_replace(',', ':', $product->description))); ?></p>
                            </div>
                            <?php
                            $rec_count = 0;
                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Product Area =================-->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\master-D\resources\views/pages/product_detail_page.php ENDPATH**/ ?>
