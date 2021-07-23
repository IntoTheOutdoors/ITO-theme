<?php
/**
* Template Name: Initiatives
*/
?>
<?php 
    get_header('second');
?>
    <div class="container initiative">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo home_url(); ?>">Home</a></li>
                <li class="breadcrumb-item"><a href="<?php echo site_url('partners'); ?>">Partners</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php the_title(); ?></li>
            </ol>
        </nav>
        <h2><?php echo the_title(); ?></h2>
    <?php
        if(have_rows('contents')):
            // loop through rows
            while(have_rows('contents')): the_row();

                // header
                if(get_row_layout() == 'header'):
                    $title = get_sub_field('title');
                    $id = get_sub_field('id');
                    ?>
                        <div class="<?php echo $id; ?> initiative-title">
                            <h3><?php echo $title; ?></h3>
                        </div>
                    <?php
                endif;

                // text area
                if(get_row_layout() == 'text_area'):
                    $content = get_sub_field('content');
                    ?>
                        <div class="initiative-textarea">
                            <?php echo $content; ?>
                        </div>
                    <?php
                endif;

                // textarea with image
                if(get_row_layout() == 'text_area_with_image'):
                    $title = get_sub_field('title');
                    $subtitle = get_sub_field('sub_title');
                    $image = get_sub_field('image');
                    $content = get_sub_field('content');
                    $layout = get_sub_field('layout');
                    ?>

                    <?php
                        if($layout == 'left'):
                    ?>
                        <div class="row initiative-textAreaWithImage">
                            <div class="col-lg-4 col-md-6 col-sm-12 initiative-textAreaWithImage-one">
                                    <div class="initiative-textAreaWithImage-one-text">
                                        <h5><?php echo number_format($title); ?></h5>
                                        <p><?php echo $subtitle; ?></p>
                                    </div>
                                    <div class="initiative-textAreaWithImage-one-image">
                                        <img class="align-self-start" src="<?php echo $image['url']; ?>" alt="text area picture">
                                    </div>
                            </div>    
                            <div class="col-lg-8 col-md-6 col-sm-12 initiative-textAreaWithImage-two">
                                    <?php echo $content; ?>
                            </div>
                        </div>      
                    <?php
                        else:
                    ?>
                        <div class="row initiative-textAreaWithImage">
                            <div class="col-lg-8 col-md-6 col-sm-12 initiative-textAreaWithImage-two">
                                    <?php echo $content; ?>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 initiative-textAreaWithImage-one">
                                <div class="initiative-textAreaWithImage-one-text">
                                    <h5><?php echo number_format($title); ?></h5>
                                    <p><?php echo $subtitle; ?></p>
                                </div>
                                <div class="initiative-textAreaWithImage-one-image">
                                    <img class="align-self-start" src="<?php echo $image['url']; ?>" alt="text area picture">
                                </div>
                            </div>    
                        </div>      
                    <?php
                        endif;
                endif;
                ?>

                <?php
                 // textarea with video
                if(get_row_layout() == 'text_area_with_video'):
                    $title = get_sub_field('title');
                    $video = get_sub_field('video');
                    $content = get_sub_field('content');
                    $layout = get_sub_field('layout');
                    ?>

                    <?php
                        if($layout == 'left'):
                    ?>
                        <div class="row initiative-textAreaWithVideo">
                            <div class="col-lg-6 col-md-6 col-sm-12 initiative-textAreaWithVideo-item initiative-textAreaWithVideo-two">
                                <?php echo $video; ?>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 initiative-textAreaWithVideo-item initiative-textAreaWithVideo-one">
                                    <h4><?php echo ($title); ?></h4>
                                    <?php echo $content; ?>        
                            </div>    
                        </div>      
                    <?php
                        else:
                    ?>
                        <div class="row initiative-textAreaWithVideo">
                            <div class="col-lg-6 col-md-6 col-sm-12 initiative-textAreaWithVideo-item initiative-textAreaWithVideo-one">
                                <h4><?php echo $title; ?></h4>
                                <?php echo $content; ?>
                            </div>    
                            <div class="col-lg-6 col-md-6 col-sm-12 initiative-textAreaWithVideo-item initiative-textAreaWithVideo-two">
                                <?php echo $video; ?>
                            </div>
                        </div>      
                    <?php
                        endif;
                endif;
                ?>

                <?php
                // gallery
                if(get_row_layout() == 'gallery'):
                ?>
                    <div class="initiative-gallery">
                    <?php
                        $images = get_sub_field('gallery');

                        if( $images % 2 == 0 ): ?>
                            <ul>
                                <?php foreach( $images as $image ): ?>
                                    <li>
                                        <a href="<?php echo esc_url($image['url']); ?>">
                                            <img src="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" style="max-width: 50%;" />
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php
                        elseif ($images % 3 == 0):
                        ?>
                            <ul>
                                <?php foreach( $images as $image ): ?>
                                    <li>
                                        <a href="<?php echo esc_url($image['url']); ?>">
                                            <img src="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" style="max-width: 30%;" />
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php 
                        else:
                        ?>
                            <ul>
                                <?php foreach( $images as $image ): ?>
                                    <li>
                                        <a href="<?php echo esc_url($image['url']); ?>">
                                            <img src="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" style="max-width: 100%;" />
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php
                        endif; 
                        ?>
                    </div>
                    <?php
                endif;

                // image
                if(get_row_layout() == 'image'):
                    $image = get_sub_field('image');
                ?>
                    <div class="initiative-image">
                        <img src="<?php echo $image['url']; ?>" alt="image initiative">
                    </div>
                <?php
                endif;

                //video
                if(get_row_layout() == 'video'):
                    $video = get_sub_field('video');
                ?>
                    <div class="initiative-video">
                        <?php echo $video; ?>
                    </div>
                <?php
                endif;

                // bullet list
                if(get_row_layout() == 'bullet_list'):
                    if(have_rows('bullet_items')):
                        ?>
                        <div class="row initiative-lists">
                        <?php
                        while(have_rows('bullet_items')): the_row();
                            $title = get_sub_field('title');
                            $text_area = get_sub_field('text_area');
                            $icon = get_sub_field('icon');
                        ?>
                                <div class="col-lg-4 col-md-4 col-sm-6 initiative-lists-item initiative-lists-item-one">
                                    <?php echo $icon; ?>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-6 initiative-lists-item initiative-lists-item-two">
                                    <h5><?php echo $title; ?></h5>
                                    <p><?php echo $text_area; ?></p>
                                </div>
                        <?php
                        endwhile;
                        ?>
                        </div>
                        <?php
                    endif;
                endif;
            endwhile;
        endif;
    ?>
    </div>
    <?php
    get_footer();
?>