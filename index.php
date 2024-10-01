<?php

include('config.php');
?>


<!doctype html>
<html lang="pt">

<head>

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-5LHFHBCW');</script>
<!-- End Google Tag Manager -->
    <meta charset="UTF-8">
    <meta name="description" content="TNET Sistemas foi criada com o intuito de colaborar com o êxito de nossos parceiros oferecendo as melhores soluções e tecnologias do mercado">
    <meta name="keywords" content="spc, consulta spc, emissor de notas, estoque, cupom fiscal, certificado digital, chat, multiatendimento">
    <meta name="author" content="Tnet sistemas">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>TNET Sistemas</title>
    <!-- Favicons -->
    <link rel="shortcut icon" href="./assets/img/favicon-32x32.png" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-W2RHGFQH');
    </script>
    <!-- End Google Tag Manager -->

    <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-84FTCRG1SZ"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-84FTCRG1SZ');
</script>


</head>

<body>



<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5LHFHBCW"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-W2RHGFQH" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center ">
        <div class="container d-flex align-items-center justify-content-between">



            <a href="/">
                <img style="width: 100%!important;" src="./assets/img/logoneww.png" alt="">
            </a>


            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="/">Inicio</a></li>
                    <li class="dropdown"><a href="#"><span>Nossos produtos</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="/cerebro">TNET Cérebro </a></li>
                            <li><a href="/multiatendimento">TNET Multiatendimento</a></li>
                            <li><a href="/tnetemissor">TNET Gestor</a></li>
                            <li><a href="/spc-tnet-sistemas">TNET SPC Sistemas </a></li>
                        </ul>
                    </li>
                    <li><a class="nav-link scrollto" href="/quem-somos">Quem somos</a></li>
                    <li><a class="nav-link scrollto" href="/faq">Perguntas frequentes</a></li>
                    <li><a class="nav-link scrollto" href="/contato">Contato</a></li>
                    <li><a class="nav-link scrollto" href="/seja-uma-revenda">Seja nosso Revendedor</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <main id="main">
        <?php
        $url = $_SERVER['REQUEST_URI'];
        if(empty($url)|| $url==='/') $url = 'home';

        if (file_exists('./pages/' . $url . '.php')) {
            include('pages/' . $url . '.php');
        } else {
            //caso de erro ou a pagina não exista
            include('pages/404.php');
        }

        ?>


    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6 footer-info">
                        <img class="img-footer" src="./assets/img/logo.png" alt="">

                        <div class="social-links mt-3">
                            <!-- <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a> -->
                            <a target="_blank" href="https://www.instagram.com/tnetsistemas/" class="instagram"><i class="bx bxl-instagram"></i></a>
                            <!-- <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a> -->
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Nossos produtos</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="/multiatendimento">TNET
                                    Multiatendimento</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="/tnetemissor">TNET Gestor</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="/spc-tnet-sistemas">TNET
                                    SPC Sistemas</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="/certificado">Certificado Digital</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="/cerebro">Cerebro</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Sobre</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="/quem-somos">Quem somos</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="/faq">Perguntas frequentes</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="/contato">Contato</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="/termos">Termos de uso</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="https://www.fundacaoti.com.br/politica-de-privacidade">Política de Privacidade</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-contact">
                        <h4>Contato</h4>
                        <p>
                            Av. Jerônimo Monteiro, 1000 - Centro, Vitória - ES, 29010-935<br>
                            (65) 4042-1503 <br>
                            contato@tnetsistemas.com.br<br>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright container">
            &copy; Copyright <strong><span>TNET Sistemas</span></strong>. Todos os direitos Reservados.
        </div>
    </footer><!-- End Footer -->

    <div id="preloader"></div>
    <a target="_blank" href="https://api.whatsapp.com/send/?phone=556540421503&text=Ol%C3%A1+TNET+Sistemas%2C+gostaria+de+comprar+um+plano%21&type=phone_number&app_absent=0" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-whatsapp"></i></a>


    <!-- Vendor JS Files -->
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="https://www.google.com/recaptcha/api.js"></script>

    <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-84FTCRG1SZ"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-84FTCRG1SZ');
</script>



</body>

</html>