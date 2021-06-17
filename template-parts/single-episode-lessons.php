<h3>Lesson Plan(s)</h3>
<?php
    $files = get_field('download_all_curriculum'); 
    if(!empty($files)):  ?>
        <a href="<?php echo $files['link']; ?>" class="btn btn-secondary" target="_blank">download all</a>
    <?php endif; ?>