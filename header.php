<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header id="masthead" class="site-header">
    <div class="header-container" style="display:flex; justify-content:space-between; align-items:center; padding:20px 40px;">
        
        <!-- Logo / Titre -->
        <div class="site-branding">
            <h1 class="site-title">
                <a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>
            </h1>
            <!-- <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="<?php bloginfo('name'); ?>"> -->
        </div>

        <!-- Menu -->
        <nav id="site-navigation" class="main-navigation">
            <?php 
            wp_nav_menu(array(
                'theme_location' => 'main-menu',
                'menu_id'        => 'primary-menu',
                'container'      => false,
                'menu_class'     => 'menu-horizontal', // ajouter une classe pour le style
            )); 
            ?>
        </nav>

    </div>
</header>

<?php 
if(is_front_page()) {
    get_template_part('template-parts/content', 'slider');
} 
?>
