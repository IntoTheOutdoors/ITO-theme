<?php 
    /* Template Name: Episodes-Lessons */
    get_header('second');


    while (have_posts()) : the_post(); ?>

    <div class="container episodes">
        <div class="row">
            <div class="col-4 filter">
                <?php  get_template_part('template-parts/content-el', 'sidebar'); ?>
            </div>
            <div class="col-8">
                <?php    get_template_part('template-parts/content', 'el'); ?>
            </div>
        </div>
    </div>

    
<?php 
endwhile;


get_footer(); ?>

