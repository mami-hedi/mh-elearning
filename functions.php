<?php
// ========================
//  Chargement CSS & JS
// ========================
if ( ! function_exists('mh_enqueue_assets') ) {
    function mh_enqueue_assets() {
        // CSS principal
        wp_enqueue_style(
            'mh-style',
            get_stylesheet_uri(),
            array(),
            wp_get_theme()->get('Version')
        );

        // JS principal
        wp_enqueue_script(
            'mh-script',
            get_template_directory_uri() . '/script.js',
            array('jquery'),
            wp_get_theme()->get('Version'),
            true
        );

        // JS slider
        wp_enqueue_script(
            'mh-slider',
            get_template_directory_uri() . '/slider.js',
            array('jquery'),
            wp_get_theme()->get('Version'),
            true
        );

        // JS header (hamburger)
        wp_enqueue_script(
            'mh-header',
            get_template_directory_uri() . '/header.js',
            array(),
            '1.0',
            true
        );
    }
    add_action('wp_enqueue_scripts', 'mh_enqueue_assets');
}

// ========================
//  Support du thème
// ========================
if ( ! function_exists('mh_theme_setup') ) {
    function mh_theme_setup() {
        // Support du <title>
        add_theme_support('title-tag');

        // Support images à la une
        add_theme_support('post-thumbnails');

        // Support des blocs large/full
        add_theme_support('align-wide');

        // Styles de l’éditeur
        add_theme_support('editor-styles');
        add_theme_support('wp-block-styles');

        // Embeds responsives
        add_theme_support('responsive-embeds');

        // Menus
        register_nav_menus(array(
            'primary' => __('Menu Principal', 'mh-elearning'),
        ));
    }
    add_action('after_setup_theme', 'mh_theme_setup');
}

// ========================
//  Création automatique des pages Home, About, Contact
// ========================
if ( ! function_exists('mh_setup_homepage') ) {
    function mh_setup_homepage() {
        $pages = array(
            'Home'    => 'home',
            'About'   => 'about',
            'Contact' => 'contact',
        );

        foreach ($pages as $title => $slug) {
            $check = get_page_by_path($slug);
            if (!$check) {
                wp_insert_post(array(
                    'post_title'   => $title,
                    'post_name'    => $slug,
                    'post_status'  => 'publish',
                    'post_type'    => 'page',
                    'post_content' => 'Contenu par défaut de la page ' . $title,
                ));
            }
        }
    }
    add_action('after_switch_theme', 'mh_setup_homepage');
}

// ========================
//  Custom Post Type : Cours
// ========================
if ( ! function_exists('mh_elearning_custom_post_type') ) {
    function mh_elearning_custom_post_type() {
        $labels = array(
            'name'          => 'Cours',
            'singular_name' => 'Cours',
            'add_new'       => 'Ajouter un cours',
            'add_new_item'  => 'Ajouter un nouveau cours',
            'edit_item'     => 'Modifier le cours',
            'all_items'     => 'Tous les cours',
            'menu_name'     => 'Cours',
        );

        $args = array(
            'labels'       => $labels,
    'public'       => true,
    'has_archive'  => true,                   // important pour l’archive /cours/
    'rewrite'      => array('slug' => 'cours'), // définit l’URL
    'supports'     => array('title', 'editor', 'thumbnail'),
    'menu_icon'    => 'dashicons-welcome-learn-more',
        );

        register_post_type('cours', $args);
    }
    add_action('init', 'mh_elearning_custom_post_type');
}
