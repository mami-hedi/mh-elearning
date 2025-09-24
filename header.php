<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header id="masthead" class="site-header">
    <div class="header-container">
        
        <!-- Logo -->
        <div class="site-branding">
            <h1 class="site-title">
                <a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
            </h1>
        </div>

        <!-- Bouton Hamburger -->
        <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
            ☰
        </button>

        <!-- Menu -->
        <nav id="site-navigation" class="main-navigation">
            <?php 
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'menu_id'        => 'primary-menu',
                'container'      => false,
                'menu_class'     => 'menu',
            )); 
            ?>
        </nav>

        <!-- Bouton S'inscrire -->
        <div class="header-cta">
            <a href="<?php echo esc_url(home_url('/inscription')); ?>" class="btn-inscrire">S'inscrire</a>
        </div>

    </div>
</header>
