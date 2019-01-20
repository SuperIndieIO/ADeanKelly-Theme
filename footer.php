<?php $menuparams = array(
  'menu'            => 'footer-menu',
  'container'       => 'nav',
  'container_class' => 'footer-nav',
  'items_wrap'      => '<div id="%1$s" class="%2$s">%3$s</div>',
  'depth'           => 0,
); ?>
<?php wp_nav_menu( $menuparams ); ?>