<?php

// add thumbnail support
add_theme_support('post-thumbnails');

// customise the login screen
function custom_login_css() {
    echo '<link rel="stylesheet" type="text/css" href="'.get_stylesheet_directory_uri().'/style.css" />';
}
add_action('login_head', 'custom_login_css');

// redirect logged in users to home
function admin_login_redirect($redirect_to, $request, $user) {
    global $user;
    if (isset($user->roles) && is_array($user->roles) ) {
        if( in_array("administrator", $user->roles) ) {
            return $redirect_to;
        } else {
            return home_url();
        }
    } else {
        return $redirect_to;
    }
}
add_filter("login_redirect", "admin_login_redirect", 10, 3);

// reduce length of post summaries
function new_excerpt_length($length) {
    return 20;
}
add_filter('excerpt_length', 'new_excerpt_length');

// hide the admin bar
add_filter('show_admin_bar', '__return_false');

// modify the default except ending to includ ellipsis and read more link
function new_excerpt_more( $more ) {
    return '...<p><a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . __('Read More', 'your-text-domain') . '</a></p><p>&nbsp;</p>';
}
add_filter('excerpt_more', 'new_excerpt_more');

// add custom row styles to Page Builder
function mytheme_panels_row_styles($styles) {
    $styles['full'] = __('Full width', 'alley');
    $styles['fit'] = __('Fit width and height', 'alley');
    $styles['fit-v'] = __('Fit width and height, vertical centered', 'alley');
    $styles['wide'] = __('Wide aspect ratio', 'alley');
    return $styles;
}

// add custom row classes to Page Builder using the row styles set above ^
function mytheme_panels_row_classes($grid_classes, $row_classes) {
    if (!empty($row_classes)) {
        if (!empty($row_classes['style']['class'])) {
            $grid_classes[0] = $grid_classes[0] . ' panel-grid-style-' . $row_classes['style']['class'];
        } else {
            $grid_classes[0] = $grid_classes[0] . ' panel-grid-style-default';
        }
    }
    return $grid_classes;
}

add_filter('siteorigin_panels_row_styles', 'mytheme_panels_row_styles', 10, 1);
add_filter('siteorigin_panels_row_classes', 'mytheme_panels_row_classes', 10, 2);

?>