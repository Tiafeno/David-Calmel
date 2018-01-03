<footer>
  <div class="uk-section uk-section-large uk-padding-small">
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
              endif; ?>
        
        </div>
      </div>
    </div>
  </div>

  <div id="copyright">
    <?php if (function_exists("pll_e")) ?>
      <p class="uk-text-center uk-text-muted uk-padding-small"><?php pll_e("copyright"); ?></p>
  </div>
</footer>