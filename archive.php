<?php 
    get_header('second'); 
    ?>
     <main class="blog container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo get_the_permalink(get_page_by_path('blog')); ?>">Blog</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    <?php if(is_archive()) echo 'Archives'; ?>
                    <?php if(is_category()) echo '/ Category'; ?>
                </li>
            </ol>
        </nav>
        <div class="blog-content">
            <div class="blog-content-cards">
                <?php 
                $i = 0;
                while(have_posts()): the_post(); $i++
                ?>
                <div class="blog-item card shadow overlay" style="background-image: url(<?php the_post_thumbnail_url(); ?>">
                        <a href="<?php the_permalink(); ?>">
                            <div class="blog-item-overlay">
                                <h5><?php the_title(); ?></h5>
                                <?php 
                                    if($i == 1): 
                                ?>
                                        <p class="blog-item-overlay-new">New</p>
                                <?php 
                                    else: 
                                ?>
                                        <p>Read More</p>
                                <?php
                                    endif;
                                ?>
                            </div>
                        </a>
                </div>
                <?php 
                    endwhile; 
                ?>
            </div>
            <div class="blog-sidebar">
                <?php echo custom_search_form( null, 'Search posts', 'post'); ?>
                <?php dynamic_sidebar( 'primary' ); ?>
            </div>
        </div>
    </main>


<?php
    get_footer();
    
    // get_the_author_meta
    // get_the_date
    // get_the_tags
    // get_tag_link
    // get_the_category
    // previous_posts_link
    // next_posts_link
    // the_post_thumbnail_url
?>
