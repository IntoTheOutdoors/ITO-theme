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
    
    <?php 
        if($post->post_type == "topics"): 
    ?>
    <section class="episode-videos">
        <!-- EPISODE PLAYER HERE -->
            <div class="episode-top">
                <div class="episode-top-container">
                    <div class="episode-player">
                        <?php get_template_part( 'template-parts/single-episode', 'player' ); ?>
                    </div>
                    <div class="episode-info">
                        <div class="episode-info-title">
                            <h5><?php echo the_title(); ?> </h5>
                            <p><?php echo get_the_date(); ?></p>
                        </div>
                        <div class="episode-info-lessons">
                            <h5>All Lesson Plans</h5>
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
                    <?php  get_template_part('template-parts/single-episode', 'lists'); ?>
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
    <?php 
        // This will be the segments part
        else:
    ?>
    <section class="episode-videos">
            <div class="episode-top">
                <div class="episode-top-container">
                    <div class="episode-player">
                        <?php get_template_part( 'template-parts/single-episode', 'player', [
                            'curriculum' => $post
                        ]); ?>
                    </div>
                    <div class="episode-info">
                        <div class="episode-info-title">
                            <h5><?php echo the_title(); ?> </h5>
                            <p><?php echo get_the_date(); ?></p>
                        </div>
                        <div class="episode-info-lessons">
                            <h5>All Lesson Plans</h5>

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
                                            <a href="<?php echo $files['link']; ?>" class="btn btn-primary" target="_blank">Download</a>
                                        <?php
                                        endif;
                                    endforeach;
                                endif;                                    
                            ?> 
                        </div>
                    </div>
                </div>
                <!-- EPISODE LISTS HERE -->
                <div class="episode-top-lists">
                    <?php  get_template_part('template-parts/single-episode', 'lists', [
                        'curriculum' => $post
                    ]); ?>
                </div>
            </div>
            <!-- END OF EPISODE LIST -->
            <div class="episode-bottom">
                <div class="episode-bottom-details">
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
    <?php
        endif;
    ?>
</div>    
</main>

<?php get_footer(); ?>