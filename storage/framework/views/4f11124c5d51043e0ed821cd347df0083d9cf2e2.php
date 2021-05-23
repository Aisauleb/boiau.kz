<?php $__env->startSection('content'); ?>


    <!-- Carousel Start -->
    <div class="" >
        <div id="carousel" class="carousel slide " data-ride="carousel" >
            <ol class="carousel-indicators">
                <li data-target="#carousel" data-slide-to="0" class="active"></li>
                <li data-target="#carousel" data-slide-to="1"></li>
                <li data-target="#carousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="img/carousel-1.jpg" alt="Carousel Image" >
                    <div class="carousel-caption">
                        <p class="animated fadeInRight">ПРОДАЖА СРОИТЕЛЬНЫХ МАТЕРИАЛОВ ПО ВСЕМУ ЮЖНОМУ КАЗАХСТАНУ</p>
                        <a class="btn animated fadeInUp bg-warning alert-dark bold" href="#contact">Оставить заявку</a>
                    </div>
                </div>

                <div class="carousel-item">
                    <img src="img/carousel-2.jpg" alt="Carousel Image" >
                    <div class="carousel-caption">
                        <p class="animated fadeInRight">У НАС ЕСТЬ ВСЕ ЧТО ВАМ НУЖНО.
                            БОЛЕЕ 10 ТЫСЯЧ НАИМЕНОВАНИЙ</p>
                        <a class="btn animated fadeInUp bg-warning alert-dark bold" href="#contact">Оставить заявку</a>
                    </div>
                </div>

                <div class="carousel-item">
                    <img src="img/carousel-3.jpg" alt="Carousel Image">
                    <div class="carousel-caption">
                        <p class="animated fadeInRight">Мы вместе с вами!</p>
                        <a class="btn animated fadeInUp bg-warning alert-dark bold" href="#contact">Оставить заявку</a>
                    </div>
                </div>
            </div>

            <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <!-- Carousel End -->

    <!-- Fact Start -->
    <div class="wrapper">
    <div class="fact ">
        <div class="container-fluid">
            <div class="row counters">
                <div class="col-md-6 fact-left wow slideInLeft">
                    <div class="row">
                        <div class="col-6">
                            <div class="fact-icon">
                                <i class="flaticon-worker"></i>
                            </div>
                            <div class="fact-text">
                                <h2 data-toggle="counter-up">26</h2>
                                <p>Профессионалов</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="fact-icon">
                                <i class="flaticon-building"></i>
                            </div>
                            <div class="fact-text">
                                <h2 data-toggle="counter-up">1500</h2>
                                <p>Довольных клиентов</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 fact-right wow slideInRight">
                    <div class="row">
                        <div class="col-6">
                            <div class="fact-icon">

                            </div>
                            <div class="fact-text">
                                <h2 data-toggle="counter-up">56</h2>
                                <p>Успешных проектов</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="fact-icon">
                                <i class="flaticon-crane"></i>
                            </div>
                            <div class="fact-text">
                                <h2 data-toggle="counter-up">569</h2>
                                <p>Виды товаров</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Fact End -->


    <!-- Video Start -->
    <div class="video wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <button type="button" class="btn-play" data-toggle="modal" data-src="https://www.youtube.com/embed/DWRcNpR6Kdc" data-target="#videoModal">
                <span></span>
            </button>
        </div>
    </div>

    <div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <!-- 16:9 aspect ratio -->
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="" id="video"  allowscriptaccess="always" allow="autoplay"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Video End -->

    <!--================Furniture Area =================-->
    <section class="furniture_area p_120">
        <div class="container">
            <div class="main_title">
                <h2>У нас есть новые услуги для наших клиентов</h2>
                <p>Профессиональные мастера и инжинерные проекты. </p>
            </div>
            <div class="furniture_inner row">
                <?php $__currentLoopData = App\Service::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-4">
                        <div class="furniture_item">
                            <img class="img-fluid" src="/<?php echo e($product->image); ?>" alt="<?php echo e($product->image_alt); ?>">
                            <a href="/service/<?php echo e($product->slug); ?>_<?php echo e($product->id); ?>">
                                <h4><?php echo e($product->title); ?></h4>
                            </a>
                            <p><?php echo e($product->short_description); ?></p>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>
    <!--================End Furniture Area =================-->

    <!--================Feature Area =================-->
    <section class="feature_area p_120">
        <div class="container">
            <div class="main_title">
                <h2>ЧТО ДЕЛАЕТЬ НАС ОСОБЕННЫМИ</h2>
                <p>ПОЛНЫЙ КАТАЛОГ СТРОИТЕЛЬНЫХ ТОВАРОВ, НАДЕЖНОСТЬ, ГИБКАЯ ЦЕНОВАЯ ПОЛИТИКА, ОПЫТНЫЕ МАСТЕРА.</p>
            </div>
            <div class="row feature_inner">
                <div class="col-lg-4 col-md-6">
                    <div class="feature_item">
                        <h4><i class="lnr lnr-user"></i>ОПЫТ</h4>
                        <p>Профессиональный состав специалистов и единомышленников с опытом работы и положительной репутацией в сфере сторительство более 10 лет. </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="feature_item">
                        <h4><i class="lnr lnr-diamond"></i>ВЫБОР</h4>
                        <p>Предоставляем заказчику на выбор строительные материалы любого ценового сегмента с подробным описанием преимуществ и недостатков.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="feature_item">
                        <h4><i class="lnr lnr-phone"></i>КАЧЕСТВО</h4>
                        <p>Гарантируем высочайшее качество предлагаемых материалов. предоставляем гарантию на все виды услуг и материалов.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--================End Feature Area =================-->

    <!--================ Contact Form Area =================-->
    
    <!--================ Contact Form Area =================-->


    <!-- Partners Start -->
    <div class="team">
        <div class="container">
            <div class="section-header text-center">
                <p>Встречайте!</p>
                <h2>Наши партнеры</h2>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item">
                        <!--<div class="team-img">
                            <img src="public/img/clients-logo/partner1.jpg" alt="Partner Image">
                        </div>-->
                        <div class="team-text">
                            <h2>Alinex</h2>
                            <p>Сухие строительные смеси</p>
                        </div>
                        <div class="team-social">
                            <a class="social-fb" href="https://alinex.kz/"><i class="fa fa-home" aria-hidden="true"></i></a>
                            <a class="social-in" href="https://alinex.kz/"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="team-item">
                        <div class="team-text">
                            <h2>CLASSIC FIX</h2>
                            <p>МОНТАЖНЫЙ КЛЕЙ</p>
                        </div>
                        <div class="team-social">
                            <a class="social-fb" href="https://stroydom-sd.kz/g3853107-montazhnyj-klej-pena?utm_source=google&utm_medium=cpc&utm_term=%2B%D0%BA%D0%BB%D0%B5%D0%B9%20%2B%D1%82%D0%B8%D1%82%D0%B0%D0%BD%20%2B%D0%BA%D0%BB%D0%B0%D1%81%D1%81%D0%B8%D0%BA%20%2B%D1%84%D0%B8%D0%BA%D1%81&utm_content=g&google_ad=502394105271&utm_campaign=%D0%9C%D0%BE%D0%BD%D1%82%D0%B0%D0%B6%D0%BD%D1%8B%D0%B9%20%D0%BA%D0%BB%D0%B5%D0%B9,%20%D0%BF%D0%B5%D0%BD%D0%B0,%20%D0%B3%D0%B5%D1%80%D0%BC%D0%B5%D1%82%D0%B8%D0%BA%20(%D0%BF%D1%80%D0%BE%D0%B4%D1%83%D0%BA%D1%86%D0%B8%D1%8F%20TYTAN)&gclid=CjwKCAjwnPOEBhA0EiwA609ReSd051SIn0XqkI8g6PN1NkhyMRmEsd9fPqDnF3QfyRS9zWkO3sb74BoCKi4QAvD_BwE#bot"><i class="fa fa-home" aria-hidden="true"></i></a>
                            <a class="social-in" href="https://stroydom-sd.kz/g3853107-montazhnyj-klej-pena?utm_source=google&utm_medium=cpc&utm_term=%2B%D0%BA%D0%BB%D0%B5%D0%B9%20%2B%D1%82%D0%B8%D1%82%D0%B0%D0%BD%20%2B%D0%BA%D0%BB%D0%B0%D1%81%D1%81%D0%B8%D0%BA%20%2B%D1%84%D0%B8%D0%BA%D1%81&utm_content=g&google_ad=502394105271&utm_campaign=%D0%9C%D0%BE%D0%BD%D1%82%D0%B0%D0%B6%D0%BD%D1%8B%D0%B9%20%D0%BA%D0%BB%D0%B5%D0%B9,%20%D0%BF%D0%B5%D0%BD%D0%B0,%20%D0%B3%D0%B5%D1%80%D0%BC%D0%B5%D1%82%D0%B8%D0%BA%20(%D0%BF%D1%80%D0%BE%D0%B4%D1%83%D0%BA%D1%86%D0%B8%D1%8F%20TYTAN)&gclid=CjwKCAjwnPOEBhA0EiwA609ReSd051SIn0XqkI8g6PN1NkhyMRmEsd9fPqDnF3QfyRS9zWkO3sb74BoCKi4QAvD_BwE#bot"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item">
                        <div class="team-text">
                            <h2>Knauf</h2>
                            <p>Декоративные штукатурки</p>
                        </div>
                        <div class="team-social">
                            <a class="social-fb" href="https://www.knauf.kz/"><i class="fa fa-home" aria-hidden="true"></i></a>
                            <a class="social-in" href="https://www.knauf.kz/"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="team-item">

                        <div class="team-text">
                            <h2>ROCKWOOL</h2>
                            <p>Негорючяя теплоизоляция</p>
                        </div>
                        <div class="team-social">
                            <a class="social-fb" href="https://www.rockwool.com"><i class="fa fa-home" aria-hidden="true"></i></a>
                            <a class="social-in" href="https://www.rockwool.com"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Partners End -->

    <!--================Impress Area =================-->
    <section class="impress_area p_120">
        <div class="container">
            <div class="impress_inner text-center">
                <h2>Доверьте весь процесс профессионалам <br />компании «Boiau CORP»</h2>
                <p>Полученный результат превзойдет все Ваши ожидания!.</p>
                <a class="main_btn" href="tel:+77018988588">Получить консультацию</a>
            </div>
        </div>
    </section>
    <!--================End Impress Area =================-->

    <!--================Our Blog Area =================-->
    <?php
        $blog_area = 0;
    ?>
    <?php echo $__env->make('includes.blog_area', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!--================End Our Blog Area =================-->

    <!-- FAQs Start -->
    <div class="wrapper">
        <div class="faqs">
            <div class="container">
                <div class="section-header text-center">
                    <p>Часто задоваемые вопросы</p>
                    <h2>Вы бы хотели узнать?</h2>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div id="accordion-1">
                            <div class="card wow fadeInLeft" data-wow-delay="0.1s">
                                <div class="card-header">
                                    <a class="card-link collapsed" data-toggle="collapse" href="#collapseOne">
                                        Как сдеалть заказ?
                                    </a>
                                </div>
                                <div id="collapseOne" class="collapse" data-parent="#accordion-1">
                                    <div class="card-body">
                                        Добавляете нужную вам продукцию в корзину, после оплачиваете и договариваетесь с администрацией на счет доставки)                            </div>
                                </div>
                            </div>

                            <div class="card wow fadeInLeft" data-wow-delay="0.3s">
                                <div class="card-header">
                                    <a class="card-link collapsed" data-toggle="collapse" href="#collapseThree">
                                        Как можно связаться?
                                    </a>
                                </div>
                                <div id="collapseThree" class="collapse" data-parent="#accordion-1">
                                    <div class="card-body">
                                        Вы можете позвонить или оставить заявку, наш оператор свяжется с вами.
                                    </div>
                                </div>
                            </div>
                            <div class="card wow fadeInLeft" data-wow-delay="0.4s">
                                <div class="card-header">
                                    <a class="card-link collapsed" data-toggle="collapse" href="#collapseFour">
                                        Почему у нас дешево?
                                    </a>
                                </div>
                                <div id="collapseFour" class="collapse" data-parent="#accordion-1">
                                    <div class="card-body">
                                        Мы стараемся продавать только продукции высшего качества и по дешевой цене.
                                    </div>
                                </div>
                            </div>
                            <div class="card wow fadeInLeft" data-wow-delay="0.5s">
                                <div class="card-header">
                                    <a class="card-link collapsed" data-toggle="collapse" href="#collapseFive">
                                        Гарантия для продукции имеется?
                                    </a>
                                </div>
                                <div id="collapseFive" class="collapse" data-parent="#accordion-1">
                                    <div class="card-body">
                                        Гарантия имеется для всех продуктов.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div id="accordion-2">
                            <div class="card wow fadeInRight" data-wow-delay="0.1s">
                                <div class="card-header">
                                    <a class="card-link collapsed" data-toggle="collapse" href="#collapseSix">
                                        Можно ли создать контракт?
                                    </a>
                                </div>
                                <div id="collapseSix" class="collapse" data-parent="#accordion-2">
                                    <div class="card-body">
                                        Да, вы можете проконсультироваться у администратора.                             </div>
                                </div>
                            </div>
                            <div class="card wow fadeInRight" data-wow-delay="0.3s">
                                <div class="card-header">
                                    <a class="card-link collapsed" data-toggle="collapse" href="#collapseEight">
                                        Проддукции на рассрочку или на кредит расмотривается?
                                    </a>
                                </div>
                                <div id="collapseEight" class="collapse" data-parent="#accordion-2">
                                    <div class="card-body">
                                        Да, но только для нескольких видов продукции.
                                    </div>
                                </div>
                            </div>
                            <div class="card wow fadeInRight" data-wow-delay="0.4s">
                                <div class="card-header">
                                    <a class="card-link collapsed" data-toggle="collapse" href="#collapseNine">
                                        Доставка товара?
                                    </a>
                                </div>
                                <div id="collapseNine" class="collapse" data-parent="#accordion-2">
                                    <div class="card-body">
                                        Доставка по всему Казахстану, уточняйте у администрации.                            </div>
                                </div>
                            </div>
                            <div class="card wow fadeInRight" data-wow-delay="0.5s">
                                <div class="card-header">
                                    <a class="card-link collapsed" data-toggle="collapse" href="#collapseTen">
                                        Возникла проблема с сайтом?
                                    </a>
                                </div>
                                <div id="collapseTen" class="collapse" data-parent="#accordion-2">
                                    <div class="card-body">
                                        Сообщите нам, мы будем благодарны)                            </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FAQs End -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom-js'); ?>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js">
        (function ($) {
            "use strict";

            // Initiate the wowjs
            new WOW().init();


            // Back to top button
            $(window).scroll(function () {
                if ($(this).scrollTop() > 200) {
                    $('.back-to-top').fadeIn('slow');
                } else {
                    $('.back-to-top').fadeOut('slow');
                }
            });
            $('.back-to-top').click(function () {
                $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
                return false;
            });


            // Sticky Navbar
            $(window).scroll(function () {
                if ($(this).scrollTop() > 90) {
                    $('.nav-bar').addClass('nav-sticky');
                    $('.carousel, .page-header').css("margin-top", "73px");
                } else {
                    $('.nav-bar').removeClass('nav-sticky');
                    $('.carousel, .page-header').css("margin-top", "0");
                }
            });


            // Dropdown on mouse hover
            $(document).ready(function () {
                function toggleNavbarMethod() {
                    if ($(window).width() > 992) {
                        $('.navbar .dropdown').on('mouseover', function () {
                            $('.dropdown-toggle', this).trigger('click');
                        }).on('mouseout', function () {
                            $('.dropdown-toggle', this).trigger('click').blur();
                        });
                    } else {
                        $('.navbar .dropdown').off('mouseover').off('mouseout');
                    }
                }
                toggleNavbarMethod();
                $(window).resize(toggleNavbarMethod);
            });


            // jQuery counterUp
            $('[data-toggle="counter-up"]').counterUp({
                delay: 10,
                time: 2000
            });


            // Modal Video
            $(document).ready(function () {
                var $videoSrc;
                $('.btn-play').click(function () {
                    $videoSrc = $(this).data("src");
                });
                console.log($videoSrc);

                $('#videoModal').on('shown.bs.modal', function (e) {
                    $("#video").attr('src', $videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0");
                })

                $('#videoModal').on('hide.bs.modal', function (e) {
                    $("#video").attr('src', $videoSrc);
                })
            });


            // Testimonial Slider
            $('.testimonial-slider').slick({
                infinite: true,
                autoplay: true,
                arrows: false,
                dots: false,
                slidesToShow: 1,
                slidesToScroll: 1,
                asNavFor: '.testimonial-slider-nav'
            });
            $('.testimonial-slider-nav').slick({
                arrows: false,
                dots: false,
                focusOnSelect: true,
                centerMode: true,
                centerPadding: '22px',
                slidesToShow: 3,
                asNavFor: '.testimonial-slider'
            });
            $('.testimonial .slider-nav').css({"position": "relative", "height": "160px"});


            // Blogs carousel
            $(".related-slider").owlCarousel({
                autoplay: true,
                dots: false,
                loop: true,
                nav : true,
                navText : [
                    '<i class="fa fa-angle-left" aria-hidden="true"></i>',
                    '<i class="fa fa-angle-right" aria-hidden="true"></i>'
                ],
                responsive: {
                    0:{
                        items:1
                    },
                    576:{
                        items:1
                    },
                    768:{
                        items:2
                    }
                }
            });


            // Portfolio isotope and filter
            var portfolioIsotope = $('.portfolio-container').isotope({
                itemSelector: '.portfolio-item',
                layoutMode: 'fitRows'
            });

            $('#portfolio-flters li').on('click', function () {
                $("#portfolio-flters li").removeClass('filter-active');
                $(this).addClass('filter-active');

                portfolioIsotope.isotope({filter: $(this).data('filter')});
            });

        })(jQuery);


    </script>
    <script src="/js/anim.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/wow/0.1.12/wow.min.js"></script>
    <script>
        (function ($) {
            "use strict";

            // Initiate the wowjs
            new WOW().init();


            // Back to top button
            $(window).scroll(function () {
                if ($(this).scrollTop() > 200) {
                    $('.back-to-top').fadeIn('slow');
                } else {
                    $('.back-to-top').fadeOut('slow');
                }
            });
            $('.back-to-top').click(function () {
                $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
                return false;
            });


            // Sticky Navbar
            $(window).scroll(function () {
                if ($(this).scrollTop() > 90) {
                    $('.nav-bar').addClass('nav-sticky');
                    $('.carousel, .page-header').css("margin-top", "73px");
                } else {
                    $('.nav-bar').removeClass('nav-sticky');
                    $('.carousel, .page-header').css("margin-top", "0");
                }
            });


            // Dropdown on mouse hover
            $(document).ready(function () {
                function toggleNavbarMethod() {
                    if ($(window).width() > 992) {
                        $('.navbar .dropdown').on('mouseover', function () {
                            $('.dropdown-toggle', this).trigger('click');
                        }).on('mouseout', function () {
                            $('.dropdown-toggle', this).trigger('click').blur();
                        });
                    } else {
                        $('.navbar .dropdown').off('mouseover').off('mouseout');
                    }
                }
                toggleNavbarMethod();
                $(window).resize(toggleNavbarMethod);
            });


            // jQuery counterUp
            $('[data-toggle="counter-up"]').counterUp({
                delay: 10,
                time: 2000
            });


            // Modal Video
            $(document).ready(function () {
                var $videoSrc;
                $('.btn-play').click(function () {
                    $videoSrc = $(this).data("src");
                });
                console.log($videoSrc);

                $('#videoModal').on('shown.bs.modal', function (e) {
                    $("#video").attr('src', $videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0");
                })

                $('#videoModal').on('hide.bs.modal', function (e) {
                    $("#video").attr('src', $videoSrc);
                })
            });


            // Testimonial Slider
            $('.testimonial-slider').slick({
                infinite: true,
                autoplay: true,
                arrows: false,
                dots: false,
                slidesToShow: 1,
                slidesToScroll: 1,
                asNavFor: '.testimonial-slider-nav'
            });
            $('.testimonial-slider-nav').slick({
                arrows: false,
                dots: false,
                focusOnSelect: true,
                centerMode: true,
                centerPadding: '22px',
                slidesToShow: 3,
                asNavFor: '.testimonial-slider'
            });
            $('.testimonial .slider-nav').css({"position": "relative", "height": "160px"});


            // Blogs carousel
            $(".related-slider").owlCarousel({
                autoplay: true,
                dots: false,
                loop: true,
                nav : true,
                navText : [
                    '<i class="fa fa-angle-left" aria-hidden="true"></i>',
                    '<i class="fa fa-angle-right" aria-hidden="true"></i>'
                ],
                responsive: {
                    0:{
                        items:1
                    },
                    576:{
                        items:1
                    },
                    768:{
                        items:2
                    }
                }
            });


            // Portfolio isotope and filter
            var portfolioIsotope = $('.portfolio-container').isotope({
                itemSelector: '.portfolio-item',
                layoutMode: 'fitRows'
            });

            $('#portfolio-flters li').on('click', function () {
                $("#portfolio-flters li").removeClass('filter-active');
                $(this).addClass('filter-active');

                portfolioIsotope.isotope({filter: $(this).data('filter')});
            });

        })(jQuery);


        $(document).ready(function(){
            $('#phone').mask('+7 (000) 000-00-00');
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\boiau.kz\resources\views/pages/home.blade.php ENDPATH**/ ?>