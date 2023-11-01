<?php
$tpl_dir = get_bloginfo( 'template_url' );

$options_keys = array( 'address', 'email', 'phone', 'whatsapp', 'telegram' );
$options = [];

foreach ( $options_keys as $key ){
  ${$key} = get_field( $key, 'option' );
  if ( isset( ${$key} ) )
    $options[ $key ] = ${$key};
}

wp_enqueue_script( 'slick' );

get_header(); ?>

<?php
if ( have_posts() ):
  while ( have_posts() ): the_post(); ?>

    <main id="content" role="main">

    <section class="hero">
      <div class="container">

        <div class="hero__content__wrapper">
          <div class="hero__content">
            <img class="header__top__logo" src="/img/brandbook-1/logo.svg" alt="<?=bloginfo('description')?>">
            <hr class="hero__content__line">
            <h1 class="fp-hero__title">Современная швейная фабрика в Москве с богатой историей. Мастерская по пошиву, вышивке и печати любой сложности.</h1>
          </div>
          <div class="hero__img">
            <img src="/img/fp-hero.jpg" alt="Московская Швейная фабрика">
          </div>
        </div>
      </div>
    </section>

      <div class="container">

        <section id="about">
          <h2 class="about-title">О нашей мастерской!</h2>

          <div class="row">
            <div class="col-12 col-md-6 offset-md-3">
              <p class="about-desc">С 2003 года профессионально занимаемся полиграфией, изготавливаем различные материалы по запросам заказчиков.</p>
              <a class="about__more" href="/o-nas/" title="О нас">Читать подробнее...</a>
            </div>
          </div>
        </section>

        <section>
          <div class="fp_slick">
            <div class="slide"><img src="/img/tailoring-studio.jpg" alt=""></div>
            <div class="slide"><img src="/img/about/EPRINT277116 1.png" alt=""></div>
            <div class="slide"><img src="/img/about/EPRINT277284 1.png" alt=""></div>
            <div class="slide"><img src="/img/about/EPRINT277309 1.png" alt=""></div>
          </div>
        </section>

        <!--        <div class="row">-->
        <!--          <div class="col-12 col-md-3"><img src="/img/tailoring-studio.jpg" alt=""></div>-->
        <!--          <div class="col-12 col-md-3"><img src="/img/about/EPRINT277116 1.png" alt=""></div>-->
        <!--          <div class="col-12 col-md-3"><img src="/img/about/EPRINT277284 1.png" alt=""></div>-->
        <!--          <div class="col-12 col-md-3"><img src="/img/about/EPRINT277309 1.png" alt=""></div>-->
        <!--        </div>-->

        <?php // echo do_shortcode( '[portfolio]' ); ?>
        <?php echo do_shortcode( '[reviews]' ); ?>

      </div>

      <?php echo do_shortcode( '[contacts]' ); ?>

      <div class="container">
        <?php the_content(); ?>
        <?php echo do_shortcode( '[consult]' ); ?>
        <?php echo do_shortcode( '[rhombus_contacts]' ); ?>
      </div>
    </main>

  <?php
  endwhile;
endif;
?>

<?php get_footer(); ?>

<script>
  (function ( $ ){
    $(function (  ){
      $('.fp_slick').slick({
        autoplay: true,
        dots: false,
        infinite: true,
        speed: 300,
        arrows: false,
        // min-width: $xl
        slidesToShow: 4,
        slidesToScroll: 1,
        centerMode: true,
        responsive: [
          {
            breakpoint: 1400,
            settings: {
              slidesToShow: 4,
              slidesToScroll: 1,
              centerMode: true,
            }
          },
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 1
            }
          },
          {
            // breakpoint - max-width 576
            breakpoint: 575,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
              centerMode: true,
            }
          }
        ]
      });
    });
  })(jQuery)
</script>
