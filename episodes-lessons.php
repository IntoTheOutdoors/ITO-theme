<?php 
    get_header('second');


    while (have_posts()) : the_post(); ?>
    <main class="wrapper">
        <div class="container episodes">
            <div class="row">
                <div class="col-4 filter">
                    <?php  get_template_part('template-parts/episodes-lessons', 'sidebar'); ?>
                </div>
                <div class="col-8">
                    <?php    get_template_part('template-parts/episodes-lessons', 'results'); ?>
                </div>
            </div>
        </div>
    </main>
    
<?php 
endwhile;


get_footer(); ?>

