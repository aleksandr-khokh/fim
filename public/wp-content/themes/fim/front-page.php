<?php get_header(); ?>

<?php
if ( have_posts() ):
  while ( have_posts() ): the_post(); ?>

    <main id="content" role="main">
      <div class="container">
        <section class="hero">
          <div class="row">
            <div class="col-12 col-xl-6">
              <h1 class="hero__title">Пошив, печать <span class="d-block accent">на текстиле,</span> вышивка</h1>
            </div>
          </div>
          <img class="hero__bg-img" src="/img/front-page-hero.png" alt="">
        </section>

        <section id="about">
          <h2 class="about-title">О нашей мастерской!</h2>

          <div class="row">
            <div class="col-12 col-md-6 offset-md-3">
              <p class="about-desc">С 2003 года профессионально занимаемся полиграфией, изготавливаем различные материалы по запросам заказчиков.</p>
              <a class="about__more" href="/o-nas/" title="О нас">Читать подробнее...</a>
            </div>
          </div>
        </section>
        <div class="row">
          <div class="col-12 col-md-3"><img src="/img/tailoring-studio.jpg" alt=""></div>
          <div class="col-12 col-md-3"><img src="/img/tailoring-studio.jpg" alt=""></div>
          <div class="col-12 col-md-3"><img src="/img/tailoring-studio.jpg" alt=""></div>
          <div class="col-12 col-md-3"><img src="/img/tailoring-studio.jpg" alt=""></div>
        </div>

        <?php echo do_shortcode('[portfolio]'); ?>
        <?php echo do_shortcode('[reviews]'); ?>
        <?php echo do_shortcode('[consult]'); ?>

        <?php the_content(); ?>
      </div>
    </main>

  <?php
  endwhile;
endif;
?>

<?php get_footer(); ?>
