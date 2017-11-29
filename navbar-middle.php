
<div class="uk-grid-match" uk-grid>
  <div class="uk-width-1-1 uk-width-3-4@s">
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
  <div class="uk-width-1-4@s uk-visible@s" style="margin-top: 7px;">
    <div class="flag">
      <?php 
        $translationIds = PLL()->model->post->get_translations(get_the_ID());
        $currentLang = pll_get_post(get_the_ID(), pll_current_language());
        $langContent = '';
        foreach ($translationIds as $key=>$translationID){
            if($translationID != $currentLang){
                $availableLang = PLL()->model->get_languages_list();
                foreach( $availableLang as $lang){
                    if($key == $lang->slug){
                        $langContent.= '<div class="container-flag">';
                        $langContent.= '<a class="dc-translate" href="' . get_permalink($translationID) . '">';
                        //$url = get_template_directory_uri() . '/images/' .$lang->slug. '.png';
                        $langContent.= "<span class='uk-icon uk-icon-image' style='background-image: url(" . $lang->flag_url . ");'></span>";
                        $langContent.= '</a>';
                        $langContent .= '</div>';
                    }
                }
            }
        }
        echo $langContent;
       ?>
    </div>
    <script type="text/javascript">
      // <![CDATA[

					
			// ]]>
    </script>
  </div>
</div>