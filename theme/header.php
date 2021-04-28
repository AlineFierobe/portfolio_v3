<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php if(is_home()){ bloginfo('name'); } else { bloginfo('name'); ?> | <?php the_title(); } ?>
    </title>
    <!-- FONT -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;700&family=Yanone+Kaffeesatz:wght@300;400;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css">
    <?php wp_head(); ?>
</head>

<body>
    <header class="header" id="home">
        <h1>
            <!-- LOGO -->
            <a href="<?php bloginfo('wpurl'); ?>">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                    viewBox="0 0 1347 800">
                    <defs>
                        <clipPath id="clip-Logo">
                            <rect width="1347" height="800" />
                        </clipPath>
                    </defs>
                    <g id="Logo" clip-path="url(#clip-Logo)">
                        <g id="Gauche" transform="translate(32 -49)">
                            <path id="accGaucheHaut" d="M0,0H90" transform="translate(550.5 286)" stroke-width="15" />
                            <path id="accGaucheMontant" d="M0,0V171" transform="translate(558 279)" stroke-width="15" />
                            <path id="accGaucheDescendant" d="M0,171V0" transform="translate(558 449)"
                                stroke-width="15" />
                            <path id="accGaucheBas" d="M0,0H90" transform="translate(550.5 613)" stroke-width="15" />
                            <path id="ligneMillieuGauche" d="M0,0H250" transform="translate(309.5 437.5)"
                                stroke-width="15" />
                            <path id="ligneHautGauche" d="M0,0H200" transform="translate(359.5 437.5)"
                                stroke-width="15" />
                            <path id="ligneBasGauche" d="M0,0H200" transform="translate(359.5 437.5)"
                                stroke-width="15" />
                        </g>
                        <g id="Droit" transform="translate(32 -49)">
                            <path id="accDroitHaut" d="M90,0H0" transform="translate(640.5 286)" stroke-width="15" />
                            <path id="accDroitMontant" d="M0,0V171" transform="translate(723 279)" stroke-width="15" />
                            <path id="accDroitDescendant" d="M0,171V0" transform="translate(723 449)"
                                stroke-width="15" />
                            <path id="accDroitBas" d="M90,0H0" transform="translate(640.5 613)" stroke-width="15" />
                            <path id="ligneMillieuDroit" d="M0,0H250" transform="translate(723.5 437.5)"
                                stroke-width="15" />
                            <path id="ligneHautDroit" d="M0,0H200" transform="translate(723.5 437.5)"
                                stroke-width="15" />
                            <path id="ligneBasDroit" d="M0,0H200" transform="translate(723.5 437.5)"
                                stroke-width="15" />
                        </g>
                        <path id="lettreA"
                            d="M4.465,0l40.42-190.35H70.5L111.155,0H86.01L77.315-47.94H38.54L29.375,0Zm37.6-66.975H73.79L57.81-152.75Z"
                            transform="translate(614 494)" fill="transparent" stroke="transparent" />
                    </g>
                </svg>
            </a>
        </h1>

        <!-- NAV DEPENDING TYPE OF CONTENT -->
        <nav class="desktop">
            <ul class="menu">
                <!-- IF HOMEPAGE -->
                <?php if(is_page_template('templates/homepage.php')){ ?>
                <li>
                    <a href="<?php bloginfo('wpurl'); ?>/home/#home">
                        Home
                    </a>
                </li>
                <li>
                    <a href="<?php bloginfo('wpurl'); ?>/home/#knowledge">
                        Knowledge
                    </a>
                </li>
                <li>
                    <a href="<?php bloginfo('wpurl'); ?>/home/#projects">
                        Projects
                    </a>
                </li>
                <li>
                    <a href="<?php bloginfo('wpurl'); ?>/home/#contact">
                        Contact
                    </a>
                </li>
                <!-- IF CONNECTED LINK TO WP ADMIN -->
                <?php if(is_user_logged_in()) { ?>
                <li>
                    <a href="<?php bloginfo('wpurl'); ?>/wp-admin">
                        Admin
                    </a>
                </li>
                <?php } ?>


                <!-- IF ALL PROJECTS PAGE -->
                <?php } else if(is_page_template('templates/projects.php') || is_page_template('login-page.php')){ ?>
                <li>
                    <a href="<?php bloginfo('wpurl'); ?>/home/#home">
                        Home
                    </a>
                </li>
                <!-- IF CONNECTED LINK TO WP ADMIN -->
                <?php if(is_user_logged_in()) { ?>
                <li>
                    <a href="<?php bloginfo('wpurl'); ?>/wp-admin">
                        Admin
                    </a>
                </li>
                <?php } ?>


                <!-- IF SINGLE PROJECT OR TAXONOMY PAGE -->
                <?php } else if(is_single() || is_tax()) { ?>
                <li>
                    <a href="<?php bloginfo('wpurl'); ?>/home/#home">
                        Home
                    </a>
                </li>
                <li>
                    <a href="<?php bloginfo('wpurl'); ?>/projects">
                        Back to All Projects
                    </a>
                </li>
                <!-- IF CONNECTED LINK TO WP ADMIN -->
                <?php if(is_user_logged_in()) { ?>
                <li>
                    <a href="<?php bloginfo('wpurl'); ?>/wp-admin">
                        Admin
                    </a>
                </li>
                <?php } ?>
                <?php } ?>
            </ul>
        </nav>

        <!-- NAV MOBILE DEPENDING TYPE OF CONTENT -->
        <!-- IF HOMEPAGE -->
        <?php if(!is_page_template('templates/homepage.php')){ ?>
        <nav class="mobile">
            <ul class="menu">
                <!-- IF ALL PROJECTS PAGE -->
                <?php if(is_page_template('templates/projects.php')){ ?>
                <li>
                    <a href="<?php bloginfo('wpurl'); ?>/home/#home">
                        Home
                    </a>
                </li>

                <!-- IF SINGLE PROJECT OR TAXONOMY PAGE -->
                <?php } else if(is_single() || is_tax()) { ?>
                <li>
                    <a href="<?php bloginfo('wpurl'); ?>/home/#home">
                        Home
                    </a>
                </li>
                <li>
                    <a href="<?php bloginfo('wpurl'); ?>/projects">
                        Back to All Projects
                    </a>
                </li>
                <?php } ?>
            </ul>
        </nav>
        <?php } ?>
    </header>

    <!-- MAIN -->
    <main class="main">