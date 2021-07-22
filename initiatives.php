<?php
/**
* Template Name: Initiatives
*/
?>
<?php 
    get_header('second');
?>
    <div class="container initiative">
        <h2><?php echo the_title(); ?></h2>
    <?php
        if(have_rows('contents')):
            // loop through rows
            while(have_rows('contents')): the_row();
                if(get_row_layout() == 'header'):
                    $title = get_sub_field('title');
                    $id = get_sub_field('id');
                    ?>
                        <div class="<?php echo $id; ?> initiative-title">
                            <h3><?php echo $title; ?></h3>
                        </div>
                    <?php
                endif;

                if(get_row_layout() == 'text_area'):
                    $content = get_sub_field('content');
                    ?>
                        <div class="initiative-textarea">
                            <?php echo $content; ?>
                        </div>
                    <?php
                endif;

                if(get_row_layout() == 'text_area_with_image'):
                    $title = get_sub_field('title');
                    $image = get_sub_field('image');
                    $content = get_sub_field('content');
                    $layout = get_sub_field('layout');
                    ?>
                    <div class="initiative-textareaWithImage">
                        <div class="row">
                        <?php 
                            if($layout == 'left'):
                        ?>
                                <div class="col-lg-6 col-md-7 col-sm-12">
                                    <img src="<?php echo $image['url'] ?>" alt="image side one">
                                </div>

                                <div class="col-lg-6 col-md-5 col-sm-12">
                                    <?php echo $content; ?>
                                </div>
                        <?php
                            else:
                        ?>
                                <div class="col-lg-6 col-md-7 col-sm-12">
                                        <?php echo $content; ?>
                                    </div>

                                    <div class="col-lg-6 col-md-5 col-sm-12">
                                        <img src="<?php echo $image['url'] ?>" alt="image side one">
                                </div>      
                        <?php
                            endif;
                        ?>
                        </div>
                    </div>                    
                    <?php
                endif;
                ?>
                <?php
                if(get_row_layout() == 'gallery'):
                ?>
                    <div class="initiative-gallery">
                    <?php
                    $images = get_sub_field('gallery');
                    if( $images ): ?>
                        <ul>
                            <?php foreach( $images as $image ): ?>
                                <li>
                                    <a href="<?php echo esc_url($image['url']); ?>">
                                        <img src="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                    </div>
                    <?php
                endif;

                if(get_row_layout() == 'image'):
                    $image = get_sub_field('image');
                ?>
                    <div class="initiative-image">
                        <img src="<?php echo $image['url']; ?>" alt="image initiative">
                    </div>
                <?php
                endif;
            endwhile;
        endif;
    ?>
    </div>
    <?php
    get_footer();
?>