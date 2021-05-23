<?php $__env->startSection('content'); ?>
    <?php
        $h2 = "О копмании  Boiau CORP";
        $nav_links=[
                [
                    'url'=>'/',
                    'text'=>'Главная'
                ]
                ];
        array_push($nav_links,
        [
            'url'=>'/about',
            'text'=>'О нас'
        ]);
    ?>
    <?php echo $__env->make('includes.banner', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <section class="about_area p_120">
        <div class="container">
            <div class="about_inner row">
                <div class="col-lg-6">
                    <div class="about_left_text">
                        <h6>Наш слоган  -  “Лучшая реклама - довольный покупатель!”.</h6>
                        <h3>Наш слоган  -  <br/>“Лучшая реклама - довольный покупатель!”.</h3>
                        <h5>Boiau CORP</h5>
                        <p> Ритейл компания, которая специализируется на продаже товаров для строительства и для многого другого по низким ценам, помогая людям отремонтировать и декорировать жилое или рабочее пространство для комфортной жизни.


                        </p>
                        <a class="main_btn" href="#">Мы хотим получить консультацию</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img class="img-fluid" src="img/about-1.jpg" alt="">
                </div>
            </div>
        </div>
    </section>
    <?php
        $pad_top = "";
        $project_area_title = false;
    ?>
    <?php echo $__env->make('includes.projects_area', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\boiau.kz\resources\views/pages/about.blade.php ENDPATH**/ ?>