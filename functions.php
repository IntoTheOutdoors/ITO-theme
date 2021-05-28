<?php 

/** LOAD FILES */
require_once(trailingslashit( get_template_directory()) . 'functions/helpers.php');

function load_files() {
    /** CSS */
    // fonts
    wp_register_style('fonts', 'https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,400;0,700;1,400;1,700&family=Roboto+Slab:wght@100;200;300;400;500;600;700;800;900&display=swap', [], false, 'all');
    // main.css
    wp_register_style('main', get_template_directory_uri() . '/dist/main.css', false, 'all');
    // bootstrap
    wp_register_style('bootstrap', get_template_directory_uri() . '/node_modules/bootstrap/scss/bootstrap.scss', [], false, 'all');
    // fontawesome
    wp_register_style('fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css', [], false, 'all');
    
    /** JAVSCRIPT */
    // popper
    wp_register_script('main', get_template_directory_uri() . '/dist/main.js', [], false, true);
    wp_register_script('bootstrap', get_template_directory_uri() . '/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js', [], false, false);



    // enqueue styles
    wp_enqueue_style('main');
    wp_enqueue_style('fonts');
    wp_enqueue_style('bootstrap');
    wp_enqueue_style('fontawesome');

    // enqueue scripts
    wp_enqueue_script('main');
    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrap');

}



function theme_setup() {

    if ( ! file_exists( get_template_directory() . '/class-wp-bootstrap-navwalker.php' ) ) {
        // File does not exist... return an error.
        return new WP_Error( 'class-wp-bootstrap-navwalker-missing', __( 'It appears the class-wp-bootstrap-navwalker.php file may be missing.', 'wp-bootstrap-navwalker' ) );
    } else {
        // File exists... require it.
        require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
    }
    

        // Register Menus
    register_nav_menus([
        'primary' => __('Primary Menu', 'ito-theme'),
        'secondary' => __('Secondary Menu', 'ito-theme')
    ]);

    add_theme_support( 'custom-logo');
    add_theme_support( 'post-thumbnails' );
}

function add_file_types_to_uploads($file_types) {
    $new_filetypes = array();
    $new_filetypes['svg'] = 'image/svg+xml';
    $file_types = array_merge($file_types, $new_filetypes );
    return $file_types;
}

add_filter('upload_mimes', 'add_file_types_to_uploads');



add_action('wp_enqueue_scripts', 'load_files');
add_action('after_setup_theme', 'theme_setup');


