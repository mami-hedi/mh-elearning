<?php
// ========================
//  Support des fonctionnalités du thème
// ========================
add_theme_support('menus');
add_theme_support('post-thumbnails');
add_theme_support('align-wide'); // Pour les blocs full/large width
add_theme_support('editor-styles');
add_theme_support('wp-block-styles');
add_theme_support('responsive-embeds');

// ========================
//  Chargement CSS & JS
// ========================
function mh_enqueue_assets() {
    // CSS principal (style.css à la racine du thème)
    wp_enqueue_style(
        'mh-style',
        get_stylesheet_uri(),
        array(),
        wp_get_theme()->get('Version')
    );

    // Exemple CSS supplémentaire
    // wp_enqueue_style(
    //     'mh-custom',
    //     get_template_directory_uri() . '/assets/css/custom.css',
    //     array('mh-style'),
    //     wp_get_theme()->get('Version')
    // );

    // JS principal
    wp_enqueue_script(
        'mh-script',
        get_template_directory_uri() . '/assets/js/script.js',
        array('jquery'),
        wp_get_theme()->get('Version'),
        true
    );

    // JS slider (optionnel)
    wp_enqueue_script(
        'mh-slider',
        get_template_directory_uri() . '/assets/js/slider.js',
        array('jquery'),
        wp_get_theme()->get('Version'),
        true
    );
}
add_action('wp_enqueue_scripts', 'mh_enqueue_assets');

// ========================
//  Widgets (Footer)
// ========================
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

// ========================
//  CPT : Cours
// ========================
function mh_elearning_custom_post_type() {
    $labels = array(
        'name'          => 'Cours',
        'singular_name' => 'Cours',
        'add_new'       => 'Ajouter un cours',
        'add_new_item'  => 'Ajouter un nouveau cours',
        'edit_item'     => 'Modifier le cours',
        'all_items'     => 'Tous les cours',
        'menu_name'     => 'Cours'
    );

    $args = array(
        'labels'      => $labels,
        'public'      => true,
        'has_archive' => true,
        'supports'    => array('title', 'editor', 'thumbnail'),
        'menu_icon'   => 'dashicons-welcome-learn-more'
    );

    register_post_type('cours', $args);
}
add_action('init', 'mh_elearning_custom_post_type');

// ========================
//  Personnalisation (Customizer Hero)
// ========================
function mh_customize_register($wp_customize) {
    // Section Hero
    $wp_customize->add_section('mh_hero_section', array(
        'title'    => __('Section Hero', 'mh-elearning'),
        'priority' => 30,
    ));

    // Image de fond
    $wp_customize->add_setting('mh_hero_background', array(
        'default'           => get_template_directory_uri().'/assets/img/hero.jpg',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'mh_hero_background', array(
        'label'    => __('Image de fond', 'mh-elearning'),
        'section'  => 'mh_hero_section',
        'settings' => 'mh_hero_background',
    )));

    // Titre
    $wp_customize->add_setting('mh_hero_title', array(
        'default'           => 'Bienvenue sur MH eLearning',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('mh_hero_title', array(
        'label'    => __('Titre principal', 'mh-elearning'),
        'section'  => 'mh_hero_section',
        'type'     => 'text',
    ));

    // Sous-titre
    $wp_customize->add_setting('mh_hero_subtitle', array(
        'default'           => 'Apprenez à votre rythme avec nos cours en ligne interactifs',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('mh_hero_subtitle', array(
        'label'    => __('Sous-titre', 'mh-elearning'),
        'section'  => 'mh_hero_section',
        'type'     => 'text',
    ));

    // Texte du bouton
    $wp_customize->add_setting('mh_hero_cta', array(
        'default'           => 'Voir nos cours',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('mh_hero_cta', array(
        'label'    => __('Texte du bouton', 'mh-elearning'),
        'section'  => 'mh_hero_section',
        'type'     => 'text',
    ));

    // Lien du bouton
    $wp_customize->add_setting('mh_hero_cta_link', array(
        'default'           => '#courses',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('mh_hero_cta_link', array(
        'label'    => __('Lien du bouton', 'mh-elearning'),
        'section'  => 'mh_hero_section',
        'type'     => 'url',
    ));
}
add_action('customize_register', 'mh_customize_register');

// ========================
//  Création automatique des pages Home & Blog
// ========================
function mh_setup_homepage() {
    // Vérifie si la page existe déjà
    $home_page = get_page_by_title('Home');

    if (!$home_page) {
        // Crée la page Home
        $home_page_id = wp_insert_post(array(
            'post_title'   => 'Home',
            'post_content' => 'Bienvenue sur votre site eLearning ! Vous pouvez modifier ce contenu avec Gutenberg.',
            'post_status'  => 'publish',
            'post_type'    => 'page'
        ));
    } else {
        $home_page_id = $home_page->ID;
    }

    // Définit la page Home comme page d’accueil
    update_option('show_on_front', 'page');
    update_option('page_on_front', $home_page_id);

    // Optionnel : Crée une page "Blog"
    $blog_page = get_page_by_title('Blog');
    if (!$blog_page) {
        $blog_page_id = wp_insert_post(array(
            'post_title'   => 'Blog',
            'post_content' => '',
            'post_status'  => 'publish',
            'post_type'    => 'page'
        ));
    } else {
        $blog_page_id = $blog_page->ID;
    }

    update_option('page_for_posts', $blog_page_id);
}
add_action('after_switch_theme', 'mh_setup_homepage');
