<?php
function cedrictheme_enqueue_styles() {
	wp_enqueue_style(
		'cedrictheme-bootstrap',
		get_template_directory_uri() . "style.css", array(), "1.0" );

}

add_action( 'wp_enqueue_scripts', 'cedrictheme_enqueue_styles' );
add_theme_support( 'post-thumbnails' );

?>