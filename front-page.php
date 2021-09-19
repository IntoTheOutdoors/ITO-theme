<?php get_header(); ?>
    <main class="wrapper" >
        <!-- CTA -->
        <section class="cta container">   
            <?php get_template_part( 'template-parts/frontpage', 'cta' ); ?>
        </section>

        <!-- FEATURED EPISODES -->
        <section class="featured container">
            <?php get_template_part('template-parts/frontpage', 'featured'); ?>
        </section>
            
        <!-- SIGNUP (CALL TO ACTION) -->
        <section class="signup">
            <?php get_template_part( 'template-parts/frontpage', 'signup'); ?>
        </section>
        
        <section class="shows">
            <?php get_template_part('template-parts/frontpage', 'shows'); ?>
        </section>


        <section class="slider">
           <?php get_template_part('template-parts/frontpage', 'slider'); ?>
        </section>
    </main>
<?php get_footer(); ?>