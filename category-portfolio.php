<?php

get_header(); ?>

<div id="primary"  class="uk-container  uk-container-large uk-padding-remove-left uk-padding-remove-right">
  <?php if ( have_posts() ) : ?>
    <div id="primary-content" class="uk-container  uk-container-small">
    <?php
    while ( have_posts() ) : the_post();
    /*
       * Include the Post-Format-specific template for the content.
       * If you want to override this in a child theme, then include a file
       * called content-___.php (where ___ is the Post Format name) and that will be used instead.
       */

      get_template_part( 'tpls/content','portfolio' );
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
