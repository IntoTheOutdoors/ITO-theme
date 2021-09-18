
<div class="episode-player">
    <?php 
        // Get full episode and then auto play the video 
        $topic = $args['topic_id'];

        $full_episodes = get_field('full_episode', $topic); 

        if(!empty($full_episodes)):
        foreach($full_episodes as $full_episode):
            $get_youtube_url = get_field('youtube_url', $full_episode->ID);
            
            $updated_url;

            if(!empty($get_youtube_url)):
                $updated_url = customize_iframe($get_youtube_url); 
            endif;
            ?>
            <iframe src=<?php echo $updated_url; ?> frameborder="0" allow="autoplay"></iframe>
            <?php
        endforeach;
        endif;              
    ?>
</div>
<div class="episode-info">
    <!-- This is for the information below the embedded video -->
    <div class="episode-info-title">
        <h5><?php echo get_the_title($topic); ?> </h5>
        <p><?php echo get_the_date('F j, Y' , $topic); ?></p>
    </div>
</div>
