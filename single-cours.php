<?php get_header(); ?>

<div class="section-container single-course">

    <!-- IMAGE + TITRE -->
    <div class="course-header" style="text-align:center; margin-bottom:40px;">
        <?php if(has_post_thumbnail()): ?>
            <div class="course-thumb" style="margin-bottom:20px;">
                <?php the_post_thumbnail('large', ['style' => 'max-width:100%; border-radius:12px;']); ?>
            </div>
        <?php endif; ?>
        <h1 style="font-size:2.5rem; color:#004080; margin-bottom:15px;"><?php the_title(); ?></h1>
    </div>

    <!-- CONTENU -->
    <div class="course-content" style="font-size:1.2rem; line-height:1.8; margin-bottom:50px;">
        <?php 
            if(have_posts()):
                while(have_posts()): the_post();
                    the_content();
                endwhile;
            endif;
        ?>
    </div>

    <!-- CTA -->
    <div class="course-cta" style="text-align:center; margin-bottom:60px;">
        <a href="<?php echo get_permalink(get_page_by_path('contact')); ?>" 
           class="button" 
           style="background:#ff6600; color:#fff; padding:14px 30px; border-radius:8px; font-weight:bold; text-decoration:none;">
           S'inscrire à ce cours
        </a>
    </div>

    <!-- COURS LIÉS -->
    <div class="related-courses" style="margin-bottom:60px;">
        <h2 class="section-title">Cours liés</h2>
        <?php
        $related = new WP_Query(array(
            'post_type' => 'cours',
            'posts_per_page' => 3,
            'post__not_in' => array(get_the_ID())
        ));

        if($related->have_posts()):
            echo '<div class="courses-grid">';
            while($related->have_posts()): $related->the_post(); ?>
                <div class="course-card">
                    <?php if(has_post_thumbnail()) the_post_thumbnail('medium'); ?>
                    <h3><?php the_title(); ?></h3>
                    <a href="<?php the_permalink(); ?>" class="button">Découvrir</a>
                </div>
            <?php endwhile;
            echo '</div>';
            wp_reset_postdata();
        else:
            echo '<p>Aucun cours lié pour le moment.</p>';
        endif;
        ?>
    </div>

</div>

<?php get_footer(); ?>
