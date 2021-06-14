<div class="results-episodes">
    <h3 class="results-episodes-text"> All Episodes </h3>

    <div class="results-episodes-container">
    <?php
      $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
      $args = [
        'post_type' => ['topics'],
        'posts_per_page' => 3,
        'paged' => $paged
      ];

      $query = new WP_Query($args);

      if($query->have_posts()) : while($query->have_posts()) : $query->the_post();
        $topics = get_field('full_episode');

        if(is_array($topics) || is_object($topics)):
        foreach($topics as $topic): ?>
          <div class="results-episodes-item card">
            <a href="<?php the_permalink($topic->ID); ?>">
            <img src="<?php echo get_the_post_thumbnail_url($topic->ID); ?>" class="card-img-top"/>
            <div class="card-body">
              <h5 class="card-title"><?php the_title();?></h5>
            </div>
            </a>
          </div>

        <?php endforeach; endif; 
        ?>
        

        <?php endwhile;?>
        <?php wp_reset_query(); ?>

    </div>
    <div class="results-episodes-loadmore">
      <form id="itoForm" data-js-form="filter" method="POST" class="filter-form">
        <fieldset>
          <button class="btn-secondary">Load More Episodes</button>
          <input id="itoSubmit" type="hidden" name="action" value="filter">
        </fieldset>
      </form>
    </div>
        <?php else : ?>
          <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
        <?php endif; ?>
    </div>

    <h3 class="results-episodes-text"> All Curriculums </h3>

    <div class="results-episodes-container">
    <?php
      $args = [
        'post_type' => ['topics'],
        'posts_per_page' => 6,
      ];

      $query = new WP_Query($args);

      if($query->have_posts()) : while($query->have_posts()) : $query->the_post();
        $curriculums = get_field('curriculum_videos');

        if(is_array($curriculums) || is_object($curriculums)):
        foreach($curriculums as $curriculum): ?>
            <div class="results-episodes-item card">
              <a href="<?php the_permalink($curriculum->ID); ?>">
              <img src="<?php echo get_the_post_thumbnail_url($curriculum->ID); ?>" class="card-img-top"/>
              <div class="card-body">
                <h5 class="card-title"><?php echo get_the_title($curriculum->ID);?></h5>
              </div>
              </a>
            </div>

        <?php endforeach;
        endif;
       

       endwhile;?>
        <?php wp_reset_query(); ?>

    </div>
    <div class="results-episodes-loadmore">
      <form id="itoForm" data-js-form="filter" method="POST" class="filter-form">
        <fieldset>
          <button class="btn-secondary">Load More Curriculums</button>
          <input type="hidden" value="curriculum_videos" name="episode-types"></input>
          <input id="itoSubmit" type="hidden" name="action" value="filter">
        </fieldset>
      </form>
    </div>
        <?php else : ?>
          <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
        <?php endif; ?>
    </div>
</div>
