<footer>
  <div class="uk-section uk-section-large">
    <div class="uk-container uk-container-small">
      <div uk-grid>
        <div class="uk-width-1-1 uk-width-1-2@m">
          <p><img class="uk-border-rounded footer__logo" src="<?= get_template_directory_uri() . '/favicon/favicon-96x96.png' ?>" width="50" height="50" alt="Logo David Calmel" /> </p>
          <p class="uk-text-bold uk-text-lead footer__copyright__title">COPYRIGHT © 2017 DAVID CALMEL</p>
          <p class="uk-text-bold uk-text-lead uk-text-muted footer__reserved">ALL RIGHTS RESERVED</p>
        </div>

        <div class="uk-width-1-1 uk-width-1-2@m">
        <?php if ( is_active_sidebar( 'footer' ) ) :  
                dynamic_sidebar( 'footer' ); 
              endif; 
        ?>
        <?php if ( has_nav_menu( 'social' ) ) : 
                wp_nav_menu( array(
                  'menu_class' => ' ',
                  'container_class' => ' ',
                  'theme_location' => 'social',
                  'container_class' => ' ',
                  'walker' => new Social_Walker()
                  ) );
              ?>
          <?php endif; ?> <!-- .social -->
        </div>
      </div>
    </div>
  </div>
</footer>