<?php 


function load_files() {
    wp_register_style('main', get_template_directory_uri() . '/dist/main.css', false, 'all');
    wp_enqueue_style('main');
    

}

add_action('wp_enqueue_scripts', 'load_files');
?>