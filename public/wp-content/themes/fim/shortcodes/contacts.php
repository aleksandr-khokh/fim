<?php
/*
[contacts]
 */
add_shortcode( 'contacts', 'contacts' );

function contacts( $atts, $content ){
$atts = shortcode_atts(
  [
    'title' => 'Для связи с нами вы можете выбрать удобный для вас способ',
  ], $atts );

ob_start(); ?>


  <section id="contacts">
    <div class="container">
      <div class="map-info__wrapper">
        <div class="contact-info__title"><h4><?= $atts['title'] ?></h4></div>

        <div class="contact-card__body">
          <div class="contact-item">
            <div class="contact-item__desc">Адрес:</div>
            <div class="contact-item__value"><?= get_field('address', 'option');?></div>
          </div>
          <div class="contact-item">
            <div class="contact-item__desc">Телефон:</div>
            <div class="contact-item__value"><a class="map-info__phone" href="tel:<?= get_field('phone', 'option');?>" target="_blank"><?= get_field('phone', 'option');?></a></div>
          </div>

          <div class="contact-item">
            <div class="contact-item__desc">Email:</div>
            <div class="contact-item__value"><a class="map-info__email" href="mailto:<?= get_field('email', 'option');?>" target="_blank"><?= get_field('email', 'option');?></a></div>
          </div>

        </div>

      </div>
    </div>
    <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A5c2fd4122e2afa6e7cef8f53c323c98339d3c69f1e3813e6a2955fbc5db58c9b&amp;width=100%25&amp;height=450&amp;lang=ru_RU&amp;scroll=true"></script>
  </section>


  <?php
  $output_string = ob_get_contents();
  ob_end_clean();
  return $output_string;
  wp_reset_postdata();
}
