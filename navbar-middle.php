<div uk-grid>
  <div class="uk-width-2-3@s uk-light">
    <div>
      <div class="uk-card uk-card-default uk-card-body navbar-card-slogan uk-animation-slide-top-small">
        <?php
        $description = get_bloginfo( 'description', 'display' );
        if ( $description || is_customize_preview() ) : ?>
        <span> <?= $description ?> </span>
        <?php endif; ?>

      </div>
    </div>
  </div>
  <div class="uk-width-1-3@s" style="margin-top: 7px;">
    <div class="flag">
      <a href="#gb" title="United Kingdom">
        <span class="uk-icon uk-icon-image" style="background-image: url(<?= get_template_directory_uri().'/images/GB.png' ?>);"></span>
      </a>
      <a href="#fr" title="French">
        <span class="uk-icon uk-icon-image" style="background-image: url(<?= get_template_directory_uri().'/images/FR.png' ?>);"></span>
      </a>
    </div>
  </div>
</div>