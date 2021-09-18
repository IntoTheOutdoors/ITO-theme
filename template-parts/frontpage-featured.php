<div class="row container">
    <div class="featured-episode col-lg-6 col-md-6 col-sm-12">
        <h2>Featured Episode</h2>
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
        <a href="<?php the_permalink($featured_video); ?>">
            <div class="featured-item">
                <div class="featured-item-image">
                    <?php
                        // $featured_video = the_field('youtube_url', $featured_post[0]->ID);
                        // echo $featured_video;
                        echo get_the_post_thumbnail( $featured_post[0]->ID, 'thumbnail');
                    ?>
                </div>
                <div class="featured-item-text">
                    <p class="card-title">WATCH: <?php the_title(); ?></p>
                </div>
            </div>
        </a>
    </div>
    <div class="featured-curriculums col-lg-6 col-md-6 col-sm-12">
    <?php 
        $curriculums = get_field('curriculum_videos');
        if($curriculums != ""): 
    ?>
            
            <h2>Latest curriculum videos & lesson plans</h2>
    <?php 
            foreach($curriculums as $curriculum): 
    ?>
            <div class="curriculum">
                <a href="<?php echo get_page_link($curriculum->ID); ?>">
                    <div class="curriculum-item">
                        <div class="curriculum-image">
                            <?php echo get_the_post_thumbnail( $curriculum->ID, 'thumbnail'); ?>
                        </div>
                        <div class="curriculum-text">
                            <p><?php echo get_the_title($curriculum->ID); ?></p>
                        </div>
                    </div>
                </a>
            </div>              
    <?php
            endforeach;
            endif;
    ?>
        </div>
        
    <?php 
        endwhile; wp_reset_query(); 
    ?>
    </div>
</div>