<?php

add_action( 'wp_ajax_nopriv_filter', 'filter_ajax' );
add_action( 'wp_ajax_filter', 'filter_ajax' );

function filter_ajax() {
    $episode_search = $_POST['episode-search'];
    $episode_types = $_POST['episode-types'];
    $episode_category = $_POST['episode-category'];
    $episode_level = $_POST['episode-grade-level'];
    $episode_order = $_POST['episode-order'];
    
    $args = [
        'post_type' => 'segments',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'order' => 'ASC'
    ];
    
    // search bar
    if(!empty($episode_search)):
        $args['s'] = $episode_search;
    endif;

    // episode types
    if(!empty($episode_types) && empty($args['tax_query'])):
        $args['tax_query'] = [
            [
                'taxonomy' => 'episode_type',
                'field' => 'slug',
                'terms' => $episode_types
            ]
        ];
    elseif(!empty($episode_category) && !empty('tax_query')):
        array_push($args['tax_query'], 
            [
                'taxonomy' => 'episode_type',
                'field' => 'slug',
                'terms' => $episode_types
            ]
        );
    endif;

    // episode categories
    if(!empty($episode_category) && !empty($args['tax_query'])):
        array_push($args['tax_query'], 
            [
                'taxonomy' => 'video_categories',
                'field' => 'term_id',
                'terms' => $episode_category
            ]
        );
    elseif(!empty($episode_category) && empty($args['tax_query'])):
        $args['tax_query'] = [
            [
                'taxonomy' => 'video_categories',
                'field' => 'term_id',
                'terms' => $episode_category
            ]
        ];
    elseif($episode_category == "Select Category" && empty($args['tax_query'])):
        $args['tax_query'] = [
            [
                'taxonomy' => 'episode_type',
                'field' => 'slug',
                'terms' => 'full_episode'
            ]
        ];
    elseif($episode_category == "Select Category" && !empty($args['tax_query'])):
        array_push($args['tax_query'], 
            [
                'taxonomy' => 'episode_type',
                'field' => 'slug',
                'terms' => 'full_episode'
            ]
        );
    endif;


    $query = new WP_Query($args);

    if($query->have_posts()):
        while($query->have_posts()):
            $query->the_post();
            the_title(); ?>
            <br>
            <?php
        endwhile;
    else: ?>
        <div>
            <h3>No Episode found. Please search again!<h3>
        </div>
    <?php endif; wp_reset_postdata();

    die();
}
?>