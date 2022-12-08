<?php
// 特色图片方法 支持缩略图
function simple_theme_setup(){
    // Featured Image Support
    add_theme_support('post-thumbnails');

    // Menus
    register_nav_menus(array(
        'primary' => __('Primary Menu')
    ));
}



// 获取子分类方法
function get_category_root_id($cat){
    $this_category = get_category($cat); // 取得当前分类
    while($this_category->category_parent){ // 若当前分类有上级分类时，循环
        $this_category = get_category($this_category->category_parent); // 将当前分类设为上级分类（往上爬）
    }
    return $this_category->term_id; // 返回根分类的id号
}


function ludou_get_cat_postcount($id) {
    // 获取当前分类信息
    $cat = get_category($id);
 
    // 当前分类文章数
    $count = (int) $cat->count;
 
    // 获取当前分类所有子孙分类
    $tax_terms = get_terms('category', array('child_of' => $id));
 
    foreach ($tax_terms as $tax_term) {
       // 子孙分类文章数累加
       $count += $tax_term->count;
    }
    return $count;
 }


//  获得原始价格
function or_price_widget() { 
    $product = wc_get_product(get_the_ID()); 
    $disPrice = $product->get_regular_price(); 
    return $disPrice; 
}

// 获取打折后的价格
function dis_price_widget() { 
    $product = wc_get_product(get_the_ID());
    $orPrice = $product->get_price(); 
    return $orPrice;
}


add_action('after_setup_theme', 'simple_theme_setup');



// 传值获取商品不同的信息
function product_info($val) {
    foreach ( WC()->cart->get_cart() as $cart_item ) {
        $product = $cart_item['data'];
        if(!empty($product) && $product->id != 191){
            // echo $product->$val;
            echo $product->$val;
        }
    }
}
add_action('woocommerce_before_checkout_form','product_info');


/*显示文章浏览次数*/
function getPostViews($postID){
    $count = get_post_meta($postID,'views', true);
    if($count==''){
    delete_post_meta($postID,'views');
    add_post_meta($postID,'views', '0');
    return "0";
    }
    return $count.'';
    }
    function setPostViews($postID) {
    $count = get_post_meta($postID,'views', true);
    if($count==''){
    $count = 0;
    delete_post_meta($postID,'views');
    add_post_meta($postID,'views', '0');
    }else{
    $count++;
    update_post_meta($postID,'views', $count);
    }
    }

    function category_id_class($classes) {
        global $post;
        foreach((get_the_category($post->ID)) as $category);
        $classes [] = 'cat-' . $category->cat_ID . '-id';
        return $classes;
    }
        add_filter('post_class', 'category_id_class');
        add_filter('body_class', 'category_id_class');
        
        
    // 网站标题方法函数
    function show_wp_title(){
    global $page, $paged;
    wp_title( '-', true, 'right' );
    // 添加网站标题.
    bloginfo( 'name' );
    // 为首页添加网站描述.
    $site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_home() || is_front_page() ) )
    echo ' - ' . $site_description;
    // 如果有必要，在标题上显示一个页面数.
    if ( $paged >= 2 || $page >= 2 )
    echo ' - ' . sprintf( '第%s页', max( $paged, $page ) );
    }

    //保护后台登录
    function login_protection(){  
        // if($_GET['backstage'] != 'current')header('Location: http://locahost/');  
    }
    add_action('login_enqueue_scripts','login_protection');




    function lingfeng_pagenavi( $range = 4 ) {
        global $paged,$wp_query;
        if ( !$max_page ) {
            $max_page = $wp_query->max_num_pages;
        }
        if( $max_page >1 ) {
            echo "<div class='fenye'>"; 
            if( !$paged ){
                $paged = 1;
            }
            if( $paged != 1 ) {
                echo "<a href='".get_pagenum_link(1) ."' class='extend' title='跳转到首页'>首页</a>";
            }
            previous_posts_link('上一页');
            if ( $max_page >$range ) {
                if( $paged <$range ) {
                    for( $i = 1; $i <= ($range +1); $i++ ) {
                        echo "<a href='".get_pagenum_link($i) ."'";
                    if($i==$paged) echo " class='current'";echo ">$i</a>";
                    }
                }elseif($paged >= ($max_page -ceil(($range/2)))){
                    for($i = $max_page -$range;$i <= $max_page;$i++){
                        echo "<a href='".get_pagenum_link($i) ."'";
                        if($i==$paged)echo " class='current'";echo ">$i</a>";
                    }
                }elseif($paged >= $range &&$paged <($max_page -ceil(($range/2)))){
                    for($i = ($paged -ceil($range/2));$i <= ($paged +ceil(($range/2)));$i++){
                        echo "<a href='".get_pagenum_link($i) ."'";if($i==$paged) echo " class='current'";echo ">$i</a>";
                    }
                }
                }else{
                    for($i = 1;$i <= $max_page;$i++){
                        echo "<a href='".get_pagenum_link($i) ."'";
                        if($i==$paged)echo " class='current'";echo ">$i</a>";
                    }
                }
            next_posts_link('下一页');
            if($paged != $max_page){
                echo "<a href='".get_pagenum_link($max_page) ."' class='extend' title='跳转到最后一页'>尾页</a>";
            }
            echo '<span>共['.$max_page.']页</span>';
            echo "</div>\n";  
        }
    }
    
    
   
function the_crumbs() {
      if (!is_home()) {
         echo '<a class="home" title="返回首页" href="';
         echo get_settings('home');
         echo '">';
         echo '首页';
         echo "</a>";
      }
      if (is_category()) {
         echo ' &gt; ';
         echo get_category_parents( get_query_var('cat') , true , ' &gt;' );
      }
      if (is_single()) {
         echo ' &gt; ';
         echo the_category(' &gt; ', 'multiple');
         echo ' &gt; ';
         echo the_title();
      }
      if (is_page()) {
         echo ' &gt; ';
         echo the_title();
      }
   elseif (is_tag()) {echo ' &gt; ';single_tag_title();echo ' &gt; 文章 ';}
   elseif (is_day()) {echo ' &gt; ';echo"发表于"; the_time('Y年m月d日'); echo'的文章';}
   elseif (is_month()) {echo ' &gt; ';echo"发表于"; the_time('Y年m月'); echo'的文章';}
   elseif (is_year()) {echo ' &gt; ';echo"发表于"; the_time('Y年'); echo'的文章';}
   elseif (is_author()) {echo ' &gt; ';echo wp_title( ''); echo'发表的文章';}
   elseif (is_search()) {  global $wp_query;echo ' &gt; 找到 ' . $wp_query->found_posts . ' 篇';printf( __( '与 %s 相关的文章', 'Bing' ) , get_search_query() ); echo'';
   }
   elseif (is_404()) {echo ' &gt; ';echo"亲，你迷路了！"; echo'';}
} 
?>