<?php
/**
 * Template Name: Portfolio Page
 *
 * @package Tiafeno
 * @subpackage David-Calmel
 * @since David Calmel 1.0
 */

 get_header('home'); ?>

 <div id="primary"  class=" uk-padding-remove-left uk-padding-remove-right">
   <?php if ( have_posts() ) : ?>
     <div id="primary-content" >
     <?php
     while ( have_posts() ) : the_post();
     /*
        * Include the Post-Format-specific template for the content.
        * If you want to override this in a child theme, then include a file
        * called content-___.php (where ___ is the Post Format name) and that will be used instead.
        */

       get_template_part( 'tpls/content','portfolio');

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
