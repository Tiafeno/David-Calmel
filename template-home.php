<?php
/**
 * Template Name: Home Page
 *
 * @package Tiafeno
 * @subpackage David-Calmel
 * @since David Calmel 1.0
 */

 get_header('home'); ?>

 <div id="primary"  class="uk-container  uk-container-large uk-padding-remove-left uk-padding-remove-right">
   <?php if ( have_posts() ) : ?>
      <header class="header-category-nav-offcanvas animated slideInUp uk-hidden@m">
        <div class="uk-section uk-section-secondary section-offcanvas">
          <div class="uk-container uk-container-small">
            <h2 class="header-offcanvas-title"><?= strtoupper($post->post_title) ?></h2>
          </div>
          <div class="uk-container uk-container-small uk-text-center">
          <?php if ( has_nav_menu( 'secondary' ) ) : ?>
								<?php
									wp_nav_menu( array(
                    'menu_class' => 'category-nav-offcanvas',
                    'container_class' => '',
										'theme_location' => 'secondary',
                    'container_class' => 'container_class_menu'
									 ) );
								?>
						<?php endif; ?> <!-- .secondary-navigation -->
          </div>
        </div>
      </header>

     <header class="header-category-nav animated slideInUp uk-visible@m">
       <div class="uk-container uk-container-small uk-navbar">
         <div class="uk-navbar-left animated  slideInLeft">
           <ul class="uk-navbar-nav category-title">
              <li class="uk-active">
                <a href="#">
                  <h2><?= strtoupper($post->post_title) ?></h2>
                </a>
              </li>
           </ul>
         </div>

         <div class="uk-navbar-right">
         <?php if ( has_nav_menu( 'secondary' ) ) : ?>
								<?php
									wp_nav_menu( array(
                    'menu_class' => 'uk-navbar-nav uk-visible@m category-menu',
                    'container_class' => '',
										'theme_location' => 'secondary',
                    'container_class' => 'container_class_menu'
									 ) );
								?>
						<?php endif; ?> <!-- .secondary-navigation -->
         </div>

       </div>
     </header>
     <div id="primary-content" class="uk-container  uk-container-large animated  slideInUp">
     <?php
     while ( have_posts() ) : the_post();
     /*
        * Include the Post-Format-specific template for the content.
        * If you want to override this in a child theme, then include a file
        * called content-___.php (where ___ is the Post Format name) and that will be used instead.
        */

       get_template_part( 'tpls/content','favorite');

     endwhile;
   ?> </div> <?php
   else :
     get_template_part( 'tpls/content', 'none' );
   endif;
   ?>

 </div>
 </div>
 <?php wp_footer(); ?>
 </body>
 </html>
