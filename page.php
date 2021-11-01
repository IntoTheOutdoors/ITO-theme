<?php
    get_header('second');
?>

<main class="container">
    <section class="title">
        <h3><?php the_title(); ?>
    </section>
    <section class="content">
        <?php
        while(have_posts()): the_post();
            the_content();
        endwhile;
        ?>
    </section>
</main>
<?php
    get_footer();
?>