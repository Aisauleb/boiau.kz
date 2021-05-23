@php
    $current_url = Illuminate\Support\Facades\URL::current();
@endphp
<!doctype html>
<html lang="ru-KZ">
    <head>
        @include('includes.head')
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
        @yield('custom-css')
    </head>
    <body>
    <header class="header_area">
        @include('includes.header')
    </header>
    @yield('content')
    @include('includes.contact-form')
    <footer class="footer_area p_120">
        @include('includes.footer')
    </footer>
    @yield('after_footer')
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
    @yield('custom-js')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAjjBmjw5vmxMG-7MLoofbQQ0xK84q1Be0"></script>
    <script src="/js/gmaps.min.js"></script>
    <script src="/js/theme.js"></script>
    <script>
        (function(w,d,u){
            var s=d.createElement('script');s.async=true;s.src=u+'?'+(Date.now()/60000|0);
            var h=d.getElementsByTagName('script')[0];h.parentNode.insertBefore(s,h);
        })(window,document,'https://cdn-ru.bitrix24.ru/b17619938/crm/site_button/loader_4_f7pgep.js');
    </script>
    </body>
</html>
