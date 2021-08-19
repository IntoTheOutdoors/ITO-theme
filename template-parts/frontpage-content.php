<!-- CTA -->
<section class="cta container">   
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
<section class="featured container">
  <?php get_template_part('template-parts/frontpage', 'featured'); ?>
</section>

  <!-- FAMILY BACKGROUND SVG -->
  <?php 
    $image = wp_get_attachment_image_src(10757, $size="thumbnail", $icon=false, []);
  ?>
  <section class="family" style="background: url(<?php echo $image[0]; ?>) repeat-x center center; width: 100%; height: 565px; margin: 0 auto;">
    
  <!-- SIGNUP (CALL TO ACTION) -->
    <section class="signup container">
      <div class="signup-text">
        <h3>Join the Adventure!</h3>
        <p>Get updates on new episodes, lesson plans, our education initiatives, and exclusive contests straight to your inbox!</p>
        <!-- Button trigger modal -->
        <a type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#singupModal">
          Signup
        </a>
        <!-- Modal -->         
          <div id="singupModal" class="modal fade" tabindex="-1" aria-labelledby="singupModal" aria-hidden="true">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                          <!-- Begin Constant Contact Inline Form Code -->
                          <div class="ctct-inline-form" data-form-id="215a7c57-cdb5-43cb-b987-bde5f816e4c8"></div>
                          <!-- End Constant Contact Inline Form Code -->
                      </div>
                  </div>
              </div>
          </div>
        </div>
      </div>
    </section>
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
      


