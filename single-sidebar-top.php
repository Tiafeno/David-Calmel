<?php

global $post, $MODEL;
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

$post_id = $MODEL->getSettings('page_id', ['post_type', $post->post_type])
?>

<header class="header-category-nav-offcanvas uk-hidden@m">
  <div class="uk-container uk-container-small uk-section-secondary section-offcanvas " >
    <div class="uk-container uk-padding-remove" style="margin-top: 10px">
      <?php
      wp_nav_menu( array(
        'menu_class' => 'category-nav-offcanvas',
        'container_class' => '',
        'theme_location' => 'secondary',
        'container_class' => 'container_class_menu',
        'post_id' => $post_id,
        'walker' => new Secondary_Walker()
      ) );
      ?><!-- .secondary-navigation -->
    </div>
    <div class="uk-container" style="margin-bottom: 10px; padding-left: 17px">
      <h2 class="header-offcanvas-title uk-padding-remove"><?= strtoupper($post->post_title) ?></h2>
    </div>
  </div>
</header>

<header class="header-category-nav uk-visible@m">
  <div class="uk-container uk-container-small uk-navbar" >
    <div class="uk-navbar-left">
      <ul class="uk-navbar-nav category-title">
        <li class="uk-active"><a href="#"><h2><?= strtoupper($post->post_title) ?></h2></a></li>
      </ul>
    </div>

    <div class="uk-navbar-right">

      <?php
      wp_nav_menu( array(
        'menu_class' => 'uk-navbar-nav category-menu',
        'container_class' => '',
        'theme_location' => 'secondary',
        'container_class' => 'container_class_menu',
        'post_id' => $post_id,
        'walker' => new Secondary_Walker()
      ) );
      ?><!-- .secondary-navigation -->
    </div>

  </div>
</header>