<?php

global $post;
$currentPost = $post;

?>

<header class="header-category-nav-offcanvas uk-hidden@m">
  <div class="uk-container uk-container-small uk-section-secondary section-offcanvas " style="background-color: red">
    <div class="uk-container uk-padding-remove" style="margin-top: 10px">
        <?php
          wp_nav_menu( array(
            'menu_class' => 'category-nav-offcanvas',
            'container_class' => '',
            'theme_location' => 'secondary',
            'container_class' => 'container_class_menu',
            'post_id' => $currentPost->ID,
            'walker' => new Secondary_Walker()
            ) );
        ?><!-- .secondary-navigation -->
    </div>
    <div class="uk-container" style="margin-bottom: 10px; padding-left: 17px">
          <h2 class="header-offcanvas-title uk-padding-remove"><?= strtoupper($currentPost->post_title) ?></h2>
    </div>
  </div>
</header>

<header class="header-category-nav uk-visible@m">
  <div class="uk-container uk-container-small uk-navbar" >
    <div class="uk-navbar-left">
      <ul class="uk-navbar-nav category-title">
          <li class="uk-active"><a href="#"><h2><?= strtoupper($currentPost->post_title) ?></h2></a></li>
      </ul>
    </div>

    <div class="uk-navbar-right">
        <?php
          wp_nav_menu( array(
            'menu_class' => 'uk-navbar-nav category-menu',
            'container_class' => '',
            'theme_location' => 'secondary',
            'container_class' => 'container_class_menu',
            'post_id' => $currentPost->ID,
            'walker' => new Secondary_Walker()
            ) );
        ?><!-- .secondary-navigation -->
    </div>

  </div>
</header>