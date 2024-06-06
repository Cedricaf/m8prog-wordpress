<?php
function my_child_theme_enqueue_styles() {
    $parent_style = 'my-parent-theme-style';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'my-child-theme-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'my_child_theme_enqueue_styles' );

// Change the text domain to match your child theme
function register_my_menus() {
	register_nav_menus(
		[
			'header' => __( 'Header Menu', 'cedrictheme-child' ),
			'other'  => __( 'Other Menu', 'cedrictheme-child' ),
		]
	);
}

add_action( 'init', 'register_my_menus' );


/**
 * Function to add extra classes to the menu list element
 * @usage:
 *      Add 'add_li_class'  => 'nav-item',
 *      as an extra option to wp_nav_menu()
 *
 * @param $classes
 * @param $item
 * @param $args
 *
 * @return mixed
 */
function add_additional_class_on_li($classes, $item, $args) {
	if(isset($args->add_li_class)) {
		$classes[] = $args->add_li_class;
	}
	return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

/**
 * Function to add extra classes to the menu anchor element
 * @usage:
 * Add 'add_a_class'  => 'nav-item',
 * as an extra option to wp_nav_menu()
 *
 * @param $attributes
 * @param $item
 * @param $args
 *
 * @return mixed
 */
function add_additional_class_on_a($attributes, $item, $args) {
    if ( empty( $attributes['class'] ) ) {
		$attributes['class'] = '';
	}
	
	if(isset($args->add_a_class)) {
		$attributes['class'] .= ' ' . $args->add_a_class;
	}
	return $attributes;
}
add_filter('nav_menu_link_attributes', 'add_additional_class_on_a', 1, 3);


/**
 * Initialize the widget area
 * 
 * @return void
 */
function add_theme_widgets() {
	register_sidebar( 
        [
            'name'          => __( 'Footer Widget Area', 'cedrictheme-child' ),
            'id'            => 'footer-widget-area',
            'description'   => __( 'A widget area located in the footer.', 'cedrictheme-child' ),
            'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ] 
    );
}

add_action( 'widgets_init', 'add_theme_widgets' );

// Corrected the use of get_stylesheet_directory_uri() for child theme
function add_style_and_js() {
	wp_enqueue_script(
		'm8prog',
		get_stylesheet_directory_uri() . '/dist/js/main.js',
		[ 'jquery' ],
		'1.0.0',
		true // Changed to boolean to indicate script should be in the footer
	);

	wp_enqueue_style(
		'm8prog_styles',
		get_stylesheet_directory_uri() . '/dist/css/main.min.css',
		[],
		'1.0.0'
	);
}

add_action( 'wp_enqueue_scripts', 'add_style_and_js' );

