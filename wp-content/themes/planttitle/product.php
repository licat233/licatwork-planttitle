<?php
    $product=get_product(get_the_id());
?> 
<div class="columnMenu">
    <div class="wrap wrap-w">
        <div class="crumbs" id="lessNone2">
            <ul>
                <a class="home" title="返回首頁" href="/">首頁</a> &gt; <a href="/shops/">明星產品</a> &gt; <a><?php the_title() ?></a>
            </ul>
        </div>
    </div>
</div>
<div class="aboutPage">
                <div class="wrap wrap-w"> 
                    <div class="columnTitle" id="padCancel">
                        <h1 class="tit titLetter"><?php the_title() ?></h1>
                        <div class="entit">single product introduction</div>
                    </div>
                    <div class="productDetails">
                        <div class="row">
                            <div class="albumBox">
                                <div class="swiper-container gallery-top">
                                    <div class="swiperList">
                                        <div class="list">
                                            <img class="lazyload" alt="<?php the_title() ?>" width="60%" data-srcset="<?php $full_image_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
                                                echo $full_image_url[0]; ?>"
                                                alt="">
                                            </div>
                                    </div>
                                </div>

                                <div class="swiper-container gallery-thumbs">
                                    <div class="swiperList">
                                        <div class="list">
                                        <img alt="<?php the_title() ?>的縮略圖" width="60%" class="lazyload" data-srcset="<?php $full_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');echo $full_image_url[0]; ?>">
                                    </div>  
                                    </div>
                                </div>
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                            <article class="information"> 
                                <div class="text">
                                    <p class="delAllp">凈含量：<?php
                                        $weight = $product->get_attribute('weight');
                                        echo $weight;
                                    ?>
                                    </p>
                                    <p class="delAllp">品牌：PLANTTITLE</p>
                                    <p class="delAllp">庫存：<?php
                                        $stock = $product->stock_status;
                                        if($stock == "instock"){
                                            echo "尚有庫存";
                                        }elseif($stock == "outofstock"){
                                            echo "已售完";
                                        }elseif($stock == "onbackorder"){
                                            echo "延期交貨";
                                        }else{
                                            echo "未知";
                                        }
                                    ?></p>
                                    <p class="delAllp">功效：<?php
                                        $effect = $product->get_attribute('effect');
                                        echo $effect;
                                    ?></p>
                                    
                                    <div class="priceAndcount pbackC">
                                         <p class="pbackN">
                                             <span id="unitPro">商品單價：</span><br />
                                             <span> NT$ <?php echo $product->price?number_format($product->price,2):0 ?></span>
                                             <small style="text-decoration: line-through;color:grey;font-size: 14px;"><?php echo $product->regular_price?number_format($product->regular_price,2):0 ?></small>
                                         </p>
                                         <div class="calc">
                                             <div id="calc-left"><i class="iconfont icon-jianqu"></i></div>
                                             <div id="center"><input type="text" value="1" class="countValue" readonly="readonly"></div>
                                         <div id="calc-right"><i class="iconfont icon-21"></i></div>
                                         </div>
                                    </div>
                                    <p class="pwhite">&nbsp;</p>
                                    <div class="addAndPurchase">
                                        <?php 
                                        if($stock == "outofstock"){
                                            echo "<div class=outofstock style='width:200px;background: #4dad63;border-radius:5px;text-align:center;padding:10px 0;'><h3 style='font-size:24px;color: #fff;text-align:center;'>已售完</h3></div>";
                                        }else{
                                            echo "<div class='btnBuy BuyAc' data-id=".get_the_id().">
                                            <i class='btnBuyIcon iconfont icon-goumaishangpin'></i>
                                            <a>購買</a>
                                        </div>
                                        <div class='stylesubmitbtn additionCar' data-id=".get_the_id().">
                                            <i class='btnBuyIcon iconfont icon-gouwucheman'></i>
                                            <a>加入購物車</a>
                                        </div>";
                                        }
                                         ?>
                                        
                                    </div>
                                </div>
                            </article>
                        </div>
                        <article class="details">
                             <div>
                                 <div class="top"><span class="detailImg glide">產品詳情</span></div>    
                             </div>
                            <div class="article">
                                <?php the_content() ?>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
            <script src="/wp-content/themes/planttitle/assets/js/shop.js"></script>