<?php get_header(); ?>

  <?php
  if ( have_posts() ):
    while ( have_posts() ): the_post(); ?>

    <main id="content" role="main">
       <div class="container">
         <?php the_content(); ?>
       </div>
    </main>

  <?php
    endwhile;
  endif;
  ?>

<?php get_footer(); ?>
