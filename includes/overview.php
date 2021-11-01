<?php
add_action( 'wp_ajax_nopriv_overview', 'overview_ajax' );
add_action( 'wp_ajax_overview', 'overview_ajax' );

function overview_ajax() {
    $video_id = $_POST['video_id'];

    $curriculum_post = apply_filters('the_content', get_the_content( null, true, $video_id));
    echo $curriculum_post;
    die();
}
?>