<?php

global $post;
?>

<header class="header-category-nav-offcanvas uk-hidden@m">
  <div class="uk-container uk-container-small uk-section-secondary section-offcanvas " >
    <div class="uk-container uk-padding-remove" style="margin-top: 10px">
        <?php
          wp_nav_menu( array(
            'menu_class' => 'category-nav-offcanvas uk-padding-remove-left',
            'container_class' => '',
            'theme_location' => 'secondary',
            'container_class' => 'container_class_menu',
            'post_id' => $post->ID,
            'walker' => new Secondary_Walker()
            ) );
        ?><!-- .secondary-navigation -->
    </div>
    <div class="uk-container" style="margin-bottom: 10px;">
          <h2 class="header-offcanvas-title uk-padding-remove"><?= strtoupper($post->post_title) ?></h2>
    </div>
  </div>
</header>

<header class="header-category-nav uk-visible@m">
  <div class="uk-container uk-container-small" >
    <nav class="uk-navbar-transparent uk-navbar" uk-navbar>
      <div class="uk-navbar-left">
        <ul class="uk-navbar-nav category-title">
            <li class="uk-active"><a href="#" class="uk-padding-remove-left"><h2><?= strtoupper($post->post_title) ?></h2></a></li>
        </ul>
      </div>

      <div class="uk-navbar-right">

          <?php
            wp_nav_menu( array(
              'menu_class' => 'uk-navbar-nav category-menu',
              'container_class' => '',
              'theme_location' => 'secondary',
              'container_class' => 'container_class_menu',
              'post_id' => $post->ID,
              'walker' => new Secondary_Walker()
              ) );
          ?><!-- .secondary-navigation -->
      </div>
    </nav>
  </div>
</header>