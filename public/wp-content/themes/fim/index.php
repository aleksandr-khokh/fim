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
               <div class="send-order__wrapper">
                 <div class="send-order__heading">Оставить заявку</div>
                 <form action="/wp-content/themes/fim/mail/send.php" method="post" name="order_form" id="order_form">
                   <input class="send-order__input_name" type="text" name="name" placeholder="Имя*" required>
                   <input class="send-order__input_phone" type="phone" name="phone" placeholder="Телефон*" required>
                   <button class="send-order__button_send" type="submit">Отправить
                     <img class="arrow_for_next_button" src="/img/icons/icon-arrow-right-white.svg" alt=""></button>
                 </form>
               </div>

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
