<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @package cedrictheme
 */
?>

<?php if ( is_active_sidebar( 'footer-widget-area' ) ) : ?>
    <?php dynamic_sidebar( 'footer-widget-area' ); ?>
<?php endif; ?>
