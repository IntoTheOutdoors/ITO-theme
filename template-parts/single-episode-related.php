<?php 
    $topic_id = $args['topic_id'];

    $category = get_the_terms($topic_id, 'topic_categories');
    $term_id = $category[0]->term_id;

    $args = [
        'post_type' => 'topics',
        'posts_per_page' => 5,
        'post__not_in' => [$topic_id],
        'orderby' => 'rand',
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
    <h2>Related Episode</h2>
    <!-- this should be by category related episode -->
    <?php
    if($related->have_posts()):
        while($related->have_posts()): $related->the_post();
            $full_episodes = get_field('full_episode', get_the_id());

            if(!empty($full_episodes)):
                foreach($full_episodes as $full_episode):
                    // setup_postdata($post);
                    $image = wp_get_attachment_image_src( get_post_thumbnail_id( $full_episode->ID ), 'thumbnail' );
                    ?>
                    <div class="related-item">
                        <a href="<?php the_permalink(); ?>">
                            <img src="<?php echo $image[0]; ?>" alt="">
                            <p><?php the_title(); ?></p>
                        </a>
                    </div>

                    <?php
                endforeach;
            endif;
        endwhile; 
        // wp_reset_postdata(); 
        wp_reset_query();
    endif;
?>