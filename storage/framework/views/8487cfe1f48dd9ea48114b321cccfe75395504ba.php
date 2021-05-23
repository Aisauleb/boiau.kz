<?php
    # Home Banner
    $h2 = "Строительные материалы в ЮКО \"Boiau CORP\" ";
    $nav_links=[
        [
            'url'=>'/',
            'text'=>'Главная'
        ]
        ];
    $pad_top = ""; # if needs padding = "pod_top"
    $project_area_title = false;
    array_push($nav_links,
    [
        'url'=>'/stroymarket',
        'text'=>'Продукции'
    ]);
    # project Area
    $cat_products = [];
    $mini_description = "Продукции в ЮКО от Производтелей";
    if(isset($category)){
        $title = $category->name;
        $description = $category->seo_description;
        $mini_description =  $category->mini_description;
        $h2 = $category->name;
        $parent_category = $category->parent()->first();
        if($parent_category){
            array_push($nav_links,
            [
                'url'=>$parent_category->url,
                'text'=>$parent_category->name
            ]);
        }
        array_push($nav_links,
        [
            'url'=>$category->url,
            'text'=>$category->name
        ]);
        $categories = App\Category::with('children')->where('parent_id',$category->id)->get();
        // For Banner
        $banner =$category->image_url;

        foreach ($category->products()->get() as $product){
            array_push($cat_products,$product);
        }
    }

    if(isset($categories)){
       foreach($categories as $category)
        $all_children = $category->childrenRecursive()->get();
        foreach ($category->children()->get() as $last_category){
            foreach ($last_category->products()->get() as $product){
                    array_push($cat_products,$product);
            }
        }
        foreach ($category->products()->limit(4)->get() as $product){
                array_push($cat_products,$product);
        }
    }
    else{
        $title = $h2;
        $description = $h2;
        $categories = App\Category::with('childrenRecursive')->whereNull('parent_id')->get();
    }
    $cat_id = 1;
    $current_url = Illuminate\Support\Facades\URL::current();
?>
<?php if(isset($canonical)): ?>
<?php $__env->startSection('canonical'); ?><?php echo e($canonical); ?><?php $__env->stopSection(); ?>
<?php endif; ?>
<?php if(isset($paginated)): ?>
<?php $__env->startSection('paginated'); ?>
    <?php if($paginated->nextPageUrl() != ""): ?>
        <link rel="next" href="<?php echo e($current_url.$paginated->nextPageUrl()); ?>" />
    <?php endif; ?>
    <?php if($paginated->previousPageUrl() != ""): ?>
        <link rel="prev" href="<?php echo e($current_url.$paginated->previousPageUrl()); ?>"/>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php endif; ?>


<?php $__env->startSection('title'); ?><?php echo e($title); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('description'); ?><?php echo e($description); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('custom-css'); ?>
    <style>
        body{
            background-color: white;
        }
        .banner_inner {
            min-height: 40vh!important;
        }
        .banner_area {
            min-height: auto!important;
        }

    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <!--================Home Banner Area =================-->
    <?php echo $__env->make('includes.banner', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!--================End Home Banner Area =================-->
    <!--================Projects Area =================-->
    <!--================Projects Area =================-->
    <div class="col">
        <div class="row">
            <div id="categories_menu" class="col-md-3 sidebar left ">
                <ul class="list-sidebar bg-defoult">
                    <li>
                        <h3 style="color:white;text-align: center;padding: 5px; background-color: #030f27">
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
                                    <li class="active"><a href="<?php echo e($subcategory->url); ?>"><?php echo e($subcategory->name); ?></a></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </li>
                        <?php
                            $cat_id = $cat_id + 1;
                        ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            <div class="col product_page_col container order-first order-md-last" >
                <div class="row">
                    <div class="col pb-5">
                        <form action="/stroymarket" method="GET" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="q" placeholder="Поиск строи. материалов">
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-default">
                                        <span class="fa fa-search"></span>
                                    </button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <?php
                        $project_area_h2 = $title."- Продукции";
                        $project_area_p = $title." и все виды строи. материалов в ЮКО";
                        $products = $cat_products;
                    ?>
                    <?php $__currentLoopData = $paginated; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="projects_item col-md-4">
                            <img class="product-image" src="<?php echo e($product->image_url); ?>" alt="Boiau CORP Продукции <?php echo e($product->title); ?>">
                            <div>
                                <a href="<?php echo e($product->url); ?>" >
                                    <div>
                                        <h6><?php echo e($product->title); ?></h6>
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php if(isset($paginated)): ?>
                        <div class="col-md-9 p-3">
                            <nav aria-label="Страницы">
                                <?php echo $paginated->links(); ?>

                            </nav>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </div>
    <!--================End Projects Area =================-->

<?php $__env->stopSection(); ?>





<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\chia server\OneDrive\Рабочий стол\aslan\boiau.kz\boiau.kz\resources\views/pages/category.blade.php ENDPATH**/ ?>