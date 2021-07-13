<?php 
    /**
     * Template Name: About
     */
    get_header('second'); 
?>
<?php 
    if(have_posts()): ?>
        <main>
            <div class="about container">
                <h3 class="header"><?php the_title(); ?></h3>
        
                <p><?php the_content(); ?></p>
            </div>
        </main>
<?php 
    endif;
?>

<?php get_footer(); ?>