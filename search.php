<?php 
    get_header('second'); 
    
    ?>
    <main class="blog container">
        <?php 
            if(have_posts()):
        ?>
            <h3>Blog</h3>
        <?php
            else:
        ?>
            <h3> Results </h3>
        <?php 
            endif;
        ?>
        <div class="blog-content">
            <div class="blog-content-cards">
                <?php 
                if(have_posts()):
                    $i = 0;
                    while(have_posts()): the_post(); $i++
                    ?>
                    <div class="blog-item card shadow overlay" style="background-image: url(<?php the_post_thumbnail_url(); ?>">
                            <a href="<?php the_permalink(); ?>">
                                <div class="blog-item-overlay">
                                    <h5><?php the_title(); ?></h5>
                                    <p>Read More</p>
                                    
                                </div>
                            </a>
                    </div>
                    <?php 
                    endwhile; 
                else: ?>
                    <div class="blog-item">
                        <p>Sorry, we couldn't find any results.</p>
                    </div>
                <?php 
                endif;
                ?>
            </div>
            <div class="blog-sidebar">
                <?= custom_search_form( null, 'Search posts', 'post'); ?>
                <?php dynamic_sidebar( 'primary' ); ?>
            </div>
        </div>
    </main>

<?php
    get_footer();
?>