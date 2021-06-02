<?php 
    /* Template Name: Episodes-Lessons */
    get_header('second');


    while (have_posts()) : the_post(); ?>

    <div data-css-flex="container">
        <div data-css-flex="row-col">
        <?php 
            get_template_part('template-parts/content-el', 'sidebar');
            get_template_part('template-parts/content', 'el');
        ?>
        </div>
    </div>
<?php 
endwhile;

get_footer(); ?>