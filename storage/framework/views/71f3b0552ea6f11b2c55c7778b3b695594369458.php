<div class="main_menu" id="mainNav">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand logo_h" href="/"><img src="/img/logo.png" alt=""><img src="/img/logo.png" alt="boiau. Logo"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="collapse navbar-collapse offset" id="navbarSupportedContent" >
                <ul class="nav navbar-nav menu_nav ml-auto" >
                    <li class="nav-item active" ><a class="nav-link" href="/">Главная</a></li>
                    <li class="nav-item submenu dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">Категории</a>
                        <ul class="dropdown-menu">
                        <?php $__currentLoopData = App\Category::whereNull('parent_id')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="nav-item dropdown-submenu">
                                    <a class="nav-link" href="/svetilniki/<?php echo e($category->slug); ?>"><?php echo e($category->name); ?></a>
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
                    <li class="nav-item"><a class="nav-link" href="/about">О нас</a></li>
                    <li class="nav-item"><a class="nav-link" href="/contact">Контакты</a></li>
                    <li class="nav-item"><a class="nav-link" href="/svetilniki">Поиск строи. материалов</a></li>
                    <li class="nav-item"><div class="shopping_cart">
                            <a href="/cart">
                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                     viewBox="0 0 489 489" style="enable-background:new 0 0 489 489;" xml:space="preserve">
											<g>
                                                <path d="M440.1,422.7l-28-315.3c-0.6-7-6.5-12.3-13.4-12.3h-57.6C340.3,42.5,297.3,0,244.5,0s-95.8,42.5-96.6,95.1H90.3
													c-7,0-12.8,5.3-13.4,12.3l-28,315.3c0,0.4-0.1,0.8-0.1,1.2c0,35.9,32.9,65.1,73.4,65.1h244.6c40.5,0,73.4-29.2,73.4-65.1
													C440.2,423.5,440.2,423.1,440.1,422.7z M244.5,27c37.9,0,68.8,30.4,69.6,68.1H174.9C175.7,57.4,206.6,27,244.5,27z M366.8,462
													H122.2c-25.4,0-46-16.8-46.4-37.5l26.8-302.3h45.2v41c0,7.5,6,13.5,13.5,13.5s13.5-6,13.5-13.5v-41h139.3v41
													c0,7.5,6,13.5,13.5,13.5s13.5-6,13.5-13.5v-41h45.2l26.9,302.3C412.8,445.2,392.1,462,366.8,462z"/>
                                            </g>
										</svg>
                                <div>Cart (<span class="cart-qty"><?php echo e(isset($_COOKIE['cart_id']) ? \Cart::session($_COOKIE['cart_id'])->getTotalQuantity() : '0'); ?></span>)</div>
                            </a>
                        </div></li>
                    <li class="nav-item"><a class="nav-link" href="tel:+77018989588">+7 705 571 7130</a></li>
                </ul>
            </div>
        </div>
    </nav>
</div>
<?php /**PATH C:\xampp\htdocs\master-D\resources\views/includes/header.blade.php ENDPATH**/ ?>