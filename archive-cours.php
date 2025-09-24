<?php get_header(); ?>

<main class="cours-archive">
    <div class="container">
        <h1 class="archive-title">Nos Cours</h1>

        <?php if ( have_posts() ) : ?>
            <div class="cours-grid">
                <?php while ( have_posts() ) : the_post(); ?>
                    <div class="cours-item">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('medium', ['class' => 'cours-thumb']); ?>
                            </a>
                        <?php endif; ?>
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <p><?php echo wp_trim_words(get_the_content(), 20); ?></p>
                        <a href="<?php the_permalink(); ?>" class="btn-readmore">Voir le cours</a>
                    </div>
                <?php endwhile; ?>
            </div>

            <!-- Pagination -->
            <div class="pagination">
                <?php
                echo paginate_links(array(
                    'prev_text' => '« Précédent',
                    'next_text' => 'Suivant »'
                ));
                ?>
            </div>

        <?php else : ?>
            <p>Aucun cours trouvé.</p>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>
