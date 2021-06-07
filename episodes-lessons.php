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

$args = [
    'post_type' => 'segments',
    'post_status' => 'publish',
    'meta_key' => 'lesson_plans'
];

$query = new WP_Query($args);

if($query->have_posts()) : while($query->have_posts()) : $query->the_post();
    $lessons = get_field('lesson_plans');
    // var_dump($lessons);
    foreach($lessons as $lesson):
        echo get_the_title($lesson->ID);
    endforeach;

endwhile; endif;



get_footer(); ?>

