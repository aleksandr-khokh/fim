<?php
$options_keys = array( 'address', 'email', 'phone', 'whatsapp', 'telegram' );
$options      = [];

foreach( $options_keys as $key ) {
  ${$key} = get_field( $key, 'option' );
  if( isset( ${$key} ) ) $options[ $key ] = ${$key};
}
?>

<footer id="footer">
  <div class="container">
    <hr class="footer__divider">
    <div class="row">

      <div class="offset-2 col-8 col-sm-4 offset-sm-0 col-lg-3 col-xl-2 mb-5">
        <a href="/" title="Московская мастерская шитья, вышивки и печати"><img src="/img/brandbook/logo-desc-bottom-right.svg" alt="Московская мастерская шитья, вышивки и печати"></a>
      </div>

      <div class="col-12 col-sm-8 col-lg-5 col-xl-4">
        <div class="footer__menu-wrapper">
          <?php
          $menu_left = wp_nav_menu(
            array(
              'theme_location' => 'footer_left_menu',
              'container'      => 'nav',
              'menu'           => 'footer-left',
              'fallback_cb'    => 'wp_page_menu',
              'items_wrap'     => '<ul id="%1$s" class="%2$s" role="navigation">%3$s</ul>',
              'depth'          => 1,
              'echo'           => 0
            )
          );
          $menu_left = str_replace( '<a href', '<a class="nav-link" href', $menu_left );
          $menu_left = str_replace( '<a title', '<a class="nav-link" title', $menu_left );
          echo $menu_left;
          ?>

          <?php
          $menu_right = wp_nav_menu(
            array(
              'theme_location' => 'footer_right_menu',
              'container'      => 'nav',
              'menu'           => 'footer-right',
              'fallback_cb'    => 'wp_page_menu',
              'items_wrap'     => '<ul id="%1$s" class="%2$s" role="navigation">%3$s</ul>',
              'depth'          => 1,
              'echo'           => 0
            )
          );
          $menu_right = str_replace( '<a href', '<a class="nav-link" href', $menu_right );
          $menu_right = str_replace( '<a title', '<a class="nav-link" title', $menu_right );
          echo $menu_right;
          ?>
        </div>
      </div>
      <div class="col-12 col-lg-3 offset-lg-1 col-xl-3">
        <div class="row">
          <div class="col-12 col-sm-5 col-md-12">
            <address><i class="bi bi-geo-alt"></i> <?= $options[ 'address' ] ?></address>
          </div>

          <div class="col-12 col-sm-4 col-md-12">
            <a class="footer__email" href="mailto:<?= $options[ 'email' ] ?>" target="_blank"><i class="bi bi-envelope"></i> <?= $options[ 'email' ] ?>
            </a>
          </div>
          <div class="col-12 col-sm-3 col-md-12">
            <a class="footer__phone" href="tel:<?= $options[ 'phone' ] ?>" target="_blank"><i class="bi bi-telephone"></i> <?= $options[ 'phone' ] ?>
          </div>
        </div>
        </a>
      </div>
      <div class="col-12 col-xl-2">
        <p class="footer__details">ООО "ЕПРИНТ+"
          ИНН 9715239643
          ОГРН 1167746108562</p>
      </div>

    </div>
    <p class="copy">&copy; <?= date( 'Y' ) ?> - <?= $_SERVER[ 'HTTP_HOST' ] ?> - <?= bloginfo( 'name' ); ?>. Копирование материалов запрещено</p>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
