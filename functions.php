<?php 

/** LOAD FILES */
require_once(trailingslashit( get_template_directory()) . 'functions/helpers.php');

// ajax files
require_once('includes/filter.php');
require_once('includes/reset.php');
require_once('includes/broadcast.php');

function load_files() {
    /** CSS */
    // fonts
    wp_register_style('fonts', 'https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,400;0,700;1,400;1,700&family=Roboto+Slab:wght@100;200;300;400;500;600;700;800;900&display=swap', [], false, 'all');
    // main.css
    wp_register_style('main', get_template_directory_uri() . '/dist/main.css', false, 'all');
    
    // fontawesome
    wp_register_style('fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css', [], false, 'all');
    
    /** JAVSCRIPT */
    wp_register_script('main', get_template_directory_uri() . '/dist/main.js', [], false, true);
    wp_register_script('popper', 'https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js', [], false, true);
    wp_register_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js', [], false, true);
    // wp_register_script('bootstrap', get_template_directory_uri() . '/node_modules/bootstrap/dist/js/bootstrap.min.js', ['jquery'], false, true);

    


    // enqueue styles
    wp_enqueue_style('main');
    wp_enqueue_style('fonts');
    wp_enqueue_style('bootstrap');
    wp_enqueue_style('fontawesome');

    // enqueue scripts
    wp_enqueue_script('jquery');
    wp_enqueue_script('popper');
    wp_enqueue_script('bootstrap');
    wp_enqueue_script('ajax', get_template_directory_uri() . '/dist/main.js', array('jquery'), NULL, true);
    wp_enqueue_script('main');

    // localize script
    wp_localize_script('ajax' , 'wpAjax', 
		array('ajaxUrl' => admin_url('admin-ajax.php'))
	);

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

// uploading files in SVG format
function add_file_types_to_uploads($file_types) {
    $new_filetypes = array();
    $new_filetypes['svg'] = 'image/svg+xml';
    $file_types = array_merge($file_types, $new_filetypes );
    return $file_types;
}

add_filter('upload_mimes', 'add_file_types_to_uploads');


add_action('wp_enqueue_scripts', 'load_files');
add_action('after_setup_theme', 'theme_setup');


// 
