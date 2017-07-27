<?php
/**
* The main template file
*
*
* @package Tiafeno
* @subpackage David_Calmel
* @since David Calmel 1.0
*/
get_header();
?>

<div id="primary">
  <?php if ( have_posts() ) : ?>
    <?php
    while ( have_posts() ) : the_post();
    /*
       * Include the Post-Format-specific template for the content.
       * If you want to override this in a child theme, then include a file
       * called content-___.php (where ___ is the Post Format name) and that will be used instead.
       */
      get_template_part( 'tpls/content', get_post_format() );
  endwhile;
  else :
    get_template_part( 'tpls/content', 'none' );
  endif;
  ?>

</div>
</div>
<?php wp_footer(); ?>
</body>
</html>
