<?php
global $post;
$the_content = apply_filters( 'the_content', $post->post_content );

?>
<header class="header-category-nav-offcanvas uk-hidden@m">
  <div class="uk-container uk-container-small uk-section-secondary section-offcanvas " >
    <nav class="uk-navbar" uk-navbar>
      <div class="uk-navbar-left">
        <?php
          if ( has_nav_menu( 'cv' ) ) : 
            wp_nav_menu( array(
              'menu_class' => 'category-nav-offcanvas cv-offcanvas',
              'container_class' => '',
              'theme_location' => 'cv',
              'container_class' => 'container_class_menu sidebar-top',
              'walker' => new CV_Walker()
              ) );
          endif;
        ?> <!-- .cv-navigation -->
      </div>
    </nav>
  </div>
</header>

<header class="header-category-nav uk-visible@m">
  <div class="uk-container uk-container-small" >
    <nav class="uk-navbar-transparent uk-navbar" uk-navbar>

      <div class="uk-navbar-left">
          <?php
          if ( has_nav_menu( 'cv' ) ) : 
            wp_nav_menu( array(
              'menu_class' => 'category-nav-offcanvas cv-offcanvas uk-padding-remove-left',
              'container_class' => '',
              'theme_location' => 'cv',
              'container_class' => 'container_class_menu sidebar-top',
              'walker' => new CV_Walker()
              ) );
          endif;
          ?> <!-- .cv-navigation -->
      </div>
    </nav>
  </div>
</header>