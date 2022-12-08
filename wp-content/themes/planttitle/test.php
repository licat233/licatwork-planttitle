<li>
    <a href="<?php the_permalink() ?>">
        <div class="pic caseimgbox"><img class="lazyload" alt="列表文章图" data-srcset="<?php the_post_thumbnail('full'); ?>" />
        </div>
        <div class="tit"><?php the_title(); ?></div>
        <div class="txt">
        <?php
            if (has_excerpt()) {
                echo $description = get_the_excerpt(); // 文章編輯中的摘要
            }else {
                echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 170,"……");
            }
        ?>
    </div>
    </a>
</li>