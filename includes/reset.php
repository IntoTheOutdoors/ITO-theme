<?php
    add_action( 'wp_ajax_nopriv_reset', 'reset_ajax' );
    add_action( 'wp_ajax_reset', 'reset_ajax' );

    function reset_ajax() {
        get_template_part('template-parts/content-el', 'loop');
        die();
    }
?>