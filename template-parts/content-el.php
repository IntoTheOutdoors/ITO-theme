<main data-css-content="main">
  <div class="results">
    <div class="results-featured">
      <?php get_template_part('template-parts/content-el', 'featured'); ?>
    </div>
    <div class="results-content" id="#itoResults" data-js-filter="target">
      <?php get_template_part('template-parts/content-el', 'loop');?>
    </div>
  </div>
</main>