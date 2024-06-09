<?php
/**
 * The header.
 *
 * This is the template that displays all of the <head> section and everything up until main.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" ><?php bloginfo( 'name' ); ?></a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <?php
                wp_nav_menu(
                    [
                        'menu'            => 'header',
                        'link_before'     => '',
                        'link_after'      => '',
                        'menu_class'      => 'navbar-nav me-auto mb-2 mb-lg-0',
                        'container'       => 'ul',
                        'container_class' => '',
                        'container_id'    => '',
                        'add_li_class'    => 'nav-item',
                        'add_a_class'     => 'nav-link',
                    ]
                );
                ?>
            </div>
        </div>
    </nav>


<?php

