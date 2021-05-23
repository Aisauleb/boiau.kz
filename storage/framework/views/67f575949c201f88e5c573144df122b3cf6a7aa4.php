<div class="main_menu" id="mainNav">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <!-- Ais Beka bizge logo ausitiru kerek!!!! -->
            <a class="navbar-brand logo_h" href="/"><img src="/img/logo.png" alt=""><img src="/img/logo.png" alt="boiau. Logo"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                <ul class="nav navbar-nav menu_nav ml-auto">
                    <li class="nav-item active d-inline"><a class="nav-link" href="/">Главная</a></li>
                    <li class="nav-item submenu dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">Категории</a>
                        <ul class="dropdown-menu">
                            <?php $__currentLoopData = App\Category::whereNull('parent_id')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="nav-item dropdown-submenu" style="margin: 5px">
                                    <a class="nav-link" href="/stroymarket/<?php echo e($category->slug); ?>"><?php echo e($category->name); ?></a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </li>
                    <li class="nav-item submenu dropdown small">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-haspopup="true" aria-expanded="false">Услуги</a>
                        <ul class="dropdown-menu">
                            <?php $__currentLoopData = App\Service::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="/service/<?php echo e($product->slug); ?>_<?php echo e($product->id); ?>">
                                        <?php echo e($product->title); ?>

                                    </a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link d-inline" href="/about">О нас</a></li>
                    <li class="nav-item"><a class="nav-link d-inline" href="/contact">Контакты</a></li>
                    <li class="nav-item"><a class="nav-link d-inline" href="/stroymarket">Поиск материалов</a></li>
                    <li class="nav-item"><a class="nav-link d-inline" href="/cart"><h4 style="color: #ffc107" class="d-inline">Корзина (</h4> <h4 class="cart-qty d-inline" style="color: #ffc107"> <?php echo e(isset($_COOKIE['cart_id']) ? \Cart::session($_COOKIE['cart_id'])->getTotalQuantity() : '0'); ?> </h4><h4 class="d-inline" style="color: #ffc107"> )</h4></a></li>
                </ul>
            </div>
        </div>
    </nav>
</div>

<?php /**PATH C:\Users\chia server\OneDrive\Рабочий стол\aslan\boiau.kz\boiau.kz\resources\views/includes/header.blade.php ENDPATH**/ ?>