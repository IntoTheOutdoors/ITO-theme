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

    $query = new WP_Query($args); ?>

    <!-- <h3 class="results-header">Results</h3> -->
    <div class="results-filter">
    <?php 
    if($query->have_posts()):
        while($query->have_posts()): $query->the_post();
            // query episode post types (Full episode / Curriculum Episode)
            if(!empty($episode_types) && $episode_types == "curriculum_videos"):
                $episodes = get_field($episode_types); ?>
                
                <?php
                foreach($episodes as $episode):
                    ?>
                    <div class="results-filter-item card shadow">
                        <a href="<?php the_permalink($episode->ID); ?>">
                        <img src="<?php echo get_the_post_thumbnail_url($episode->ID); ?>" class="card-img-top"/>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo get_the_title($episode->ID);?></h5>
                        </div>
                        </a>
                    </div>
                    <?php
                endforeach; ?>
                <?php
            else:
                $full_episodes = get_field('full_episode');
                foreach($full_episodes as $full_episode): ?>
                    <div class="results-filter-item card shadow">
                        <a href="<?php the_permalink(); ?>">
                        <img src="<?php echo get_the_post_thumbnail_url($full_episode->ID); ?>" class="card-img-top"/>
                        <div class="card-body">
                            <h5 class="card-title"><?php the_title();?></h5>
                        </div>
                        </a>
                    </div>
                    <?php
                endforeach;
            endif;
        endwhile; wp_reset_query();
    else: ?>
        <h3>Sorry, we couldn't find any results. </h3>
        <?php endif; ?>
    </div>

    <?php die();
}