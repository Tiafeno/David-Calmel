<?php

global $post, $MODEL;

function getTitleLang( $id ) {
  $indication = "slug";
  $current_lang = pll_current_language( $indication );
  $trad_id = pll_get_post($id, $current_lang);
  $trad_post = get_post( (int)$trad_id );
  return $trad_post;
}

$post_id = $MODEL->getSettings('page_id', [ 'post_type', $post->post_type ]);
$title = getTitleLang( $post_id );
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
            'post_id' => $post_id,
            'walker' => new Secondary_Walker()
            ) );
        ?><!-- .secondary-navigation -->
    </div>
    <div class="uk-container" style="margin-bottom: 10px;">
      <h2 class="header-offcanvas-title uk-padding-remove">
        <a href="<?= get_permalink( $post_id ) ?>" style="color: white"><?= strtoupper($title->post_title) ?></a>
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
              <h2><a href="<?= get_permalink( $post_id ) ?>" style="color: white"><?= strtoupper($title->post_title) ?></a></h2>
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
              'post_id' => $post_id,
              'walker' => new Secondary_Walker()
              ) );
          ?><!-- .secondary-navigation -->
      </div>
    </nav>
  </div>
</header>