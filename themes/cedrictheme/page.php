<?php get_header();?>


<?php
// Start met een if statement om te controleren of er posts zijn
if ( have_posts() ) :

    // Loop door de posts
    while ( have_posts() ) :
        // Laad de postgegevens
        the_post();
        ?>
        <main class="container my-5">
            <h1 class="mt-5"><?php the_title(); ?></h1>
            <div class="col-lg-8 px-0">
                <?php the_excerpt(); ?>
            </div>
        </main>
        <?php
    endwhile;

else: 
    // Geef een melding weer als er geen posts zijn gevonden
    echo 'Er zijn geen berichten gevonden.';
endif;
?>

<?php get_footer(); ?>




