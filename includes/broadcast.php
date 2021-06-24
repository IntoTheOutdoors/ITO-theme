<?php 

add_action( 'wp_ajax_nopriv_network_broadcast', 'network_broadcast_ajax' );
add_action( 'wp_ajax_network_broadcast', 'network_broadcast_ajax' );


function network_broadcast_ajax() {
    $state = $_POST['broadcast-state'];
    
    $args = [
        'post_type'		=> 'stations',
        'numberposts'	=> -1,
        'meta_query' => [
            [
                'key' => 'state',
                'value' => $state
            ],
            [
                'key' => 'broadcast',
                'value' => ['network']
            ]
        ]
    ];
    
    $networks = new WP_Query($args);
    ?>

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
                        if($networks->have_posts()):
                            while($networks->have_posts()): $networks->the_post();
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
                                                        ?><br><?php
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
    <div class="col-6 broadcast-network">
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
                                    'value' => $state
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

    <?php 
    die();   
}