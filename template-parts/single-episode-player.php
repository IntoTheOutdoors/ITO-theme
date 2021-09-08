
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
    <div class="episode-info-lessons">
        <?php
            $files = get_field('download_all_curriculum', $topic); 
            $curriculum_video = get_field('curriculum_videos', $topic);

            if(!empty($files)):  
        ?>
                <h5>All Lesson Plans for this Episode</h5>
                <a href="<?php echo $files['url']; ?>" class="btn btn-primary" target="_blank">Download</a>
        <?php 
            elseif(empty($curriculum_video)):
        ?>
                <h5>Documentary</h5>
        
        <?php
                else:
        ?>
                <h5>No Lesson Plans to download</h5>
        <?php
            endif; 
        ?> 
    </div>
</div>
