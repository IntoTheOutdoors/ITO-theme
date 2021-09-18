<!-- this is on episode player portion -->

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

    <!-- single-segments -->
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
            <div class="episode-top">
                <div class="episode-top-container">
                    <div class="episode-player">
                        <?php 
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
                    </div>
                    <div class="episode-info">
                        <div class="episode-info-title">
                            <h5><?php echo the_title(); ?> </h5>
                            <p><?php echo get_the_date(); ?></p>
                        </div>
                        <div class="episode-info-lessons">
                            <?php
                                $topics = get_posts([
                                    'post_type' => 'topics',
                                    'meta_query' => [
                                        [
                                            'key' => 'curriculum_videos',
                                            'value' => '"' . get_the_ID() . '"',
                                            'compare' => 'LIKE'
                                        ]
                                    ]
                                ]);
                            
                                if( $topics ):
                                    foreach( $topics as $topic ): 
                                        $files = get_field('download_all_curriculum', $topic->ID); 
                                        if(!empty($files)):  ?>
                                            <h5>All Lesson Plans for this Episode</h5>
                                            <a href="<?php echo $files['link']; ?>" class="btn btn-primary" target="_blank">Download</a>
                                        <?php
                                        endif;
                                    endforeach;
                                else:
                            ?>
                                <h5>No Lesson Plans to download</h5>
                            <?php
                                endif;                                    
                            ?> 
                        </div>
                    </div>
                </div>
                <!-- EPISODE LISTS HERE -->
                <div class="episode-top-lists">
               
                <h5>Full Episode</h5>
                <?php 
                $topics = get_posts([
                    'post_type' => 'topics',
                    'meta_query' => [
                        [
                            'key' => 'curriculum_videos',
                            'value' => '"' . get_the_ID() . '"',
                            'compare' => 'LIKE'
                        ]
                    ]
                ]);

                if( $topics ):
                    foreach( $topics as $topic ): 
                    ?>
                        <div class="episode-top-lists-full">
                                <?php 
                                    // query for the topics that contain the exact segement
                                $topics = get_posts([
                                    'post_type' => 'topics',
                                    'meta_query' => [
                                        [
                                            'key' => 'curriculum_videos',
                                            'value' => '"' . get_the_ID() . '"',
                                            'compare' => 'LIKE'
                                        ]
                                    ]
                                ]);

                                $full_episodes = get_field('full_episode', $topics[0]->ID);
                                
                                if(!empty($full_episodes)):
                                    $get_youtube_url = get_field('youtube_url', $full_episodes[0]->ID);
                                    $get_vimeo_url = get_field('vimeo_url', $full_episodes[0]->ID);
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
                            
                                <div class="episode-top-lists-full-item load-video" data-episode-title="<?php echo get_the_title($topics[0]->ID); ?>" data-video-embed="<?php echo htmlspecialchars($iframe); ?>">
                                    <p><?php echo $topics[0]->post_title; ?></p>
                                    <!-- Lesson Plans here -->
                                    <?php  
                                        get_template_part('template-parts/single-episode', 'lessons', [
                                            'video_id' => $full_episodes[0]->ID,
                                            'fullepisode' => true
                                        ]); 
                                    ?>
                                </div>

                        </div>

                        <h5>Classroom Videos</h5>
                        <div class="episode-top-lists-curriculum">
                            <?php 
                                $curriculum_videos = get_field('curriculum_videos', $topic->ID);

                                if(is_array($curriculum_videos) || is_object($curriculum_videos)):
                                    foreach($curriculum_videos as $index => $curriculum_video): 
                                        $get_youtube_url = get_field('youtube_url', $curriculum_video->ID);
                                        $get_vimeo_url = get_field('vimeo_url', $curriculum_video->ID);
                                        $updated_url;
                                        if(!empty($get_youtube_url)):
                                            $updated_url = customize_iframe($get_youtube_url); 
                                        else:
                                            $updated_url = customize_iframe($get_vimeo_url);
                                        endif;
                                        // make a the html as a variable
                                        ob_start(); ?>
                                        <iframe src=<?php echo $updated_url; ?> width="900" height="500" frameborder="0" allow="autoplay"></iframe>
                                        <?php 
                                            $iframe = ob_get_clean(); 
                                        ?>
                                    
                                        <div class="episode-top-lists-curriculum-item load-video" 
                                            data-video-embed="<?php echo htmlspecialchars($iframe); ?>" 
                                            data-episode-title="<?php echo htmlspecialchars(get_the_title($curriculum_video->ID)); ?>"
                                        >   
                                            <p><?php echo get_the_title($curriculum_video->ID); ?></p>
                                        
                                            <!-- Lesson Plans here -->    
                                            <?php  get_template_part('template-parts/single-episode', 'lessons', [
                                                'video_id' => $curriculum_video->ID
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
                    <?php
                    endforeach;
                endif;
                ?>
                </div>
            </div>
            <!-- END OF EPISODE LIST -->
            <div class="episode-bottom">
                <div class="episode-bottom-details">
                    <?php 
                        $topics = get_posts([
                            'post_type' => 'topics',
                            'meta_query' => [
                                [
                                    'key' => 'curriculum_videos',
                                    'value' => '"' . get_the_ID() . '"',
                                    'compare' => 'LIKE'
                                ]
                            ]
                        ]);
                        $topic = $topics[0];
                    ?>
                    <?php get_template_part('template-parts/single-episode', 'details', [
                        'topic' => $topic
                    ]); ?>
                </div>
                <div class="episode-bottom-related">
                    <?php get_template_part('template-parts/single-episode', 'related', [
                        'topic_id' => $topic->ID
                    ]); ?>
                </div>
            </div>  
    </section>
    </div>    
</main>

<?php get_footer(); ?>