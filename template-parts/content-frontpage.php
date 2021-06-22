<main >
    <!-- CTA -->
    <section class="cta">   
        <div class="cta-content container">
            <div class="cta-content-text">
                <h1>into the outdoors</h1>
                <h2>Creating Pathways</h2>
                <p>to environmental awareness and outdoor lifestyles that <br> 
                empower our next generation to become <br>
                sustainable stewards of Planet Earth.
                </p>
                
                <a href="<?php echo get_permalink( get_page_by_path( 'episodes-lessons')); ?>" class="btn btn-secondary">Learn Now</a>
            </div>
        </div>
    </section>

    <!-- FEATURED EPISODES -->
    <section class="featured">
        <div class="container row">
        <div class="col-7">
            <h4>Featured Episode</h4>
            <?php 
                $args = [
                  'post_type' => 'topics',
                  'posts_per_page' => 1,
                ];

                $query = new WP_Query($args);
                
                
                while($query->have_posts()): $query->the_post();
                $featured_posts = get_field('full_episode');
                ?>
                <div class="embed-container">
                <?php
                  foreach($featured_posts as $featured_post):
                    if(the_field('youtube_url')) {
                      echo get_field('youtube_url', $featured_post->ID);
                    } else {
                      echo get_field('vimeo_url', $featured_post->ID);
                    }
                  endforeach;
                ?>
                </div>
                <a href="<?php the_permalink(); ?>"><h5>WATCH: <?php the_title(); ?> </h5></a>
        </div>
        <div class="curriculums col-5">
            
            <?php 
              $curriculums = get_field('curriculum_videos');
              if($curriculums != ""): ?>
                <h4>Latest curriculum videos & lesson plans</h4>
                <?php 
                foreach($curriculums as $curriculum): ?>
                  <div class="curriculum">
                    <div class="curriculum-image">
                      <a href="<?echo get_page_link($curriculum->ID); ?>">
                      <?php 
                        echo get_the_post_thumbnail( $curriculum->ID, 'thumbnail');
                      ?>
                      </a>

                    </div>
                    <div class="curriculum-text">
                      <h5><a href="<?php echo get_page_link($curriculum->ID); ?>"><?php echo get_the_title($curriculum->ID); ?></a></h5>
                    </div>
                  </div>
                  
                  <?php
                endforeach;
              endif;
            ?>
            </div>
            
            <?php endwhile; wp_reset_query(); ?>
        </div>
        </div>
    </section>

      <!-- FAMILY BACKGROUND SVG -->
      <?php 
        $image = wp_get_attachment_image_src(10757, $size="thumbnail", $icon=false, []);
      ?>
      <section class="family" style="background: url(<?php echo $image[0]; ?>) repeat-x; background-position: bottom; width: 100%; height: 565px; margin: 0 auto;">
        <!-- SIGNUP (CALL TO ACTION) -->
        <section class="signup container">
          <div class="signup-text">
            <h3>Join the Adventure!</h3>
            <p>Join our email list to be the first to get the lasts news, 
              new episode notifications, and exclusive contests 
              conveniently in your inbox!</p>
            <a href="" class="btn btn-secondary">signup</a>
          </div>
        </section>
      </section>

      <section class="media">
        <div class="media-logos">
          <?php 
            // query custom post type 'shows'
            $args = [
              'post_type' => 'shows',
              'posts_per_page' => -1,
              'order' => 'ASC'
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
        <div class="media-text">
              <h4>We are now available on a variety of streaming channels and platforms!</h4>
        </div>
        <?php 
        // query custom post type 'shows'
        $args = [
          'post_type' => 'shows',
          'posts_per_page' => -1,
          'order' => 'DESC'
        ];

        ?> 
        <div class="media-downloads">
        
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
        ?>
        </div>
        
      </section>

      <section class="slider">
        <div class="slide-track">
          <?php 
            $args = [
              'post_type' => 'partners',
              'post_per_page' => -1,
              'order' => 'ASC'
            ];

            $partner_logos = new WP_Query($args);
            while($partner_logos->have_posts()): $partner_logos->the_post(); ?>
              <div class="slide">
                <a href="<?php echo the_field('header_url');  ?>" target="_blank">
                  <img src="<?php echo the_field('header_image'); ?>">
                </a>
              </div>
            <?php endwhile; 
          ?>
        </div>
      </section>
      

    </main>
