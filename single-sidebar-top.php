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

<header class="header-category-nav-offcanvas animated slideInUp uk-hidden@m">
  <div class="uk-section uk-section-secondary section-offcanvas">
    <div class="uk-container uk-container-small">
          <h2 class="header-offcanvas-title"><?= $objTitle->name ?></h2>
    </div>
    <div class="uk-container uk-container-small uk-text-center">
      <ul class="category-nav-offcanvas">
        <?php
          wp_nav_menu( array(
            'menu_class' => 'uk-navbar-nav uk-visible@m category-menu',
            'container_class' => '',
            'theme_location' => 'secondary',
            'container_class' => 'container_class_menu',
            'post_title' => trim($objTitle->name),
            'walker' => new Secondary_Walker()
            ) );
        ?>
      </ul> <!-- .secondary-navigation -->
    </div>
  </div>
</header>

<header class="header-category-nav animated slideInUp uk-visible@m">
  <div class="uk-container uk-container-small uk-navbar">
    <div class="uk-navbar-left">
      <ul class="uk-navbar-nav category-title">
          <li class="uk-active"><a href="#"><h2><?= $objTitle->name ?></h2></a></li>
      </ul>
    </div>

    <div class="uk-navbar-right">
      <ul class="uk-navbar-nav uk-visible@m category-menu">
        <?php
          wp_nav_menu( array(
            'menu_class' => 'uk-navbar-nav uk-visible@m category-menu',
            'container_class' => '',
            'theme_location' => 'secondary',
            'container_class' => 'container_class_menu',
            'post_title' => trim($objTitle->name),
            'walker' => new Secondary_Walker()
            ) );
        ?>
      </ul> <!-- .secondary-navigation -->
    </div>

  </div>
</header>