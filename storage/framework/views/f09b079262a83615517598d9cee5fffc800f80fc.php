<?php
    $current_url = Illuminate\Support\Facades\URL::current();
?>
<!doctype html>
<html lang="ru-KZ">
    <head>
        <?php echo $__env->make('includes.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <link rel="stylesheet" href="/css/bootstrap.css">
        <link rel="stylesheet" href="/vendors/linericon/style.css">
        <link rel="stylesheet" href="/css/font-awesome.min.css">
        <link rel="stylesheet" href="/vendors/owl-carousel/owl.carousel.min.css">
        <link rel="stylesheet" href="/vendors/lightbox/simpleLightbox.css">
        <link rel="stylesheet" href="/vendors/nice-select/css/nice-select.css">
        <link rel="stylesheet" href="/vendors/animate-css/animate.css">
        <link rel="stylesheet" href="/vendors/flaticon/flaticon.css">
        <link rel="stylesheet" href="/css/style.css">
        <link rel="stylesheet" href="/css/responsive.css">
        <link rel="stylesheet" href="/css/custom.css?date=13.03.2020">
        <?php echo $__env->yieldContent('custom-css'); ?>
    </head>
    <body>
    <header class="header_area">
        <?php echo $__env->make('includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </header>
    <?php echo $__env->yieldContent('content'); ?>
    <?php echo $__env->make('includes.contact-form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <footer class="footer_area p_120">
        <?php echo $__env->make('includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </footer>
    <?php echo $__env->yieldContent('after_footer'); ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="/js/jquery-3.2.1.min.js"></script>
    <script src="/js/popper.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/stellar.js"></script>
    <script src="/vendors/lightbox/simpleLightbox.min.js"></script>
    <script src="/vendors/nice-select/js/jquery.nice-select.min.js"></script>
    <script src="/vendors/isotope/imagesloaded.pkgd.min.js"></script>
    <script src="/vendors/isotope/isotope-min.js"></script>
    <script src="/vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src="/js/jquery.ajaxchimp.min.js"></script>
    <script src="/vendors/counter-up/jquery.waypoints.min.js"></script>
    <script src="/vendors/counter-up/jquery.counterup.min.js"></script>
    <script src="/js/mail-script.js"></script>
    <script src="resources/js/main.js" type="text/javascript"/></script>
    <?php echo $__env->yieldContent('custom-js'); ?>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAjjBmjw5vmxMG-7MLoofbQQ0xK84q1Be0"></script>
    <script src="/js/gmaps.min.js"></script>
    <script src="/js/theme.js"></script>
    </body>
</html>
<?php /**PATH C:\xampp\htdocs\master-D\resources\views/layouts/default.blade.php ENDPATH**/ ?>