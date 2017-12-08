<?php
/**
 * Template Name: Home Page
 *
 * @package Tiafeno
 * @subpackage David-Calmel
 * @since David Calmel 1.0
 */
add_action('wp_head', function() {
  echo '<meta name="page:type" content="template" />';
});
get_header('home'); 

 ?>

 <div id="primary"  class="uk-padding-remove-left uk-padding-remove-right">
   <?php if ( have_posts() ) : get_template_part( 'sidebar','top'); ?>
     <div id="primary-content" >
     <?php
     while ( have_posts() ) : the_post();
       get_template_part( 'tpls/content','favorite');
     endwhile;
   ?> </div> 
   <?php
   else :
     get_template_part( 'tpls/content', 'none' );
   endif;
   ?>

 </div>
 </div>
 <?php get_footer(); ?>
 <?php wp_footer(); ?>
 </body>
 </html>
