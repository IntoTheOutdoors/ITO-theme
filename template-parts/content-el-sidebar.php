<aside data-css-sidebar="sidebar">
  <form id="itoForm" data-css-form="filter" data-js-form="filter" method="POST">
    <fieldset data-css-form="group">
      <label data-css-form="label" for="episode-search">Search by title</label>
      <input data-css-form="input" type="text" id="episode-search" name="episode-search" placeholder="Type the title here...">
    </fieldset>

    <!-- Episode Types -->
    <fieldset data-css-form="group">
        <label data-css-form="label" for="episode-types">Topics</label>
        <div data-css-form="input-group" id="episode-types">
            <input type="radio" class="form-check-input" value="curriculum-episode" name="episode-types">Curriculum</input>
        </div>
        <div data-css-form="input-group" id="episode-types">
            <input type="radio" class="form-check-input" value="full-episode" name="episode-types">Episodes</input>
        </div>
    </fieldset>

    <!-- CATEGORY -->
    <fieldset data-css-form="group">
      <label data-css-form="label" for="episode-category">Category</label>
      <?php
      $categories = get_terms( array(
          'taxonomy' => 'video_categories',
          'hide_empty' => false,
      ) );
      ?>
      <select data-css-form="input select" id="episode-category" name="episode-category">
        <option>Select Category</option>
        <?php foreach($categories as $category) : ?>
        <option value="<?= $category->term_id; ?>"><?= $category->name; ?></option>
        <?php endforeach; ?>
      </select>
    </fieldset>

    <!-- GRADE LEVEL -->
    <fieldset data-css-form="group">
      <label data-css-form="label">Grade Level</label>
      <?php
      $grade_levels = get_terms( array(
          'taxonomy' => 'grade_level',
          'hide_empty' => false,
      ) );
      foreach($grade_levels as $grade_level) :
      ?>
      <div data-css-form="input-group">
        <input type="checkbox" id="<?= $keyword->slug; ?>" name="episode-grade-level[]" value="<?= $grade_level->term_id; ?>"><label for="<?= $grade_level->slug; ?>"><?= $grade_level->name; ?></label>
      </div>
      <?php endforeach; ?>
    </fieldset>

  
    <!-- Fitler button -->
    <fieldset data-css-form="group right">
      <button data-css-button="button red">Filter</button>
      <input id="itoSubmit" type="hidden" name="action" value="filter">
    </fieldset>

    <!-- Fitler button -->
    <fieldset data-css-form="group right">
      <input id="itoReset" type="reset">
    </fieldset>
  </form>
</aside>
