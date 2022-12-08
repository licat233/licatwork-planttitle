<!DOCTYPE html>
<html <?php language_attributes(); ?> style="margin-top:0px !important;height:100%;" lang="zh-Hant">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, minimum-scale=1.0"/>
    <!-- <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">  -->
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); echo '?' .
    filemtime( get_stylesheet_directory() . '/style.css'); ?>"
    type="text/css" media="screen, projection" />
    <link rel="stylesheet" href="/wp-content/themes/planttitle/assets/css/animate.min.css">
    <link rel="stylesheet" href="/wp-content/themes/planttitle/assets/css/mobile.min.css">
    <link rel="stylesheet" href="/wp-content/themes/planttitle/assets/css/swiper-bundle.css">
    <link rel="stylesheet" href="//at.alicdn.com/t/font_2665170_ksd880uve2g.css">
    <style>
        body {
            background-image: url("/wp-content/themes/planttitle/assets/images/websiteImg/backgroundimg.jpg");
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        .verify-container {
        font-size: 16px;
    }

    .verify-container p {
        margin-bottom: 8px;
    }

    .verify-container img {
        display: inline !important;
    }

    .verify-container .top {
        background: -webkit-gradient(linear, left top, left bottom, from(#FFFFFF), to(#f6f6f6));
        background: -webkit-linear-gradient(top, #FFFFFF, #f6f6f6);
        background: linear-gradient(to bottom, #FFFFFF, #f6f6f6);
    }

    .verify-container .top .top-title,
    .verify-container .top .top-title h1
    {
        text-align: center;
        padding: 2em 0 1em 0;
        font-size: 20px;
        color: #254c24;
        font-weight: 700;
        letter-spacing: 1px;
    }

    .verify-container .top .top-title>h1 {
        margin: 0 auto;
        border-bottom: 1px solid grey;
        padding: 10px;
        width: 100%;
        max-width: 800px;
        box-sizing: border-box;
    }

    .verify-container .top .verifybanner {
        text-align: center;
        margin-bottom: 20px;
    }

    .verify-container .top .verifybanner img {
        max-width: 800px;
    }

    .verify-container .top .description {
        text-align: center;
        padding: 5px 20px;
        color: #333333;
    }

    .verify-container .top .description :first-child {
        font-size: 1.5em;
        margin-bottom: 20px;
    }

    .verify-container .top .description :last-child {
        font-size: 1em;
        margin-bottom: 20px;
    }

    .verify-container .center {
        /* background-color: #fff; */
        padding: 20px;
        width: 100%;
        box-sizing: border-box;
        text-align: center;
    }

    .verify-container .center .idinput {
        margin-top: 8px;
        margin-bottom: 6px;
        width: 100%;
        font-size: 1em;
        text-align: center;
        padding: 0;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        background: transparent;
        -webkit-box-shadow: inset 0px 2px 2px #C2C2C2;
        box-shadow: inset 0px 2px 2px #C2C2C2;
        color: #262626;
        -webkit-font-smoothing: antialiased;
        border: 1px solid #D6D6D6;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        border-radius: 4px;
        font-family: inherit;
        text-rendering: optimizeLegibility;
        margin: 0 auto 8px;
        height: 45px;
        max-width: 386px;
    }

    .verify-container .center .sbbtn {
        margin: 48px 0;
    }

    .verify-container .submitbtn {
        position: relative;
        width: 150px;
        color: #FFFFFF;
        background-color: #4caf50;
        font-family: inherit;
        font-size: 18px;
        line-height: 1.22222222;
        font-weight: 600;
        letter-spacing: normal;
        border: 1px #50a853 solid;
        border-radius: 4px;
        cursor: pointer;
        -webkit-transition-duration: 0.4s;
        transition-duration: 0.4s;
        text-decoration: none;
        overflow: hidden;
        cursor: pointer;
        padding: 10px;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        margin: 0;
        text-rendering: optimizeLegibility;
        -webkit-font-smoothing: antialiased;
    }

    .verify-container .submitbtn:after {
        content: "";
        background: #90EE90;
        display: block;
        position: absolute;
        padding-top: 300%;
        padding-left: 350%;
        margin-left: -20px !important;
        margin-top: -120%;
        opacity: 0;
        transition: all 0.8s
    }

    .verify-container .submitbtn:active:after {
        padding: 0;
        margin: 0;
        opacity: 1;
        transition: 0s
    }

    .verify-container .inputerr {
        box-shadow: none !important;
        background-color: rgba(255, 207, 215, 0.3) !important;
        border-color: #FF1200 !important;
    }

    .verify-container .error-div {
        color: red;
        font-size: 1em;
        line-height: 1.33333333;
        font-weight: 400;
        letter-spacing: normal;
    }

    .verify-container .inputsucc {
        box-shadow: none !important;
        background-color: rgba(207, 255, 217, 0.3) !important;
        border-color: #00a832 !important;
    }

    .verify-container .succ-div {
        color: green;
        font-size: 1em;
        line-height: 1.33333333;
        font-weight: 400;
        letter-spacing: normal;
    }
    </style>
    <script src="/wp-content/themes/planttitle/assets/js/jquery.min.js"></script> 
    <!-- headroom.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/headroom/0.12.0/headroom.min.js" integrity="sha512-9UsrKTYzS9smDm2E58MLs0ACtOki+UC4bBq4iK5wi7lJycwqcaiHxr1bdEsIVoK0l5STEzLUdYyDdFQ5OEjczw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- 提供jquery插件方式和Data-API方式調用headrooom() -->
    <script src="https://rawgithub.com/WickyNilliams/headroom.js/master/src/jQuery.headroom.js"></script>
    <script src="/wp-content/themes/planttitle/assets/js/Headroom.js"></script>
    <script src="/wp-content/themes/planttitle/assets/js/swiper-bundle.min.js"></script>
    <?php wp_head(); ?>
</head>

<body>
<?php include('navmenu.php'); ?>
<div class="columnMenu">
    <a name="pInquire"></a>
    <div class="wrap wrap-w">
        <img style="display:none;" id="img-test" onerror="getImgError()" />
        <div class="crumbs" id="lessNone2">
            <ul>
                <?php the_crumbs(); ?>
            </ul>
        </div>
    </div>
</div>
<?php
     the_content();
     get_footer();
?>
<script src="/wp-content/themes/planttitle/assets/js/index.js"></script>
<script src="/wp-content/themes/planttitle/assets/js/common.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js"></script>

</body>
</html>