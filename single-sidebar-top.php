<?php

global $post;
$POST = (array)unserialize( POST );

function gtTitle( $posttype, $POST ){
  foreach ($POST as $postConfig) {
    if ($posttype == $postConfig['type']){
      return [
        'name' => $postConfig['name'],
        'type' => $posttype
      ];
    }
  }
}
$Title = gtTitle( $post->post_type , $POST );
$objTitle = (object) $Title;

?>

<header class="header-category-nav-offcanvas uk-hidden@m">
  <div class="uk-section uk-section-secondary section-offcanvas">
    <div class="uk-container uk-container-small">
          <h2 class="header-offcanvas-title"><?= strtoupper($objTitle->name) ?></h2>
    </div>
    <div class="uk-container uk-container-small uk-text-center">
        <?php
          wp_nav_menu( array(
            'menu_class' => 'category-nav-offcanvas',
            'container_class' => '',
            'theme_location' => 'secondary',
            'container_class' => 'container_class_menu',
            'post_title' => trim($objTitle->name),
            'walker' => new Secondary_Walker()
            ) );
        ?><!-- .secondary-navigation -->
    </div>
  </div>
</header>

<header class="header-category-nav animated slideInDown uk-visible@m">
  <div class="uk-container uk-container-small uk-navbar">
    <div class="uk-navbar-left">
      <ul class="uk-navbar-nav category-title">
          <li class="uk-active"><a href="#"><h2><?= strtoupper($objTitle->name) ?></h2></a></li>
      </ul>
    </div>

    <div class="uk-navbar-right">
        <?php
          wp_nav_menu( array(
            'menu_class' => 'uk-navbar-nav category-menu',
            'container_class' => '',
            'theme_location' => 'secondary',
            'container_class' => 'container_class_menu',
            'post_title' => trim($objTitle->name),
            'walker' => new Secondary_Walker()
            ) );
        ?><!-- .secondary-navigation -->
    </div>

  </div>
</header>