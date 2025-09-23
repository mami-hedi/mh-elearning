<?php get_header(); ?>

<main class="courses-archive" style="padding:50px 20px; max-width:1200px; margin:0 auto;">
    <h1 style="text-align:center; margin-bottom:40px; color:#0073aa;">Tous nos cours</h1>

    <div class="courses-grid" style="display:flex; flex-wrap:wrap; gap:30px; justify-content:center;">
        <?php
        if(have_posts()):
            while(have_posts()): the_post(); ?>
                <div class="course-card" style="width:300px; background:white; padding:20px; box-shadow:0 2px 10px rgba(0,0,0,0.1); border-radius:8px;">
                    <a href="<?php the_permalink(); ?>">
                        <?php if(has_post_thumbnail()): ?>
                            <div class="course-image" style="margin-bottom:15px;">
                                <?php the_post_thumbnail('medium', array('style'=>'width:100%; height:auto; border-radius:5px;')); ?>
                            </div>
                        <?php endif; ?>
                        <h3 style="margin-bottom:10px;"><?php the_title(); ?></h3>
                    </a>
                    <p style="font-size:14px; color:#555;"><?php echo wp_trim_words(get_the_content(), 20); ?></p>
                    <a href="<?php the_permalink(); ?>" style="display:inline-block; margin-top:10px; color:#0073aa; font-weight:bold;">
                        Voir le cours →
                    </a>
                </div>
            <?php endwhile;
            wp_reset_postdata();
        else: ?>
            <p style="text-align:center;">Aucun cours pour le moment.</p>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>
