<!DOCTYPE html>
<html lang="en">
<head>
    <!-- meta tags -->
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Title, Keywords and Descriptions -->
    <title><?php wp_title(); ?></title>
    <!-- Begin Constant Contact Active Forms -->
    <script> var _ctct_m = "2bfea107d3724af9bd6954cca1151b3e"; </script>
    <script id="signupScript" src="//static.ctctcdn.com/js/signup-form-widget/current/signup-form-widget.min.js" async defer></script>
    <!-- End Constant Contact Active Forms -->
    <?php wp_head(); ?>
</head>
<body>
<header id="home-video">
    <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
        <source src=
            "<?php 
            if(wp_is_mobile()):
                echo get_template_directory_uri() . '/assets/videos/video-small.mp4';  
            else:
                echo get_template_directory_uri() . '/assets/videos/video-large.mp4'; 
            endif;
            ?>" 
            type="video/mp4">
    </video>
    <nav class="navbar navbar-header navbar-expand-lg navbar-light" role="navigation">
        <div class="container">
            <div class="logo">
                <a class="navbar-brand" href="<?php bloginfo( "url" ) ?>">
                    <?php the_custom_logo(); ?>
                </a>
            </div>
            <!-- Brand and toggle get grouped for better mobile display -->
            <button class="navbar-toggler ml-auto custom-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'ito-theme' ); ?>">
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
