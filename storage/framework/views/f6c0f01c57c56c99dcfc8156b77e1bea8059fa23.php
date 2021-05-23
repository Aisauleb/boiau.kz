<section id="contact" class="contact-area p_120">
    <div class="container contact-form">
        <div class="impress_inner text-center mr-auto ml-auto">
            <h2 style="color: white">Подписка на новости.
                Будьте в курсе новых акций и спецпредложений!</h2>
            <p>Оствьте ваше имя и телефон!</p>
        </div>
        <form class="banner_form" action="<?php echo e(url('/contact_request')); ?>" method="post">
            <input name="_token" type="hidden" value="<?php echo e(csrf_token()); ?>"/>
            <div class="form-group row">
                <div class="col-md-4">
                    <input name="name" type="text" minlength="2" id="name" placeholder="Ваше Имя"
                           class="btn-block py-3 px-5" required="true">
                </div>
                <div class="col-md-4">
                    <fieldset>
                        <input name="phone" type="tel" minlength="11" id="phone" placeholder="Ваш номер телефона"
                               class="btn-block py-3 px-5" required="true">
                    </fieldset>
                </div>
                <div class="col-md-4">
                    <input type="submit" class="btn btn-block bg-success border-success btn-primary text-white py-3 px-5 "
                           value="Оставить Заявку">
                </div>
            </div>
        </form>
    </div>
</section>
<?php /**PATH C:\xampp\htdocs\boiau.kz\resources\views/includes/contact-form.blade.php ENDPATH**/ ?>