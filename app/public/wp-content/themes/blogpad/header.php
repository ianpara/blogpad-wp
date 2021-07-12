<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body>

    <!-- START NAV -->
    <nav class="navbar navbar-expand-lg navbar-light" id="navbar-example">
        <div class="container-fluid d-flex flex-column flex-md-row">
            <a class="navbar-brand me-md-auto ms-md-0 mx-auto mb-md-0 mb-2" href="<?php echo get_bloginfo( 'wpurl' );?>">
                <img width="35px" height="35px" src="<?php echo get_bloginfo('template_directory'); ?>/images/logo.svg">
                <span class="logo-text ps-2">Blogpad</span>
            </a>

            <?php 
            $args = array(
                'theme_location'  => 'primary',
                'depth'           => 1, // 1 = no dropdowns, 2 = with dropdowns.
                'container'       => 'div',
                'container_class' => 'collapse navbar-collapse d-lg-flex justify-content-center',
                'container_id'    => 'navbarNav',
                'menu_class'      => 'navbar-nav',
                'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                'walker'          => new WP_Bootstrap_Navwalker(),
            );
            wp_nav_menu($args); ?>
            
            <div class="d-flex align-items-center me-md-0 ms-md-0 mx-auto mx-auto">
                <a class="btn btn-nav search me-2 d-md-none" href="#searchdiv" type="button" data-bs-toggle="collapse" data-bs-target="#searchdiv"
                data-bs-toggle="true" aria-controls="searchdiv" aria-expanded="false" aria-label="Toggle search"></a>
                <a class="btn btn-nav book me-2" href="#0" type="button" aria-label="Bookmarks"></a>
                <a class="btn btn-nav bell me-2" href="#0" type="button" aria-label="Notifications"></a>
                <a class="btn btn-profile" href="#0" type="button" aria-label="Profile"></a>

                <button class="navbar-toggler ms-2 d-lg-none" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasNav" aria-controls="offcanvasNav" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
            <?php get_search_form() ?>
        </div>
    </nav>

    
    <div class="offcanvas offcanvas-start w-75 navbar-light" tabindex="-1" id="offcanvasNav" aria-labelledby="offcanvasNavLabel" data-bs-scroll="true">
        <div class="offcanvas-header">
            <a class="navbar-brand" href="<?php echo get_bloginfo( 'wpurl' );?>">
                <img width="35px" height="35px" src="<?php echo get_bloginfo('template_directory'); ?>/images/logo.svg">
                <span class="logo-text ps-2">Blogpad</span>
            </a>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
        <?php 
            $args = array(
                'theme_location'  => 'primary',
                'depth'           => 1, // 1 = no dropdowns, 2 = with dropdowns.
                'container'       => 'div',
                'container_class' => '',
                'container_id'    => '',
                'menu_class'      => 'navbar-nav',
                'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                'walker'          => new WP_Bootstrap_Navwalker(),
            );
            wp_nav_menu($args); ?>
        </div>
    </div>
    <!-- END NAV -->