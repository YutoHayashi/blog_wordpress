<?php
define( 'BIIIRD_THEME_VERSION', '1.0.0' );
define( 'WP_DISABLE_FATAL_ERROR_HANDLER', true );



add_theme_support( 'post-thumbnails' );



add_action(
    'init',
    function(  ) {
        $post_type_str = file_get_contents( __DIR__ . '/post-type.json' );
        $post_type = json_decode( $post_type_str, true );
        foreach( $post_type as $pt ) {
            register_post_type( $pt[ 'name' ], $pt[ 'options' ] );
            if ( ! $pt[ 'editor' ] ) {
                remove_post_type_support( $pt[ 'name' ], 'editor' );
            }
        }
    }
);



add_action(
    'wp_enqueue_scripts',
    function(  ) {
        $version = ( wp_get_environment_type(  ) === 'development' ) ? time(  ) : BIIIRD_THEME_VERSION;
        wp_enqueue_style( 'subset', get_template_directory_uri(  ) . '/dist/fonts/materialdesignicons-webfont.css?tver=' . $version );
        wp_enqueue_style( 'font', get_template_directory_uri(  ) . '/dist/css/font.css?tver=' . $version );
        wp_enqueue_style( 'style', get_template_directory_uri(  ) . '/dist/css/style.css?tver=' . $version );
        wp_enqueue_script( 'script', get_template_directory_uri(  ) . '/dist/js/bundle.js?tver=' . $version, array(  ), false, true );
    },
    10
);
