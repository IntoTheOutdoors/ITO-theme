<?php 
$curriculum_id = $args['curriculum_id'];


$lesson_plans = get_field('lesson_plans', $curriculum_id);

if(!empty($lesson_plans)): ?>
    <div class="dropdown">
    <a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fas fa-arrow-circle-down"></i>
        <?php 
        if(count($lesson_plans) > 1): ?>
            <span>Lesson Plans</span>
        <?php 
        else:
        ?>
            <span>Lesson Plan</span>
        <?php
        endif;
        ?>
    </a>

    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
        <?php 
        if(is_array($lesson_plans) || is_object($lesson_plans)):
            foreach($lesson_plans as $lesson_plan):
                $lesson_file = get_field('file_upload', $lesson_plan->ID);
                $lesson_url = get_field('url', $lesson_plan->ID);
                $lesson_link = !empty($lesson_file) ? $lesson_file['url'] : $lesson_url;
                ?>

                    <li>
                        <a class="dropdown-item" target="_blank" href="<?php echo $lesson_link; ?>"><?php echo get_the_title($lesson_plan->ID); ?></a>
                    </li>
                <?php 
            endforeach; 
        endif; 
        ?>
    </ul>
    </div>

<?php endif;
?>
