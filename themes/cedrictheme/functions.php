<?php
function my_parent_theme_setup() {

    add_theme_support( 'custom-logo' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'title-tag' );


    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'my-parent-theme' ),
    ) );
}
add_action( 'after_setup_theme', 'my_parent_theme_setup' );

function my_parent_theme_scripts() {
    wp_enqueue_style( 'my-parent-theme-style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'my_parent_theme_scripts' );
?>
