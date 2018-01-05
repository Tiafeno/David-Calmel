<div class="" uk-grid>
  <div class="uk-width-2-3">
    <div class="uk-card uk-card-default uk-card-body navbar-card-slogan">
      <p class="bloginfo uk-flex"> 
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
          <img class="uk-width-small uk-margin-small-top uk-margin-small-bottom" src="<?= get_template_directory_uri() . '/images/small-logo.png' ?>" alt="<?= get_bloginfo('name'); ?>" >
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