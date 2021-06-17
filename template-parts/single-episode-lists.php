<h5>Full Episode</h5>

<?php $curriculum_videos = get_field('curriculum_videos'); ?>
<div class="episode-lists-full">
    <?php 
        $image = wp_get_attachment_image_src( get_post_thumbnail_id( $full_episode->ID ), 'thumbnail' );
        $full_video = get_field('full_episode');
        $get_url = get_field('vimeo_url', $full_video[0]->ID);
        $updated_url = customize_iframe($get_url);

        ob_start(); ?>
        <iframe src=<?php echo $updated_url; ?> width="900" height="500" frameborder="0" allow="autoplay"></iframe>
        <?php $iframe = ob_get_clean(); ?>
    <div class="episode-lists-full-item load-video" data-episode-title="<?php echo get_the_title($full_video->ID); ?>" data-video-embed="<?php echo htmlspecialchars($iframe); ?>">
        <img src="<?php echo $image[0]; ?>" alt="">
        <p><?php the_title(); ?></p>
    </div>
</div>
<h5>Curriculum Videos</h5>
<div class="episode-lists-curriculum">
    <?php 
        if(is_array($curriculum_videos) || is_object($curriculum_videos)):
        foreach($curriculum_videos as $curriculum_video): 
        
            $get_url = get_field('vimeo_url', $curriculum_video->ID);
            $updated_url = customize_iframe($get_url);
            
            // make a the html as a variable
            ob_start(); ?>
            <iframe src=<?php echo $updated_url; ?> width="900" height="500" frameborder="0" allow="autoplay"></iframe>
            <?php 
                $iframe = ob_get_clean(); 
            ?>
        
            <div class="episode-lists-curriculum-item load-video" 
                data-video-embed="<?php echo htmlspecialchars($iframe); ?>" 
                data-episode-title="<?php echo htmlspecialchars(get_the_title($curriculum_video->ID)); ?>"
            >
                <?php 
                    $image = wp_get_attachment_image_src( get_post_thumbnail_id( $curriculum_video->ID ), 'thumbnail' ); 
                ?>
                <img src="<?php echo $image[0]; ?>" alt="">
                <p><?php echo get_the_title($curriculum_video->ID); ?></p>
            </div>
        <?php endforeach;
        else: ?>
            <p class="no-content"><?php echo "No Curriculum Video(s) Available"; ?></p>
            <?php
        endif;
    ?>
</div>