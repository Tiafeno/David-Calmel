<div class="" uk-grid>
  <div class="uk-width-2-3">
    <div class="uk-card uk-card-default uk-card-body navbar-card-slogan">
      <p class="bloginfo uk-flex"> 
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
        <span class="uk-icon dc-icon-image" style="background-image: url(<?= get_template_directory_uri().'/images/dc-logo.png' ?>);"></span>
      </a>
      </p>
    </div>
  </div>
  <div class="uk-width-1-3 uk-flex">
  <?php if ( has_nav_menu( 'social' ) ) : 
          wp_nav_menu( array(
            'menu_class' => 'uk-padding-remove-left uk-margin-remove',
            'container_class' => 'uk-margin-auto-left uk-margin-auto-vertical',
            'theme_location' => 'social',
            'walker' => new Social_Walker()
            ) );
        ?>
    <?php endif; ?> <!-- .social -->
  </div>
</div>