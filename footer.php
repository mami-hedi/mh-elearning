<footer id="colophon" class="site-footer" role="contentinfo">
    <div class="footer-widgets" style="display:flex; flex-wrap:wrap; justify-content:space-between; padding:40px 20px; background:#1a1a1a; color:white;">
        
        <!-- Widget 1 -->
        <div class="footer-widget" style="flex:1; min-width:200px; margin:10px;">
            <?php if(is_active_sidebar('footer-1')) {
                dynamic_sidebar('footer-1');
            } else { ?>
                <h3>À propos</h3>
                <p>MH eLearning propose des cours en ligne interactifs pour développer vos compétences.</p>
            <?php } ?>
        </div>

        <!-- Widget 2 -->
        <div class="footer-widget" style="flex:1; min-width:200px; margin:10px;">
            <?php if(is_active_sidebar('footer-2')) {
                dynamic_sidebar('footer-2');
            } else { ?>
                <h3>Liens utiles</h3>
                <ul style="list-style:none; padding:0;">
                    <li><a href="<?php echo home_url(); ?>" style="color:white;">Accueil</a></li>
                    <li><a href="<?php echo get_permalink(get_page_by_path('cours')); ?>" style="color:white;">Nos Cours</a></li>
                    <li><a href="<?php echo get_permalink(get_page_by_path('contact')); ?>" style="color:white;">Contact</a></li>
                </ul>
            <?php } ?>
        </div>

        <!-- Widget 3 -->
        <div class="footer-widget" style="flex:1; min-width:200px; margin:10px;">
            <?php if(is_active_sidebar('footer-3')) {
                dynamic_sidebar('footer-3');
            } else { ?>
                <h3>Contact</h3>
                <p>Email : contact@mh-elearning.com</p>
                <p>Téléphone : +216 58 146 177</p>
            <?php } ?>
        </div>

    </div>

    <div class="site-info" style="text-align:center; padding:20px; background:#111; color:white;">
        &copy; <?php echo date('Y'); ?> MH eLearning - Tous droits réservés
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
