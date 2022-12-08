<?php $idVal = get_the_id(); ?>
<?php
if(is_category()) {
    $cat = get_query_var('cat');
    $yourcat = get_category($cat);
    $classifyVal = $yourcat->slug;
    }
?>
<!-- 网址路径 -->
<?php 
    $url=$_SERVER["REQUEST_URI"];
    $urll = dirname($url);
    $pathVal = explode('/',$urll)[2];
    $pathVal1 = explode('/',$urll);
?>
<!-- 当前分类名 -->
<?php foreach((get_the_category()) as $category) {
    $classifyZw = $category->cat_name;
} ?>
<!-- 作者 -->
<?php
    $admin = get_the_author_meta( 'display_name', $post->post_author );
?>
<header class="header" id="hTop">
    <div class="nav phoneNav">
        <div class="tit">MENU</div>
        <ul>
                <li>
                    <a href="/">首&nbsp;&nbsp;&nbsp;頁</a>
                </li>
                <li>
                    <a href="/shops/">明星產品</a>
                    <div class="sub">
                        <ul>
                            <li>
                                <a href="/shops/#skinwhite">美白系列</a>
                            </li>
                            <li>
                                <a href="/shops/#skincare">護膚系列</a>
                            </li>
                            <li>
                                <a href="/shops/#mask">面膜系列</a>
                            </li>
                            <li>
                                <a href="/shops/#repair">修護系列</a>
                            </li>
                            <li>
                                <a href="/shops/#clean">清潔系列</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="/about/" rel="nofollow">走進植題</a>
                </li>
                <li>
                    <a href="/custom/" rel="nofollow">量膚定制</a>
                </li>
                <li>
                    <a href="/category/news/">美容資訊</a>
                </li>
                <li>
                    <a href="/category/case/">案例專題</a>
                    <div class="sub">
                            <ul>
                                <li><a href="/category/case/sport/">祛斑案例</a></li>
                                <li><a href="/category/case/white/">美白案例</a></li>
                            </ul>
                    </div>
                </li>
                <li>
                    <a href="/service/" rel="nofollow">服務中心</a>
                </li>
                <li>
                    <a href="/order">訂單查詢</a>
                </li>
            </ul>
    </div>
    <div class="wrap wrap-w headroom" id="cancel">
        <div class="logo">
            <a href="/"><img class="lazyload" data-srcset="/wp-content/themes/planttitle/assets/images/websiteImg/logo.png" alt="植題官方網站" title="植題官方網站"></a>
        </div>
        <div class="nav nav1 pcNav">
            <div class="tit">MENU</div>
            <div style="position:relative">
            <ul id="headUl">
            <li> 
                <a href="/">首&nbsp;&nbsp;&nbsp;頁</a>
                </li> 
                <?php if($idVal == 418 || $pathVal == 'product' || $idVal == 256 || $pathVal1[1] == 'product') {
                    echo '<li class="navmenuActive">';
                } else {
                    echo '<li>';
                } ?>
                     <a href="/shops/">明星產品</a>
                    <div class="sub">
                        <ul id="subUl" class="mxdp">
                        <li>
                                <a href="/shops/#skinwhite">美白系列</a>
                            </li>
                            <li>
                                <a href="/shops/#skincare">護膚系列</a>
                            </li>
                            <li>
                                <a href="/shops/#mask">面膜系列</a>
                            </li>
                            <li>
                                <a href="/shops/#repair">修護系列</a>
                            </li>
                            <li>
                                <a href="/shops/#clean">清潔系列</a>
                            </li>
                        </ul>
                    </div>
                </li> 

                <?php
                    if($idVal == 74) {
                        echo '<li class="navmenuActive">';
                    } else {
                        echo '<li>';
                    }
                ?>
                    <a href="/about/" rel="nofollow">走進植題</a>
                </li>
                <?php
                    if($idVal == 83) {
                        echo '<li class="navmenuActive">';
                    } else {
                        echo '<li>';
                    }
                ?>
                    <a href="/custom/" rel="nofollow">量膚定制</a>
                </li>
                <?php
                    if($classifyZw == '美容資訊' || $classifyVal == 'news') {
                        echo '<li class="navmenuActive">';
                    } else {
                        echo '<li>';
                    }
                ?>
                    <a href="/category/news/">美容資訊</a>
                </li>
                <?php
                    if($classifyVal == 'case' || $classifyZw == '祛斑案例' || $classifyZw == '美白案例') {
                        echo '<li class="navmenuActive">';
                    } else {
                        echo '<li>';
                    }
                ?>
                    <a href="/category/case/">案例專題</a>
                    <div class="sub">
                            <ul id="subUl" class="alxt">
                                <li><a href="/category/case/sport/">祛斑案例</a></li>
                                <li><a href="/category/case/white/">美白案例</a></li>
                            </ul>
                    </div>
                </li>
                <?php 
                    if($idVal == 104) {
                        echo '<li class="navmenuActive">';
                    } else {
                        echo '<li>';
                    }
                ?>
                    <a href="/service" rel="nofollow">服務中心</a>
                </li>
                <?php
                    if($idVal == 1062){
                        echo '<li class="navmenuActive">';
                    } else{
                        echo "<li>";
                    }
                ?>
                    <a href="/order">訂單查詢</a>
                </li>
            </ul>
            <div class="backHelp"></div>
            </div>
           
        </div>
        <div class="menuBtn"><span class="line1"></span><span class="line2"></span><span class="line3"></span>
        </div>
    </div>
</header>
<!-- <?php echo $idVal; ?>
<?php echo $classifyVal; ?>
<?php echo $pathVal; ?>
<?php echo $classifyZw; ?>
<?php echo $admin; ?>
<?php print_r($pathVal1); ?> -->
<script>
// 節流  點擊按鈕彈出nav菜單
var isClick = true;
$("header .menuBtn").on('click', function(e) {
    if (isClick) {
        isClick = false;
        $("#bigBox").toggleClass("shiftLeft");
        $(".mainFilter").fadeToggle(); // 淡入和淡出的切換
        $('.logo').toggle('');
        $('html').toggleClass('posi')
            //定時器
        setTimeout(function() {
            isClick = true;
        }, 500); //0.5秒內不能重複點擊
    }
})

var inClick = true
$(".mainFilter").on('click', function() {
    if (isClick) {
        isClick = false;
        $("#bigBox").removeClass("shiftLeft");
        $(".mainFilter").fadeToggle();
        $('html').toggleClass('posi')
        $('.logo').toggle('');
        //定時器
        setTimeout(function() {
            isClick = true;
        }, 500); //0.5秒內不能重複點擊
    }
})
</script>