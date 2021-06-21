<?php 
    $topic_id = $args['topic_id'];

    $category = get_the_terms($topic_id, 'topic_categories');
    $term_id = $category[0]->term_id;

    $args = [
        'post_type' => 'topics',
        'posts_per_page' => 3,
        'post__not_in' => [$topic_id],
        'tax_query' => [
            [
                'taxonomy' => 'topic_categories',
                'field' => 'terms',
                'terms' => $term_id
            ]
        ]
    ];

    $related = new WP_Query($args);

    ?>
    <h3>Related Episode</h3>
    <!-- this should be by category related episode -->
    <?php
    if($related->have_posts()):
        while($related->have_posts()): $related->the_post();
            $full_episodes = get_field('full_episode', get_the_id());
            
            foreach($full_episodes as $full_episode):
                // setup_postdata($post);
                $image = wp_get_attachment_image_src( get_post_thumbnail_id( $curriculum_video->ID ), 'medium' );
                ?>
                <div class="episode-bottom-related-item">
                    <a href="<?php the_permalink(); ?>">
                        <img src="<?php echo $image[0]; ?>" alt="">
                        <p><?php the_title(); ?></p>
                    </a>
                </div>

                <?php
            endforeach;
        endwhile; 
        // wp_reset_postdata(); 
        wp_reset_query();
    endif;
?>