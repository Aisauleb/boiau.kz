<?php
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
        $banner =$product->image_url;
    }
    $cat_id = 1;
?>
<?php if(isset($canonical)): ?>
<?php $__env->startSection('canonical'); ?><?php echo e($canonical); ?><?php $__env->stopSection(); ?>
<?php endif; ?>

<?php $__env->startSection('custom-css'); ?>
    <style>
        body{
            background-color: white;
            color: black;
        }
        .product_in_category {
            position: absolute;
            left: 0px;
            bottom: 0;
            background-color: white;
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
<?php $__env->startSection('custom-js'); ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="/js/product.js"></script>
    <script>
        $(document).ready(function () {
            $('.cart_button').click(function (event) {
                event.preventDefault()
                addToCart()
            })
        })
        function addToCart() {
            let id = $('.details_name').data('id')
            let qty = parseInt($('#quantity_input').val())
            let total_qty = parseInt($('.cart-qty').text())
            total_qty += qty
            $('.cart-qty').text(total_qty)
            $.ajax({
                url: "<?php echo e(route('addToCart')); ?>",
                type: "POST",
                data: {
                    id: id,
                    qty: qty,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: (data) => {
                    console.log(data)
                },
                error: (data) => {
                    console.log(data)
                }
            });
        }
    </script>
<?php $__env->stopSection(); ?>

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
                                    <a href="<?php echo e($category->url); ?>" class="collapsed active" >
                                        
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
                                <div class="portfolio_right_text details_name" data-id="<?php echo e($product->id); ?>>
                                    <h1><?php echo e($product->title); ?></h1>
                                    <p><?php echo e($product->mini_description); ?></p>
                                    <ul class="list">
                                        <li><span>Райтинг </span>: <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></li>
                                        <li><span>Степень защиты </span> : <?php echo e($product->protection); ?> </li>
                                        <li><span>Грантия </span> : <?php echo e($product->warranty); ?> месяцев</li>
                                        <li><span>Производитель</span>: <?php echo e($product->manufacturer); ?></li>
                                    </ul>
                                <br>
                                    <h3>Цена: <?php echo e($product->price); ?>тг</h3>
                                    <div class="product_quantity_container">
                                        <div class="product_quantity clearfix">
                                            <span>Кол.</span>
                                            <input id="quantity_input" type="text" pattern="[0-9]*" value="1">
                                            <div class="quantity_buttons">
                                                <div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fa fa-chevron-up" aria-hidden="true"></i></div>
                                                <div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fa fa-chevron-down" aria-hidden="true"></i></div>
                                            </div>
                                        </div>
                                        <div class="button cart_button"><a href="#">Добавить</a></div>
                                    </div>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\boiau.kz\resources\views/pages/product-detail-page.blade.php ENDPATH**/ ?>