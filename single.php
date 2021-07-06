<?php 
    get_header('second'); 

    while(have_posts()) {
        the_post(); 
        ?>
    <main class="single container">
        <div class="single-content">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo get_the_permalink(get_page_by_path('blog')); ?>">Blog</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?php the_title(); ?></li>
                </ol>
            </nav>
            <h4><?php the_title(); ?></h4>
            <div class="single-content-item">
                <div class="single-content-item-floated">
                    <img src="<?php echo get_the_post_thumbnail_url( $post->ID, "medium" ); ?>" alt="thumbnail post">
                </div>
                <p><?php the_content(); ?> </p>           
            </div>
            <div class="single-content-info">
            <?php 
                $first_name = get_the_author_meta('first_name'); 
                $last_name = get_the_author_meta('last_name');
                $full_name = $first_name . ' ' . $last_name;
                $date = get_the_date();
                
            ?>
                <p>By: <?php echo $full_name; ?> | <?php echo $date; ?> | Blog</p>
                <!-- AddToAny BEGIN -->
                <div class="a2a_kit a2a_kit_size_32 a2a_default_style social-media" data-a2a-icon-color="#1a5458">
                    <a class="a2a_button_facebook"></a>
                    <a class="a2a_button_email"></a>
                    <a class="a2a_button_twitter"></a>
                    <a class="a2a_button_pinterest"></a>
                    <a class="a2a_button_linkedin"></a>
                </div>
                <script async src="https://static.addtoany.com/menu/page.js"></script>
<!-- AddToAny END -->
            </div>
        </div>
        <div class="blog-sidebar">
            <?php echo custom_search_form( null, 'Search posts', 'post'); ?>
            <?php dynamic_sidebar( 'primary' ); ?>
        </div>

    </main>
    <?php
    }

    get_footer();
?>

