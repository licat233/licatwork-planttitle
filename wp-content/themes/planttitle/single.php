<!DOCTYPE html>
<html <?php language_attributes(); ?> style="margin-top:0px !important;height: 100%;" lang="zh-Hant">
<?php
    $product=get_product(get_the_id());
?> 
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, minimum-scale=1.0"/>
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); echo '?' .
    filemtime( get_stylesheet_directory() . '/style.css'); ?>"
    type="text/css" media="screen, projection" />
    <link rel="stylesheet" href="/wp-content/themes/planttitle/assets/css/animate.min.css">
    <link rel="stylesheet" href="/wp-content/themes/planttitle/assets/css/mobile.min.css">
    <link rel="stylesheet" href="/wp-content/themes/planttitle/assets/css/swiper-bundle.css">
    <link rel="stylesheet" href="//at.alicdn.com/t/font_2665170_fqybvhdd2pb.css">
    <script src="/wp-content/themes/planttitle/assets/js/jquery.min.js"></script> 
    <script src="/wp-content/themes/planttitle/assets/js/swiper-bundle.min.js"></script>
    <title>植題 - <?php the_title() ?></title>
    <style>
        #ident{
            background:none !important;
        }
    </style>
    <?php wp_head(); ?>
</head>

<body>  
<?php include('navmenu.php'); ?>
    <?php 
        $test = $_SERVER['REQUEST_URI'];
        $path = explode('/',$test)[1];
        if($path == 'product') {
            $ident = 'pro';
            include('car.php');
            include('product.php');
            include('maskLayer.php');
        }else {
            include('article.php');
        }
    ?>


<?php get_footer();?>

</main>
</div>
<script src="/wp-content/themes/planttitle/assets/js/jquery.min.js"></script>
<!-- headroom.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/headroom/0.12.0/headroom.min.js" integrity="sha512-9UsrKTYzS9smDm2E58MLs0ACtOki+UC4bBq4iK5wi7lJycwqcaiHxr1bdEsIVoK0l5STEzLUdYyDdFQ5OEjczw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- 提供jquery插件方式和Data-API方式調用headrooom() -->
<script src="https://rawgithub.com/WickyNilliams/headroom.js/master/src/jQuery.headroom.js"></script> 
<script src="/wp-content/themes/planttitle/assets/js/Headroom.js"></script>
<script src="/wp-content/themes/planttitle/assets/js/common.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js"></script>
</body>
</html>
