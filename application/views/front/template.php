<!DOCTYPE html>
<html lang="en">

<head>
    <title>PT TJARKINDO MAS - <?= strtoupper($title) ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="content-language" content="id-id">

    <!--===============================================================================================-->
    <link rel="shortcut icon" href="<?= base_url() ?>assets/img/logo.png" type="image/x-icon" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/frontend/client/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/frontend/client/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/frontend/client/fonts/themify/themify-icons.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/frontend/client/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/frontend/client/fonts/elegant-font/html-css/style.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/frontend/client/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/frontend/client/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/frontend/client/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/frontend/client/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/frontend/client/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/frontend/client/vendor/slick/slick.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/frontend/client/vendor/lightbox2/css/lightbox.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/frontend/client/css/util.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/frontend/client/css/main.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/frontend/assets/frontend/css/share.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/frontend/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/frontend/css/social-button.css">
    <!-- <link href="assets/frontend/css/font-awesome.min.css" rel="stylesheet"> -->
    <!--===============================================================================================-->
</head>

<body class="animsition">

    <!-- Header -->
    <header class="header1">
        <!-- Header desktop -->
        <div class="container-menu-header">
            <div class="topbar">

            </div>

            <div class="wrap_header">
                <!-- Logo -->
                <?php
                if ($this->session->has_userdata('login_session')) { ?>
                    <a href="<?= site_url('loker') ?>" class="logo">
                        <img src="<?= base_url() ?>assets/img/logo_nav.png" alt="IMG-LOGO">
                    </a>
                <?php } else { ?>
                    <a href="<?= site_url('home') ?>" class="logo">
                        <img src="<?= base_url() ?>assets/img/logo_nav.png" alt="IMG-LOGO">
                    </a>
                <?php }
                ?>


                <!-- Menu -->
                <div class="wrap_menu pull-left">
                    <nav class="menu">
                        <ul class="main_menu">

                            <!-- LOGIN MUNCUL JIKA BELUM LOGIN -->
                            <?php
                            if ($this->session->has_userdata('login_session')) : ?>
                                <li>
                                    <a href="#"><b>Hi , <?= userdata('nama') ?></b></a>
                                </li>

                                <li>
                                    <a href="<?= site_url('auth/logout') ?>"><b>Logout</b></a>
                                </li>

                            <?php else : ?>
                                <li>
                                    <a href="<?= site_url('auth/register') ?>"><b>Register</b></a>
                                </li>

                                <li>
                                    <a href="<?= site_url('auth') ?>"><b>Login</b></a>
                                </li>
                            <?php endif; ?>
                            <!-- END LOGIN MUNCUL JIKA BELUM LOGIN -->
                        </ul>
                    </nav>

                </div>


            </div>
        </div>

        <!-- Header Mobile -->
        <div class="wrap_header_mobile">
            <!-- Logo moblie -->
            <a href="<?= site_url('home') ?>" class="logo-mobile">
                <img src="<?= base_url() ?>assets/img/logo_nav.png" alt="IMG-LOGO">
            </a>

            <!-- Button show menu -->
            <div class="btn-show-menu">
                <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </div>
            </div>
        </div>

        <!-- Menu Mobile -->
        <div class="wrap-side-menu">
            <nav class="side-menu">
                <ul class="main-menu">

                    <li class="item-menu-mobile">
                        <a href="<?= site_url('home') ?>"><b>Register</b></a>
                    </li>

                    <li class="item-menu-mobile">
                        <a href="<?= site_url('home') ?>"><b>Login</b></a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <?= $contents ?>


    </footer>



    <!-- Back to top -->
    <div class="btn-back-to-top bg0-hov" id="myBtn">
        <span class="symbol-btn-back-to-top">
            <i class="fa fa-angle-double-up" aria-hidden="true"></i>
        </span>
    </div>

    <!-- Container Selection1 -->
    <div id="dropDownSelect1"></div>



    <!--===============================================================================================-->
    <script type="text/javascript" src="<?= base_url() ?>assets/frontend/client/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="<?= base_url() ?>assets/frontend/client/vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="<?= base_url() ?>assets/frontend/client/vendor/bootstrap/js/popper.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/frontend/client/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="<?= base_url() ?>assets/frontend/client/vendor/select2/select2.min.js"></script>
    <script type="text/javascript">
        $(".selection-1").select2({
            minimumResultsForSearch: 20,
            dropdownParent: $('#dropDownSelect1')
        });
    </script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="<?= base_url() ?>assets/frontend/client/vendor/slick/slick.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/frontend/client/js/slick-custom.js"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="<?= base_url() ?>assets/frontend/client/vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="<?= base_url() ?>assets/frontend/client/vendor/lightbox2/js/lightbox.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/dist/js/search.js"></script>
    <!-- Select2 -->
    <script src="<?= base_url() ?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="<?= base_url() ?>assets/frontend/client/vendor/sweetalert/sweetalert.min.js"></script>
    <script type="text/javascript">
        // $('.block2-btn-addcart').each(function() {
        //     var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
        //     $(this).on('click', function() {
        //         swal(nameProduct, "is added to cart !", "success");
        //     });
        // });

        $('.block2-btn-addwishlist').each(function() {
            var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
            $(this).on('click', function() {
                swal(nameProduct, "is added to wishlist !", "success");
            });
        });
    </script>

    <!--===============================================================================================-->
    <script src="<?= base_url() ?>assets/frontend/client/js/main.js"></script>


</body>

</html>