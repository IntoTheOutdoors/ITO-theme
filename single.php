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
        <!-- EPISODE PLAYER HERE -->
        <div class="episode-container">
            <div class="episodes-video-container">
                <?php
                if($post->post_type == "topics"): ?>
                <div class="episode-player">
                    <?php get_template_part( 'template-parts/single-episode', 'player' ); ?>
                </div>
                <div class="episode-info">
                    <div class="episode-info-title">
                        <h3><?php echo the_title(); ?> </h3>
                        <p><?php echo get_the_date(); ?></p>
                    </div>
                    <div class="episode-info-lessons">
                        <?php get_template_part('template-parts/single-episode', 'lessons'); ?>
                    </div>
                </div>
            </div>
            <!-- EPISODE LISTS HERE -->
            <div class="episode-lists">
                <?php  get_template_part('template-parts/single-episode', 'lists'); ?>
            </div>
        </div>
        <!-- END OF EPISODE PLAYER -->


        <!-- END OF EPISODE LIST -->
        <div class="episode-details">
            <?php get_template_part('template-parts/single-episode', 'details'); ?>
        </div>
        <?php
            else: 
                echo "not a topic";
            endif; 
        ?>
    </div>
</div>    
</main>

<?php get_footer(); ?>