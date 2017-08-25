<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package Tiafeno
 * @subpackage David-Calmel
 * @since David Calmel 1.0
 */

 get_header('home'); ?>

 <div id="primary"  class="uk-container  uk-container-large uk-padding-remove-left uk-padding-remove-right">
   <?php if ( have_posts() ) : ?>
     <?php

        get_template_part( 'single', 'sidebar-top' );
     ?>
     <div id="primary-content" class="uk-container  uk-container-large animated  slideInUp ">
     <?php
     while ( have_posts() ) : the_post();
     /*
        * If you want to override this in a child theme, then include a file
        * called single-___.php (where ___ is the Post Format name) and that will be used instead.
        */

       get_template_part( 'tpls/single', 'content');

     endwhile;
   ?> </div> <?php
   else :
     get_template_part( 'tpls/content', 'none' );
   endif;
   ?>

 </div>
 </div>
 <?php 
  get_footer();
  wp_footer(); 
 ?>
 </body>
 </html>
