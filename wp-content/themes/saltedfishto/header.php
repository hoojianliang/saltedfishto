<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Blog Site Template">
    <meta name="author" content="https://youtube.com/FollowAndrew">
    <link rel="shortcut icon" href="wp-content/themes/saltedfishto/assets/images/logo.png">

    <?php
	    wp_head();
	?>
</head>

<body>
    <header class="sfto-sticky-top">
        <nav class="navbar navbar-expand-sm sfto-nav <?php if( is_front_page() ) { ?> transparent-enable transparent-bg <?php } else { ?> navbar-bg <?php } ?>">
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
                        <div class="input-group">
                            <input type="text" class="form-control sfto-transparent" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <span class="input-group-text sfto-transparent"><i class="fas fa-search sfto-fa-button sfto-fa-border"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <div class="main-wrapper">