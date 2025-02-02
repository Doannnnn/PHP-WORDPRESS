<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Fictional University</title>
    <?php wp_head(); ?>
</head>

<body>
    <header class="site-header">
        <div class="container">
            <h1 class="school-logo-text float-left">
                <a href="<?php echo site_url("/") ?>">
                    <strong>Fictional</strong>
                    University
                </a>
            </h1>
            <span class="js-search-trigger site-header__search-trigger">
                <i class="fa fa-search" aria-hidden="true"></i>
            </span>
            <i class="site-header__menu-trigger fa fa-bars" aria-hidden="true"></i>

            <div class="site-header__menu group">
                <nav class="main-navigation">
                    <ul>
                        <li <?php if (is_page("about-us") or wp_get_post_parent_id(get_the_ID())) echo 'class="current-menu-item"' ?>>
                            <a href="<?php echo site_url("/about-us") ?>">About Us</a>
                        </li>
                        <li>
                            <a href="#">Programs</a>
                        </li>
                        <li <?php if (get_post_type() == "event") echo 'class="current-menu-item"' ?>>
                            <a href="<?php echo site_url("/event") ?>">Events</a>
                        </li>
                        <li>
                            <a href="#">Campuses</a>
                        </li>
                        <li <?php if (get_post_type() == "post") echo 'class="current-menu-item"' ?>>
                            <a href="<?php echo site_url("/blog") ?>">Blog</a>
                        </li>
                    </ul>
                </nav>
                <div class="site-header__util">
                    <a href="#" class="btn btn--small btn--orange float-left push-right">Login</a>
                    <a href="#" class="btn btn--small btn--dark-orange float-left">Sign Up</a>
                    <span class="search-trigger js-search-trigger">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </span>
                </div>
            </div>
        </div>
    </header>