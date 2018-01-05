<footer>
  <div class="uk-section uk-section-large uk-padding-small">
    <div class="uk-container uk-container-small">
      <div uk-grid>

        <div class="uk-width-1-1 uk-width-1-2@m uk-margin-auto">
        <?php
          $description = get_bloginfo( 'description', 'display' );
            if ( $description || is_customize_preview() ) : ?>
              <p class="uk-text-meta uk-text-center uk-margin-small-bottom footer__description"> <?= $description ?> </p>
        <?php endif; ?>
          <p>
            <img class="uk-border-rounded footer__logo" src="<?= get_template_directory_uri() . '/images/small-logo.png' ?>" width="150" alt="Logo David Calmel" /> 
          </p>
        <?php if ( is_active_sidebar( 'footer' ) ) :  
                dynamic_sidebar( 'footer' ); 
              endif; ?>
          <div id="copyright">
            <?php if (function_exists("pll_e")) ?>
              <p class="footer__copyright__title ">Copyright © 2017 David Calmel - <?php pll_e("copyright"); ?></p>
          </div>
        
        </div>

      </div>
    </div>
  </div>

  
</footer>