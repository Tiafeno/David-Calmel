<?php

global $post, $MODEL, $post_id;
$indication = "slug";
$current_lang = pll_current_language( $indication );

function getTitleLang( $id ) {
  // Returns the post (or page) translation
  $trad_id = pll_get_post($id, $current_lang);
  // Returns the post 
  $trad_post = get_post( (int)$trad_id );
  return $trad_post;
}

function getRubricLink( $id ) {
  $_id_post = pll_get_post((int)$id, $current_lang);
  return get_permalink($_id_post);
}

$id = $MODEL->getSettings('page_id', [ 'post_type', $post->post_type ]);
$title = getTitleLang( $id );
?>

<header class="header-category-nav-offcanvas uk-hidden@m">
  <div class="uk-container uk-container-small uk-section-secondary section-offcanvas " >
    <div class="uk-container uk-padding-remove" style="margin-top: 10px">
        <?php
          wp_nav_menu( array(
            'menu_class' => 'category-nav-offcanvas uk-padding-remove-left',
            'container_class' => '',
            'theme_location' => 'secondary',
            'container_class' => 'container_class_menu sidebar-top',
            'post_id' => $title->ID,
            'walker' => new Secondary_Walker()
            ) );
        ?><!-- .secondary-navigation -->
    </div>
    <div class="uk-container" style="margin-bottom: 10px;">
      <h2 class="header-offcanvas-title uk-padding-remove uk-text-uppercase">
        <a href="<?= getRubricLink( $id ) ?>" style="color: white"><?= cleanString($title->post_title) ?></a>
      </h2>
    </div>
  </div>
</header>

<header class="header-category-nav uk-visible@m">
  <div class="uk-container uk-container-small" >
    <nav class="uk-navbar-transparent uk-navbar" uk-navbar>
      <div class="uk-navbar-left">
        <ul class="uk-navbar-nav category-title">
            <li class="uk-active">
              <h2 class="uk-text-uppercase"><a href="<?= getRubricLink( $id ) ?>" style="color: white"><?= cleanString($title->post_title)?></a></h2>
            </li>
        </ul>
      </div>

      <div class="uk-navbar-right">

          <?php
            wp_nav_menu( array(
              'menu_class' => 'uk-navbar-nav category-menu',
              'container_class' => '',
              'theme_location' => 'secondary',
              'container_class' => 'container_class_menu',
              'post_id' => $title->ID,
              'walker' => new Secondary_Walker()
              ) );
          ?><!-- .secondary-navigation -->
      </div>
    </nav>
  </div>
</header>