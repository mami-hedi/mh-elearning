<?php get_header(); ?>

<main class="page-content" style="padding:50px 20px; max-width:1200px; margin:0 auto;">
    <?php
    if(have_posts()):
        while(have_posts()): the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <h1><?php the_title(); ?></h1>
                <?php if(has_post_thumbnail()) : ?>
                    <div class="page-thumbnail" style="margin:20px 0;">
                        <?php the_post_thumbnail('large'); ?>
                    </div>
                <?php endif; ?>
                <div class="page-text">
                    <?php the_content(); ?>
                </div>
            </article>
        <?php endwhile;
    endif;
    ?>
</main>

<?php get_footer(); ?>
