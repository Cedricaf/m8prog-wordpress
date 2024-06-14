<?php get_header(); ?>

<?php the_post(); ?>

<main class="container my-5">
    <h1 class="mt-5"><?php the_title(); ?></h1>
    <div class="col-lg-8 px-0">
        <?php the_excerpt(); ?>
        <?php the_date(); ?>
        <?php the_author_meta('description'); ?>
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
