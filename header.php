<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <title><?php bloginfo('name'); ?> <?php wp_title('|',1); ?></title>
    <meta name="description" content="<?php if ( is_single() ) { single_post_title('', true); } else { bloginfo('name'); echo " - "; bloginfo('description'); } ?>" />
    <meta name=viewport content="width=device-width,initial-scale=1" />
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lato" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/style.css" />
    <?php wp_head(); ?>
</head>
<body class="no-select">
    <div class="header">
        <div class="panel-grid">
            <div class="panel-row-style-restricted-width panel-row-style">
                <div class="panel-grid-cell w1of1">
                    <div class="panel">
                        <ul class="nav">
                            <li>
                                <a class="btn">&#9776;</a>
                                <?php wp_nav_menu(); ?>
                            </li>
                        </ul>
                        <div class="login">
                            <?php wp_loginout(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content">