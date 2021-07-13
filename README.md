# ITO-theme
Custom Theme for Into the Outdoors - Creating pathways to environmental awareness and outdoor lifestyles that empower our next generation to become sustainable stewards of Planet Earth.

// custom theme made for the brand



  TOPICS
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


 $('#do_action').on('submit', '[data-js-form=filter]', (e) => {
      e.preventDefault();

      // let data = $(this).serialize();
      // console.log('this is the data', data);
      // $.ajax({
      //   url: wpAjax.ajaxUrl,
      //   data: {action: 'filter', data: data},
      //   type: 'post',
      //   success: (result) => {
      //     $('[data-js-filter=target]').html(result);
      //   },
      //   error: (result) => {
      //     console.log(result)
      //   }
      // });
    });


    // filter
    function filter_ajax() {
    $episode_search = $_POST['episode-search'];
    $episode_types = $_POST['episode-types'];
    $episode_category = $_POST['episode-category'];
    $episode_level = $_POST['episode-grade-level'];

    $args = [
        'post_type' => ['segments', 'lesson_plans'],
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'order' => 'ASC',
    ];

    // search bar
    if(!empty($episode_search)):
        $args['s'] = $episode_search;
    endif;

    // episode types
    if(!empty($episode_types) && $episode_types != "All"): 
        if(empty($args['tax_query'])):
            $args['tax_query'] = [
                [
                    'taxonomy' => 'episode_type',
                    'field' => 'slug',
                    'terms' => $episode_types
                ]
            ]; 
        
        else:
            array_push($args['tax_query'], 
            [
                'taxonomy' => 'episode_type',
                'field' => 'slug',
                'terms' => $episode_types
            ]
        );
        endif;
    endif;
        
    
    if($episode_types == "All"): 
        if(!empty($args['tax_query'])):
            array_push($args['tax_query'], 
                [
                    'taxonomy' => 'episode_type',
                    'field' => 'slug',
                    'terms' => ['curriculum-episode', 'full-episode']
                ]
            );
        else:
            $args['tax_query'] = [
                [
                    'taxonomy' => 'episode_type',
                    'field' => 'slug',
                    'terms' => ['curriculum-episode', 'full-episode']
                ]
            ];
        endif;
    endif;

    // episode categories
    if(!empty($episode_category) && !empty($args['tax_query'])):
        array_push($args['tax_query'], 
            [
                'taxonomy' => 'video_categories',
                'field' => 'term_id',
                'terms' => $episode_category
            ]
        );
    elseif(!empty($episode_category) && empty($args['tax_query'])):
        $args['tax_query'] = [
            [
                'taxonomy' => 'video_categories',
                'field' => 'term_id',
                'terms' => $episode_category
            ]
        ];
    elseif($episode_category == "Select Category" && empty($args['tax_query'])):
        $args['tax_query'] = [
            [
                'taxonomy' => 'episode_type',
                'field' => 'slug',
                'terms' => 'full_episode'
            ]
        ];
    elseif($episode_category == "Select Category" && !empty($args['tax_query'])):
        array_push($args['tax_query'], 
            [
                'taxonomy' => 'episode_type',
                'field' => 'slug',
                'terms' => 'full_episode'
            ]
        );
    endif;

    // GRADE LEVEL
    if(!empty($episode_level)):
        if(!empty($args['tax_query'])):
            array_push($args['tax_query'], 
                [
                    'tax_query' => [
                        [
                            'taxonomy' => 'grade_levels',
                            'field' => 'slug',
                            'terms' => $episode_level
                        ]
                    ]
                ]
            );
        else:
            $args['tax_query'] = [
                'relation' => 'OR',
                [
                    'taxonomy' => 'grade_levels',
                    'field' => 'slug',
                    'terms' => $episode_level
                ]
            ];
        endif;
    endif;

    $query = new WP_Query($args);

    if($query->have_posts()):
        while($query->have_posts()): $query->the_post();
               the_title();
               echo get_the_ID();
            ?>
            <br>
            
            <?php
        endwhile;
    else: ?>
        <div>
            <h3>No Episode found. Please search again!<h3>
        </div>
    <?php endif; wp_reset_postdata();

    die();
}
?>


//////////////// RESET


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


    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;


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



///////////////////////
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





/// lesson plans


        if(is_array($curriculum_videos) || is_object($curriculum_videos)):
        foreach($curriculum_videos as $curriculum_video): 
?>
        <div class="dropdown">
            <? if(!empty($lesson_plans)): ?>
            <a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-arrow-circle-down"></i>
                <?php 
                    if(count($lesson_plans) > 1): ?>
                        <span>Lesson plans</span>
                <?php 
                    else: 
                ?>
                        <span>Lesson Plan</span>
                <?php 
                    endif
                ?>
            </a>

            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                
                <?php 
                    foreach($lesson_plans as $lesson_plan): 
                    $file = get_field('file_upload', $lesson_plan->ID);
                    $url = get_field('url', $lesson_plan->ID);

                    // if only 1 file is available

                    // if file is an array / object

                    // if url 

                    // if url is an array
                ?>
                        <li><a class="dropdown-item" href="<?php echo $file['url']; ?>" target="_blank"><?php echo get_the_title($lesson_plan->ID); ?></a></li>
                    <?php 
                    var_dump($url);
                        
                    endforeach;
                ?>
            </ul>
            <?php endif; ?>
        </div>
        <hr>
        <?php endforeach; 
endif;

///// fixing errors in the single page
   

   fixing errors