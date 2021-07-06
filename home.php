<?php 
    get_header('second'); 
    
    ?>
    <main class="blog container">
        <h3>Blog</h3>
        <div class="blog-content">
            <div class="blog-content-cards">
                <?php 
                $i = 0;
                while(have_posts()): the_post(); $i++
                ?>
                <div class="blog-item card shadow overlay" style="background-image: url(<?php the_post_thumbnail_url(); ?>">
                        <a href="<?php the_permalink(); ?>">
                            <div class="blog-item-overlay">
                                <h5><?php the_title(); ?></h5>
                                <?php 
                                    if($i == 1): 
                                ?>
                                        <p class="blog-item-overlay-new">New</p>
                                <?php 
                                    else: 
                                ?>
                                        <p>Read More</p>
                                <?php
                                    endif;
                                ?>
                            </div>
                        </a>
                </div>
                <?php 
                    endwhile; 
                ?>
            </div>
            <div class="blog-sidebar">
                <?php echo custom_search_form( null, 'Search posts', 'post'); ?>
                <?php dynamic_sidebar( 'primary' ); ?>
            </div>
        </div>
    </main>

<?php
    get_footer();
?>