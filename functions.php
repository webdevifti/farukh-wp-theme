<?php 
function themename_custom_logo_setup() {
    $defaults = array(
        'height'               => 100,
        'width'                => 100,
        'flex-height'          => true,
        'flex-width'           => true,
        'header-text'          => array( 'site-title', 'site-description' ),
        'unlink-homepage-logo' => true, 
    );
 
    add_theme_support( 'custom-logo', $defaults );
}
 
add_action( 'after_setup_theme', 'themename_custom_logo_setup' );

function farukh_theme_support(){
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    // add_theme_support('custom-backgrounds');
}
add_action('after_setup_theme','farukh_theme_support');

// Enqueue the style file
function farukh_register_styles(){
    $theme_version = wp_get_theme()->get( 'Version' );
    
    // wp_enqueue_style( 'farukh-favicon', get_template_directory_uri() . '/assets/images/favicon.png', array(), $theme_version, 'all' );
    wp_enqueue_style( 'farukh-bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), $theme_version, 'all' );
    wp_enqueue_style( 'farukh-fontawesome', get_template_directory_uri() . '/assets/css/all.min.css', array(), $theme_version, 'all' );
    wp_enqueue_style( 'farukh-slickslider', get_template_directory_uri() . '/assets/slick/slick.css', array(), $theme_version, 'all' );
    wp_enqueue_style( 'farukh-slickslidertheme', get_template_directory_uri() . '/assets/slick/slick-theme.css', array(), $theme_version, 'all' );
    wp_enqueue_style( 'farukh-style', get_stylesheet_uri(), array(), $theme_version );
}

add_action('wp_enqueue_scripts','farukh_register_styles');


// Register Scripts File
function farukh_register_scripts(){
    $theme_version = wp_get_theme()->get( 'Version' );
    wp_enqueue_script( 'farukh-jquery', get_template_directory_uri() . '/assets/js/jquery-3.6.0.min.js', array(), $theme_version, true );
    wp_enqueue_script( 'farukh-migrate', get_template_directory_uri() . '/assets/js/jquery-migrate-1.2.1.min.js', array(), $theme_version, true );
    wp_enqueue_script( 'farukh-bootsrat-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), $theme_version, true );
    wp_enqueue_script( 'farukh-slick-js', get_template_directory_uri() . '/assets/slick/slick.min.js', array(), $theme_version, true );
    wp_enqueue_script( 'farukh-main-js', get_template_directory_uri() . '/assets/js/main.js', array(), $theme_version, true );
}
add_action('wp_enqueue_scripts','farukh_register_scripts');


// Widgets Initializ
function farukh_widgets(){
    register_sidebar(    
        array(
            'name' => __('Right Sidebar', 'farukh'),
            'id' => 'sidebar1',
            'description' => 'Add a Widget To get the Sidebar Content',
            'before_widget' => '<div class="widgets">',
            'after_widget' => '</div>',
            'before_title' => ' <h3 class="widget_title">',
            'after_title' => '</h3>'
        )
    );
    // register_sidebar(    
    //     array(
    //         'name' => __('Footer Widget One', 'farukh'),
    //         'id' => 'footer_widget-1',
    //         'description' => 'Add a Widget To get the Footer Content',
    //         'before_widget' => '<div class="col-md-4">',
    //         'after_widget' => '</div>',
    //         'before_title' => '<h3>',
    //         'after_title' => '</h3>'
    //     )
    // );
}   
add_action('widgets_init','farukh_widgets');



// WP-Menu Register
function register_menus(){
    $location = array(
        'primary' => __('Main Menu','farukh')
    );
    register_nav_menus($location);
}
add_action('init','register_menus');


// Add Class into the menu li tags
// function wpse156165_menu_add_class( $classes, $item, $args ) {
//     if(isset($args->add_li_class)) {
//         $classes['class'] = $args->add_li_class;
//     }
//     if(isset($args->add_link_class)) {
//         $classes['class'] = $args->add_link_class;
//     }
//     return $classes;
// }
// add_filter( 'nav_menu_link_attributes', 'wpse156165_menu_add_class', 10, 3 );

// Adding class into the menu a Tag
// function add_additional_class_on_li($classes, $item, $args) {
//     if(isset($args->add_li_class)) {
//         $classes[] = $args->add_li_class;
//     }
//     return $classes;
// }
// add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

// Adding the custom a tags on menu
function add_last_nav_item($items){
    return $items .= '<li class="nav-item"><a class="nav-link btn-hire" href="javascript:void(0)">Hire Me</a></li>';
}
add_filter('wp_nav_menu_items','add_last_nav_item');

/**
 * Register Custom Navigation Walker
 */
function register_navwalker(){
	require_once get_template_directory() . '/template-parts/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );

function wpdocs_excerpt_more( $more ) {
    return '<br><br><a href="'.get_the_permalink().'" class="btn btn-success">Read More...</a>';
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );

function example_theme_support() {
    remove_theme_support( 'widgets-block-editor' );
}
add_action( 'after_setup_theme', 'example_theme_support' );