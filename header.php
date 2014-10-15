<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lato" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/style.css" />
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <div class="header">
        <div class="panel-grid panel-grid-style-default">
            <div class="panel-row-style-default panel-row-style">
                <div class="panel-grid-cell">
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
    <div class="container">