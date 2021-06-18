<aside>
  <form id="itoForm" data-js-form="filter" method="POST" class="filter-form">
    <fieldset class="filter-search mb-3">
      <input class="form-control submit" type="text" id="episode-search" name="episode-search" placeholder="Search here...">
    </fieldset>

    <!-- Episode Types -->
    <fieldset id="types" class="filter-types">
        <label for="episode-types">Search episodes by topics:</label>
        <div class="filter-types-input">
          <div id="episode-types">
              <input class="submit" checked  type="radio" value="full_episode" name="episode-types">Episodes</input>
          </div>
          <div id="episode-types">
              <input class="submit" type="radio" value="curriculum_videos" name="episode-types">Curriculums</input>
          </div>
        </div>
    </fieldset>

    <!-- CATEGORY -->
    <fieldset class="filter-categories">
      <?php
      $categories = get_terms( array(
          'taxonomy' => 'topic_categories',
          'hide_empty' => false,
      ) );
      ?>
      <label for="filter-categories">Search episodes by Category:</label>
      <?php foreach($categories as $category) : ?>
        <div class="filter-categories-item">
          <input class="submit" value="<?= $category->term_id; ?>" type="radio" name="episode-category"><?php echo $category->name; ?></input><br>
        </div>
      <?php endforeach; ?>
    </fieldset>

    <!-- GRADE LEVEL -->
    <fieldset id="gradeLevel" class="filter-grade">
      <label class="filter-grade-label">Search Lesson Plans by Grade Level:</label>
      <?php
      $grade_levels = get_terms( array(
          'taxonomy' => 'grade_level',
          'hide_empty' => false,  
      ) );

      ?>
      <div>
        <?php foreach($grade_levels as $grade_level) : ?>
        <div class="filter-grade-item">
          <input class="submit" type="checkbox" id="<?= $grade_level->term_id; ?>" name="episode-grade-level[]" value="<?= $grade_level->term_id; ?>"><label for="<?= $grade_level->name; ?>"><?= $grade_level->name; ?></label>
        </div>
        <?php endforeach; ?>
      </div>
    </fieldset>

    <!-- Fitler button -->
    <div class="filter-submit">
      <fieldset>
        <!-- <button data-css-button="button red">Filter</button> -->
        <input id="itoSubmit" type="hidden" name="action" value="filter">
      </fieldset>
  
      <fieldset>
        <input class="btn btn-outline-primary" id="itoReset" type="reset" name="action" value="Reset">
      </fieldset>
    </div>
  </form>

  <div class="filter-downloads">
    <h4> Download the app to watch us whereever you go!</h4>
    <div class="filter-downloads-container">
    <?php 
        // QUERY for the app downloads
        $args = [
          'post_type' => 'shows',
          'posts_per_page' => -1,
          'order' => 'DESC'
        ];

        $query = new WP_Query($args);
        while($query->have_posts()): $query->the_post();
            $logos = get_field('show_logo');
            $app = get_field('show_app');
            $image = wp_get_attachment_image($logos['ID'], "medium", false, []);
           
            if($app == 1): ?>
                <a href="<?php echo the_field('show_url') ?>" target="_blank"><?php echo $image; ?></a>
        <?php endif; 
      endwhile; wp_reset_query(); ?>
    </div>
</div>

</aside>


