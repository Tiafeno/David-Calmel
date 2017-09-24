<?php
global $post;
$toEN = null;
$toFR = null;
if (function_exists( 'pll_get_post' )){
  $toEN = get_permalink(pll_get_post($post->ID, 'fr'));
  $toFR = get_permalink(pll_get_post($post->ID, 'en'));
} else {
  throw new WP_Error( 'broke', "Plugins polylang is not define" );
}
?>

<div class="uk-grid-match" uk-grid>
  <div class="uk-width-1-1 uk-width-2-3@s">
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
  <div class="uk-width-1-3@s uk-visible@s" style="margin-top: 7px;">
    <div class="flag">
      <a href="#en" class="dc-translate" data-lang="en" title="United Kingdom">
        <span class="uk-icon uk-icon-image" style="background-image: url(<?= get_template_directory_uri().'/images/GB.png' ?>);"></span>
      </a>
      <a href="#fr" class="dc-translate" data-lang="fr" title="French">
        <span class="uk-icon uk-icon-image" style="background-image: url(<?= get_template_directory_uri().'/images/FR.png' ?>);"></span>
      </a>
    </div>
    <script type="text/javascript">
      // <![CDATA[
        (function( $ ){
          $( document ).ready(function(){
            var urls = {"en":"<?= $toFR ?>","fr":"<?= $toEN ?>"};
            $( 'a.dc-translate' )
              .click(function(){
                var currentAddr = window.location.origin +  window.location.pathname;
                var translate = $( this ).data( 'lang' );

                var url = urls[ translate ];
                if (currentAddr === url) return;
                window.location.href = url;
              });
          });
        })( jQuery )
					
			// ]]>
    </script>
  </div>
</div>