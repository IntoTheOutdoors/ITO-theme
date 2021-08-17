<div class="results-episodes">
    <!-- <h3 class="results-episodes-text"> All Episodes </h3> -->

    <div class="results-episodes-container">
    <?php
      // $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
      $args = [
        'post_type' => ['topics'],
        'posts_per_page' => -1,
        'paged' => $paged
      ];

      $query = new WP_Query($args);

      if($query->have_posts()) : while($query->have_posts()) : $query->the_post();
        $topics = get_field('full_episode');

        if(is_array($topics) || is_object($topics)):
          foreach($topics as $topic): ?>
            <div class="results-episodes-item card shadow">
              <a href="<?php the_permalink(); ?>">
              <img src="<?php echo get_the_post_thumbnail_url($topic->ID); ?>" class="card-img-top"/>
              <div class="card-body">
                <h5 class="card-title"><?php esc_html(the_title());?></h5>
              </div>
              </a>
            </div>
        <?php 
          endforeach; 
          endif; ?>
      <?php endwhile;?>
      <?php wp_reset_query(); ?>
    </div>
    
    <?php else : ?>
      <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
    <?php endif; ?>
    </div>
</div>
