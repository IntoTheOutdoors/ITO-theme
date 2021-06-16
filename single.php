<?php get_header('second'); ?>
<main>
<div class="episode container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo home_url(); ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo site_url('episodes-lessons'); ?>">Episodes-Lessons</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php the_title(); ?></li>
        </ol>
    </nav>
    
    <div class="episode-videos">
        <?php
            $full_episodes = get_field('full_episode');
            $curriculum_videos = get_field('curriculum_videos');
        ?>
            <!-- EPISODE PLAYER HERE -->
            <div class="episode-player">
            <?php
            if($post->post_type == "topics"): 
                foreach($full_episodes as $full_episode):
                    
                    if(the_field('youtube_url')) {
                        $full_episode =  get_field('youtube_url', $episode->ID);
                        echo customize_iframe($full_episode);
                    } else {    
                        $vimeo_episode = get_field('vimeo_url', $full_episode->ID);
                        $updated_src = customize_iframe($vimeo_episode); ?>
                        <iframe src=<?php echo $updated_src; ?> width="900" height="500" frameborder="0"></iframe>
                    <?php
                    }
                endforeach;
            ?>
            </div>
            <!-- END OF EPISODE PLAYER -->

            <!-- EPISODE LISTS HERE -->
            <div class="episode-lists">
                <h5>Full Episode</h5>
                <div class="episode-lists-full">
                    <?php 
                        $image = wp_get_attachment_image_src( get_post_thumbnail_id( $full_episode->ID ), 'thumbnail' );
                        $full_video = get_field('full_episode');
                        $get_url = get_field('vimeo_url', $full_video[0]->ID);
                        $updated_url = customize_iframe($get_url);
                        ob_start(); ?>
                        <iframe src=<?php echo $updated_url; ?> width="900" height="500" frameborder="0"></iframe>
                        <?php $iframe = ob_get_clean(); ?>
                    <div class="episode-lists-full-item load-video" data-video-embed="<?php echo htmlspecialchars($iframe); ?>">
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
                            <iframe src=<?php echo $updated_url; ?> width="900" height="500" frameborder="0"></iframe>
                            <?php $iframe = ob_get_clean(); ?>
                        
                            <div class="episode-lists-curriculum-item load-video" data-video-embed="<?php echo htmlspecialchars($iframe); ?>">
                                <?php 
                                    $image = wp_get_attachment_image_src( get_post_thumbnail_id( $curriculum_video->ID ), 'thumbnail' ); 
                                ?>
                                <img src="<?php echo $image[0]; ?>" alt="">
                                <p><?php echo get_the_title($curriculum_video->ID); ?></p>
                            </div>
                        <?php endforeach;
                        else: ?>
                            <p><?php echo "No Curriculum Vidoe(s) Available"; ?></p>
                            <?php
                        endif;
                    ?>
                </div>
            </div>
            <!-- END OF EPISODE LIST -->
        <?php
            else: 
                echo "not a segments";
            endif; 
        ?>
    </div>

    
</main>

<?php get_footer(); ?>