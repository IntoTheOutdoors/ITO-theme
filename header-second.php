<!DOCTYPE html>
<html lang="en">
<head>
    <!-- meta tags -->
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Title, Keywords and Descriptions -->
    <title><?php wp_title(); ?></title>
    <?php wp_head(); ?>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-md navbar-light bg-custom-second" role="navigation">
        <div class="container">
            <div class="second-logo">
                <a class="navbar-brand" href="<?php bloginfo( "url" ) ?>">
                    <?php the_custom_logo(); ?>
                </a>
            </div>
            <!-- Brand and toggle get grouped for better mobile display -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'ito-theme' ); ?>">
                <span class="navbar-toggler-icon"></span>
            </button>
                <?php
                    wp_nav_menu( array(
                        'theme_location'    => 'primary',
                        'depth'             => 2,
                        'container'         => 'div',
                        'container_class'   => 'collapse navbar-collapse justify-content-end',
                        'container_id'      => 'navbarSupportedContent',
                        'menu_class'        => 'nav navbar-nav',
                        'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                        'walker'            => new WP_Bootstrap_Navwalker(),
                    ) );
                ?>
        </div>
    </nav>
    </header>
