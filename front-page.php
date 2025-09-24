<?php get_header(); ?>

<!-- ==========================
     HERO SECTION (2 colonnes)
========================== -->
<section class="homepage-hero">
    <div class="section-container hero-grid">
        <!-- Texte à gauche -->
        <div class="hero-text">
            <h1><?php echo get_theme_mod('mh_hero_title', 'Bienvenue sur MH eLearning'); ?></h1>
            <p><?php echo get_theme_mod('mh_hero_subtitle', 'Apprenez à votre rythme avec nos cours en ligne interactifs'); ?></p>
            <a href="<?php echo get_theme_mod('mh_hero_cta_link', '#courses'); ?>" class="button">
                <?php echo get_theme_mod('mh_hero_cta', 'Voir nos cours'); ?>
            </a>
        </div>

        <!-- Image à droite -->
        <div class="hero-image">
            <img src="<?php echo get_theme_mod('mh_hero_background', get_template_directory_uri().'/assets/images/hero.jpg'); ?>" alt="Hero eLearning">
        </div>
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
     AVIS / TÉMOIGNAGES
========================== -->
<section id="reviews" class="homepage-reviews">
    <div class="section-container">
        <h2>Ce que disent nos étudiants</h2>
        <div class="reviews-grid">
            <div class="review">
                <p>"Excellente plateforme, j’ai appris rapidement et efficacement."</p>
                <span>- Sarah M.</span>
            </div>
            <div class="review">
                <p>"Les cours sont clairs et bien structurés, je recommande vivement !"</p>
                <span>- Karim B.</span>
            </div>
            <div class="review">
                <p>"Support réactif et formateurs compétents. Bravo MH eLearning !"</p>
                <span>- Leïla T.</span>
            </div>
        </div>
    </div>
</section>

<!-- ==========================
     À PROPOS
========================== -->
<section id="about" class="homepage-about">
    <div class="section-container about-grid">
        <!-- Image à gauche -->
        <div class="about-image">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/about.jpg" alt="À propos de MH eLearning">
        </div>
        <!-- Texte à droite -->
        <div class="about-text">
            <h2>À propos de MH eLearning</h2>
            <p>MH eLearning vous accompagne dans votre apprentissage en ligne avec des contenus interactifs, accessibles à tout moment et certifiés.</p>
        </div>

        
    </div>
</section>


<!-- ==========================
     CONTACT
========================== -->
<section id="contact" class="homepage-cta">
    <div class="section-container">
        <h2>Contactez-nous</h2>
        <p>Vous avez des questions ou souhaitez vous inscrire ?</p>
        <a href="<?php echo get_permalink(get_page_by_path('contact')); ?>" class="button">Nous contacter</a>
    </div>
</section>

<?php get_footer(); ?>
