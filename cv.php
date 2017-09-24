<?php
/**
 * Template Name: C.V. Template
 *
 * @package Tiafeno
 * @subpackage David-Calmel
 * @since David Calmel 1.1
 */
 wp_enqueue_script( 'ancre', get_template_directory_uri().'/assets/js/ancre.script.js', array('jquery'), false );
 get_header();
 ?>
 <script type="text/javascript">
  (function($){
    $( document ).ready(function() {
      
    });
  })(jQuery);
 </script>

<div id="primary"  class="uk-section uk-section-large uk-padding-remove-left uk-padding-remove-top uk-padding-remove-right cover-container">
   <?php if ( have_posts() ) : 
            get_template_part( 'sidebar','anchorage');
    ?>
     <div id="primary-content" class="uk-container  uk-container-small animated slideInUp" style="padding-top:60px;">
     <?php
      while ( have_posts() ) : the_post();
        $content = apply_filters( 'the_content', get_the_content() );
        $contentDOM = new DOMDocument('1.0', 'UTF-8');
        $the_content_utf8 = mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8');

        libxml_use_internal_errors(true);
        $contentDOM->loadHTML( $the_content_utf8 );
        libxml_clear_errors();

        $h2 = $contentDOM->getElementsByTagName('h2');
        foreach ($h2 as $iteration => $element) {
          $newElement = $contentDOM->createElement('h2', $element->nodeValue);

          $newElement->setAttribute('style', $element->getAttribute( 'style' ));
          $newElement->setAttribute('class', $element->getAttribute( 'class' ));

          $attribut_id = $contentDOM->createAttribute('id');
          $attribut_id->value = 'id_'.$iteration;
          $newElement->appendChild( $attribut_id );

          $element->parentNode->replaceChild( $newElement, $element );
        }
        echo $contentDOM->saveHTML();
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
