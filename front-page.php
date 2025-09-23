<?php get_header(); ?>

<main>

    <!-- Slider -->
    <?php get_template_part('template-parts/content', 'slider'); ?>

    <!-- Section Nos Cours -->
    <section class="courses-section" style="padding:50px 20px; background:#f5f5f5;">
        <h2 style="text-align:center; margin-bottom:30px;">Nos Cours</h2>
        <div class="courses-container" style="display:flex; flex-wrap:wrap; gap:20px; justify-content:center;">
            <?php
            $args = array(
                'post_type' => 'cours',
                'posts_per_page' => 6
            );
            $loop = new WP_Query($args);
            if($loop->have_posts()):
                while($loop->have_posts()): $loop->the_post(); ?>
                    <div class="course-card" style="width:300px; background:white; padding:15px; box-shadow:0 2px 5px rgba(0,0,0,0.1);">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('medium', array('style'=>'width:100%; height:auto;')); ?>
                            <h3 style="margin-top:10px;"><?php the_title(); ?></h3>
                        </a>
                        <p><?php echo wp_trim_words(get_the_content(), 20); ?></p>
                        <a href="<?php the_permalink(); ?>" style="color:#0073aa; text-decoration:none;">Voir le cours →</a>
                    </div>
                <?php endwhile;
                wp_reset_postdata();
            else: ?>
                <p>Aucun cours pour le moment.</p>
            <?php endif; ?>
        </div>
    </section>

    <!-- Section À propos -->
    <section class="about-section" style="padding:50px 20px; text-align:center;">
        <h2>À propos de MH eLearning</h2>
        <p style="max-width:700px; margin:20px auto;">
            MH eLearning vous propose des cours en ligne modernes et interactifs pour apprendre à votre rythme.
            Découvrez nos formations et commencez dès aujourd'hui à développer vos compétences.
        </p>
    </section>

</main>

<?php get_footer(); ?>
