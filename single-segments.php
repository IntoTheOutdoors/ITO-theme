<?php 
    get_header('second');
    // $topic_id = get_the_ID();
    $topic = get_posts([
        'post_type' => 'topics',
        'meta_query' => [
            [
                'key' => 'curriculum_videos',
                'value' => '"' . get_the_ID() . '"',
                'compare' => 'LIKE'
            ]
        ]
    ]);

    $curriculum_id = $post->ID;
    $topic_id = $topic[0]->ID;
?> 

<main>
<div class="episode container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo home_url(); ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo site_url('episodes-lessons'); ?>">Episodes-Lessons</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php the_title(); ?></li>
        </ol>
    </nav>
    
    <section class="episode-video">
        <!-- EPISODE PLAYER HERE -->
            <div class="episode-video-player">    
                <?php 
                    if(get_post_type() == "segments") {
                        get_template_part( 'template-parts/single', 'episode-player', [
                            'topic_id' => $curriculum_id
                        ]);
                    }
                    if (get_post_type() == "topics") {
                        get_template_part( 'template-parts/single', 'episode-player', [
                            'topic_id' => $topic_id
                        ]);
                    }
                ?>
            </div>
            <div class="episode-video-list">
                <?php 
                    get_template_part( 'template-parts/single', 'episode-lists', [
                        'topic_id' => $topic_id
                    ]);
                ?>
            </div>
    </section>
       
    <!-- END OF EPISODE LIST -->
    <section class="episode-details">
        <div class="episode-details-tabs">
            <?php get_template_part('template-parts/single-episode', 'details', [
                'topic_id' => $topic_id
            ]); ?>
        </div>
        <div class="episode-details-related">
            <?php get_template_part('template-parts/single-episode', 'related', [
                'topic_id' => $topic_id
            ]); ?>
        </div>
    </section>  
    
</div>    
</main>

<?php get_footer(); ?>


