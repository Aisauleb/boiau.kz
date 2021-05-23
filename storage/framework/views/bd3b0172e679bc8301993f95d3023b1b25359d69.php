<?php $__env->startSection('content'); ?>
    <!--================Home Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center"  style="background-color: #030F27">
            <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container">
                <div class="banner_content text-center">
                    <h2>Контакты</h2>
                    <div class="page_link">
                        <a href="/">Главная</a>
                        <a href="/contact"> Boiau CORP</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================Contact Area =================-->
    <section class="contact_area p_120">
        <div class="container">
            <div id="mapBox" class="mapBox"
                 data-lat="42.5334000"
                 data-lon="70.3496000"
                 data-zoom="15"
                 data-info="улица Бузурбаева 23, Тюлькубас, Шымкент, ЮКО."
                 data-mlat="42.5334000"
                 data-mlon="70.3496000">
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <div class="contact_info">
                        <div class="info_item">
                            <i class="lnr lnr-home"></i>
                            <h6>Тюлькубас, Шымкент, ЮКО</h6>
                            <p>Т.Рыскулова 45</p>
                        </div>
                        <div class="info_item">
                            <i class="lnr lnr-phone-handset"></i>
                            <h6><a href="tel:+77018988588">+7 (705) 571 71 30</a></h6>
                            <p>Пн. -  Пт. 9:00 до 18:00 ч.</p>
                        </div>
                        <div class="info_item">
                            <i class="lnr lnr-envelope"></i>
                            <h6><a href="mailto:abylaikhan.tastanbekov@gmail.com">abylaikhan.tastanbekov@gmail.com</a></h6>
                            <p>Мы слушаем вас)</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <form class="row contact_form" action="<?php echo e(route('sendRequest')); ?>" method="post" id="contactForm" novalidate="novalidate">
                        <input name="_token" type="hidden" value="<?php echo e(csrf_token()); ?>"/>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Ваше имя">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Ваша электронная почта">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="subject" name="subject" placeholder="Предмет обращение">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <textarea class="form-control" name="message" id="message" rows="1" placeholder="Описание"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12 text-right">
                            <button type="submit" value="submit" class="btn submit_btn">Отправить заявку</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--================Contact Area =================-->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('after-footer'); ?>
    <!--================Contact Success and Error message Area =================-->
    <div id="success" class="modal modal-message fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-close"></i>
                    </button>
                    <h2>Спасибо!</h2>
                    <p>Ваше заявка оставлена, вам позвонить в ближайщее время.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Modals error -->

    <div id="error" class="modal modal-message fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-close"></i>
                    </button>
                    <h2>Извините !</h2>
                    <p> Что то пощло не так, попробуйте дозваниться или написать на Whatsapp </p>
                </div>
            </div>
        </div>
    </div>
    <!--================End Contact Success and Error message Area =================-->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom-js'); ?>
    <script>
        (function(w,d,u){
            var s=d.createElement('script');s.async=true;s.src=u+'?'+(Date.now()/60000|0);
            var h=d.getElementsByTagName('script')[0];h.parentNode.insertBefore(s,h);
        })(window,document,'https://cdn-ru.bitrix24.ru/b17636616/crm/site_button/loader_1_fkw4y4.js');
    </script>
    <!-- contact js -->
    <script src="/js/jquery.form.js"></script>
    <script src="/js/jquery.validate.min.js"></script>
    <script src="/js/contact.js"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\boiau.kz\resources\views/pages/contact.blade.php ENDPATH**/ ?>