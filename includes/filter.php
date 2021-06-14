<?php

add_action( 'wp_ajax_nopriv_filter', 'filter_ajax' );
add_action( 'wp_ajax_filter', 'filter_ajax' );


function filter_ajax() {
    $episode_search = $_POST['episode-search'];
    $episode_types = $_POST['episode-types'];
    $episode_category = $_POST['episode-category'];
    $episode_level = $_POST['episode-grade-level'];

    $args = [
        'post_type' => ['topics'],
        'post_status' => 'publish',
        'posts_per_page' => -1,
    ];

    // search bar
    if(!empty($episode_search)):
        $args['s'] = $episode_search;
    endif;

    if(!empty($episode_types)):
        $args['meta_query'] = [
            [
                'key' => $episode_types,
            ]
        ];
    endif;

     // episode categories
     if(!empty($episode_category) && !empty($args['tax_query'])):
        array_push($args['tax_query'], 
            [
                'taxonomy' => 'topic_categories',
                'field' => 'term_id',
                'terms' => $episode_category
            ]
        );
    elseif(!empty($episode_category) && empty($args['tax_query'])):
        $args['tax_query'] = [
            [
                'taxonomy' => 'topic_categories',
                'field' => 'term_id',
                'terms' => $episode_category
            ]
        ];
    endif;

    // GRADE LEVEL
    if(!empty($episode_level)):
        if(!empty($args['tax_query'])):
            array_push($args['tax_query'], 
                [
                    [
                        'taxonomy' => 'grade_level',
                        'field' => 'term_id',
                        'terms' => $episode_level
                    ]
                ]
            );
        else:
            $args['tax_query'] = [
                [
                    'taxonomy' => 'grade_level',
                    'field' => 'term_id',
                    'terms' => $episode_level
                ]
            ];
        endif;
    endif;

    $query = new WP_Query($args);

    if($query->have_posts()):
        while($query->have_posts()): $query->the_post();
            // query episode post types (Full episode / Curriculum Episode)
            if(!empty($episode_types)):
                $episodes = get_field($episode_types);
                foreach($episodes as $episode):
                    echo get_the_title( $episode->ID );
                    echo get_the_post_thumbnail($episode->ID);
                    ?><br><?php
                endforeach;
            else:
                $full_episodes = get_field('full_episode');
                foreach($full_episodes as $full_episode):
                    echo get_the_title($full_episode->ID);
                    echo get_the_post_thumbnail($full_episode->ID);
                    ?><br><?php
                endforeach;
            endif;
        endwhile; wp_reset_query();
    else: ?>
        <h3>Sorry, we couldn't find any results. </h3>
    <?php endif;

    die();
}