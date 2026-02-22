<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Paper texture overlay -->
<div class="paper-texture"></div>

<!-- Reading progress bar -->
<div class="reading-progress" id="reading-progress"></div>

<!-- Navigation -->
<nav class="site-nav" id="site-nav">
    <div class="nav-inner">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="site-title" rel="home">
            <?php bloginfo('name'); ?>
        </a>
        
        <ul class="nav-links">
            <li>
                <a href="<?php echo esc_url(home_url('/')); ?>" <?php echo is_home() ? 'class="active"' : ''; ?>>
                    文章
                </a>
            </li>
            <?php
            $about_page = get_page_by_path('about');
            if ($about_page) :
            ?>
            <li>
                <a href="<?php echo esc_url(get_permalink($about_page->ID)); ?>" <?php echo is_page('about') ? 'class="active"' : ''; ?>>
                    关于
                </a>
            </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>

<!-- Main content start -->
<main class="site-main">