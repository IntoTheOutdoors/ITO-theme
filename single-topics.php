<?php 
    get_header('second');
    $topic_id = get_the_ID(); 
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
                    get_template_part( 'template-parts/single', 'episode-player', [
                        'topic_id' => $topic_id
                    ]);
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


