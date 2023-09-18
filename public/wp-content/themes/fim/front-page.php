<?php
$tpl_dir = get_bloginfo( 'template_url' );

$options_keys = array('address', 'email', 'phone', 'whatsapp', 'telegram');
$options = [];

foreach($options_keys as $key ) {
  ${$key} = get_field($key, 'option');
  if(isset(${$key})) $options[$key] = ${$key};
}

get_header(); ?>

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

      </div>

      <section id="map">
        <div class="container">
          <div class="map-info__wrapper">
            <div class="map-info__title"><h4>Для связи с нами вы можете выбрать удобный способ</h4></div>

            <div class="contact-card__body">
              <div class="contact-item">
                <div class="contact-item__desc">Адрес:</div>
                <div class="contact-item__value"><?=$options['address']?></div>
              </div>
              <div class="contact-item">
                <div class="contact-item__desc">Телефон:</div>
                <div class="contact-item__value"><a class="map-info__phone" href="tel:<?=$options['phone']?>" target="_blank"><?=$options['phone']?></a></div>
              </div>

              <div class="contact-item">
                <div class="contact-item__desc">Email:</div>
                <div class="contact-item__value"><a class="map-info__email" href="mailto:<?=$options['email']?>" target="_blank"><?=$options['email']?></a></div>
              </div>

            </div>

          </div>
        </div>
        <iframe src="//yandex.ru/map-widget/v1/?um=constructor%3A5c2fd4122e2afa6e7cef8f53c323c98339d3c69f1e3813e6a2955fbc5db58c9b&amp;source=constructor" width="100%" height="550" frameborder="0"></iframe>
      </section>

      <div class="container">
        <?php echo do_shortcode('[consult]'); ?>


        <div class="d12">
          <div>По вопросам печати</div>
        </div>

        <?php the_content(); ?>
      </div>
    </main>

  <?php
  endwhile;
endif;
?>

<?php get_footer(); ?>
