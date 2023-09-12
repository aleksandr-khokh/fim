<?php
/*
[consult]
 */
add_shortcode( 'consult', 'consult' );

function consult( $atts, $content ){
  $atts = shortcode_atts(
    [
      'title' => 'Получить консультацию',
    ], $atts );

  ob_start(); ?>

  <section id="consultation">
    <div class="consultation__wrapper">
      <div class="consultation__heading"><?= $atts[ 'title' ] ?></div>
      <form action="/wp-content/themes/fim/mail/send.php" method="post" name="consultation_form" id="consultation_form">
        <input class="consultation__input_name" type="text" name="name" placeholder="Имя*">
        <input class="consultation__input_phone" type="phone" name="phone" placeholder="Телефон*">
        <button class="consultation__button_send" type="submit">Отправить
          <img class="consultation__button_send__arrow" src="/img/icons/icon-arrow-right-white.svg" alt=""></button>
      </form>
    </div>
  </section>

  <?php
  $output_string = ob_get_contents();
  ob_end_clean();
  return $output_string;
  wp_reset_postdata();
}
