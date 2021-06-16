
<h2>Featured Episode</h2>

<?php 
    $args = [
        'post_type' => 'topics',
        'posts_per_page' => 1,
        'post_status' => 'publish',
    ];

    $query = new WP_Query($args); ?>
    
    <?php
    if($query->have_posts()):
        while($query->have_posts()): $query->the_post(); ?>
            <div class="results-featured-container">
                <?php echo get_the_post_thumbnail($query->ID, "thumbnail"); ?>
                <div class="results-featured-text">
                    <h5><?php echo the_title(); ?></h5>
                    <p><?php echo the_excerpt(); ?></p>
                    <a href="<?php the_permalink(); ?>" class="btn btn-primary btn-featured">play</a>
                </div>
            </div>
        <?php endwhile; wp_reset_query();
    endif; ?>
