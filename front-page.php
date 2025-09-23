<?php get_header(); ?>

<!-- ==========================
     HERO / IMAGE DE FOND
========================== -->
<section class="homepage-hero">
    <div class="hero-content">
        <h1>Bienvenue sur MH eLearning</h1>
        <p>Apprenez à votre rythme avec nos cours en ligne interactifs</p>
        <a href="#courses" class="button">Voir nos cours</a>
    </div>
</section>

<!-- ==========================
     NOS COURS
========================== -->
<section id="courses" class="homepage-courses">
    <div class="section-container">
        <h2>Nos Cours</h2>
        <?php
        $courses = new WP_Query(array(
            'post_type' => 'cours',
            'posts_per_page' => 4
        ));
        if($courses->have_posts()):
            echo '<div class="courses-grid">';
            while($courses->have_posts()): $courses->the_post(); ?>
                <div class="course-card">
                    <?php if(has_post_thumbnail()) the_post_thumbnail('medium'); ?>
                    <h3><?php the_title(); ?></h3>
                    <a href="<?php the_permalink(); ?>" class="button">Découvrir</a>
                </div>
            <?php endwhile;
            echo '</div>';
            wp_reset_postdata();
        else:
            echo '<p>Aucun cours disponible pour le moment.</p>';
        endif;
        ?>
    </div>
</section>

<!-- ==========================
     À PROPOS
========================== -->
<section id="about" class="homepage-about">
    <div class="section-container">
        <h2>À propos de MH eLearning</h2>
        <p>MH eLearning vous accompagne dans votre apprentissage en ligne avec des contenus interactifs, accessibles à tout moment et certifiés.</p>
    </div>
</section>

<!-- ==========================
     CALL TO ACTION / CONTACT
========================== -->
<section id="contact" class="homepage-cta">
    <div class="section-container">
        <h2>Contactez-nous</h2>
        <p>Vous avez des questions ou souhaitez vous inscrire ?</p>
        <a href="<?php echo get_permalink(get_page_by_path('contact')); ?>" class="button">Nous contacter</a>
    </div>
</section>

<?php get_footer(); ?>
