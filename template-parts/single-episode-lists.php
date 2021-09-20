 <!-- EPISODE LISTS HERE -->
 <?php
    $topic = $args['topic_id'];
    global $post;
    $post = get_post($topic, OBJECT); 
 ?>
<div class="list-full">
    <h5>Full Episode</h5>
    <?php 
        $full_video = get_field('full_episode', $topic);

        if(!empty($full_video)):
            $get_youtube_url = get_field('youtube_url', $full_video[0]->ID);
            $updated_url;
            if(!empty($get_youtube_url)):
                $updated_url = customize_iframe($get_youtube_url); 
            endif ;
        endif;

        ob_start(); ?>
        <iframe src=<?php echo $updated_url; ?> frameborder="0" allow="autoplay"></iframe>
        <?php $iframe = ob_get_clean(); ?>

    <!-- AJAX call -->
    <div class="load-video load-details load-resources list-item" 
        data-episode-title="<?php echo get_the_title($full_video[0]->ID); ?>" 
        data-video-embed="<?php echo htmlspecialchars($iframe); ?>"
        data-video-id="<?php echo htmlspecialchars($full_video[0]->ID); ?>"
        data-topic-id="<?php echo htmlspecialchars($topic) ?>"     
    >
        <p><?php echo get_the_title($topic); ?></p>

        <!-- Lesson Plans here -->
        <?php  
            get_template_part('template-parts/single-episode', 'lessons', [
                'video_id' => $full_video[0]->ID,
                'fullepisode' => true
            ]); 
        ?>
    </div>
</div>

<h5>Videos Lesson Plan</h5>
<div class="list-curriculum">
<?php 
    // loop through curriculum videos under the episode post
    $curriculum_videos = get_field('curriculum_videos');
    if(is_array($curriculum_videos) || is_object($curriculum_videos)):
        foreach($curriculum_videos as $index => $curriculum_video): 
            $get_url = get_field('youtube_url', $curriculum_video->ID);
            $updated_url = customize_iframe($get_url);

            // make a the html as a variable
            ob_start(); ?>
            <iframe src=<?php echo $updated_url; ?>  frameborder="0" allow="autoplay"></iframe>
            <?php 
                $iframe = ob_get_clean(); 
            ?>
            <div class="accordion" id="accordion<?php echo $index; ?>">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading<?php echo $index; ?>">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $index; ?>" aria-expanded="true" aria-controls="collapse<?php echo $index; ?>">
                        <?php echo $index + 1; ?>: <?php echo get_the_title($curriculum_video->ID); ?>
                    </button>
                    </h2>
                    <div id="collapse<?php echo $index; ?>" class="accordion-collapse collapse" aria-labelledby="heading<?php echo $index; ?>" data-bs-parent="#accordion<?php echo $index; ?>">
                    <div class="accordion-body">
                         <!-- Once the element is clicked -> check main.js to change the html -->
                        <div class="load-video load-details load-resources list-item" 
                            data-video-embed="<?php echo htmlspecialchars($iframe); ?>" 
                            data-curriculum-title="<?php echo htmlspecialchars(get_the_title($curriculum_video->ID)); ?>"  
                            data-video-id="<?php echo htmlspecialchars($curriculum_video->ID); ?>"         
                            data-topic-id="<?php echo htmlspecialchars($topic) ?>"     
                        >
                            <p><span><i class="fas fa-play-circle"></i> Video: </span><?php echo get_the_title($curriculum_video->ID); ?></p>
                        </div>
                        <div class="list-item lesson-plan-item">
                            <!-- Lesson Plans here -->    
                            <?php  get_template_part('template-parts/single-episode', 'lessons', [
                                'video_id' => $curriculum_video->ID
                            ]); ?>
                            <?php 
                                // inserting <hr> element here if needed
                                if ($index != key(array_slice($curriculum_videos, -1, 1, true))):
                            ?>
                            <?php
                                endif; 
                            ?>
                        </div>
                    </div>
                </div>       
            </div>
        <?php 
        endforeach; wp_reset_postdata();
    else: 
    ?>
        <p class="no-content"><?php echo "No Curriculum Video(s) Available"; ?></p>
    <?php
    endif;
    wp_reset_postdata();
    ?>
</div>
