<h3>All Episodes</h3>
<?php
  $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
  $args = [
    'post_type' => 'segments',
    'posts_per_page' => 5,
    'tax_query' => [
      [
      'taxonomy' => 'episode_type',
      'field' => 'slug',
      'terms' => 'full-episode'
      ]
      ],
    'paged' => $paged
  ];

  $query = new WP_Query($args);

  if($query->have_posts()) : while($query->have_posts()) : $query->the_post();

    $episode_id = get_the_ID();
    $url = get_the_permalink();
    $title = get_the_title();
    $thumb = get_the_post_thumbnail_url();
?>
    <article data-css-card="topic-card">
      <div data-css-card="topic-wrapper">
        <div data-css-card="topic-thumbnail">
          <img src="<?= $thumb; ?>" />
        </div>
        <div data-css-card="topic-summary">
          <h2 class="title"><span class="number"></span><a href="<?= $url;?>"><?= $title; ?></a></h2>
        </div>
      </div>
    </article>
<?php endwhile;?>

    <!-- Add the pagination functions here. -->
    <div class="pagination">

    <?php 
        echo paginate_links( array(
            'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
            'total'        => $query->max_num_pages,
            'current'      => max( 1, get_query_var( 'paged' ) ),
            'format'       => '?paged=%#%',
            'show_all'     => false,
            'type'         => 'plain',
            'end_size'     => 2,
            'mid_size'     => 1,
            'prev_next'    => true,
            'prev_text'    => sprintf( '<i></i> %1$s', __( 'Next', 'text-domain' ) ),
            'next_text'    => sprintf( '%1$s <i></i>', __( 'Prev', 'text-domain' ) ),
            'add_args'     => false,
            'add_fragment' => '',
        ) );

    ?>
    </div>
<?php wp_reset_postdata(  ); ?>
<?php else : ?>
  <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>

<h3>All Curriculum</h3>
<?php
  $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
  $args = [
    'post_type' => 'segments',
    'posts_per_page' => 5,
    'tax_query' => [
      [
      'taxonomy' => 'episode_type',
      'field' => 'slug',
      'terms' => 'curriculum-episode'
      ]
      ],
    'paged' => $paged
  ];

  $query = new WP_Query($args);

  if($query->have_posts()) : while($query->have_posts()) : $query->the_post();

    $episode_id = get_the_ID();
    $url = get_the_permalink();
    $title = get_the_title();
    $thumb = get_the_post_thumbnail_url();
?>
    <article data-css-card="topic-card">
      <div data-css-card="topic-wrapper">
        <div data-css-card="topic-thumbnail">
          <img src="<?= $thumb; ?>" />
        </div>
        <div data-css-card="topic-summary">
          <h2 class="title"><span class="number"></span><a href="<?= $url;?>"><?= $title; ?></a></h2>
        </div>
      </div>
    </article>
<?php endwhile;?>

    <!-- Add the pagination functions here. -->
    <div class="pagination">

    <?php 
        echo paginate_links( array(
            'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
            'total'        => $query->max_num_pages,
            'current'      => max( 1, get_query_var( 'paged' ) ),
            'format'       => '?paged=%#%',
            'show_all'     => false,
            'type'         => 'plain',
            'end_size'     => 2,
            'mid_size'     => 1,
            'prev_next'    => true,
            'prev_text'    => sprintf( '<i></i> %1$s', __( 'Next', 'text-domain' ) ),
            'next_text'    => sprintf( '%1$s <i></i>', __( 'Prev', 'text-domain' ) ),
            'add_args'     => false,
            'add_fragment' => '',
        ) );

    ?>
    </div>
<?php wp_reset_postdata(  ); ?>
<?php else : ?>
  <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>

