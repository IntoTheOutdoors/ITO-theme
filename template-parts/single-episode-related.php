<?php 
    $topic_id = $args['topic_id'];

    $args = [
        'post_type' => 'topics',
        'posts_per_page' => 5,
        'post__not_in' => [$topic_id]
    ];

    $related = new WP_Query($args);
    
    if($related->have_posts()):
        while($related->have_posts()):
            $related->the_post();
        endwhile;
    endif;
?>