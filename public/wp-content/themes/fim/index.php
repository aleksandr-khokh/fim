<?php get_header(); ?>

  <?php
  if ( have_posts() ):
    while ( have_posts() ): the_post(); ?>

    <main id="content" role="main">
       <div class="container">
         <section class="hero">
           <div class="row">
             <div class="col-12 col-xl-6">
               <h1 class="hero__title"><?php the_title();?></h1>
             </div>

             <div class="col-12 col-xl-4 offset-xl-2">
               <?php require 'templates/order-form.php' ?>
             </div>
           </div>

         </section>

         <?php the_content(); ?>
       </div>
    </main>

  <?php
    endwhile;
  endif;
  ?>

<?php get_footer(); ?>
