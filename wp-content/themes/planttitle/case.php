<div class="aboutPage">
    <div class="wrap wrap-w">
    <?php
        $a=get_category_root_id($cat);
        $args=array(
            'orderby'    => 'id',
            'hide_empty' => "0",
            'child_of' => $a,//可以换为：'child_of' => '1',
        );
        $categories=get_categories($args);
        foreach($categories as $category) {
            $caPathVal = $category->slug;
        ?> 
        <!-- 区块循环开始 -->
        <div class="columnTitle" id="paddOne">
            <h1 class="tit titLetter·"><a href="<?php echo get_category_link( $category->term_id ) ?>">植題<?php echo sprintf($category->name) ?></a></h1>
            <div class="entit">CASE</div>
        </div>
        <div class="skinList">
            <ul id="paging-ul">
            <?php $count=0; ?>
            <?php $aaa = sprintf($category->name) ?>
            <?php if(have_posts()) : ?>
                <?php while(have_posts()): the_post(); ?>
                <?php
                    foreach((get_the_category()) as $category){
                        if($aaa === $category->cat_name && $count < 5){
                            $count++;
                            include('test.php');
                        }else {
                            break;
                        }
                    }
                    ?>
                <?php endwhile; ?>
                <?php else : ?>
                <?php echo wpautop('Sorry, No posts were found.'); ?>
                <?php endif; ?>
                    <li>
                        <a href="<?php print_r('/category/case/'.$caPathVal) ?>" class="morecasestyle"><div class="tit">查看更多</div></a>
                    </li>
            </ul>
        </div>
        <!-- 区块循环结束 -->
        <?php }?>
    </div>
</div>
</main>
</div>