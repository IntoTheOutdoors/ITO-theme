<?php 
    $args = [
        'post_type' => 'partners',
        'posts_per_page' => -1,
        'order' => 'ASC',
        'meta_key' => 'current_partner',
        'meta_value' => true
    ];

    $partner_logos = new WP_Query($args);
    ?>
    <div class="slide-track" style="width: calc(50px * <?php echo $partner_logos->post_count; ?>);" >
    <?php
        while($partner_logos->have_posts()): $partner_logos->the_post(); ?>
        <div class="slide">
            <a href="<?php echo the_field('header_url');  ?>" target="_blank">
            <img src="<?php echo the_field('header_image'); ?>">
            </a>
        </div>
        <?php 
        endwhile; wp_reset_query();
    ?>
</div>