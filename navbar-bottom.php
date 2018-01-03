<?php 
  $translationIds = PLL()->model->post->get_translations(get_the_ID());
  $currentLang = pll_get_post(get_the_ID(), pll_current_language());
  $langC = '';
  foreach ($translationIds as $key=>$translationID){
      if($translationID != $currentLang){
          $availableLang = PLL()->model->get_languages_list();
          foreach( $availableLang as $lang){
              if($key == $lang->slug){
                  $langC.= '<a class="flag dc-translate uk-hidden@m" href="' . get_permalink($translationID) . '">';
                  $langC.= "<span class='uk-icon uk-icon-image' style='background-image: url(" . $lang->flag_url . ");'></span>";
                  $langC.= '</a>';
              }
          }
      }
  }
?>
  
  <nav class="uk-navbar-transparent uk-navbar" uk-navbar>
    <div class="uk-navbar-left">
      <ul class="uk-navbar-nav">
          <!-- On the desktop  uk-visible@m -->
          <li class="uk-active">
            <a href="#" class="uk-padding-remove-left">
              <h1 class="navbar-title"> <?= $title ?> </h1>
            </a>
          </li>
      </ul>
    </div>

    <div class="uk-navbar-right">
      <?php if ( has_nav_menu( 'primary' ) ) : ?>
          <?php
            wp_nav_menu( array(
              'menu_class' => 'uk-navbar-nav uk-visible@m',
              'container_class' => '',
              'theme_location' => 'primary',
              'container_class' => 'container_class_menu dc-primary-menu'
              ) );
          ?>
      <?php endif; ?> <!-- .main-navigation -->
      <div class="uk-visible@m">
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

      <div class="uk-offcanvas-content uk-hidden@m">
          <!-- The whole page content goes here -->
          <div class="uk-navbar-right">
              <a class="uk-navbar-toggle" style="padding-right: 5px" uk-navbar-toggle-icon uk-toggle="target: #offcanvas-push"></a>
              <?php echo $langC; ?>
          </div>
          <div id="offcanvas-push" uk-offcanvas>
              <div class="uk-offcanvas-bar">
                  <button class="uk-offcanvas-close" type="button" uk-close></button>
                  <!-- <h3><?php _e( 'Menu', 'twentysixteen' ); ?></h3> -->
                  <div class="uk-card uk-card-secondary">

                    <?php if ( has_nav_menu( 'primary' ) ) : ?>
                        <?php
                          wp_nav_menu( array(
                            'menu_class' => 'uk-nav uk-nav-default',
                            'container_class' => '',
                            'theme_location' => 'primary',
                            'container_class' => 'uk-card-body'
                            ) );
                        ?>
                    <?php endif; ?> <!-- .offcanvas main-navigation -->
                  </div>
              </div>
          </div>
      </div>

    </div>

  </nav>