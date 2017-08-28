<div class="uk-text-left" uk-grid>
  <div class="uk-width-3-4">
    <div class="uk-card uk-card-default uk-card-body navbar-card-slogan">
      <p class="bloginfo"> 
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?= bloginfo( 'name' ); ?></a>
        </p>
    </div>
  </div>
  <div class="uk-width-1-4">
    <p class="bloginfo">
      <span class="uk-icon uk-icon-image" style="background-image: url(<?= get_template_directory_uri().'/images/logo.png' ?>);"></span>
    </p>
  </div>
</div>