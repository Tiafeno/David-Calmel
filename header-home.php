<?php
/**
 * The main template file
 *
 *
 * @package Tiafeno
 * @subpackage David_Calmel
 * @since David Calmel 1.0
 */
get_template_part('head');
set_query_var( 'title', "PORTFOLIO" );
 ?>
<body <?php body_class(); ?>>
  <style type="text/css">
    .uk-tooltip{
      color: #fff;
    }
  </style>
  <span class="goup uk-margin-small-right uk-position-fixed uk-position-bottom-right uk-button uk-button-primary" 
  uk-icon="icon: chevron-up; ratio: 2" style="padding: 0px 5px 0px 5px; z-index: 999; bottom: 80px" title="Go Up" uk-tooltip="pos: left" >
  </span>
  <header class="header-nav-top">
    <header class="container-nav-top">
      <div class="uk-container uk-container-small">
        <?php get_template_part('navbar', 'top'); ?>
      </div>
    </header>
    <header class="header-middle-top">
      <header class="HeaderMenu">
        <div class="uk-container uk-container-small">
          <?php get_template_part( 'navbar','bottom');?>
        </div>
      </header>
    </header>

    <?php 
    if ( have_posts() ) : 
      if ( ! defined('SINGLE'))
        get_template_part( 'sidebar','top');
    endif;

    if (defined('SINGLE')):
      if (SINGLE == true) {
        get_template_part( 'single', 'sidebar-top' );
      }
    endif;
    ?>
  </header>

  <div id="main-content" class="uk-section uk-section-default uk-padding-remove-top"> <!-- uk-padding-remove-top -->
 <!-- </body> -->
