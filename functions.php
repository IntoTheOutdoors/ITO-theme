<?php 


function load_files() {
    /** CSS */
    // fonts
    wp_register_style('fonts', 'https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,400;0,700;1,400;1,700&family=Roboto+Slab:wght@100;200;300;400;500;600;700;800;900&display=swap', [], false, 'all');
    // main.css
    wp_register_style('main', get_template_directory_uri() . '/dist/main.css', false, 'all');
    // bootstrap
    wp_register_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css', [], false, 'all');
    
    /** JAVSCRIPT */
    // popper
    wp_register_script('main', get_template_directory_uri() . '/dist/main.js', [], false, true);
    wp_register_script('popper', 'https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js', [], false, true);
    wp_register_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js', ['jquery', 'popper'], false, true);


    // enqueue styles
    wp_enqueue_style('main');
    wp_enqueue_style('fonts');
    wp_enqueue_style('bootstrap');

    // enqueue scripts
    wp_enqueue_script('main');
    wp_enqueue_script('jquery');
    wp_enqueue_script('popper');
    wp_enqueue_script('bootstrap');
    

}

add_action('wp_enqueue_scripts', 'load_files');
?>