<?php 
    get_header('second');
?>
<main>
<section class="container">
    <div class="watch">
        <h3>Where to watch</h3>
        <p>Into the Outdoors airs weekly on various broadcast and PBS stations. Check out the broadcast guide below for local listings. Don’t see your area listed? Find Into the Outdoors on all your favorite streaming devices.</p>
        <div class="watch-media">
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
        <div class="watch-downloads">
            <h5>Download the app and watch us wherever you go!</h5>
            <?php 
            // query custom post type 'shows'
            $args = [
              'post_type' => 'shows',
              'posts_per_page' => -1,
              'order' => 'DESC'
            ];
    
            ?> 
            <div class="watch-downloads-images">
              <?php 
              // QUERY for the app downloads
              $query = new WP_Query($args);
              while($query->have_posts()): $query->the_post();
                  $logos = get_field('show_logo');
                  $app = get_field('show_app');
                  $image = wp_get_attachment_image($logos['ID'], $size="medium", $icon=false, []);
                
                  if($app == 1): ?>
                      <a href="<?php echo the_field('show_url') ?>" target="_blank"><?php echo $image; ?></a>
              <?php 
                  endif; 
              endwhile; wp_reset_query(); ?>
            </div>
        </div>
    </div>
    <section class="broadcast">
        <h3>BROADCAST TELEVISION & PBS</h3>
        
        <form id="broadcastForm" method="POST">
          <?php 
            $args = [
              'post_type' => 'stations',
              'posts_per_page' => -1,
              'meta_query' => [
                'relation' => 'AND',
                [
                  'key' => 'state'
                ],
                [
                    'key' => 'broadcast',
                    'value' => ['network', 'pbs']
                ]
              ],
              'order' => 'ASC',
              'orderby' => 'meta_value',
            ];

            $networks = new WP_Query($args);
            ?>
          <fieldset class="input-group mb-3 broadcast-state">
            <label class="input-group-text" for="broadcast-state">FILTER BY STATE:</label>
            <select class="form-select" id="broadcast-state" name="broadcast-state">
              <option selected value="WI">Choose...</option>
                <?php 
                  $unique_states = [];
                  if($networks->have_posts()):
                    while($networks->have_posts()): $networks->the_post();
                      $state = get_field('state');
                      $state_object = get_field_object('state');
                      $label = $state_object['choices'][$state];

                      if(!in_array($state, $unique_states)):
                        // add state to array so it doesn't repeat
                        $unique_states[] = $state;
                        ?>
                        <option value="<?php echo $state; ?>"><?php echo $label; ?></option>
                        <?php
                      endif;
                    endwhile;
                  endif;
                ?>
              </select>
          </fieldset>
          <fieldset class="broadcast-submit">
            <input type="hidden" name="action" value="network_broadcast">
          </fieldset>
        </form>
        <div class="row broadcast-results">
          <div class="col-lg-6 col-md-6 col-sm-12 broadcast-network">
              <h3 class="subheader">Broadcast Station</h3>
              <p>List of broadcast and public TV:</p>
              <div class="broadcast-items">
                <div class="broadcast-item">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Market</th>
                            <th scope="col">Station</th>
                            <th scope="col">Air Time</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                            $args = [
                              'post_type'		=> 'stations',
                              'numberposts'	=> -1,
                              'meta_query' => [
                                'relation' => 'AND',
                                [
                                  'key' => 'state',
                                  'value' => 'WI'
                                ],
                                [
                                  'key' => 'broadcast',
                                  'value' => 'network'
                                ]
                              ]
                            ];
                          
                            $stations = new WP_Query($args);

                            if($stations->have_posts()):
                              while($stations->have_posts()): $stations->the_post();
                                  $state = get_field('state');
                                  $city = get_field('city');
                                  $airdates = get_field('schedule_airdates');
                                  ?>
                                  <tr>
                                      <td><?php echo esc_html( $state . ', ' . $city ); ?></td>
                                      <td><?php echo esc_html(the_title()); ?></td>
                                      <td>
                                          <?php
                                              $last_key = end(array_keys($airdates));   
                                              foreach($airdates as $key =>$airdate):
                                                  if(count($airdates) > 1) :
                                                      if ($key == $last_key):
                                                          // last item
                                                          echo esc_html($airdate['schedule_day'] . ' ' . $airdate['schedule_time'] . ' ' . $airdate['schedule_time_of_day']);    
                                                      else:
                                                          echo esc_html($airdate['schedule_day'] . ' ' . $airdate['schedule_time'] . ' ' . $airdate['schedule_time_of_day']) . ', ';
                                                      endif;
                                                  else:
                                                      echo esc_html($airdate['schedule_day'] . ' ' . $airdate['schedule_time'] . ' ' . $airdate['schedule_time_of_day']);
                                                  endif;
                                              endforeach; 
                                          ?>
                                      </td>
                                  </tr>
                                  <?php
                              endwhile; wp_reset_query();
                            endif;
                          ?>
                        </tbody>
                    </table>
                </div>
              </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-12 broadcast-pbs">
          <h3 class="subheader">PBS Broadcast</h3>
        <p>Check your local PBS Station for time and episodes</p>
        <div class="broadcast-items">
            <div class="broadcast-item">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Market</th>
                        <th scope="col">Station</th>
                        </tr>
                    </thead>
                    <tbody>                           
                        <?php 
                        $args = [
                            'post_type'		=> 'stations',
                            'numberposts'	=> -1,
                            'meta_query' => [
                                [
                                    'key' => 'state',
                                    'value' => 'WI'
                                ],
                                [
                                    'key' => 'broadcast',
                                    'value' => ['pbs']
                                ]
                            ]
                        ];
                        
                        $broadcasts = new WP_Query($args);
                        if($broadcasts->have_posts()):
                            while($broadcasts->have_posts()): $broadcasts->the_post();
                                $state = get_field('state');
                                $city = get_field('city');
                                $airdates = get_field('schedule_airdates');
                                ?>
                                <tr>
                                    <td><?php echo esc_html( $state . ', ' . $city ); ?></td>
                                    <td><?php echo esc_html(the_title()); ?></td>
                                </tr>
                                <?php
                            endwhile; wp_reset_query();
                        else:
                            ?>
                            <tr>
                                <td></td>
                                <td>Sorry, there's no results for this state.</td>
                                <td></td>
                            </tr>
                            <?php
                        endif;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
      </div>
    </section>
    <section class="schedule">
      <h3 class="subheader">Broadcast Episode Schedule</h3>
      <div class="schedule-items">
        
            <?php
              $args = [
                'post_type' => 'episode_schedules',
                'posts_per_page' => -1,
                'order' => 'ASC'
              ];

              $schedules = new WP_Query($args);

              if($schedules->have_posts()):
                $current_month = "";
                $current_start_date = "";
                $current_end_date = "";
              
                while($schedules->have_posts()): $schedules->the_post();
                  $start_date = get_field('start_date');
                  $end_date = get_field('end_date');
                  $url = get_field('topic_url');
              
                  $monthformatstring = "F";
                  $startdateformatString = "j";
                  $firstunixtimestamp = strtotime(get_field('start_date'));
                  $secondunixtimestamp = strtotime(get_field('end_date'));
                  $pretty_month = date_i18n($monthformatstring, $firstunixtimestamp);
                  $pretty_start_date = date_i18n($startdateformatString, $firstunixtimestamp);
                  $pretty_end_date = date_i18n($startdateformatString, $secondunixtimestamp);
                  
                  if ($current_month != $pretty_month){
                    $current_month = $pretty_month;
                  }
              
                  if($current_start_date != $pretty_start_date) {
                    $current_start_date = $pretty_start_date;
                  }
              
                  if($current_end_date != $pretty_end_date) {
                    $current_end_date = $pretty_end_date;
                  }
                  ?>
                  <div class="schedule-item">
                    <div class="schedule-item-date">
                      <h6><?php echo $current_month; ?><br> <?php echo $current_start_date . '/' . $current_end_date; ?></h6>
                    </div>
                    <div class="schedule-item-info">
                      <a href="<?php echo $url ?>" target="_blank">
                        <h6><?php the_title(); ?></h6>
                      </a>
                      <p><?php the_content(); ?></p>
                    </div>
                  </div>
                  <?php
                endwhile; wp_reset_query();
              endif;
            ?>
    </section>
</section>
</main>

<?php 
    get_footer();
?>