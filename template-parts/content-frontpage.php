<main >
    <!-- JUMBOTRON CALL TO ACTION -->
    <section class="jumbotron">   
        <div class="jumbotron-content container">
            <div class="jumbotron-content-text">
                <h1>into the outdoors</h1>
                <h2>Creating Pathways</h2>
                <p>to environmental awareness and outdoor lifestyles that <br> 
                empower our next generation to become <br>
                sustainable stewards of Planet Earth.
                </p>
                
                <a href="<?php echo get_permalink( get_page_by_path( 'episodes-lessons')); ?>" class="btn btn-primary">Learn Now</a>
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
                    echo get_field('youtube_video', $featured_post->ID);
                  endforeach;
                ?>
                </div>
                <a href="<?php the_permalink(); ?>"><h5>WATCH: <?php the_title(); ?> </h5></a>
    
                <!-- <video src="./assets/videos/featured-video.mp4" controls loop></video> -->
        </div>
        <div class="curriculums col-5">
            <h4>Latest curriculum videos & lesson plans</h4>
            
            <?php 
              $curriculums = get_field('curriculum_videos');
              foreach($curriculums as $curriculum): ?>
                <div class="curriculum">
                  <div class="embed-container">
                    <?php echo get_field('youtube_video', $curriculum->ID); ?>
                  </div>
                  <div class="curriculum-text">
                    <h6><a href="<?php the_permalink(); ?>"><?php echo get_the_title($curriculum->ID); ?></a></h6>
                  </div>
                </div>
                
                <?php
              endforeach;
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
      <section class="family" style="background: url(<?php echo $image[0]; ?>) no-repeat; background-position: bottom; width: 100%; height: 565px; margin: 0 auto;">
        <!-- SIGNUP (CALL TO ACTION) -->
        <section class="signup container">
          <div class="signup-text">
            <h3>Join the Adventure!</h3>
            <p>Join our email list to be the first to get the lasts news, 
              new episode notifications, and exclusive contests 
              conveniently in your inbox!</p>
            <a href="" class="btn btn-primary">signup</a>
          </div>
        </section>
      </section>

      <section class="media">
        <div class="media-logos">
          <?php 
            // query custom post type 'partners'
            $args = [
              'post_type' => 'shows',
              'posts_per_page' => -1,
            ];
            $query = new WP_Query($args);
            
          while($query->have_posts()): $query->the_post();
            $logos = get_field('show_logo'); 
            
            $image = wp_get_attachment_image_src($logos['ID'], $size="thumbnail", $icon=false, []);
            ?>
            <img src="<?php echo $image[0] ?>" alt="">
            
          <?php endwhile; wp_reset_query();
          ?>
        </div>
      </section>
      

    </main>