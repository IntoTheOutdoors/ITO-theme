<?php get_header(); ?>
    <main class="wrapper" >
        <!-- CTA -->
        <section class="cta container">   
            <?php get_template_part( 'template-parts/frontpage', 'cta' ); ?>
        </section>

        <!-- FEATURED EPISODES -->
        <section class="featured container">
            <?php get_template_part('template-parts/frontpage', 'featured'); ?>
        </section>
            
        <!-- SIGNUP (CALL TO ACTION) -->
        <section class="signup">
            <?php get_template_part( 'template-parts/frontpage', 'signup'); ?>
        </section>
        
        <section class="shows">
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
        </section>


            

        <section class="slider">
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
        </section>
      



    </main>
<?php get_footer(); ?>