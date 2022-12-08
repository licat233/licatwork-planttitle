        <div class="columnMenu">
            <div class="wrap wrap-w">
                <div class="crumbs" id="lessNone2">
                    <ul>
                        <?php the_crumbs(); ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="matterBox">
            <div class="surface">
                <div class="surfaceBody">
                    <h1 class="surfaceBodyTitle"><?php the_title() ?></h1>
                    <!-- 閱讀量 點讚數 -->
                    <div class="readGiveIfy">
        
                        <!-- 發布時間 -->
                        <div class="ifyTime">
                            <i class="ifyTimeList">發佈時間：</i>
                            <span><?php the_time('Y年Fj日') ?></span>
                        </div>
        
                        <!-- 作者 -->
                        <div class="read">
                            <i class="readList">作者：</i>
                            <span><?php echo get_the_author_meta( 'display_name', $post->post_author ) ?></span>
                        </div>
        
                        <!-- 瀏覽量 -->
                        <div class="give">
                            <i class="giveList">閱讀量：</i>
                            <span><?php setPostViews(get_the_ID()); echo number_format(getPostViews(get_the_ID())); ?></span>
                        </div>
                    </div>
                </div>
                <!-- 圖片配文字形式 -->
                <?php the_content() ?>
        
                <!-- 上一篇 下一篇 -->
                <div class="previousPage">
                    <!-- 上一篇 -->
                    <div class="nextPage">
                        <p class="nextPage-p">上一篇：<?php next_post_link(); ?></p>
                    </div>
                    <!-- 下一篇 -->
                    <div class="downPage">
                        <p class="downPage-p">下一篇：<?php previous_post_link() ?></p>
                    </div>
                </div>
            </div>
            <div class="trademark">
                <!-- LINE號 -->
                <div class="addLine">
                    <img class="addLineImg1 lazyload" data-srcset="/wp-content/themes/planttitle/assets/images/websiteImg/good.jpg" alt="Anna老師" />
                    <h2 class="addLineh1">植題官方資深保養專家 - Anna老師</h2>
                    <div class="addLineImg2">
                        <img class="lazyload" data-srcset="/wp-content/themes/planttitle/assets/images/websiteImg/reweima2.png" alt="官方LINE號二維碼" />
                        <p>掃碼關注官方LINE</p>
                    </div>
                </div>
                <!-- 熱門推薦 -->
                <div class="hotBox">
                    <h2>熱門文章</h2>
                    <ul>
        
        
        
                    <?php 
                        $postslist = get_posts('numberposts=10&order=ASC&orderby=title');
                        $count = 0;
                        foreach($postslist as $post):
                            $count++;
                        setup_postdata($post);?>
                        <div>
                            <li>
                            <p><?php echo $count ?></p><a href="<?php the_permalink(); ?>"><?php the_title()
                             ?></a>
                        </li>
                        </div>
                    <?php endforeach;?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div> 