<?php get_header(); ?>

<main class="single-post-content" style="padding:50px 20px; max-width:900px; margin:0 auto;">
    <?php
    if(have_posts()):
        while(have_posts()): the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <h1><?php the_title(); ?></h1>
                <p style="color:#777; font-size:14px;">Publié le <?php the_date(); ?> par <?php the_author(); ?></p>
                <?php if(has_post_thumbnail()) : ?>
                    <div class="post-thumbnail" style="margin:20px 0;">
                        <?php the_post_thumbnail('large'); ?>
                    </div>
                <?php endif; ?>
                <div class="post-text">
                    <?php the_content(); ?>
                </div>

                <!-- Navigation vers les articles précédent/suivant -->
                <div class="post-navigation" style="margin-top:40px; display:flex; justify-content:space-between;">
                    <div class="prev-post"><?php previous_post_link('%link', '← Article précédent'); ?></div>
                    <div class="next-post"><?php next_post_link('%link', 'Article suivant →'); ?></div>
                </div>
            </article>
        <?php endwhile;
    endif;
    ?>
</main>

<?php get_footer(); ?>
