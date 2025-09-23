<?php get_header(); ?>

<main class="single-course" style="padding:50px 20px; max-width:900px; margin:0 auto;">

    <?php
    if(have_posts()):
        while(have_posts()): the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                <!-- Titre du cours -->
                <h1 style="margin-bottom:20px; color:#0073aa;"><?php the_title(); ?></h1>

                <!-- Image à la une -->
                <?php if(has_post_thumbnail()): ?>
                    <div class="course-thumbnail" style="margin-bottom:30px;">
                        <?php the_post_thumbnail('large'); ?>
                    </div>
                <?php endif; ?>

                <!-- Contenu du cours -->
                <div class="course-content" style="line-height:1.8; font-size:16px;">
                    <?php the_content(); ?>
                </div>

                <!-- Bouton d’inscription / action -->
                <div style="margin-top:30px; text-align:center;">
                    <a href="#"
                       style="background:#0073aa; color:white; padding:12px 30px; border-radius:5px; text-decoration:none; font-weight:bold;">
                        S’inscrire à ce cours
                    </a>
                </div>

                <!-- Navigation vers les cours précédent/suivant -->
                <div class="course-navigation" style="margin-top:40px; display:flex; justify-content:space-between;">
                    <div class="prev-course"><?php previous_post_link('%link', '← Cours précédent'); ?></div>
                    <div class="next-course"><?php next_post_link('%link', 'Cours suivant →'); ?></div>
                </div>

            </article>
        <?php endwhile;
    endif;
    ?>

</main>

<?php get_footer(); ?>
