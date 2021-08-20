<div class="row container">
    <div class="featured-episode col-lg-6 col-md-6 col-sm-12">
        <h4>Featured Episode</h4>
        <?php 
            // query topics and get the latest posts
            $args = [
            'post_type' => 'topics',
            'posts_per_page' => 1,
            ];

            $query = new WP_Query($args);             
            
            while($query->have_posts()): $query->the_post();
            $featured_post = get_field('full_episode');
            ?>
            <div class="featured-episode-embed">
            <?php
                $featured_video = the_field('youtube_url', $featured_post[0]->ID);
                echo $featured_video;
            ?>
            </div>
            <a href="<?php the_permalink($featured_video); ?>"><h5>WATCH: <?php the_title(); ?> </h5></a>
    </div>
    <div class="featured-curriculums col-lg-6 col-md-6 col-sm-12">
    <?php 
        $curriculums = get_field('curriculum_videos');
        if($curriculums != ""): ?>
            <h4>Latest curriculum videos & lesson plans</h4>
            <?php 
            foreach($curriculums as $curriculum): ?>
            <div class="curriculum">
                <a href="<?php echo get_page_link($curriculum->ID); ?>">
                <div class="curriculum-image">
                    <?php 
                    echo get_the_post_thumbnail( $curriculum->ID, 'thumbnail');
                    ?>
                </div>
                <div class="curriculum-text">
                    <h5><?php echo get_the_title($curriculum->ID); ?></h5>
                </div>
                </a>
            </div>              
            <?php
            endforeach;
        endif;
        ?>
        </div>
        
        <?php endwhile; wp_reset_query(); ?>
    </div>
</div>