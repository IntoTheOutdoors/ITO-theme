<div class="shows-logos container">
    <?php 
        // query custom post type 'shows'
        $args = [
        'post_type' => 'shows',
        'posts_per_page' => -1,
        'order' => 'ASC',
        ];
        
        $query = new WP_Query($args);
        
    while($query->have_posts()): $query->the_post();
        $logos = get_field('show_logo');
        $app = get_field('show_app');
        $image = wp_get_attachment_image($logos['ID'], $size="thumbnail", $icon=false, []);
        
        if($app == 0): ?>
        <?php echo $image ?>
        <?php endif; endwhile; wp_reset_query();
    ?>
    </div>
    <div class="shows-text container">
        <h4>Download the app to watch us wherever you go!</h4>
    </div>
    <?php 
    // query custom post type 'shows'
    $args = [
    'post_type' => 'shows',
    'posts_per_page' => -1,
    'order' => 'DESC'
    ];
    ?> 
    <div class="shows-downloads conntainer">
    
    <?php 
    // QUERY for the app downloads
    $query = new WP_Query($args);
    while($query->have_posts()): $query->the_post();
        $logos = get_field('show_logo');
        $app = get_field('show_app');
        $image = wp_get_attachment_image($logos['ID'], $size="medium", $icon=false, []);
        
        if($app == 1): ?>
            <a href="<?php echo the_field('show_url') ?>" target="_blank"><?php echo $image; ?></a>
    <?php endif; endwhile; wp_reset_query(); ?>
</div>