<?php 
    get_header('second');


    while (have_posts()) : the_post(); ?>
    <main class="wrapper">
        <div class="container episodes">
            <h3>Below you can watch episodes as seen on PBS and explore video lesson plans made for classroom or at-home learning and adventure.</h3>
            <div class="row">
                <div class="col-lg-4 col-md-3 col-sm-6 episodes-sidebar">
                    <?php  get_template_part('template-parts/episodes-lessons', 'sidebar'); ?>
                </div>
                <div class="col-lg-8 col-md-9 col-sm-6 episodes-results">
                    <?php    get_template_part('template-parts/episodes-lessons', 'results'); ?>
                </div>
            </div>
        </div>
    </main>
    
<?php 
endwhile;


get_footer(); ?>

