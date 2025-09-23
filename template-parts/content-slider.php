<div class="slider">
    <?php
    // Ici on récupère les "slides" via un custom post type ou des pages / articles avec catégorie "slider"
    $slides = new WP_Query(array(
        'post_type' => 'post',   // ou 'slide' si tu crées un CPT
        'category_name' => 'slider', // catégorie "slider"
        'posts_per_page' => 5
    ));
    if($slides->have_posts()):
    ?>
        <?php while($slides->have_posts()): $slides->the_post(); ?>
            <div class="slide">
                <?php if(has_post_thumbnail()): ?>
                    <?php the_post_thumbnail('large'); ?>
                <?php endif; ?>
                <h2><?php the_title(); ?></h2>
            </div>
        <?php endwhile; wp_reset_postdata(); ?>
    <?php endif; ?>
</div>
