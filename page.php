<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package Tiafeno
 * @subpackage David-Calmel
 * @since David Calmel 1.0
 */

 get_header(); ?>

 <div id="primary"  class="uk-container  uk-container-large uk-padding-remove-left uk-padding-remove-right cover-container">
   <?php if ( have_posts() ) : ?>
     <div id="primary-content" class="uk-container  uk-container-small animated slideInUp" style="padding-top:60px;">
     <?php
     while ( have_posts() ) : the_post();
       the_content();
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
 wp_footer(); ?>
 </body>
 </html>
