<?php $idVal = get_the_id(); ?>
<!-- 分类别名 -->
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

<div id="bigBox"> 
        <!-- 遮罩層 -->
        <div class="mainFilter"></div>
        <?php get_header();?>
        <main class="container">
            <div class="banner">
                <!-- TODO 标签链接 -->
                <a href="/shops/">
                    <img class="lazyload" data-srcset="/wp-content/themes/planttitle/assets/images/banner/banner.jpg" width="100%" alt="植題橫幅圖" />
                </a>
            </div>
            <!-- <?php echo $idVal; ?>
            <?php echo $classifyVal; ?>
            <?php echo $pathVal; ?>
            <?php echo $classifyZw; ?>
            <?php echo $admin; ?>
            <?php print_r($pathVal1); ?>  -->