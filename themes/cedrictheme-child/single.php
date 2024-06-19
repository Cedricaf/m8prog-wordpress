<?php get_header(); ?>

<?php the_post(); ?>

<main class="container my-5">
    <h1 class="mt-5"><?php the_title(); ?></h1>
    <div class="col-lg-8 px-0">
        <?php the_excerpt(); ?>
        <?php the_date(); ?>
        <img src="<?php echo get_template_directory_uri(); ?>/src/img/LV_Energy_black (1).webp">
        <?php dynamic_sidebar( 'forms' ); ?>
        <?php 
the_post_navigation(
    [
        'next_text' => __( 'Next post', 'cedrictheme-child' ),
        'prev_text' => __( 'Previous post:', 'cedrictheme-child' ),
    ] 
);
?>
    </div>
</main>



<?php get_footer(); ?>
