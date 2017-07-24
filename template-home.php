<?php
/**
 * Template Name: Home Page
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

 get_header('home'); ?>

 <div id="primary"  class="uk-container  uk-container-large uk-padding-remove-left uk-padding-remove-right">
   <?php if ( have_posts() ) : ?>
     <header class="header-category-nav">
       <div class="uk-container uk-container-small uk-navbar">
         <div class="uk-navbar-left">
           <ul class="uk-navbar-nav category-title">
               <li class="uk-active"><a href="#"><h2><?= get_Title() ?></h2></a></li>
           </ul>
         </div>

         <div class="uk-navbar-right">
           <ul class="uk-navbar-nav uk-visible@m">
         <?php
         $parent_terms = get_terms('category', array('name' => 'portfolio', 'hide_empty' => false ) );
         foreach ( $parent_terms as $pterm ) {
           //Get the Child terms
           $terms = get_terms( 'category', array( 'parent' => $pterm->term_id, 'orderby' => 'slug', 'hide_empty' => false ) );
           if (!$terms || is_wp_error( $terms ))
               $terms = array();

           foreach ( $terms as $term ) {
             $ID = get_cat_ID( $term->name );
             if (strtolower( get_Title() ) === $term->name) {
               continue;
             }
         ?>
             <li class="category-menu"><a href="<?= esc_url( get_category_link( $ID ) ) ?>"><?= $term->name ?></a></li>
         <?php
           }
         }
         ?>
           </ul>
         </div>

       </div>
     </header>
     <div id="primary-content" class="uk-container  uk-container-small">
     <?php
     while ( have_posts() ) : the_post();
     /*
        * Include the Post-Format-specific template for the content.
        * If you want to override this in a child theme, then include a file
        * called content-___.php (where ___ is the Post Format name) and that will be used instead.
        */

       get_template_part( 'tpls/content','home');

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
