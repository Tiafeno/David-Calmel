<?php
/**
 * Template Name: Child Portfolio Page
 *
 * @package Tiafeno
 * @subpackage David-Calmel
 * @since David Calmel 1.0
 */

get_header('home'); 
?>

<style type="text/css">
  ul.category-nav-offcanvas {
    padding-right: 29px;
  }
  ul.category-nav-offcanvas > li {
    float: left;
    list-style: none;
    padding-left: 14px;
  }
  ul.category-nav-offcanvas > li > a{
    height: inherit;
    justify-content: space-between;
    color: #00A6DE;
    font-weight: 500;
    font-size: 0.685rem !important;
  }
  .header-offcanvas-title {
    padding-left: 43px;
  }
  .header-category-nav-offcanvas .section-offcanvas{
    -webkit-transition: width 2s, height 2s, background-color 2s, -webkit-transform 2s;
    transition: transform 2s;
  }

</style>

 <div id="primary"  class="uk-padding-remove-left uk-padding-remove-right">
<?php if ( have_posts() ) : 
       get_template_part( 'sidebar','top');
    ?>
     <div id="primary-content">
      <div id="fw-containers" class="fw-containers uk-container uk-container-large uk-padding-remove-right uk-padding-remove-left">  
        <?php 
          while ( have_posts() ) : the_post();
            get_template_part('tpls/content', 'portfolio-child'); 
          endwhile;
        ?>
      </div> 
    </div> 
<?php
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
