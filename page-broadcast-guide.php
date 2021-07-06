<?php 
    get_header('second');
?>
<main>
<section class="container">
    <div class="watch">
        <h3>Where to watch</h3>
        <p>We are now available on a variety of streaming channels and platforms. Check out our broadcast guide below to find out when you can catch the show in your neck of the woods. Don’t see your area listed? Watch us– online!</p>
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

            <?php 
            // query custom post type 'shows'
            $args = [
              'post_type' => 'shows',
              'posts_per_page' => -1,
              'order' => 'DESC'
            ];
    
            ?> 
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
    </div>
    <section class="broadcast">
        <h3>BROADCAST TELEVISION & PBS.</h3>
        
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
            <label class="input-group-text" for="broadcast-state">YOU CAN FILTER BY STATE:</label>
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
          <div class="col-6 broadcast-network">
              <h3 class="subheader">Boadcast Station</h3>
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
          <div class="col-6 broadcast-pbs">
                  <h3 class="subheader">PBS Network</h3>
                  <p>Check your local PBS Station for time and episodes.</p>
                  <div class="broadcast-items">
                      <!-- search button only (default) -->
                      <div class="broadcast-item">
                          <table class="table">
                              <thead>
                                <tr>
                                  <th scope="col">Market</th>
                                  <th scope="col">Station</th>
                                  <th scope="col">Air Time</th>
                                </tr>
                              </thead>
                              <tbody class="pbs-results">
                              
                              </tbody>
                            </table>
                      </div>
                  </div>
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
                'posts_per_page' => -1
              ];

              $schedules = new WP_Query($args);

              if($schedules->have_posts()):
                $current_month = "";
                $current_start_date = "";
                $current_end_date = "";
              
                while($schedules->have_posts()): $schedules->the_post();
                  $start_date = get_field('start_date');
                  $end_date = get_field('end_date');
              
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
                      <h5><?php echo $current_month; ?><br> <?php echo $current_start_date . '/' . $current_end_date; ?></h5>
                    </div>
                    <div class="schedule-item-info">
                      <h5><?php the_title(); ?></h5>
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