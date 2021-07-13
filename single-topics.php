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
    
    <section class="episode-videos">
        <!-- EPISODE PLAYER HERE -->
            <div class="episode-top">
                <div class="episode-top-container">
                    <div class="episode-player">
                        <?php 
                             $full_episodes = get_field('full_episode'); 

                            if(!empty($full_episodes)):
                             foreach($full_episodes as $full_episode):
                                $get_youtube_url = get_field('youtube_url', $full_episode->ID);
                                $get_vimeo_url = get_field('vimeo_url', $full_episode->ID);
                                
                                $updated_url;
                                if(!empty($get_youtube_url)):
                                    $updated_url = customize_iframe($get_youtube_url); 
                                else:
                                    $updated_url = customize_iframe($get_vimeo_url);
                                endif;
                                ?>
                                <iframe src=<?php echo $updated_url; ?> frameborder="0" allow="autoplay"></iframe>
                                <?php
                             endforeach;
                            endif;              
                        ?>
                    </div>
                    <div class="episode-info">
                        <div class="episode-info-title">
                            <h5><?php echo the_title(); ?> </h5>
                            <p><?php echo get_the_date(); ?></p>
                        </div>
                        <div class="episode-info-lessons">
                            <h5>All Lesson Plans for this Episode</h5>
                            <?php
                                $files = get_field('download_all_curriculum'); 
                                if(!empty($files)):  ?>
                                    <a href="<?php echo $files['link']; ?>" class="btn btn-primary" target="_blank">Download</a>
                            <?php 
                                endif; 
                            ?> 
                        </div>
                    </div>
                </div>
                <!-- EPISODE LISTS HERE -->
                <div class="episode-top-lists">
                    <h5>Full Episode</h5>
                    <div class="episode-top-lists-full">
                        <?php 
                            $full_video = get_field('full_episode');

                            if(!empty($full_video)):
                                $get_youtube_url = get_field('youtube_url', $full_video[0]->ID);
                                $get_vimeo_url = get_field('vimeo_url', $full_video[0]->ID);
                                $updated_url;
                                if(!empty($get_youtube_url)):
                                    $updated_url = customize_iframe($get_youtube_url); 
                                else:
                                    $updated_url = customize_iframe($get_vimeo_url);
                                endif;
                            endif;

                            ob_start(); ?>
                            <iframe src=<?php echo $updated_url; ?> frameborder="0" allow="autoplay"></iframe>
                            <?php $iframe = ob_get_clean(); ?>
                        <div class="episode-top-lists-full-item load-video" data-episode-title="<?php echo get_the_title($full_video->ID); ?>" data-video-embed="<?php echo htmlspecialchars($iframe); ?>">
                            <p><?php the_title(); ?></p>

                            <!-- Lesson Plans here -->
                            <?php  
                                get_template_part('template-parts/single-episode', 'lessons', [
                                    'curriculum_id' => $full_video[0]->ID,
                                    'fullepisode' => true
                                ]); 
                            ?>
                        </div>

                    </div>

                    <h5>Classroom Videos</h5>
                    <div class="episode-top-lists-curriculum">
                        <?php 
                            $curriculum_videos = get_field('curriculum_videos');
                            if(is_array($curriculum_videos) || is_object($curriculum_videos)):
                            foreach($curriculum_videos as $index => $curriculum_video): 
                                $get_url = get_field('vimeo_url', $curriculum_video->ID);
                                $updated_url = customize_iframe($get_url);
                                
                                // make a the html as a variable
                                ob_start(); ?>
                                <iframe src=<?php echo $updated_url; ?>  frameborder="0" allow="autoplay"></iframe>
                                <?php 
                                    $iframe = ob_get_clean(); 
                                ?>
                                <div class="episode-top-lists-curriculum-item">
                                    <div class="load-video" 
                                        data-video-embed="<?php echo htmlspecialchars($iframe); ?>" 
                                        data-episode-title="<?php echo htmlspecialchars(get_the_title($curriculum_video->ID)); ?>"
                                    >
                                        <p><?php echo get_the_title($curriculum_video->ID); ?></p>
                                    
                                    </div>
                                    <!-- Lesson Plans here -->    
                                    <?php  get_template_part('template-parts/single-episode', 'lessons', [
                                        'curriculum_id' => $curriculum_video->ID
                                    ]); ?>
                                    <?php 
                                        if ($index != key(array_slice($curriculum_videos, -1, 1, true))):
                                    ?>  
                                    <hr>
                                    <?php 
                                        endif; 
                                    ?>
                                </div>
                            <?php 
                            endforeach;
                            else: 
                            ?>
                                <p class="no-content"><?php echo "No Curriculum Video(s) Available"; ?></p>
                            <?php
                            endif;
                            ?>
                    </div>
                </div>
            </div>
       
       
            <!-- END OF EPISODE LIST -->
            <div class="episode-bottom">
                <div class="episode-bottom-details">
                    <?php get_template_part('template-parts/single-episode', 'details'); ?>
                </div>
                <div class="episode-bottom-related">
                    <?php 
                        $topic = get_the_ID(); 
                    ?>
                    <?php get_template_part('template-parts/single-episode', 'related', [
                        'topic_id' => $topic
                    ]); ?>
                </div>
            </div>  
       
    </section>
</div>    
</main>

<?php get_footer(); ?>


