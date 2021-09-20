<?php 
    /**
     * Template Name: About
     */
    get_header('second'); 
?>

    <main class="container">
        <div class="about">
            <?php 
                if(have_rows('contents')):
                    while(have_rows('contents')): the_row();
                        // textarea with image
                        if(get_row_layout() == 'text_area_with_image'):
                            $title = get_sub_field('title');
                            $subtitle = get_sub_field('sub_title');
                            $image = get_sub_field('image');
                            $content = get_sub_field('content');
                            $layout = get_sub_field('layout');
                            ?>

                            <div class="row about-textAreaWithImage">
                                    <div class="col-lg-8 col-md-6 col-sm-12 about-textAreaWithImage-two">
                                        <h3 class="header"><?php the_title(); ?></h3>    
                                        <?php echo $content; ?>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12 about-textAreaWithImage-one">
                                        <div class="about-textAreaWithImage-one-text">
                                            <h3><?php echo $title; ?></h3>
                                        </div>
                                        <div class="about-textAreaWithImage-one-image">
                                            <img class="align-self-start" src="<?php echo $image['url']; ?>" alt="text area picture">
                                        </div>
                                    </div>    
                                </div>      
                            <?php
                        endif;
                    endwhile;
                endif;
            ?>
        </div>
    </main>


<?php get_footer(); ?>