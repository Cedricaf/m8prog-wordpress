<?php get_header();?>


<?php

if ( have_posts() ) :

    while ( have_posts() ) :
  
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
    
    echo 'Er zijn geen berichten gevonden.';
endif;
?>

<?php get_footer(); ?>




