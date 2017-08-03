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

    <div id="primary"  class="uk-container  uk-container-large uk-padding-remove-left uk-padding-remove-right">
     <div id="primary-content" class="uk-container  uk-container-small uk-padding-top animated  slideInUp">
        <h2><?php _e( 'This is somewhat embarrassing, isn’t it?', 'twentythirteen' ); ?></h2>
				<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'twentythirteen' ); ?></p>
     </div> 
    </div>

 </div>
 <?php wp_footer(); ?>
 </body>
 </html>
