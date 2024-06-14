<?php

function cedrictheme_child_enqueue_styles() {
    $parent_style = 'cedrictheme';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'cedrictheme-child',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'cedrictheme_child_enqueue_styles' );

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
    register_sidebar( 
        [
            'name'          => __( 'forms', 'cedrictheme-child' ),
            'id'            => 'forms',
            'description'   => __( 'A widget area located in the footer.', 'cedrictheme-child' ),
            'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ] 
    );

    register_sidebar( 
        [
            'name'          => __( 'another widget', 'cedrictheme-child' ),
            'id'            => 'another widget',
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

add_action( 'wp_enqueue_script', 'add_style_and_js' );



// Books Custom Post Type
function register_books_post_type() {
    $labels = [
        'name'               => __( 'Books', 'cedrictheme-child' ),
        'singular_name'      => __( 'Book', 'cedrictheme-child' ),
        'add_new'            => __( 'New Book', 'cedrictheme-child' ),
        'add_new_item'       => __( 'Add New Book', 'cedrictheme-child' ),
        'edit_item'          => __( 'Edit Book', 'cedrictheme-child' ),
        'new_item'           => __( 'New Book', 'cedrictheme-child' ),
        'view_item'          => __( 'View Book', 'cedrictheme-child' ),
        'search_items'       => __( 'Search Books', 'cedrictheme-child' ),
        'not_found'          => __( 'No Books Found', 'cedrictheme-child' ),
        'not_found_in_trash' => __( 'No Books found in Trash', 'cedrictheme-child' ),
    ];

    $args = [
        'labels'       => $labels,
        'has_archive'  => true,
        'public'       => true,
        'hierarchical' => false,
        'supports'     => [
            'title',
            'editor',
            'excerpt',
            'custom-fields',
            'thumbnail',
            'page-attributes',
        ],
        'rewrite'      => [ 'slug' => 'books' ],
        'show_in_rest' => true,
    ];

    register_post_type( 'books', $args );
}

// Movies Custom Post Type
function register_movies_post_type() {
    $labels = [
        'name'               => __( 'Movies', 'cedrictheme-child' ),
        'singular_name'      => __( 'Movie', 'cedrictheme-child' ),
        'add_new'            => __( 'New Movie', 'cedrictheme-child' ),
        'add_new_item'       => __( 'Add New Movie', 'cedrictheme-child' ),
        'edit_item'          => __( 'Edit Movie', 'cedrictheme-child' ),
        'new_item'           => __( 'New Movie', 'cedrictheme-child' ),
        'view_item'          => __( 'View Movie', 'cedrictheme-child' ),
        'search_items'       => __( 'Search Movies', 'cedrictheme-child' ),
        'not_found'          => __( 'No Movies Found', 'cedrictheme-child' ),
        'not_found_in_trash' => __( 'No Movies found in Trash', 'cedrictheme-child' ),
    ];

    $args = [
        'labels'       => $labels,
        'has_archive'  => true,
        'public'       => true,
        'hierarchical' => false,
        'supports'     => [
            'title',
            'editor',
            'excerpt',
            'custom-fields',
            'thumbnail',
            'page-attributes',
        ],
        'rewrite'      => [ 'slug' => 'movies' ],
        'show_in_rest' => true,
    ];

    register_post_type( 'movies', $args );
}

// Labels voor de taxonomie 'Genre'
$genre_labels = [
    'name'              => _x( 'Genres', 'taxonomy general name', 'cedrictheme-child' ),
    'singular_name'     => _x( 'Genre', 'taxonomy singular name', 'cedrictheme-child' ),
    'search_items'      => __( 'Search Genres', 'cedrictheme-child' ),
    'all_items'         => __( 'All Genres', 'cedrictheme-child' ),
    'parent_item'       => __( 'Parent Genre', 'cedrictheme-child' ),
    'parent_item_colon' => __( 'Parent Genre:', 'cedrictheme-child' ),
    'edit_item'         => __( 'Edit Genre', 'cedrictheme-child' ),
    'update_item'       => __( 'Update Genre', 'cedrictheme-child' ),
    'add_new_item'      => __( 'Add New Genre', 'cedrictheme-child' ),
    'new_item_name'     => __( 'New Genre Name', 'cedrictheme-child' ),
    'menu_name'         => __( 'Genres', 'cedrictheme-child' ),
];

// Labels voor de taxonomie 'Origin'
$origin_labels = [
    'name'              => _x( 'Origins', 'taxonomy general name', 'cedrictheme-child' ),
    'singular_name'     => _x( 'Origin', 'taxonomy singular name', 'cedrictheme-child' ),
    'search_items'      => __( 'Search Origins', 'cedrictheme-child' ),
    'all_items'         => __( 'All Origins', 'cedrictheme-child' ),
    'parent_item'       => __( 'Parent Origin', 'cedrictheme-child' ),
    'parent_item_colon' => __( 'Parent Origin:', 'cedrictheme-child' ),
    'edit_item'         => __( 'Edit Origin', 'cedrictheme-child' ),
    'update_item'       => __( 'Update Origin', 'cedrictheme-child' ),
    'add_new_item'      => __( 'Add New Origin', 'cedrictheme-child' ),
    'new_item_name'     => __( 'New Origin Name', 'cedrictheme-child' ),
    'menu_name'         => __( 'Origins', 'cedrictheme-child' ),
];

// Argumenten voor de taxonomie 'Genre'
$genre_args = [
    'hierarchical'      => true,
    'labels'            => $genre_labels,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
    'show_in_rest'      => true,
    'rewrite'           => [ 'slug' => 'genre' ],
];

// Argumenten voor de taxonomie 'Origin'
$origin_args = [
    'hierarchical'      => true,
    'labels'            => $origin_labels,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
    'show_in_rest'      => true,
    'rewrite'           => [ 'slug' => 'origin' ],
];

// Registreren van de taxonomie 'Genre' voor 'Books' en 'Movies'
function register_genre_taxonomy() {
    global $genre_args;
    register_taxonomy( 'genre', [ 'books', 'movies' ], $genre_args );
}

// Registreren van de taxonomie 'Origin' voor 'Books'
function register_origin_taxonomy() {
    global $origin_args;
    register_taxonomy( 'origin', [ 'books' ], $origin_args );
}

// Hook into the 'init' action
add_action( 'init', 'register_books_post_type' );
add_action( 'init', 'register_movies_post_type' );
add_action( 'init', 'register_genre_taxonomy' );
add_action( 'init', 'register_origin_taxonomy' );

