<?php
/**
 * Template Name: Small Width Page
 *
 * @package Tiafeno
 * @subpackage David-Calmel
 * @since David Calmel 1.0
 */
add_action('wp_head', function() {
  echo '<meta name="page:type" content="template" />';
});
 get_header();
 ?>
 <div id="primary" class="uk-container  uk-container-small" style="padding-top: 35px">
   <?php if ( have_posts() ) : ?>
     <?php
     while ( have_posts() ) : the_post();
	 
       the_content();
	   
   endwhile;
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
