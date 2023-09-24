<aside class="mobile-menu__content__wrapper">
  <div class="mobile-menu__content">
    <?php
    $menu = wp_nav_menu(
      array(
        'theme_location' => 'mobile_menu',
        'container' => 'nav',
        'menu' => 'mobile',
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

    <p><a class="mobile-menu__email" href="mailto:<?= $options[ 'email' ] ?>" target="_blank"><i class="bi bi-envelope"></i> <?= $options[ 'email' ] ?></a></p>
    <p><a class="mobile-menu__phone" href="tel:<?= $options[ 'phone' ] ?>" target="_blank"><i class="bi bi-telephone"></i> <?= $options[ 'phone' ] ?></a></p>

    <?php if( isset($options['whatsapp']) || isset($options['telegram']) ) { ?>
      <ul class="social-links list-unstyled">
        <?php if( isset($options['whatsapp']) ) { ?> <li><a href="<?=$options['whatsapp']?>" title="Напишите нам в WhatsApp"><?= do_shortcode('[whatsapp]'); ?></a></li> <?php } ?>
        <?php if( isset($options['telegram']) ) { ?> <li><a href="<?=$options['telegram']?>" title="Напишите нам в Telegram"><?= do_shortcode('[telegram]'); ?></a></li> <?php } ?>
      </ul>
    <?php } ?>
  </div>
</aside>