<?php
/*
[rhombus_contacts]
 */
add_shortcode( 'rhombus_contacts', 'rhombus_contacts' );

function rhombus_contacts( $atts, $content ){
  $atts = shortcode_atts(
    [
      'title' => 'Получить консультацию',
    ], $atts );

  ob_start(); ?>

  <section id="rhombus-contacts">
    <div class="row">
      <div class="col-12 col-md-6 col-xl-3">
        <div class="rhombus-contact__item">
          <div class="rhombus-contact__title"><h5>По вопросам печати</h5></div>
          <div class="rhombus-contact__info">
            <div class="rhombus-contact__name">Станислав</div>
            <div class="rhombus-contact__phone"><a href="tel:<?= return_phone_from_string(get_field('stas_phone', 'option')); ?>"><?= get_field('stas_phone', 'option'); ?></a></div>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6 col-xl-3">
        <div class="rhombus-contact__item">
          <div class="rhombus-contact__title"><h5>По вопросам пошива</h5></div>
          <div class="rhombus-contact__info">
            <div class="rhombus-contact__name">Галина</div>
            <div class="rhombus-contact__phone"><a href="tel:<?= return_phone_from_string(get_field('galina_phone', 'option')) ?>"><?= get_field('galina_phone', 'option') ?></a></div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php
  $output_string = ob_get_contents();
  ob_end_clean();
  return $output_string;
  wp_reset_postdata();
}
