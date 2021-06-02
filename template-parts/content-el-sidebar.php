<aside data-css-sidebar="sidebar">
  <form data-css-form="filter" data-js-form="filter">
    <fieldset data-css-form="group">
      <label data-css-form="label" for="topic-title">Search by title</label>
      <input data-css-form="input" type="text" id="topic-title" name="topic-title" placeholder="Type the title here...">
    </fieldset>

    <!-- TOPICS -->
    <fieldset data-css-form="group">
        <label data-css-form="label" for="episode-types">Topics</label>
        <div data-css-form="input-group" id="episode-types">
            <input type="radio" class="form-check-input" id="<?php $query->slug ?>" value="curriculum-episodes" name="episode-types">Curriculum</input>
        </div>
        <div data-css-form="input-group" id="episode-types">
            <input type="radio" class="form-check-input" id="<?php $query->slug ?>" value="full-episodes" name="episode-types">Episodes</input>
        </div>
    </fieldset>

    <!-- CATEGORY -->
    <fieldset data-css-form="group">
      <label data-css-form="label" for="episode-category">Category</label>
      <?php
      $categories = get_terms( array(
          'taxonomy' => 'topic_category',
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
        <input type="checkbox" id="<?= $keyword->slug; ?>" name="topic-grade-level[]" value="<?= $grade_level->term_id; ?>"><label for="<?= $grade_level->slug; ?>"><?= $grade_level->name; ?></label>
      </div>
      <?php endforeach; ?>
    </fieldset>

    <!-- Order By -->
    <fieldset data-css-form="group">
      <label data-css-form="label" for="topic-order">Order by</label>
      <select data-css-form="input select" id="topic-order" name="topic-order">
        <option value="">List Order</option>
        <option value="Popularity">Popularity</option>
        <option value="Alphabetical">Alphabetical</option>
      </select>
    </fieldset>

    <!-- Fitler button -->
    <fieldset data-css-form="group right">
      <button data-css-button="button red">Filter</button>
      <input type="hidden" name="action" value="filter">
    </fieldset>
  </form>
</aside>
