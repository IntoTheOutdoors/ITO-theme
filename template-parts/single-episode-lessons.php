<?php 
$video_id = $args['video_id'];
$lesson_plans = get_field('lesson_plans', $video_id);

// Get all lesson plans and push them into one array 'list'
$lesson_plans_lists = [];
if(!empty($lesson_plans)):
    foreach($lesson_plans as $lesson_plan):
        array_push($lesson_plans_lists, $lesson_plan->ID);
    endforeach;
endif;

// query the lesson plan list and filter them by grade
$elementary_query = [
    'post_type' => 'lesson_plans',
    'post__in' => $lesson_plans_lists,
    'tax_query' => [
        'relation' => 'AND',
        [
            'taxonomy' => 'grade_level',
            'field' => 'slug',
            'terms' => 'elementary'
        ]
    ]
];

$middle_school_query = [
    'post_type' => 'lesson_plans',
    'post__in' => $lesson_plans_lists,
    'tax_query' => [
        'relation' => 'AND',
        [
            'taxonomy' => 'grade_level',
            'field' => 'slug',
            'terms' => 'middle-school'
        ]
    ]
];

$high_school_query = [
    'post_type' => 'lesson_plans',
    'post__in' => $lesson_plans_lists,
    'tax_query' => [
        'relation' => 'AND',
        [
            'taxonomy' => 'grade_level',
            'field' => 'slug',
            'terms' => 'high-school'
        ]
    ]
];

$elementary = new WP_Query($elementary_query);
$middle_school = new WP_Query($middle_school_query);
$high_school = new WP_Query($high_school_query);


if(!empty($lesson_plans)): ?>
    <div class="dropdown">
    <a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-display="static" data-bs-toggle="dropdown"  data-flip="false" aria-expanded="false">
        <?php 
        if(count($lesson_plans) > 1): ?>
            <span class="lessonplan-title">Lesson Plans</span> | 
            <?php 
                if($elementary->have_posts()): 
            ?> 
                    <span class="badge bg-primary">E</span> 
            <?php 
                endif;
            ?>
            <?php
                if($middle_school->have_posts()):
            ?>
                    <span class="badge bg-secondary">M</span>
            <?php
                endif;
            ?>
            <?php
                if($high_school->have_posts()):
            ?>
                    <span class="badge bg-warning">H</span>
            <?php
                endif;
            ?>
        <?php 
        else:
        ?>
            <span class="lessonplan-title">Lesson Plan</span>
            <?php 
                if($elementary->have_posts()): 
            ?> 
                    <span class="badge bg-primary">E</span> 
            <?php 
                endif;
            ?>
            <?php
                if($middle_school->have_posts()):
            ?>
                    <span class="badge bg-secondary">M</span>
            <?php
                endif;
            ?>
            <?php
                if($high_school->have_posts()):
            ?>
                    <span class="badge bg-warning">H</span>
            <?php
                endif;
            ?>
        <?php
        endif;
        ?>
    </a>

    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
        <?php 
            if($elementary->have_posts()): 
        ?>
            <hr>
            <h4> Elementary </h4>
        <?php
            while($elementary->have_posts()): $elementary->the_post();
                $lesson_file = get_field('file_upload', $elementary->ID);
                $lesson_url = get_field('url', $elementary->ID);
                $lesson_link = !empty($lesson_file) ? $lesson_file['url'] : $lesson_url;
            ?>
                    <li class="curriculum-download-item">
                        <a class="dropdown-item curriculum-download-link" target="_blank" href="<?php echo $lesson_link; ?>"><i class="fas fa-arrow-down"></i><?php echo get_the_title($elementary->ID); ?></a>
                    </li>
                <?php
            endwhile; wp_reset_postdata();
        endif;

        if($middle_school->have_posts()): 
            ?>
            <hr>
            <h4> Middle School </h4>
        <?php
            while($middle_school->have_posts()): $middle_school->the_post();
                $lesson_file = get_field('file_upload', $middle_school->ID);
                $lesson_url = get_field('url', $middle_school->ID);
                $lesson_link = !empty($lesson_file) ? $lesson_file['url'] : $lesson_url;
            ?>
                    <li class="curriculum-download-item">
                        <a class="dropdown-item curriculum-download-link" target="_blank" href="<?php echo $lesson_link; ?>"><i class="fas fa-arrow-down"></i><?php echo get_the_title($middle_school->ID); ?></a>
                    </li>
                <?php
            endwhile;  wp_reset_postdata();
        endif;

        if($high_school->have_posts()): 
            ?>
            <hr>
            <h4> High School </h4>
        <?php
            while($high_school->have_posts()): $high_school->the_post();
                $lesson_file = get_field('file_upload', $high_school->ID);
                $lesson_url = get_field('url', $high_school->ID);
                $lesson_link = !empty($lesson_file) ? $lesson_file['url'] : $lesson_url;
            ?>
                    <li class="curriculum-download-item">
                        <a class="dropdown-item curriculum-download-link" target="_blank" href="<?php echo $lesson_link; ?>"><i class="fas fa-arrow-down"></i><?php echo get_the_title($high_school->ID); ?></a>
                    </li>
                <?php
            endwhile;  wp_reset_postdata();
        endif;
    
        ?>
    </ul>
    </div>

<?php endif;
?>
