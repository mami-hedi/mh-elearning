<?php
// Support des fonctionnalités
add_theme_support('menus');
add_theme_support('post-thumbnails');

// Enqueue scripts et styles
function mh_elearning_assets() {
    wp_enqueue_style('mh-style', get_stylesheet_uri());
    wp_enqueue_script('mh-script', get_template_directory_uri() . '/js/script.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'mh_elearning_assets');

function mh_elearning_widgets_init() {
    register_sidebar(array(
        'name'          => 'Footer Widget 1',
        'id'            => 'footer-1',
        'before_widget' => '<div class="widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
    register_sidebar(array(
        'name'          => 'Footer Widget 2',
        'id'            => 'footer-2',
        'before_widget' => '<div class="widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
    register_sidebar(array(
        'name'          => 'Footer Widget 3',
        'id'            => 'footer-3',
        'before_widget' => '<div class="widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'mh_elearning_widgets_init');


// Déclarer le CPT "Cours"
function mh_elearning_custom_post_type() {
    $labels = array(
        'name' => 'Cours',
        'singular_name' => 'Cours',
        'add_new' => 'Ajouter un cours',
        'add_new_item' => 'Ajouter un nouveau cours',
        'edit_item' => 'Modifier le cours',
        'all_items' => 'Tous les cours',
        'menu_name' => 'Cours'
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
        'menu_icon' => 'dashicons-welcome-learn-more'
    );

    register_post_type('cours', $args);
}
add_action('init', 'mh_elearning_custom_post_type');
