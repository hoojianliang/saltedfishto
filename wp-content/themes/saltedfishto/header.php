<!DOCTYPE html>
<html lang="en">

    <head>
        <!-- Meta -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="The salted fish as an ordinary introvert plan to make some changes to make the salted fish turns over.">
        <meta name="keywords" content="Freelance, Job, Web Developer">
        <meta name="author" content="Cod - The Salted Fish">

        <?php
            wp_head();
        ?>
    </head>

    <body class="flex-wrapper">
        <header class="<?php if( get_header_image() ) { ?> sfto-sticky-top <?php } else { ?> sticky-top <?php } ?>">
            <nav class="navbar navbar-expand-md sfto-nav <?php if( is_front_page() ) { ?> transparent-enable transparent-bg <?php } else { ?> navbar-bg <?php } ?>">
                <div class="container-fluid">
                    <a class="navbar-brand" href="<?php echo get_home_url(); ?>" rel="home">
                        <?php
                            if ( function_exists('the_custom_logo') ) {
                                $custom_logo_id = get_theme_mod( 'custom_logo' );
                                $logo = wp_get_attachment_image_src( $custom_logo_id );
                            }
                        ?>
                        <img class="mx-auto logo" src="<?= $logo[0]  ?>" alt="logo">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#sftoNavbar" aria-controls="sftoNavbar"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span><i class="fas fa-bars sfto-fa-button"></i></span>
                    </button>
                    <div class="collapse navbar-collapse" id="sftoNavbar">
                        <?php
                            wp_nav_menu(
                                array( 
                                    'container' => '',
                                    'theme_location' => 'primary',
                                    'menu_class' => 'navbar-nav me-auto mb-2 mb-lg-0',
                                    'walker' => new Saltedfishto_Nav_Menu()
                                )
                            );
                        ?>
                        <div class="d-flex justify-content-end sfto-control">          
                            <i class="fas fa-sun toggle light-toggle sfto-fa-button sfto-fa-border"></i>
                            <i class="fas fa-moon toggle dark-toggle sfto-fa-button sfto-fa-border"></i>
                        </div>
                        <div class="d-flex justify-content-end">
                            <form role="search" method="get" id="searchform" class="searchform" action="<?php echo home_url( '/' ); ?>">
                                <div class="input-group">
                                    <input type="text" name="s" id="s" class="form-control sfto-transparent" placeholder="Search" aria-label="Search" aria-describedby="ssearch-bar">
                                    <span class="input-group-text sfto-transparent"><button type="submit"><i class="fas fa-search sfto-fa-button sfto-fa-border"></i></button></span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
        <section class="main-wrapper container my-5">