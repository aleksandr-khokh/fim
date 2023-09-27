<?php get_header(); ?>

  <?php
  if ( have_posts() ):
    while ( have_posts() ): the_post(); ?>

    <main id="content" role="main">
       <div class="container">
         <h1 class="text-center my-md-100"><?php the_title();?></h1>
         <?php if(!is_front_page() && function_exists('dp_breadcrumb')){
           echo dp_breadcrumb();
         } ?>
<!--         <section class="hero">-->
<!--           <div class="row">-->
<!--             <div class="col-12 col-xl-6">-->
<!--               <h1 class="hero__title">--><?php //the_title();?><!--</h1>-->
<!--             </div>-->
<!---->
<!--             <div class="col-12 col-xl-4 offset-xl-2">-->
<!--               <div class="send-order__wrapper">-->
<!--                --><?php //require 'templates/order-form.php' ?>
<!--               </div>-->
<!--             </div>-->
<!--           </div>-->
<!--         </section>-->

         <?php the_content(); ?>
       </div>
    </main>

  <?php
    endwhile;
  endif;
  ?>

<?php get_footer(); ?>
