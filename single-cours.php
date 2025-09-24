<?php get_header(); ?>

<main class="cours-single container">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <article class="cours-article">
            <h1 class="cours-title"><?php the_title(); ?></h1>

            <?php if ( has_post_thumbnail() ) : ?>
                <div class="cours-image">
                    <?php the_post_thumbnail('large'); ?>
                </div>
            <?php endif; ?>

            <div class="cours-content">
                <?php the_content(); ?>
            </div>

            <a href="<?php echo get_post_type_archive_link('cours'); ?>" class="btn-back">← Retour aux cours</a>
        </article>
    <?php endwhile; endif; ?>
</main>

<?php get_footer(); ?>
