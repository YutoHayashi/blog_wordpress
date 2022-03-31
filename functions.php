<?php
define( 'BIIIRD_THEME_VERSION', '1.0.0' );
define( 'WP_DISABLE_FATAL_ERROR_HANDLER', true );
add_theme_support( 'post-thumbnails' );
add_action(
    'wp_enqueue_scripts',
    function(  ) {
        $version = ( wp_get_environment_type(  ) === 'development' ) ? time(  ) : BIIIRD_THEME_VERSION;
        wp_enqueue_style( 'style', get_template_directory_uri(  ) . '/dist/css/style.css?v=' . $version );
        wp_enqueue_script( 'script', get_template_directory_uri(  ) . '/dist/js/bundle.js?v=' . $version );
    },
    10
);
