<?php
    get_header('second');
?>

<main class="container">
    <section class="title">
        <h3><?php the_title(); ?>
    </section>
    <section class="content">
        <p><?php the_content(); ?></p>
    </section>
</main>
<?php
    get_footer();
?>