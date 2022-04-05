<?php
$nav_options = [
    [
        'title'         => '技術スタック',
        'expandable'    => true,
        'dropdown'      => array_map(
            function( $category ) {
                return [
                    'title'         => $category->name,
                    'description'   => nl2br( $category->description ),
                    'icon'          => get_field( 'cat_mdi', $category->taxonomy . '_' . $category->term_id ),
                    'url'           => esc_url( get_category_link( get_cat_ID( $category->cat_name ) ) ),
                ];
            },
            get_categories( array(
                'hide_empty'        => false,
            ) ),
        ),
    ],
    [
        'title'         => 'お問い合わせ',
        'href'          => '/contact',
    ],
    [
        'title'         => 'アカウント',
        'expandable'    => true,
        'dropdown'      => array_map(
            function( $post ) {
                return [
                    'title'         => $post->post_title,
                    'description'   => esc_url( get_field( 'links_url', $post->ID ) ),
                    'icon'          => get_field( 'links_mdi', $post->ID ),
                    'url'           => esc_url( get_field( 'links_url', $post->ID ) ),
                ];
            },
            ( new WP_Query( array( 'post_type' => 'links', ) ) )->get_posts(  ),
        )
    ],
    [
        'title'         => 'プライバシーポリシー',
        'href'          => '/privacy',
    ],
];
wp_reset_query(  );
