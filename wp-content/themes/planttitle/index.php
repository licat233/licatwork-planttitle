<!DOCTYPE html>
<html <?php language_attributes(); ?> style="margin-top:0px !important" lang="zh-Hant">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, minimum-scale=1.0"/>
    <meta name="deion" content="專注肌膚科學保養20年，植題是一個專注於亞洲膚質，集研發、生產、資訊為一體的輕奢肌膚保養品牌，植題祛斑美白產品使用周期短，效果明顯。99%的保持了植物的原始功效，避免產品有效期內的各種氧化反應，最有效的祛斑產品品牌。" />
    <meta name="keywords" content="植題PLANTTITLE|護膚品|保養皮膚|祛斑產品|美白面膜" />
    <meta name="description" content="" />
    <meta name="google-site-verification" content="gZlJy2XT3ymKlppjE590JyEOBitfnSJVIoQls8OnWOs" />
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); echo '?' .
    filemtime( get_stylesheet_directory() . '/style.css'); ?>"
    type="text/css" media="screen, projection" />
    <link rel="stylesheet" href="./wp-content/themes/planttitle/assets/css/animate.min.css">
    <link rel="stylesheet" href="./wp-content/themes/planttitle/assets/css/mobile.min.css">
    <link rel="stylesheet" href="./wp-content/themes/planttitle/assets/css/swiper-bundle.css">
    <link rel="stylesheet" href="//at.alicdn.com/t/font_2665170_ksd880uve2g.css">
    <style>
        body {
            background-image: url("/wp-content/themes/planttitle/assets/images/websiteImg/backgroundimg.jpg");
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        .swiper {
            width: 100%;
            height: auto;
        }
        
        .main .columnTitle,
        .section1 .brandContent,
        .section1Down .section1Down-Dncontent,
        .section2 .newProduct,
        .section3 .promotional,
        .section4 .informationContent {
            opacity: 1;
            position: relative;
            top: 0;
        }
        
        .smallicon {
            width: 25px;
            height: 2px;
            display: inline-block;
            background: url('/wp-content/themes/planttitle/assets/images/websiteImg/main_columntitle_txt.png');
            margin: 0 10px 3px 10px;
        }
        
        .swiperproductImg {
            display: block;
            height: 100%;
            position: absolute;
            object-fit: cover;
            object-position: center center;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
        }
    </style>
    <script src="./wp-content/themes/planttitle/assets/js/jquery.min.js"></script>
    <script src="./wp-content/themes/planttitle/assets/js/swiper-bundle.min.js"></script>  
    <script src="https://rawgithub.com/WickyNilliams/headroom.js/master/src/jQuery.headroom.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/headroom/0.12.0/headroom.min.js"></script> 
    <script src="./wp-content/themes/planttitle/assets/js/Headroom.js"></script> 
    <title>植題PLANTTITLE | 護膚品 | 保養皮膚</title>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div id="bigBox">
        <!-- 遮罩層 -->
        <div class="mainFilter"></div>
        <?php include('idxhead.php') ?>

    <?php get_template_part('content'); ?>

    <?php get_footer();?>

</div> 

    <script src="./wp-content/themes/planttitle/assets/js/index.js"></script>
    <script src="./wp-content/themes/planttitle/assets/js/common.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js" async></script>

    
    <script>
        var swiper = new Swiper(".productSwiper", {
            slidesPerView: 3,
            spaceBetween: 30, 
            effect: 'slide',
            autoplay: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            watchOverflow: true,
            breakpoints: {
                768: {
                    slidesPerView: 3,
                },
                1000: {
                    slidesPerView: 4,
                }
            },
        }); 
    </script>
</body>

</html>