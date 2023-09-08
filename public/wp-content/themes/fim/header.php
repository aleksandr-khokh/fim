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
  <?php require 'templates/favicons.php' ?>
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header>
  <div class="container">
    <div class="header__top">

      <div class="logo__wrapper">
        <a href="/" title="<?=bloginfo('description')?>">
          <img class="header__top__logo" src="/img/brandbook/logo.svg" alt="<?=bloginfo('description')?>">
        </a>
      </div>

      <address><?=$options['address']?></address>
      <a class="header__top__email" href="mailto:<?=$options['email']?>" target="_blank"><?=$options['email']?></a>
      <a class="header__top__phone" href="tel:<?=$options['phone']?>" target="_blank"><?=$options['phone']?></a>

      <?php if( isset($options['whatsapp']) || isset($options['telegram']) ) { ?>
        <ul class="social-links">
          <?php if( isset($options['whatsapp']) ) { ?> <il><a href="<?=$options['whatsapp']?>" title="Напишите нам в WhatsApp"><img src="/img/icons/whatsapp.svg" alt="WhatsApp"></a></il> <?php } ?>
          <?php if( isset($options['telegram']) ) { ?> <il><a href="<?=$options['telegram']?>" title="Напишите нам в Telegram"><img src="/img/icons/telegram.svg" alt="Telegram"></a></il> <?php } ?>
        </ul>
      <?php } ?>

    </div>

    <div class="header__menu">
      <?php
        $menu = wp_nav_menu(
          array(
            'theme_location' => 'header',
            'container' => 'nav',
            'menu' => 'top',
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
