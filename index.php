<?php 
    get_header('second'); 
    
    global $post;
    ?>
    <main>
    <div class="post container">
        <?php while(have_posts()): ?>
            <h3><?php the_post();  ?></h3>
            <div class="post-item">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                <?php
                    the_excerpt();
                ?>            
            </div>
        <?php 
            endwhile; 
            echo custom_search_form( null, 'Search posts', 'post');
            dynamic_sidebar( 'primary' );
        ?>

    </div>
    </main>

<?php
    get_footer();
?>