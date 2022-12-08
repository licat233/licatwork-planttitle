<div class="columnMenu">
    <div class="wrap wrap-w">
        <div class="crumbs" id="lessNone2">
            <ul>
                <?php the_crumbs(); ?>
            </ul>
        </div>
    </div>
</div>
<article class="aboutPage" style="padding: 0 8px;box-sizing: border-box;">
    <div class="wrap wrap-w">
        <div class="columnTitle" id="cancelPadMar">
            <h1 class="tit titLetter">明星產品</h1>
            <div class="entit">PRODUCT</div>
        </div>
        <div class="productList">
        <ul>
<?php 
    $get_parent_cats = array(
        'parent' => '0', //get top level categories only
        'taxonomy'=>'product_cat',
        'hide_empty' => false
    ); 

    $all_categories = get_categories( $get_parent_cats );//get parent categories 

    
    foreach( $all_categories as $single_category ){
        if($single_category->name != 'Uncategorized') {
            //for each category, get the ID
        $catID = $single_category->cat_ID;
 
        echo '<li><h2 class="productList-h1"><a href="/shops/#'. $single_category->category_nicename .'" name="'. $single_category->category_nicename .'">' . $single_category->name . '</a></h2>
        <div class="comAll item1">';   //category name & link
        
        $get_children_cats = array(
            'child_of' => $catID, //get children of this parent using the catID variable from earlier
            'taxonomy'=>'product_cat',
            'hide_empty' => false
        );
        wp_reset_postdata();
        $child_cats = get_categories( $get_children_cats );//get children of parent category
        if(count($child_cats)>0){
 
            echo '<ul class="children">';
                foreach( $child_cats as $child_cat ){
                    //for each child category, get the ID
                    $childID = $child_cat->cat_ID;
 
                    //for each child category, give us the link and name
                    echo '<a href=" ' . get_category_link( $childID ) . ' ">' . $child_cat->name . '</a>';
                    wp_reset_postdata();
                    $args = array(
                            'post_type' => 'product',
                            'posts_per_page' => -1,
                            'tax_query' => array(
                                    array(
                                    'taxonomy' => 'product_cat',
                                    'field' => 'id',
                                    'terms' => $childID,
                                    ),
                            ),
                    );
 
                    $loop = new WP_Query($args);
                    echo "<ul>";
                    if($loop->have_posts()) {
                        while ( $loop->have_posts() ) {
                        $loop->the_post();
                        // do something
                        echo "<li><a href=".get_the_permalink()."> Product Name : ".get_the_title()."</a></li>";
                        }
                    }
                    echo "</ul>";
                }
            echo '</ul></li>';
        }else{
            //$catID
            wp_reset_postdata();
            $args = array(
                'post_type' => 'product',
                'posts_per_page' => -1,
                'tax_query' => array(
                array(
                    'taxonomy' => 'product_cat',
                    'field' => 'id',
                    'terms' => $catID,
                ),
            ),
         );
 
         $loop = new WP_Query($args);
        if($loop->have_posts()) {
            while ( $loop->have_posts() ) { 
            $loop->the_post();
            $out = $product->stock_status == "outofstock";
            $showOut = $out?"block":"none";
            $showBuy = $out?"none":"block";
            echo '
                            <div class="list mediaWidth animate__animated" data-id="'. get_the_id() .'">
                                <div class="andise">
                                    <div class="addinForm" data-id="'. get_the_id() .'"><a>成功加入購物車</a></div>
                                    <a href='. get_the_permalink() .'>
                                        <div class="pic caseimgbox">
                                            <img class="lazyload" alt="'. get_the_title() .'" data-srcset="'. woocommerce_get_product_thumbnail() .'" title="" style="display: inline;">
                                        </div>
                                        <h3 class="tit"><i class="iconfont icon-yezi-1"></i><?php the_content(); ?>'.get_the_title().'</h3>
                                        <div class="txt">'. $effect = $product->get_attribute( 'effect' );
                                        echo $effect.'</div>
                                    </a>
                                    <div class="bottom">
                                        <br>
                                        <div class="price">NT$ '. number_format(dis_price_widget(),2) .'<i></i>
                                            <span>原價 NT$ '. number_format(or_price_widget(),2) .'</span></div>
                                    </div>
                                    <div class="push">
                                    <div class=outofstock style="display: '.$showOut.';width:100px;height:28px;background: #376044;border-radius:5px;text-align:center;padding:2px;"><h3 style="font-size:14px;line-height:28px;color: #fff;text-align:center;">已售完</h3></div>
                                    <div class="btn popup" style="display: '.$showBuy.'">
                                    <a href="javascript:void(0)" data-id="'. get_the_id() .'" class="BuyAc animate__animated">
                                        立即購買
                                    </a>
                                    </div>
                                    <div class="btn popleft" style="display: '.$showBuy.'">
                                    <a href="javascript:void(0)" data-id="'. get_the_id() .'" class="animate__animated addCar">
                                       加入購物車
                                    </a>
                                    </div>
                                    </div>
                                </div>
                            </div>
            ';
            }
        }
        }
        }else {
            continue;
        }
        '</div>';
    } //end of categories logic ?>
    </div>
    </div>
</article>
</main>
</div>