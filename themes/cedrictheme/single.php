<?php get_header(); ?>

<?php the_post(); ?>

<main class="container my-5">
    <h1 class="mt-5"><?php the_title(); ?></h1>
    <div class="col-lg-8 px-0">
        <?php the_excerpt(); ?>
        <p><?php the_date(); ?></p>
        <p><?php the_author_meta('description'); ?></p>
    </div>
</main>

<?php 
the_post_navigation(
    [
        'next_text' => __( 'Next post', 'cedrictheme-child' ),
        'prev_text' => __( 'Previous post:', 'm8progCedricTheme' ),
    ] 
);
?>

<?php get_footer(); ?>
