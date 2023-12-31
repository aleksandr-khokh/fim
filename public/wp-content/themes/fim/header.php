<?php
/**
 * The header for our theme
 *
 * Displays all of the <head> and <header> section
 *
 * @package WordPress
 * @subpackage Blank Template
 * @since Blank Template 1.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$tpl_dir = get_bloginfo( 'template_url' );

$options_keys = array('address', 'email', 'phone', 'whatsapp', 'telegram');
$options = [];

foreach($options_keys as $key ) {
  ${$key} = get_field($key, 'option');
  if(isset(${$key})) $options[$key] = ${$key};
}
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <?php require 'templates/meta-properties.php' ?>
  <?php // require 'templates/favicons.php' ?>
  <link rel="shortcut icon" href="<?= $tpl_dir ?>/favicon.ico" type="image/x-icon">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<!-- Yandex.Metrika counter --> <script type="text/javascript" > (function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter19721623 = new Ya.Metrika({ id:19721623, clickmap:true, trackLinks:true, accurateTrackBounce:true }); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], x = "https://mc.yandex.ru/metrika/watch.js", s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; for (var i = 0; i < document.scripts.length; i++) { if (document.scripts[i].src === x) { return; } } s.type = "text/javascript"; s.async = true; s.src = x; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks"); </script> <noscript><div><img src="https://mc.yandex.ru/watch/19721623" style="position:absolute; left:-9999px;" alt="" /></div></noscript> <!-- /Yandex.Metrika counter -->

<?php wp_body_open(); ?>
<header id="header">
  <div class="top-bar-mobile">
    <button class="top-bar-mobile__menu-button" @click="toggleMobileMenu">
      <div id="lottie-menu" style="width: 32px; height: 32px;"></div>
    </button>

    <a href="/" class="top-bar-mobile__logo__link" ><img class="top-bar-mobile__logo" src="/img/brandbook-1/logo.svg" alt=""></a>

    <a class="top-bar-mobile__phone__link" href="tel:<?=$options['phone']?>" rel="nofollow"><i class="bi bi-telephone"></i></a>
  </div>

  <!-- Выпадающее Mobile меню -->
  <?php require 'templates/mobile-menu.php'; ?>


  <div class="container">
    <div class="header__top">

      <div class="logo__wrapper">
        <a href="/" title="<?=bloginfo('description')?>" class="header__top__logo-link">
          <img class="header__top__logo" src="/img/brandbook-1/logo.svg" alt="<?=bloginfo('description')?>">
        </a>
      </div>

      <div class="header__top__description"><?=bloginfo('description')?></div>

      <address>
        <?=$options['address']?>
        <br>
        Пн-Пт: с 9 до 18
      </address>

      <?php if( isset($options['whatsapp']) || isset($options['telegram']) ) { ?>
        <ul class="social-links list-unstyled">
          <?php if( isset($options['whatsapp']) ) { ?> <li><a href="<?=$options['whatsapp']?>" title="Напишите нам в WhatsApp"><img src="/img/icons/whatsapp.svg" alt="WhatsApp"></a></li> <?php } ?>
          <?php if( isset($options['telegram']) ) { ?> <li><a href="<?=$options['telegram']?>" title="Напишите нам в Telegram"><img src="/img/icons/telegram.svg" alt="Telegram"></a></li> <?php } ?>
        </ul>
      <?php } ?>

      <div class="text-center">
        <div><a class="header__top__phone" href="tel:<?= return_phone_from_string( $options[ 'phone' ] )?>" target="_blank"><?= $options[ 'phone' ] ?></a></div>
        <!-- div><a class="header__top__email" href="mailto:<?= $options[ 'email' ] ?>" target="_blank"><?= $options[ 'email' ] ?></a></div -->
        <button data-fancybox data-src="#order-form" class="header__top__order-button">Заказать звонок</button>
      </div>

      <div style="display: none;" id="order-form">
        <?php require 'templates/order-form.php' ?>
      </div>


    </div>

    <div class="header__menu">
      <?php
        $menu = wp_nav_menu(
          array(
            'theme_location' => 'header_menu',
            'container' => 'nav',
            'menu' => 'header',
            'menu_class' => 'list-unstyled',
            'fallback_cb' => 'wp_page_menu',
            'items_wrap' => '<ul id="%1$s" class="%2$s" role="navigation">%3$s</ul>',
            'depth' => 1,
            'echo' => 0
          )
        );
        $menu = str_replace( '<a href', '<a class="nav-link" href', $menu );
        $menu = str_replace( '<a title', '<a class="nav-link" title', $menu );
        echo $menu;
      ?>
    </div>
  </div>
</header>


