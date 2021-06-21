<?php 
$curriculum_video = $args['curriculum'];

if(!empty($curriculum_video)):
    if(the_field('youtube_url')):
        $full_episode =  get_field('youtube_url', $episode->ID);
        echo customize_iframe($full_episode);
    else:
        $vimeo_episode = get_field('vimeo_url', $full_episode->ID);
        $updated_src = customize_iframe($vimeo_episode); ?>
        <iframe src=<?php echo $updated_src; ?>  frameborder="0" allow="autoplay"></iframe>
    
    <?php 
    endif;
else:
    $full_episodes = get_field('full_episode');

    foreach($full_episodes as $full_episode):
        
        if(the_field('youtube_url')):
            $full_episode =  get_field('youtube_url', $episode->ID);
            echo customize_iframe($full_episode);
        else:
            $vimeo_episode = get_field('vimeo_url', $full_episode->ID);
            $updated_src = customize_iframe($vimeo_episode); ?>
            <iframe src=<?php echo $updated_src; ?>  frameborder="0" allow="autoplay"></iframe>
        <?php 
        endif; 
    endforeach;
endif;
?>
