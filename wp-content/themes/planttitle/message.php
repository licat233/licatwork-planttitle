<div class="aboutPage"> 
    <div class="wrap wrap-w">
        <div class="columnTitle">
            <h1 class="tit"><?php single_cat_title(); ?></h1>
            <div class="entit">BEAUTIFUL DIARY</div>
        </div>
        <br><br>
        <article class="newsList" style="width: 100%;">
            <ul class="newsListBeauty">
                <?php $count=0; ?>
                <?php if(have_posts()) : ?>
                <?php while(have_posts() && $count<6): the_post(); ?>
                <?php $count++; ?>
                    <li>
                        <a href="<?php the_permalink(); ?>">
                            <div class="pic caseimgbox"><img class="lazyload" width="100%" height="100%" alt="<?php the_title() ?>" data-srcset="<?php the_post_thumbnail('full'); ?>"></div>
                            <div class="tit">
                                <p><?php the_title() ?></p>
                            </div>
                            <div class="date" id="dateIconContent">
                                <span class="time">
                                    <i class="time-icon iconfont icon-timeclock"></i>
                                    <span><?php the_time('Y年Fj日') ?></span>
                                </span>
                                <span class="eye-icon"> 瀏覽量: <span><?php setPostViews(get_the_ID()); echo number_format(getPostViews(get_the_ID())); ?></span></span>
                                <span class="author">
                                    <i class="author-icon iconfont icon-zuozhe"></i>
                                    <span><?php the_author() ?></span>
                                </span>
                            </div>
                        </a>
                    </li>
                <?php endwhile; ?>
                <?php else : ?>
                <?php echo wpautop('Sorry, No posts were found.'); ?>
                <?php endif; ?>
                </ul>
                    <div class="mainPage">
                        <ul>
                            <?php lingfeng_pagenavi();?> 
                        </ul>
                    </div>
                </article>
            </div>
        </div>
    </main>
    </div>