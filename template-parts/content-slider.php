<div class="slider">
    <?php
    $args = array('post_type'=>'cours', 'posts_per_page'=>5);
    $loop = new WP_Query($args);
    if($loop->have_posts()):
        while($loop->have_posts()): $loop->the_post(); ?>
            <div class="slide">
                <?php the_post_thumbnail('large'); ?>
                <h2><?php the_title(); ?></h2>
            </div>
        <?php endwhile;
        wp_reset_postdata();
    endif;
    ?>
</div>
