<?php
/**
 * The header.
 *
 * This is the template that displays all of the <head> section and everything up until main.
 *
 * 
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <?php wp_body_open(); ?>

    <nav>

        <h2 class="brand">LVenergie</h2>
        <ul class="items">
            <li class="item"><a href="/">Home</a></li>
            <li class="item"><a href="producten">Producten</a></li>
            <li class="item"><a href="technology">Technology</a></li>
            <li class="item"><a href="blog">Blog</a></li>
            <li class="item"><a href="about">About</a></li>
            <li class="item"><a href="contact">Contact</a></li>
        </ul>
    </nav>


