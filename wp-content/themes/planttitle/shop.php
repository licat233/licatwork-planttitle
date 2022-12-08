<?php
    /*
    Template Name: shop
    */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> style="margin-top:0px !important" lang="zh-Hant">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, minimum-scale=1.0"/>
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); echo '?' .
    filemtime( get_stylesheet_directory() . '/style.css'); ?>"
    type="text/css" media="screen, projection" />
    <link rel="stylesheet" href="/wp-content/themes/planttitle/assets/css/animate.min.css">
    <link rel="stylesheet" href="/wp-content/themes/planttitle/assets/css/mobile.min.css">
    <link rel="stylesheet" href="/wp-content/themes/planttitle/assets/css/swiper-bundle.css">
    <link rel="stylesheet" href="//at.alicdn.com/t/font_2665170_ksd880uve2g.css">
    <style>
        @font-face {
            font-family: 'SF Pro SC';
            src: url('/wp-content/themes/planttitle/assets/font/sf-pro-text_regular.ttf');
        }

        body {
            background-image: url("/wp-content/themes/planttitle/assets/images/websiteImg/backgroundimg.jpg");
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        .addmenu {
            display: block !important;
            position: static !important;
            float: none !important;
            margin: 0 !important;
        }

        .container .columnMenu .crumbs li.home,
        .crumbs ul .home {
            background: url('/wp-content/themes/planttitle/assets/images/websiteImg/crumbs_home.gif') no-repeat 0 center;
            padding-left: 23px;
        }

        .clearfix:after {
            content: "";
            height: 30px;
            line-height: 0;
            display: block;
            visibility: hidden;
            clear: both;
        }

        .clearfix {
            zoom: 1;
        }

        .caseimgbox {
            position: relative !important;
            width: 100% !important;
            height: 0 !important;
            padding-top: 100% !important;
        }

        .caseimgbox img {
            position: absolute !important;
            top: 0 !important;
            left: 0 !important;
            width: 100% !important;
            height: 100% !important;
            object-fit: cover !important;
            object-position: center !important;
        }

        .readmorebox {
            position: relative !important;
            width: 100% !important;
            height: 0 !important;
            padding-top: 100% !important;
        }

        .navmenuActive {
            background-image: url('/wp-content/themes/planttitle/assets/images/websiteImg/titleYezi.png');
            -o-background-size: 100% 60%;
            background-size: 100% 60%;
            background-position: center;
            background-repeat: no-repeat;
        }
    </style>
    <script src="/wp-content/themes/planttitle/assets/js/jquery.min.js"></script> 
    <script src="/wp-content/themes/planttitle/assets/js/swiper-bundle.min.js"></script>
    <?php wp_head(); ?>
</head>

<body>


<?php include('navmenu.php'); ?>
<?php include('car.php'); ?>
<?php include('shop-content.php'); ?>
<?php include('maskLayer.php') ?>
<?php get_footer();?>
<!-- headroom.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/headroom/0.12.0/headroom.min.js" integrity="sha512-9UsrKTYzS9smDm2E58MLs0ACtOki+UC4bBq4iK5wi7lJycwqcaiHxr1bdEsIVoK0l5STEzLUdYyDdFQ5OEjczw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- 提供jquery插件方式和Data-API方式調用headrooom() -->
<script src="https://rawgithub.com/WickyNilliams/headroom.js/master/src/jQuery.headroom.js"></script>
<script src="/wp-content/themes/planttitle/assets/js/Headroom.js"></script>
<script src="/wp-content/themes/planttitle/assets/js/common.js"></script>
<script src="/wp-content/themes/planttitle/assets/js/shop.js?20220407"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js"></script>
</body>
</html>