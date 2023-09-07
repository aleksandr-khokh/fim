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
          <img src="/img/brandbook/logo.svg" alt="<?=bloginfo('description')?>">
        </a>
      </div>

      <a class="header__top__email" href="mailto:<?=get_field('address', 'option');?>" target="_blank">
        <?=get_field('email', 'option');?>
      </a>

      <a class="header__top__phone" href="tel:<?=get_field('phone', 'option');?>" target="_blank">
        <?=get_field('phone', 'option');?>
      </a>

      <address><?=get_field('address', 'option');?></address>

    </div>
    <div class="header__menu">

    </div>
  </div>
</header>
