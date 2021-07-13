<!-- CTA -->
<section class="cta">   
    <div class="cta-content">
        <div class="cta-content-text">
            <h1>into the outdoors</h1>
            <h2>Creating Pathways</h2>
            <p>to environmental awareness and outdoor lifestyles that
            empower our next generation to become sustainable stewards of Planet Earth.
            </p>
            
            <a href="<?php echo get_permalink( get_page_by_path( 'episodes-lessons')); ?>" class="btn btn-secondary">Learn Now</a>
        </div>
    </div>
</section>

<!-- FEATURED EPISODES -->
<section class="featured row">
    <div class="featured-episode col-lg-7 col-md-6 col-sm-12">
        <h4>Featured Episode</h4>
        <?php 
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
                if(!empty($featured_video)) {
                  echo $featured_video;
                } else {
                  echo get_field('vimeo_url', $featured_post[0]->ID);
                }
            ?>
            </div>
            <a href="<?php the_permalink($featured_video); ?>"><h5>WATCH: <?php the_title(); ?> </h5></a>
    </div>
    <div class="featured-curriculums col-lg-5 col-md-6 col-sm-12">
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
                <a href="<?php echo get_page_link($curriculum->ID); ?>"><h5><?php echo get_the_title($curriculum->ID); ?></h5></a>
                </div>
              </div>
              
              <?php
            endforeach;
          endif;
        ?>
        </div>
        
        <?php endwhile; wp_reset_query(); ?>
    </div>
</section>

  <!-- FAMILY BACKGROUND SVG -->
  <?php 
    $image = wp_get_attachment_image_src(10757, $size="thumbnail", $icon=false, []);
  ?>
  <section class="family" style="background: url(<?php echo $image[0]; ?>) repeat-x; background-position: bottom; width: 100%; height: 565px; margin: 0 auto;">
    <!-- SIGNUP (CALL TO ACTION) -->
    <section class="signup">
      <div class="signup-text">
        <h3>Join the Adventure!</h3>
        <p>Join our email list to be the first to get the lasts news, 
          new episode notifications, and exclusive contests 
          conveniently in your inbox!</p>
        <!-- Button trigger modal -->
        <a type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">
          Signup
        </a>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <!-- Begin Constant Contact Inline Form Code -->
              <div class="ctct-inline-form" data-form-id="215a7c57-cdb5-43cb-b987-bde5f816e4c8"></div>
              <!-- End Constant Contact Inline Form Code -->
            </div>
          </div>
        </div>
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
      


